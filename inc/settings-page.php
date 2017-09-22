<?php
	/*
	 * Content for the settings page
	 */
	function acfcs_settings() {

		if ( ! current_user_can( 'manage_options' ) ) {
			wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
		}

		acf_plugin_city_selector::acfcs_show_admin_notices();

		if ( isset( $_POST["db_actions_nonce"] ) ) {
			if ( ! wp_verify_nonce( $_POST["db_actions_nonce"], 'db-actions-nonce' ) ) {
				return;
			} else {
				if ( isset( $_POST['import_nl'] ) && 1 == $_POST["import_nl"] ) {
					echo '<div class="updated"><p><strong>' . __( 'You successfully imported all cities in The Netherlands.', 'acf-city-selector' ) . '</strong></p></div>';
				}
				if ( isset( $_POST['import_be'] ) && 1 == $_POST["import_be"] ) {
					echo '<div class="updated"><p><strong>' . __( 'You successfully imported all cities in Belgium.', 'acf-city-selector' ) . '</strong></p></div>';
				}
				if ( isset( $_POST['import_lux'] ) && 1 == $_POST["import_lux"] ) {
					echo '<div class="updated"><p><strong>' . __( 'You successfully imported all cities in Luxembourg.', 'acf-city-selector' ) . '</strong></p></div>';
				}
			}
		}
		?>

		<div class="wrap">
            <div id="icon-options-general" class="icon32"><br /></div>

            <h1><?php esc_html_e( 'ACF City Selector Settings', 'acf-city-selector' ); ?></h1>

			<?php echo acf_plugin_city_selector::acfcs_admin_menu(); ?>

            <p><?php sprintf( esc_html__( 'On this page you can find some helpful info about the %s plugin as well as some settings.', 'acf-city-selector' ), 'ACF City Selector' ); ?></p>

            <!-- left part -->
            <div class="admin_left">

                <form method="post" action="">
                    <input name="preserve_settings_nonce" value="<?php echo wp_create_nonce( 'preserve-settings-nonce' ); ?>" type="hidden" />

                    <h2><?php esc_html_e( 'Save data', 'acf-city-selector' ); ?></h2>
                    <p><?php esc_html_e( "When the plugin is deleted, all settings and cities are deleted as well. Select this option to save all your cities/settings.", 'acf-city-selector' ); ?></p>

                    <?php $checked = get_option( 'acfcs_preserve_settings' ) ? ' checked="checked"' : false; ?>
                    <p>
                        <span class="acfcs_input">
                            <label for="preserve_settings" class="screen-reader-text"></label>
                            <input type="checkbox" name="preserve_settings" id="preserve_settings" value="1" <?php echo $checked; ?>/> <?php esc_html_e( 'Preserve settings on plugin deletion', 'acf-city-selector' ); ?>
                        </span>
                    </p>

                    <input name="" type="submit" class="button button-primary" value="<?php esc_html_e( 'Save settings', 'acf-city-selector' ); ?>" />
                </form>

                <br /><hr />

                <form method="post" action="">
                    <input name="truncate_table_nonce" value="<?php echo wp_create_nonce( 'truncate-table-nonce' ); ?>" type="hidden" />

                    <h2><?php esc_html_e( 'Clear the database', 'acf-city-selector' ); ?></h2>
                    <p><?php esc_html_e( "By selecting this option, you will remove all cities, which are present in the database. This is handy if you don't need the preset cities or you want a fresh start.", 'acf-city-selector' ); ?></p>

                    <p>
                        <span class="acfcs_input">
                            <label for="delete_cities" class="screen-reader-text"></label>
                            <input type="checkbox" name="delete_cities" id="delete_cities" value="1" /> <?php esc_html_e( 'Delete all cities from the database', 'acf-city-selector' ); ?>
                        </span>
                    </p>

                    <input name="" type="submit" class="button button-primary"  onclick="return confirm( 'Are you sure you want to delete all cities ?' )" value="<?php esc_html_e( 'Nuke \'em', 'acf-city-selector' ); ?>" />
                    <?php //submit_button(); ?>
                </form>

            </div><!-- end .admin_left -->

			<?php include( 'admin-right.php' ); ?>

        </div><!-- end .wrap -->
		<?php
	}

