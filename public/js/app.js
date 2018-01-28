(function($){
    'use strict'

    class App {

        constructor() {

            this.$loginLink                 = $('#connection-link')
            this.$creationAdd               = $('.js-creation__add')
            this.$responsiveDisplayButton   = $('.js-menu__display')
            this.$scrollTarget              = $('.smooth-scroll')
            this.$navBar                    = $('#myTopnav')

            this.init()
        }

        init() {

            /*this.$scrollTarget.on('click', e => {
                console.log(e)
                this.smoothScroll(e.currentTarget)
            });*/

            /*this.$loginLink.on('click', e => {
                e.preventDefault()
             this.openLoginForm()
            })*/

            /*this.$creationAdd.on('click', e => {
                e.preventDefault()
                this.openAddCreationForm()
            })*/

            /*console.log(this.$responsiveDisplayButton)
            this.$responsiveDisplayButton.on('click', e => {
                this.responsiveMenu()
            })*/

        }

        openLoginForm() {

            const loginUrl = '/user/login'

            $.magnificPopup.open({
                items : {
                    src: loginUrl,
                },
                //closeOnContentClick: false,
                //closeOnBgClick: false,
                type      : 'ajax',
                callbacks : {
                    afterClose() {
                        location.reload()
                    },
                },
            })
        }

        openAddCreationForm() {

            $.magnificPopup.open({
                items : {
                    src: this.$creationAdd.data('url'),
                },
                closeOnContentClick: false,
                closeOnBgClick: false,
                type      : 'ajax',
                callbacks : {
                    afterClose() {
                        location.reload()
                    },
                },
            })
        }

        responsiveMenu() {
            if (this.$navBar.className === "topnav") {
                console.log('pas responsive')
                this.$navBar.className += " responsive";
            } else {
                console.log('reposnsive')
                this.$navBar.className = "topnav";
            }
        }

        smoothScroll(target) {

            console.log(target)
            let page    = target.attr('href')
            const speed = 750

            $('html, body').animate( { scrollTop: $(page).offset().top }, speed );
            return false;
        }

    }

    new App()

})(jQuery);
