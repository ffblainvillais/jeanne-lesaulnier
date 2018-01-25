(function($){
    'use strict'

    class App {

        constructor() {

            this.$responsiveDisplayButton = $('.js-menu__display')
            this.$navBar = $('#myTopnav')

            this.init()
        }

        init() {

            /*console.log(this.$responsiveDisplayButton)
            this.$responsiveDisplayButton.on('click', e => {
                this.responsiveMenu()
            })*/

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
