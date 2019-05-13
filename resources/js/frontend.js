/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap')
require('./countdown.jquery')
require('../../node_modules/jquery-parallax.js/parallax.min.js')
require("../../node_modules/ekko-lightbox/dist/ekko-lightbox.min.js")
class Website {
    constructor() {
        this.navbar = document.getElementById('main-menu')
        this.setupNavbar()
        this.setupNavigation()
        this.setupLightbox()
        this.setupCountdown()
        this.setupParallax()
        this.setupWrappers()
        this.setupModal()
    }
    setupLightbox() {
        $(document).on('click', '[data-toggle="lightbox"]', function (event) {
            event.preventDefault()
            $(this).ekkoLightbox()
        })
    }
    setupCountdown() {
        let cd = $('.countdown')
        cd.countdown({
            year: cd.data('year'),     // YYYY Format
            month: cd.data('month'),   // 1-12
            day: cd.data('day'),       // 1-31
            hour: cd.data('hour'),     // 24 hour format 0-23
            minute: cd.data('minute'), // 0-59
            second: cd.data('second'), // 0-59
            timezone: -6, // http://en.wikipedia.org/wiki/List_of_tz_database_time_zones
            labels: true, // Show/Hide label elements,
            onFinish: function () {
                cd.text("Going on now!").css({ justifyContent: 'center', padding: 50 })
            }
        })
    }
    setupModal() {
        $('#notification').modal('show');
    }
    setupWrappers() {
        let gallery_items = $(".gallery .col")
        for (let i = 0; i < gallery_items.length; i += 4) {
            gallery_items.slice(i, i + 4).wrapAll("<div class='row'></div>")
        }
        let menu_items = $("#menu-items .col-md-6")
        for (let i = 0; i < menu_items.length; i += 2) {
            menu_items.slice(i, i + 2).wrapAll("<div class='row'></div>")
        }
    }
    setupParallax() {
        $('.parallax').parallax()
    }
    onScroll(y, dist) {
        if (y > dist) {
            this.navbar.classList.remove("bg-transparent")
            this.navbar.classList.add("bg-opaque")
        } else {
            this.navbar.classList.add("bg-transparent")
            this.navbar.classList.remove("bg-opaque")
        }
    }
    setupNavbar() {
        let y = window.pageYOffset
        let self = this;
        self.onScroll(y, 20)
        $(document).on('scroll', function () {
            self.onScroll(window.pageYOffset, 100)
        })
    }
    setupNavigation() {
        let links = document.querySelectorAll('nav a')
        for (let i = 0; i < links.length; i++) {
            let link = links[i]
            if (link.hash) {
                let target = document.querySelector(link.hash)
                if (target) {
                    link.addEventListener('click', (e) => {
                        e.preventDefault()
                        window.scrollTo(0, target.offsetTop - this.navbar.clientHeight)
                    })
                }
            }
        }
    }
}
new Website()
