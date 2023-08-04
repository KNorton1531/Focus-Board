function getSpotifyAuthToken() {
  const urlParams = new URLSearchParams(window.location.search);
  const authToken = urlParams.get('code');
  return authToken;
}

async function fetchSpotifyToken() {

  
    const options = {
      method: 'POST',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded',
        Authorization: 'Basic N2I5NmE2NjhmOGNmNGI4NDg4MTllYmVmMjg5YTIzMzY6MDk2ZDRhZWU4NTg0NDBhY2EzNzQ1MWVjZTU2N2IzMDA='
      },
      body: new URLSearchParams({
        grant_type: 'authorization_code',
        code: getSpotifyAuthToken(),
        redirect_uri: 'https://nortonwebtesting.free.nf/?i=2'
      })
    };

    try {
      const response = await fetch('https://accounts.spotify.com/api/token', options);
      const data = await response.json();
  
      if (data.access_token && data.refresh_token) { // check if tokens exist in the response
        localStorage.setItem('spotifyAccessToken', data.access_token);
        localStorage.setItem('spotifyRefreshToken', data.refresh_token);
      }
  
      return { accessToken: data.access_token, refreshToken: data.refresh_token };
    } catch (err) {
      console.error(err);
    }

}

async function fetchCurrentlyPlaying() {
  const options = {
    method: 'GET',
    headers: {
      Authorization: 'Bearer ' + localStorage.getItem('spotifyAccessToken')
    }
  };

  try {
    const response = await fetch('https://api.spotify.com/v1/me/player/currently-playing', options);
    const responseData = await response.json();
    const currentlyPlayingData = responseData;
    console.log(currentlyPlayingData.item.name);
    console.log(currentlyPlayingData.item.artists[0].name);
    console.log(currentlyPlayingData.item);
    console.log(currentlyPlayingData.item.album.images[0].url);
    document.getElementById("nowPlaying").innerHTML = currentlyPlayingData.item.name;
    document.getElementById("artistPlaying").innerHTML = currentlyPlayingData.item.artists[0].name;
    document.getElementById("nowPlayingAlbum").src = currentlyPlayingData.item.album.images[0].url;
  } catch (err) {
    console.error(err);
  }
}

let localAccessToken = localStorage.getItem('spotifyAccessToken');

if (localAccessToken){
  console.log('Confirm IS token');
} else if (!localAccessToken){
  console.log('Confirm NO token');
}


  if (typeof localStorage.getItem('spotifyAccessToken') !== 'undefined'){
    fetchSpotifyToken();
    fetchCurrentlyPlaying(); 
  }


  // if (!localAccessToken) {
  //   fetchSpotifyToken().then(tokens => {
  //     accessToken = tokens.accessToken;
  //     localStorage.setItem('spotifyAccessTokenExpiry', Date.now() + 45 * 60 * 1000);  // Expiry in 45 minutes
  //     fetchCurrentlyPlaying(); 
  //     setInterval(fetchCurrentlyPlaying, 5000);
  //     console.log('There is no Access Token');
  //     console.log(accessToken);
  //   });
  // } else if (Date.now() > localStorage.getItem('spotifyAccessTokenExpiry')) {
  //   // Token expired, fetch a new one
  //   fetchSpotifyToken().then(tokens => {
  //     accessToken = tokens.accessToken;
  //     localStorage.setItem('spotifyAccessTokenExpiry', Date.now() + 45 * 60 * 1000);  // Expiry in 45 minutes
  //   });
  // } else {
  //   fetchSpotifyToken().then(tokens => {
  //     accessToken = tokens.accessToken;  // Update the accessToken after fetching
  //     fetchCurrentlyPlaying(); 
  //     setInterval(fetchCurrentlyPlaying, 5000);
  //     console.log('There is an Access Token');
  //     console.log(accessToken);
  //   });
  // }
