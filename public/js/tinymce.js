(function($){
    'use strict'

    class Tinymce {

        constructor() {

            this.targetClass      = '.js-tinymce__target'
            this.$target          = $(this.targetClass)
            this.saveUrl          = this.$target.data('url')

            this.init()
        }

        init() {

            tinymce.init({
                selector: this.targetClass,
                height: 250,
                menubar: false,
                paste_data_images: true,
                plugins: [
                    'advlist autolink lists link image charmap print preview anchor textcolor',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime media table contextmenu paste code help wordcount'
                ],
                toolbar: 'image | undo redo |  formatselect | bold italic  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent',
                content_css: [
                    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
                    '//www.tinymce.com/css/codepen.min.css']
            });

        }

        saveDatas() {

            //@todo a voir ?
            const contenu = tinymce.get(this.$target).getContent();

            $.post(this.saveUrl, {contenu: contenu}).done( res => {
                //@todo a finir
                console.log('donnes postés')
            });
        }
    }

    new Tinymce()

})(jQuery);
