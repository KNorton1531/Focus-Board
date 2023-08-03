let accessToken = localStorage.getItem('spotifyAccessToken');

function getSpotifyAuthToken() {
  const urlParams = new URLSearchParams(window.location.search);
  const authToken = urlParams.get('code');
  return authToken;
}

if (!accessToken) {
  fetchSpotifyToken().then(tokens => {
    accessToken = tokens.accessToken;
    localStorage.setItem('spotifyAccessTokenExpiry', Date.now() + 45 * 60 * 1000);  // Expiry in 45 minutes
    fetchCurrentlyPlaying(); 
    setInterval(fetchCurrentlyPlaying, 5000);
  });
} else if (Date.now() > localStorage.getItem('spotifyAccessTokenExpiry')) {
  // Token expired, fetch a new one
  fetchSpotifyToken().then(tokens => {
    accessToken = tokens.accessToken;
    localStorage.setItem('spotifyAccessTokenExpiry', Date.now() + 45 * 60 * 1000);  // Expiry in 45 minutes
  });
} else {
  fetchCurrentlyPlaying(); 
  setInterval(fetchCurrentlyPlaying, 5000);
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
        localStorage.setItem('spotifyRefreshToken', data.refresh_token);
        localStorage.setItem('spotifyAccessToken', data.access_token);
        console.log(localStorage.getItem('spotifyAccessToken'));

      return { accessToken: data.access_token, refreshToken: data.refresh_token };

    } catch (err) {
      console.error(err);
    }
}

async function fetchCurrentlyPlaying() {
  const options = {
    method: 'GET',
    headers: {
      Authorization: 'Bearer ' + accessToken
    }
  };

  try {
    const response = await fetch('https://api.spotify.com/v1/me/player/currently-playing', options);
    const responseData = await response.json();
    const currentlyPlayingData = responseData;
    console.log(currentlyPlayingData.item.name);
    document.getElementById("nowPlaying").innerHTML = currentlyPlayingData.item.name;
  } catch (err) {
    console.error(err);
  }
}
