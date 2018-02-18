(function($){
    'use strict'

    class Tinymce {

        constructor() {

            this.targetClass      = '.js-tinymce__target'
            this.$target          = $(this.targetClass)
            this.saveUrl          = this.$target.data('url')

            this.init()
        }

        renderTinymce($target) {

            const that  = this
            const id    = $target.attr('id')

            tinymce.init({
                selector: '#' + id,
                height: 250,
                width: 600,
                menubar: false,
                paste_data_images: true,
                auto_focus : id,
                plugins: [
                    'advlist autolink lists link image charmap print preview anchor textcolor',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime media table contextmenu paste code help wordcount'
                ],
                toolbar: 'image | undo redo |  formatselect | bold italic  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent',
                content_css: [
                    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
                    '//www.tinymce.com/css/codepen.min.css'],
                setup: function (editor) {
                    editor.on("focusout", function(){

                        let content = tinymce.get(id).getContent();

                        that.saveDatas(content, $target.data('url'))
                        tinymce.get(id).remove();

                    });
                }
            });
        }

        saveDatas(content, url) {

            $.post(url, {content}).done( res => {
                console.log('donnes postés a' + url)
            });
        }

        init() {

            this.$target.on('click', e => {
                this.renderTinymce($(e.currentTarget))
            })



        }
    }

    new Tinymce()

})(jQuery);
