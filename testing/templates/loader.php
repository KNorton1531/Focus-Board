<div id="loading-screen">
    <div class="loader"></div>
    <div>Loading...</div>
</div>

<style>
    #loading-screen {
        position: fixed;
        top: 0;
        width: 100%;
        height: 100%;
        background: #262626;
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 1000;  /* ensure it's on top of other content */
        gap: 20px;
        color: #fff;
        flex-direction: column;
    }

    .loader {
    position: relative;
    width: 75px;
    height: 75px;
    border-radius: 50%;
    background: linear-gradient(45deg, transparent, transparent 30%, #e5f403);
    animation: loader 2s linear infinite;
    }
    @keyframes loader {
    0% {
        transform: rotate(0deg);
        filter: hue-rotate(0deg);
    }
    100% {
        transform: rotate(360deg);
        filter: hue-rotate(360deg); 
    }
    }
    .loader:before {
    content: '';
    position: absolute;
    top: 6px;
    left: 6px;
    bottom: 6px;
    right: 6px;
    background: #000;
    border-radius: 50%;
    z-index: 1000;
    }
    .loader:after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    bottom: 0;
    right: 0;
    background: linear-gradient(45deg, transparent, transparent 30%, #e5f403);
    border-radius: 50%;
    z-index: 1000;
    z-index: 1;
    filter: blur(30px);
    }
</style>

<script>
    window.onload = function() {
        setTimeout(function() {
            document.getElementById("loading-screen").style.display = "none";
            document.getElementById("main-content").style.display = "block";
            document.body.style.overflow = "auto";  // allow scrolling again
        }, 1000);  // Set loading page timer
    };
</script>