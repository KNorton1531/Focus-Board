let accessToken = getCookie('spotifyAccessToken');

function getSpotifyAuthToken() {
  const urlParams = new URLSearchParams(window.location.search);
  const authToken = urlParams.get('code');
  return authToken;
}

console.log(accessToken);

function getCookie(name) {
  const value = "; " + document.cookie;
  const parts = value.split("; " + name + "=");
  if (parts.length === 2) return parts.pop().split(";").shift();
}

if (accessToken == undefined) {
  fetchSpotifyToken().then(tokens => {
    accessToken = tokens.accessToken;
    fetchCurrentlyPlaying(); 
    setInterval(fetchCurrentlyPlaying, 10000);
  });
} else {
  fetchCurrentlyPlaying(); 
  setInterval(fetchCurrentlyPlaying, 10000);
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
        redirect_uri: 'http://nortonwebtesting.free.nf/?i=2'
      })
    };

    try {
          const response = await fetch('https://accounts.spotify.com/api/token', options);
          const data = await response.json();

          document.cookie = 'spotifyAccessToken=' + data.access_token;
          document.cookie = 'spotifyRefreshToken=' + data.refresh_token;

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

