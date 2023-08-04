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
  
      if (data.access_token && data.refresh_token && data.expires_in) {
        localStorage.setItem('spotifyAccessToken', data.access_token);
        localStorage.setItem('spotifyRefreshToken', data.refresh_token);
        localStorage.setItem('spotifyTokenExpiry', Date.now() + data.expires_in * 1000);
  
        // Hide the authElement because the user is authorized
        document.getElementById('nowPlayingContainer').style.display = 'none';
      } else {
        // Show the authElement because the user is not authorized
        document.getElementById('nowPlayingContainer').style.display = 'inline';
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

// Call this function to refresh the token when it expires
async function refreshToken() {
  // Refresh token using refresh_token endpoint and localStorage.getItem('spotifyRefreshToken')

  const options = {
    method: 'POST',
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded',
      Authorization: 'Basic N2I5NmE2NjhmOGNmNGI4NDg4MTllYmVmMjg5YTIzMzY6MDk2ZDRhZWU4NTg0NDBhY2EzNzQ1MWVjZTU2N2IzMDA='
    },
    body: new URLSearchParams({
      grant_type: 'refresh_token',
      refresh_token: localStorage.getItem('spotifyRefreshToken')
    })
  };

  try {
    const response = await fetch('https://accounts.spotify.com/api/token', options);
    const data = await response.json();

    if (data.access_token) {
      localStorage.setItem('spotifyAccessToken', data.access_token);
      // Update expiry time
      localStorage.setItem('spotifyTokenExpiry', Date.now() + data.expires_in * 1000);
    }

    return { accessToken: data.access_token };
  } catch (err) {
    console.error(err);
  }
}


  if (typeof localStorage.getItem('spotifyAccessToken') !== 'undefined'){
    fetchSpotifyToken();
    fetchCurrentlyPlaying();
    setInterval(fetchCurrentlyPlaying, 5000);
  }

  function checkAndRefreshToken() {
    const tokenExpiry = localStorage.getItem('spotifyTokenExpiry');
  
    if (Date.now() > tokenExpiry) {
      refreshToken();
    }
  }

  // Call checkAndRefreshToken every minute
setInterval(checkAndRefreshToken, 60 * 1000);

