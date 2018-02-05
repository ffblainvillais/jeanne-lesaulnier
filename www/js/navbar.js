(function($){
    'use strict'

    class Navbar {

        constructor() {

            this.$buttonDisplayMenu     = $('.js-navbar__display')
            this.$navbarContainer       = $('.js-navbar__container')
            this.navbarItems            = $('.js-navbar__smooth_scroll')
            this.$navbarAnchor          = $('.js-navbar__anchor')

            this.init()
        }

        displayResponsiveNav() {

            this.$navbarContainer.toggleClass('responsive')

            let $navItems = $('.topnav-item')

            $navItems.on('click', e => {
                this.$navbarContainer.removeClass('responsive')
            })
        }

        smoothScroll($currentTarget) {
            const section   = $currentTarget.attr('href');
            const speed     = 750;

            $('html, body').animate( { scrollTop: $(section).offset().top }, speed );
            return false;
        }

        highLightNavbarItem() {

            const that = this

            $(window).scroll(function(){

                const currentScroll = $(this).scrollTop();
                let $currentSection

                that.$navbarAnchor.each(function(){

                    const divPosition = $(this).offset().top;

                    if( divPosition - 1 < currentScroll ){
                        $currentSection = $(this);
                    }

                    const id = $currentSection.attr('id');
                    $('a').removeClass('active');
                    $("[href=#"+id+"]").addClass('active');

                })

            });

        }

        init() {

            this.$buttonDisplayMenu.on('click', e => {
                this.displayResponsiveNav()
            })

            this.navbarItems.on('click', e => {
                let $currentTarget = $(e.target)
                this.smoothScroll($currentTarget)
            })

            this.highLightNavbarItem()
        }
    }

    new Navbar()

})(jQuery);
