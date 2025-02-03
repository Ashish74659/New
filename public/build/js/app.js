/*
Template Name: Tocly -  Admin & Dashboard Template
Author: Themesdesign
Version: 1.0.0
Contact: themesdesign.in@gmail.com
File: Main Js File
*/



(function ($) {

    'use strict';

    function initMetisMenu() {
        //metis menu
        $("#side-menu").metisMenu();
    }

    function initLeftMenuCollapse() {
        $('.vertical-menu-btn').on('click', function (event) {
            event.preventDefault();
            $('body').toggleClass('sidebar-enable');
            if ($(window).width() >= 992) {
                $('body').toggleClass('vertical-collpsed');
            } else {
                $('body').removeClass('vertical-collpsed');
            }
        });

        $('body,html').click(function (e) {
            var container = $(".vertical-menu-btn");
            if (!container.is(e.target) && container.has(e.target).length === 0 && !(e.target).closest('div.vertical-menu')) {
                $("body").removeClass("sidebar-enable");
            }
        });
    }

    function initActiveMenu() {
        // === following js will activate the menu in left side bar based on url ====
        $("#sidebar-menu a").each(function () {
            var pageUrl = window.location.href.split(/[?#]/)[0];
            if (this.href == pageUrl) {
                $(this).addClass("active");
                $(this).parent().addClass("mm-active"); // add active to li of the current link
                $(this).parent().parent().addClass("mm-show");
                $(this).parent().parent().prev().addClass("mm-active"); // add active class to an anchor
                $(this).parent().parent().parent().addClass("mm-active");
                $(this).parent().parent().parent().parent().addClass("mm-show"); // add active to li of the current link
                $(this).parent().parent().parent().parent().parent().addClass("mm-active");
            }
        });
    }

    function initMenuItem() {
        $(".navbar-nav a").each(function () {
            var pageUrl = window.location.href.split(/[?#]/)[0];
            if (this.href == pageUrl) {
                $(this).addClass("active");
                $(this).parent().addClass("active");
                $(this).parent().parent().addClass("active");
                $(this).parent().parent().parent().addClass("active");
                $(this).parent().parent().parent().parent().addClass("active");
                $(this).parent().parent().parent().parent().parent().addClass("active");
            }
        });
    }

    function initMenuItemScroll() {
        // focus active menu in left sidebar
        $(document).ready(function () {
            if ($("#sidebar-menu").length > 0 && $("#sidebar-menu .mm-active .active").length > 0) {
                var activeMenu = $("#sidebar-menu .mm-active .active").offset().top;
                if (activeMenu > 300) {
                    activeMenu = activeMenu - 200;
                    $(".vertical-menu .simplebar-content-wrapper").animate({ scrollTop: activeMenu }, "slow");
                }
            }
        });
    }

    function initFullScreen() {
        $('[data-toggle="fullscreen"]').on("click", function (e) {
            e.preventDefault();
            $('body').toggleClass('fullscreen-enable');
            if (!document.fullscreenElement && /* alternative standard method */ !document.mozFullScreenElement && !document.webkitFullscreenElement) {  // current working methods
                if (document.documentElement.requestFullscreen) {
                    document.documentElement.requestFullscreen();
                } else if (document.documentElement.mozRequestFullScreen) {
                    document.documentElement.mozRequestFullScreen();
                } else if (document.documentElement.webkitRequestFullscreen) {
                    document.documentElement.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
                }
            } else {
                if (document.cancelFullScreen) {
                    document.cancelFullScreen();
                } else if (document.mozCancelFullScreen) {
                    document.mozCancelFullScreen();
                } else if (document.webkitCancelFullScreen) {
                    document.webkitCancelFullScreen();
                }
            }
        });
        document.addEventListener('fullscreenchange', exitHandler);
        document.addEventListener("webkitfullscreenchange", exitHandler);
        document.addEventListener("mozfullscreenchange", exitHandler);
        function exitHandler() {
            if (!document.webkitIsFullScreen && !document.mozFullScreen && !document.msFullscreenElement) {
                console.log('pressed');
                $('body').removeClass('fullscreen-enable');
            }
        }
    }

    function initRightSidebar() {
        // right side-bar toggle
        $('.right-bar-toggle').on('click', function (e) {
            $('body').toggleClass('right-bar-enabled');
        });

        $(document).on('click', 'body', function (e) {
            if ($(e.target).closest('.right-bar-toggle, .right-bar').length > 0) {
                return;
            }

            $('body').removeClass('right-bar-enabled');
            return;
        });
    }

    function initDropdownMenu() {
        if (document.getElementById("topnav-menu-content")) {
            var elements = document.getElementById("topnav-menu-content").getElementsByTagName("a");
            for (var i = 0, len = elements.length; i < len; i++) {
                elements[i].onclick = function (elem) {
                    if (elem.target.getAttribute("href") === "#") {
                        elem.target.parentElement.classList.toggle("active");
                        elem.target.nextElementSibling.classList.toggle("show");
                    }
                }
            }
            window.addEventListener("resize", updateMenu);
        }
    }

    function updateMenu() {
        var elements = document.getElementById("topnav-menu-content").getElementsByTagName("a");
        for (var i = 0, len = elements.length; i < len; i++) {
            if (elements[i].parentElement.getAttribute("class") === "nav-item dropdown active") {
                elements[i].parentElement.classList.remove("active");
                elements[i].nextElementSibling.classList.remove("show");
            }
        }
    }

    function initComponents() {

        // Tooltip
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })

        // Popover
        var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
        var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
            return new bootstrap.Popover(popoverTriggerEl)
        })

        // select-dropdown
        var selectDropdown = document.querySelectorAll('.select-dropdown');
        if (selectDropdown) {
            selectDropdown.forEach(function (elem) {
                elem.querySelectorAll('.dropdown-menu .dropdown-item').forEach(function (item) {
                    item.addEventListener('click', function () {
                        elem.querySelector('.user-name-text').innerHTML = item.querySelector(".dropdown-name").innerHTML;
                        elem.querySelector('.user-sort-name').innerHTML = item.querySelector(".dropdown-sort-name").innerHTML;
                        elem.querySelector('.user-name-sub-text').innerHTML = item.querySelector(".dropdown-sub-desc").innerHTML;
                    });
                });
            });
        }

    }

    function initPreloader() {
        $(window).on('load', function () {
            $('#status').fadeOut();
            $('#preloader').delay(350).fadeOut('slow');
        });
    }

    function initSettings() {
        updateThemeSetting();
        // if (window.sessionStorage) {
        //     var alreadyVisited = sessionStorage.getItem("is_visited");
        //     // var language = sessionStorage.getItem("language");


        //     if (!alreadyVisited) {
        //         if (document.documentElement.getAttribute('data-bs-theme') == 'dark') {
        //             sessionStorage.setItem("is_visited", "dark-mode-switch");
        //             $("#light-mode-switch").prop("checked", false);
        //             $("#dark-mode-switch").prop("checked", true);

        //             // $("#rtl-mode-switch").prop("checked", false);

        //         } else if (document.documentElement.getAttribute('data-bs-theme') == 'light') {
        //             sessionStorage.setItem("is_visited", "light-mode-switch");
        //         } else if (document.documentElement.getAttribute('dir') == 'rtl') {
        //             // sessionStorage.setItem("is_visited", "rtl-mode-switch");
        //             $("#light-mode-switch").prop("checked", false);
        //             $("#dark-mode-switch").prop("checked", false);
        //             // $("#rtl-mode-switch").prop("checked", true);
        //         } else {
        //             sessionStorage.setItem("is_visited", "light-mode-switch");
        //         }
        //     } else {
        //         $(".right-bar input:checkbox").prop('checked', false);
        //         $("#" + alreadyVisited).prop('checked', true);
        //         updateThemeSetting(alreadyVisited);
        //     }
        // }

        $("#light-mode-switch, #rtl-mode-switch").on("change", function (e) { // #dark-mode-switch,
            updateThemeSetting();
        });


        $(".language_switch").on("change", function (e) {
            var languages = document.getElementById('lang_name').value;
            if (languages == "Arabic") {
                sessionStorage.setItem("languages","Arabic");
                $("#light-mode-switch").prop("checked", true);
                $("#bootstrap-style").attr('href', '../build/css/bootstrap.min.rtl.css');
                $("#app-style").attr('href', '../build/css/app.min.rtl.css');
                $("html").attr("dir", 'rtl');
                $('input').attr('dir', 'rtl');
                //sessionStorage.setItem("is_visited", "rtl-mode-switch");
            } else if (languages == "English") {
                sessionStorage.setItem("languages","English");
                $("#bootstrap-style").attr('href', '../build/css/bootstrap.min.css');
                $("#app-style").attr('href', '../build/css/app.min.css');
                $("html").removeAttr("dir");
                $("input").removeAttr("dir");
            }
        });

    }

    var languages = sessionStorage.getItem("languages");
    if (languages) {
        if (languages == "Arabic") {
            $("#light-mode-switch").prop("checked", true);
            $("#bootstrap-style").attr('href', '../build/css/bootstrap.min.rtl.css');
            $("#app-style").attr('href', '../build/css/app.min.rtl.css');
            $("html").attr("dir", 'rtl');
            $('input').attr('dir', 'rtl');
            sessionStorage.setItem("is_visited", "rtl-mode-switch");
        } else if (languages == "English") {
            $("html").removeAttr("dir");
            $("input").removeAttr("dir");
            $("#bootstrap-style").attr('href', '../build/css/bootstrap.min.css');
            $("#app-style").attr('href', '../build/css/app.min.css');
        }
    }


    var sidebarlight = document.body.getAttribute("data-topbar");
    function updateThemeSetting() {

       // alert("jg");
            //  sessionStorage.removeItem("languages");
            // var languages = document.getElementById('lang_name').value;
            // if (languages == "Arabic") {
            //     sessionStorage.setItem("languages","Arabic");
            //     $("html").attr("dir", 'rtl');
            //     $("#light-mode-switch").prop("checked", true);
            //     $("#bootstrap-style").attr('href', 'build/css/bootstrap.min.rtl.css');
            //     $("#app-style").attr('href', 'build/css/app.min.rtl.css');
            //     $("html").attr("dir", 'rtl');
            //     sessionStorage.setItem("is_visited", "rtl-mode-switch");
            // } else if (languages == "English") {
            //     sessionStorage.setItem("languages","English");
            //     $("html").removeAttr("dir");
            //     $("#bootstrap-style").attr('href', 'build/css/bootstrap.min.css');
            //     $("#app-style").attr('href', 'build/css/app.min.css');
            // }





        // if ($("#light-mode-switch").prop("checked") == true && id === "light-mode-switch") {
        //     // $("#dark-mode-switch").prop("checked", false);
        //     document.body.setAttribute('data-bs-theme', 'light');
        //     sessionStorage.setItem("is_visited", "light-mode-switch");
        // // } else if ($("#dark-mode-switch").prop("checked") == true && id === "dark-mode-switch") {
        // //     if ($("#rtl-mode-switch").prop("checked") == true) {
        // //         $("html").attr("dir", 'rtl');
        // //     } else {
        // //         $("html").removeAttr("dir");
        // //     }
        // //     $("#light-mode-switch").prop("checked", false);

        // //     if (sidebarlight == "dark") {
        // //         document.body.setAttribute('data-sidebar', 'light');
        // //     }
        // //     document.body.setAttribute('data-bs-theme', 'dark');
        // //     sessionStorage.setItem("is_visited", "dark-mode-switch");
        // //} else if ($("#rtl-mode-switch").prop("checked") == true && id === "rtl-mode-switch") {

        // } else


    }
    function init() {
        initMetisMenu();
        initLeftMenuCollapse();
        initActiveMenu();
        initMenuItem();
        initMenuItemScroll();
        initFullScreen();
        initRightSidebar();
        initDropdownMenu();
        initComponents();
        initPreloader()
        initSettings();
        Waves.init();
    }

    init();

})(jQuery)








const canvas = document.querySelector('canvas');
const form = document.querySelector('.signature-pad-form');
const clearButton = document.querySelector('.clear-button');


const ctx = canvas.getContext('2d');

let writingMode = false;

const handlePointerDown = (event) => {
    writingMode = true;
    ctx.beginPath();
    const [positionX, positionY] = getCursorPosition(event);
    ctx.moveTo(positionX, positionY);
}


const handlePointerUp = () => {
    writingMode = false;
}


const handlePointerMove = (event) => {
    if (!writingMode) return
    const [positionX, positionY] = getCursorPosition(event);
    ctx.lineTo(positionX, positionY);
    ctx.stroke();
}

const getCursorPosition = (event) => {
    positionX = event.clientX - event.target.getBoundingClientRect().x;
    positionY = event.clientY - event.target.getBoundingClientRect().y;
    return [positionX, positionY];
}

canvas.addEventListener('pointerdown', handlePointerDown, { passive: true });
canvas.addEventListener('pointerup', handlePointerUp, { passive: true });
canvas.addEventListener('pointermove', handlePointerMove, { passive: true });






ctx.lineWidth = 3;
ctx.lineJoin = ctx.lineCap = 'round';


form.addEventListener('submit', (event) => {

    event.preventDefault();
    const imageURL = canvas.toDataURL();
    const image = document.createElement('img');
    image.src = imageURL;
    image.height = canvas.height;
    image.width = canvas.width;
    image.style.display = 'block';


    document.getElementById("sign_url").val = imageURL;

    var sigText = document.getElementById("sign_url");
    sigText.innerHTML = imageURL;

    //console.log(imageURL);
    document.getElementById("saved").src = imageURL;

    clearPad();
})
const clearPad = () => {
    ctx.clearRect(0, 0, canvas.width, canvas.height);
}
clearButton.addEventListener('click', (event) => {
    event.preventDefault();
    clearPad();
})





