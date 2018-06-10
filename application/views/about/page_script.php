<script src="<?php echo base_url('assets/');?>plugins/bower_components/summernote/dist/summernote.min.js">
</script>    
<script src="<?php echo base_url('assets/');?>plugins/bower_components/summernote/lang/summernote-tr-TR.js">

</script>

 <script>
    jQuery(document).ready(function() {

        $('.summernote').summernote({
            lang: 'tr-TR',
            height: 150, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            focus: false // set focus to editable area after initializing summernote
        });

        $('.inline-editor').summernote({
            airMode: true
        });

    });

    window.edit = function() {
            $(".click2edit").summernote()
        },
        window.save = function() {
            $(".click2edit").summernote('destroy');
        }
    </script>