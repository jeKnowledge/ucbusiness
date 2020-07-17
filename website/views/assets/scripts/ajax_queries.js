$(document).ready(function(){
    main();
});

function main() {
    pt_btn = document.getElementById('PTbtn');
    en_btn = document.getElementById('ENbtn');
    cookie_btn = document.getElementById('cookie-button');

    if (pt_btn && en_btn) {
        pt_btn.addEventListener('click', function () {
            change_language('pt');
        });
        en_btn.addEventListener('click', function () {
            change_language('en');
        });
    }
    
    if (cookie_btn) {
        cookie_btn.addEventListener('click', function() {
            hide_cookie_banner();
        });
    }
}

function change_language(lang) {
    $.ajax({
        type: 'post',
        url: '/changeLanguage',
        data: {"lang" : lang},
        success: () => {
            location.reload();
        }
    });
}

function hide_cookie_banner() {
    $.ajax({
        type: 'post',
        url: '/hideCookieBanner',
        data: {"hide" : true},
        success: () => {
            $("#cookie-banner-div").css("display", "none");
        }
    });
}