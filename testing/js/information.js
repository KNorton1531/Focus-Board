$('.closeInfo').click(function(){
    $(".informationContainer").hide();
    $(".blackout").hide();
    $(".closeInfo").hide();
});

$('.informationIcon').click(function(){
    $(".informationContainer").show();
    $(".blackout").show();
    $(".closeInfo").show();
});

$('.blackout').click(function(){
    $(".informationContainer").hide();
    $(".blackout").hide();
    $(".closeInfo").hide();
});

tippy('.informationIcon', {
    content: 'Site Info',
  });