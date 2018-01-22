(function($){
    'use strict'

    class Tinymce {

        constructor() {

            this.$target          = $('.js-tinymce__target')

            this.init()
        }

        init() {

            tinymce.init({
                selector: '.js-tinymce__target',
                height: 300,
                menubar: false,
                paste_data_images: true,
                plugins: [
                    'advlist autolink lists link image charmap print preview anchor textcolor',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime media ta    ble contextmenu paste code help wordcount'
                ],
                toolbar: 'image | undo redo |  formatselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat',
                content_css: [
                    '//www.tinymce.com/css/codepen.min.css']
            });

        }
    }

    new Tinymce()

})(jQuery);
