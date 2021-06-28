$(document).ready(function () {
    //Xử lý sự kiện click show hide menu
    document.querySelector('.navbar-nav').addEventListener('click', function(){
        if(document.querySelector('.left-sidebar').style.display == 'none') {
            document.querySelector('.left-sidebar').style.display = 'block'
            document.querySelector('.container2').style.marginLeft = '240px'
            document.querySelector('.footer').style.left = '240px'
        } else {
            document.querySelector('.left-sidebar').style.display = 'none'
            document.querySelector('.container2').style.marginLeft = '0px'
            document.querySelector('.footer').style.left = '0px'
        }
    })
});