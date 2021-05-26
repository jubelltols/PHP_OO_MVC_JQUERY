/*==================== SCROLL SECTIONS ACTIVE LINK ====================*/
const sections = document.querySelectorAll('section[id]')

function scrollActive(){
    const scrollY = window.pageYOffset

    sections.forEach(current =>{
        const sectionHeight = current.offsetHeight
        const sectionTop = current.offsetTop - 50;
        sectionId = current.getAttribute('id')

        if(scrollY > sectionTop && scrollY <= sectionTop + sectionHeight){
            document.querySelector('.nav__menu a[href*=' + sectionId + ']').classList.add('active-link')
        }else{
            document.querySelector('.nav__menu a[href*=' + sectionId + ']').classList.remove('active-link')
        }
    })
}
window.addEventListener('scroll', scrollActive)

/*==================== CHANGE BACKGROUND HEADER ====================*/ 
function scrollHeader(){
    const nav = document.getElementById('header')
    // When the scroll is greater than 200 viewport height, add the scroll-header class to the header tag
    if(this.scrollY >= 200) nav.classList.add('scroll-header'); 
    else nav.classList.remove('scroll-header')
}
window.addEventListener('scroll', scrollHeader)

/*==================== SHOW SCROLL TOP ====================*/ 
function scrollTop(){
    const scrollTop = document.getElementById('scroll-top');
    // When the scroll is higher than 560 viewport height, add the show-scroll class to the a tag with the scroll-top class
    if(this.scrollY >= 560) scrollTop.classList.add('show-scroll'); 
    else scrollTop.classList.remove('show-scroll')
}
window.addEventListener('scroll', scrollTop)

/*==================== SCROLL REVEAL ANIMATION ====================*/
const sr = ScrollReveal({
    origin: 'top',
    distance: '30px',
    duration: 2000,
    reset: true
});

sr.reveal(`.home__data, .home__img,
            .about__data, .about__img,
            .services__content, .menu__content,
            .app__data, .app__img,
            .contact__data, .contact__button,
            .footer__content`, {
    interval: 200
})

/*==================== AJAX PROMISE ====================*/

function ajaxPromise(sUrl, sType, sTData, sData = undefined) {
    return new Promise((resolve, reject) => {
        $.ajax({
            url: sUrl,
            type: sType,
            dataType: sTData,
            data: sData
        }).done((data) => {
            resolve(data);
        }).fail((jqXHR, textStatus, errorThrow) => {
            reject(errorThrow);
        }); 
    });
}

/*==================== LOAD MENU ====================*/

function load_menu() {
    console.log("hola");
    $('<li></li>').attr({'class' : 'nav__item'}).html('<a href="index.php?page=controller_home&op=homepage" class="nav__link">Home</a>').appendTo('.nav__list');
    $('<li></li>').attr({'class' : 'nav__item'}).html('<a href="index.php?page=controller_shop&op=view" class="nav__link">Shop</a>').appendTo('.nav__list');
    $('<li></li>').attr({'class' : 'nav__item'}).html('<a href="index.php?page=controller_contact&op=contact" class="nav__link">Contact us</a>').appendTo('.nav__list');
    //$('<li></li>').attr({'class' : 'nav__item'}).html('<a href="index.php?page=controller_login&op=login_view" class="nav__link">Log in</a>').appendTo('.nav__list');
   
    ajaxPromise('module/login/controller/controller_logIn.php?op=data_user', 'POST', 'JSON',{token: localStorage.getItem('token')})
    .then(function(data) {
        if (data.type === 'admin') {
            menu_admin();
        }else if (data.type === 'client') {
            menu_client();
        }
    }).catch(function() {
        $('<li></li>').attr({'class' : 'nav__item'}).html('<a href="index.php?page=controller_login&op=login_view" class="nav__link">Log in</a>').appendTo('.nav__list');
        $('<li></li>').attr({'class' : 'nav__item'}).html('<a href="index.php?page=controller_cart&op=view" class="nav__link">Cart</a>').appendTo('.nav__list');
    });
}

/*==================== MENUS ====================*/

function menu_admin() {
    $('<li></li>').attr({'class' : 'nav__item'}).html('<a href="index.php?page=controller_crud&op=list" class="nav__link">Crud</a>').appendTo('.nav__list');
    $('<li></li>').attr({'class' : 'nav__item'}).html('<a href="" id="logout" class="nav__link">Log out</a>').appendTo('.nav__list');
    $('<li></li>').attr({'class' : 'nav__item'}).html('<a href="index.php?page=controller_cart&op=view" class="nav__link">Cart</a>').appendTo('.nav__list');
}

function menu_client() {
    $('<li></li>').attr({'class' : 'nav__item'}).html('<a href="" id="logout" class="nav__link">Log out</a>').appendTo('.nav__list');
    $('<li></li>').attr({'class' : 'nav__item'}).html('<a href="index.php?page=controller_cart&op=view" class="nav__link">Cart</a>').appendTo('.nav__list');
}

/*==================== CLICK LOGOUT ====================*/

function click_logout() {
    $(document).on('click', '#logout', function() {
        logout();
    });
}

/*==================== LOGOUT ====================*/

function logout() {
    $.ajax({
        url: 'module/login/controller/controller_login.php?op=logout',
        type: 'POST',
        dataType: 'JSON'
    }).done(function(data) {
        console.log(data);
        localStorage.removeItem('token');
        window.location.href = "index.php?page=controller_home&op=homepage";
    }).fail(function() {
        console.log('Something has occured');
    });
}

$(document).ready(function() {
    load_menu();
    click_logout();
});