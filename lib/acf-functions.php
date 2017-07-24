<?php 

// displays an ACF file field, including file size, file type and file extension
if ( ! function_exists( 'dmc_display_file_upload' ) ) {
    function dmc_display_file_upload( $acffield, $subfield ) {

    if (!empty($subfield)) {
        $file = get_sub_field( $acffield );
    } else {
        $file = get_field( $acffield );
    }

    if( $file ) : 
        // vars
        $attachment_id = $file['id'];
        $url = $file['url'];
        $title = 'brochure';

        $filesize = filesize( get_attached_file( $attachment_id ) );

        $filetype = wp_check_filetype( $url );
        $fileext = $filetype['ext'];

        $filesize = size_format( $filesize ); ?>
       
        <p class="text-center">
            <a class="link-button-primary" href="<?php echo $url; ?>" title="<?php echo $title; ?>" class="button medium ghost">Download <?php echo $title; ?> <span class="filemeta" style="text-transform:uppercase;"><?php echo ' (' . $filesize . ' ' . $fileext . ')'; ?></span>
            </a>
        </p>
    <?php endif; 

    }
}