<?php ob_start(); ?>
    <script src="https://cdn.tiny.cloud/1/yx2jmbz8wag5e1tuliqfes9eui8qrcnckrm3u2zlukd1w5xs/tinymce/5/tinymce.min.js"></script>
    <script type="text/javascript">


        tinymce.init({
            selector: 'textarea#TinyMCE',
            height: 500,
            menubar: false,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor textcolor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste code help wordcount'
            ],
            toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | image | help',
            content_css: "style/tinymce.css",//[
            // '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
            // '//www.tiny.cloud/css/codepen.min.css'
            // ],
            force_br_newlines: true,
            force_p_newlines: false,
            forced_root_block: '',
            images_upload_url: "imagesUpload.php",


        });


    </script>

<?php
$script = ob_get_clean(); ?>