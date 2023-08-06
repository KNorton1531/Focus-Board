$(".submitName").click(function () {
    localStorage.setItem('userName', $(".nameInput").val());
    setWelcomeMessage()
});

$(".clearName").click(function () {
    localStorage.removeItem('userName');
    setWelcomeMessage()
});