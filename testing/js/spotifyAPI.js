  // Function to extract the access token from the URL
  function getSpotifyAuthToken() {
    const urlParams = new URLSearchParams(window.location.search);
    const authToken = urlParams.get('code');
    return authToken;
  }

  let accessToken = '';
  let refreshToken = '';

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

// Call the fetchSpotifyToken function to perform the API request
  fetchSpotifyToken().then(async (tokens) => {
    const options = {
      method: 'GET',
      headers: {
        Authorization: 'Bearer ' + tokens.accessToken
      }
    };

    try {
      const response = await fetch('https://api.spotify.com/v1/me/player/currently-playing', options);
      const responseData = await response.json();
      
      // Store the response data into a variable
      const currentlyPlayingData = responseData;

      // Now you can use the currentlyPlayingData variable as needed
      console.log(currentlyPlayingData.item.name);

      // Access the first element with class "nowPlaying" and update its content
      document.getElementById("nowPlaying").innerHTML = currentlyPlayingData.item.name;

    } catch (err) {
      console.error(err);
    }
  });