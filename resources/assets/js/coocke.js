$(document).ready(function () {
    function getCookie(name) {
        var value = document.cookie.match('(^|;) ?' + name + '=([^;]*)(;|$)');
        return value ? value[2] : null;
    }

    function setCookie(name, value, days) {
        var currentDate = new Date();
        currentDate.setTime(currentDate.getTime() + 24*60*60*1000*days);
        document.cookie = name + "=" + value + ";path=/;expires=" + currentDate.toGMTString();
    }

    if(getCookie("dzen_cookie") == null){
        $("#cookie-message").removeClass("hide");
    }

    $("#cookie-message").on("click", function () {
        $(this).addClass("hide");
        setCookie("dzen_cookie", "dzen_cookie_set", 1000);
    });
});