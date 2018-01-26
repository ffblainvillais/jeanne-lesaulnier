(function($){
    'use strict'

    class App {

        constructor() {

            this.$loginLink                 = $('#connection-link')
            this.$responsiveDisplayButton   = $('.js-menu__display')
            this.$navBar                    = $('#myTopnav')

            this.init()
        }

        init() {

            this.$loginLink.on('click', e => {

                e.preventDefault()

                console.log('open login form')
                this.openLoginForm()
            })
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

        responsiveMenu() {
            if (this.$navBar.className === "topnav") {
                console.log('pas responsive')
                this.$navBar.className += " responsive";
            } else {
                console.log('reposnsive')
                this.$navBar.className = "topnav";
            }
        }
    }

    new App()

})(jQuery);
