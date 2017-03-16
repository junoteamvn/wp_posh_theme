jQuery(document).ready(function($) {
    /*
    * Upload Image Wordpress
    */
    var custom_uploader;
    $('body').on('click','.admin_img_upload',function(e) {
        e.preventDefault();
        var img = $(this).parent().find('img');
        var input = $(this).parent().find('input')
        var button = $(this).attr('id');

        // Customize Frame
        custom_uploader = wp.media.frames.file_frame = wp.media({
            title: 'Choose Image',
            button: {
                text: 'Choose'
            },
            multiple: false
        });
        // When Image Select
        custom_uploader.on('select', function() {
            var attachment = custom_uploader.state().get('selection').first().toJSON();
            var url = attachment.url;
            input.val(url); 
            input.trigger('change');              
            img.attr("src", url);         
            img.removeClass('hidden');
        });
        //Open the uploader dialog
        custom_uploader.open();
    });   
});