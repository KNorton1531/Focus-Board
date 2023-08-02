// Function to extract the access token from the URL
function getSpotifyAuthToken() {
    const urlParams = new URLSearchParams(window.location.search);
    const authToken = urlParams.get('code');
    return authToken;
  }
  
  function getCookie(name) {
    const value = "; " + document.cookie;
    const parts = value.split("; " + name + "=");
    if (parts.length === 2) return parts.pop().split(";").shift();
  }
  
  let accessToken = getCookie('spotifyAccessToken') || '';
  let refreshToken = getCookie('spotifyRefreshToken') || '';
  
  if (!accessToken) {
    fetchSpotifyToken().then(tokens => {
      accessToken = tokens.accessToken;
      refreshToken = tokens.refreshToken;
      
      document.cookie = 'spotifyAccessToken=' + accessToken;
      document.cookie = 'spotifyRefreshToken=' + refreshToken;
    
      document.getElementById('spotifyContainer').removeChild(document.querySelector('p'));
      
      fetchCurrentlyPlaying(); // Called once immediately
      setInterval(fetchCurrentlyPlaying, 10000);  // Then updates every 10 seconds
    });
  } else {
    fetchCurrentlyPlaying(); // Called once immediately
    setInterval(fetchCurrentlyPlaying, 10000);  // Then updates every 10 seconds
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
            accessToken = data.access_token;
            refreshToken = data.refresh_token;
            return { accessToken, refreshToken };
        } catch (err) {
            return console.error(err);
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
  