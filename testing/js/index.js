
    var draggable1 = new PlainDraggable(document.getElementById('dragContainer1'),
      {handle: document.querySelector('#dragContainer1 .draggable')});

    var draggable2 = new PlainDraggable(document.getElementById('dragContainer2'),
    {handle: document.querySelector('#dragContainer2 .draggable')});

    var spotifyContainer = new PlainDraggable(document.getElementById('spotifyContainer'),
    {handle: document.querySelector('#spotifyContainer .draggable')});
    


  
  function deleteDraggable(){
    var draggable1 = document.getElementById('dragContainer2');

    if (draggable1.style.display === "none") {
      draggable1.style.display = "block";
    } else {
      draggable1.style.display = "none";
    }
  }