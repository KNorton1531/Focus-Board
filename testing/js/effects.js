// Please, reload the page if it doesn't works properly <3
// See the console to check the number of <hr> tags

$(document).ready(function() {
let hrElements = [];

function executeScript() {
    let hrElement;
    let counter = 100;
    for (let i = 0; i < counter; i++) {
        hrElement = document.createElement("HR");
        if (i == counter - 1) {
            hrElement.className = "thunder";
        } else {
            hrElement.style.left = Math.floor(Math.random() * window.innerWidth) + "px";
            hrElement.style.animationDuration = 0.2 + Math.random() * 0.3 + "s";
            hrElement.style.animationDelay = Math.random() * 5 + "s";
        }
        document.body.appendChild(hrElement);
        hrElements.push(hrElement);
    }
}

let isScriptActive = false;

function toggleExecution() {
    if (isScriptActive) {
        // If script is active, remove the hr elements
        for (let hr of hrElements) {
            document.body.removeChild(hr);
        }
        hrElements = []; // Clear the array
    } else {
        // Otherwise, run the script
        executeScript();
    }
    isScriptActive = !isScriptActive;
}

    $('.rainEffect').click(toggleExecution);
});

