function setMobileNavMenu() {

    var menuBtn = [].slice.call(document.getElementsByClassName('btn-mobile-nav'));

    menuBtn.forEach(function(item) {

        var navMenu = document.getElementById('main-menu');
        var bodyEle = document.getElementsByTagName('body')[0];

        item.addEventListener('click',function(e) {
            this.classList.toggle('active');
            navMenu.classList.toggle('open');
            bodyEle.classList.toggle('nav-open');
        })
    });
}

setMobileNavMenu();