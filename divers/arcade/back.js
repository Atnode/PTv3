document.addEventListener('DOMContentLoaded', function() {
    var back = document.createElement('a');
        back.style = "position: absolute;z-index:100;background:#fff;top:0px;left:0px;padding:5px 10px;border-radius:0 0 5px 0;font-family: DejaVu Sans !important;color: #333;font-size:14px;text-decoration:none;font-weight:normal;";
        back.href="../../";
        back.target="_top";
        back.id="back"
    document.getElementsByTagName('body')[0].appendChild(back);
    document.getElementsByTagName('body')[0].style.paddingTop = "25px";
    document.getElementById("back").innerHTML = '&larr; Retour au menu de <b>Games</b>';
});