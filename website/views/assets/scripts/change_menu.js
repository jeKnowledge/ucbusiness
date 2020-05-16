function changeMenu(){

    if ($('#menu-txt').css('display') == 'none'){
        $('#menu-txt').css('display', 'block');
        $('.rect-menu').css('height', '100vh');
        $('#container').css('margin-bottom', '92vh');
    }
    else{
        $('#menu-txt').css('display', 'none');
        $('.rect-menu').css('height', '8vh');
        $('#container').css('margin-bottom', '0');
    }
}