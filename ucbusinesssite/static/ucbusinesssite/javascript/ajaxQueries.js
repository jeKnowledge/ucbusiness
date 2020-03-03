if(document.readyState === "complete" || (document.readyState!== "loading" && !document.documentElement.doScroll)){
    main();
}else{
    document.addEventListener("DOMContentLoaded", main);
}

function main() {
    acceptBtn = document.getElementById("cookie-button");
    ptBtn = document.getElementById('PTbtn');
    enBtn = document.getElementById('ENbtn');
    if (acceptBtn!=null) {
        acceptBtn.addEventListener("click", hideCookieBanner);
    }
    ptBtn.addEventListener("click", function(e){changeLanguage('PT')});
    enBtn.addEventListener("click", function(e){changeLanguage('EN')});
}

function hideCookieBanner() {
    $.ajax({
        headers: {'X-CSRFToken': document.querySelector('[name=csrfmiddlewaretoken]').value},
        type: 'PATCH',
        url: '/hideCookieBanner/',
        success: (response) => {
            $('.cookiebanner').css('display', 'none');
        },
        failure: (response) => {
        }
    })
}

function changeLanguage(language) {
    $.ajax({
        headers: {'X-CSRFToken': document.querySelector('[name=csrfmiddlewaretoken]').value},
        data: JSON.stringify({value:language}),
        type: 'PATCH',
        url: '/changelanguage/',
        success: (response) => {
            location.reload();
        },
        failure: (response) => {
        }
    })
}