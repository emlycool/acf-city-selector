<?php
    if ( ! function_exists( 'acfcs_donate_meta_box' ) ) {
        /**
         * Add donation box in sidebar of posts
         */
        function acfcs_donate_meta_box() {
            if ( apply_filters( 'acfcs_remove_donate_nag', false ) ) {
                return;
            }

            $id       = 'acfcs-donate';
            $title    = sprintf( esc_html__( '%s says "Thank you"', 'acf-city-selector' ), 'Beee' );
            $callback = 'acfcs_show_donate_meta_box';
            $screens  = array();
            $context  = 'side';
            $priority = 'low';
            add_meta_box( $id, $title, $callback, $screens, $context, $priority );

        } // end function donate_meta_box
        add_action( 'add_meta_boxes', 'acfcs_donate_meta_box' );

        function acfcs_show_donate_meta_box() {
            echo '<p style="margin-bottom: 0;">' . sprintf( __( 'Thank you for installing the \'City Selector\' plugin. I hope you enjoy it. Please <a href="%s" rel="noopener" target="_blank">consider a donation</a> if you do, so I can continue to improve it even more.', 'acf-city-selector' ),  'https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=24H4ULSQAT9ZL' ) . '</p>';
        }
    }
