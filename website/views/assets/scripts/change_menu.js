function changeMenu(){

    if ($('#menu-txt').css('display') == 'none'){
        $('#video-ucb').css('display', 'none');
        $('#news').css('margin-top', '100vh');
        $('#menu-txt').css('display', 'block');
        $('.rect-menu').css('height', '100vh');
        $('#container').css('margin-bottom', '92vh');
    }
    else{
        $('#video-ucb').css('display', 'block');
        $('#news-container').css('margin-top', '0vh');
        $('#menu-txt').css('display', 'none');
        $('.rect-menu').css('height', '8vh');
        $('#container').css('margin-bottom', '0');
    }
}
