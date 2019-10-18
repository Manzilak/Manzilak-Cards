<?php

    ini_set('display_errors', 1);
    if( !defined( 'ABSPATH' ) ) {
        exit;
    }


    // create custom plugin settings menu
    add_action( 'admin_menu', 'admin_menu' );

    function admin_menu() {

        //create new top-level menu
        add_options_page(
            'Manzilak Cards Options',
            'Manzilak Cards',
            'manage_options',
            'manzilak_cards_options',
            'settings_page'
        );

        //call register settings function
        add_action( 'admin_init', 'manzilak_cards_plugin_settings' );
    }


    function manzilak_cards_plugin_settings() {
        //register our settings
        register_setting( 'manzilak-cards-settings-group', 'manzilak_cards_facebook_app_id' );
        register_setting( 'manzilak-cards-settings-group', 'manzilak_cards_twitter_account' );
    }

    function settings_page() {
        
?>
    <div class="wrap">
    <h1>Manzilak Cards</h1>

    <form method="post" action="options.php">
        <?php settings_fields( 'manzilak-cards-settings-group' ); ?>
        <?php do_settings_sections( 'manzilak-cards-settings-group' ); ?>
        <table class="form-table">
            <tr valign="top">
            <th scope="row">Facebook App ID</th>
            <td><input type="text" name="manzilak_cards_facebook_app_id" value="<?php echo esc_attr( get_option('manzilak_cards_facebook_app_id') ); ?>" /></td>
            </tr>
            
            <tr valign="top">
            <th scope="row">Twitter Account</th>
            <td><input type="text" name="manzilak_cards_twitter_account" value="<?php echo esc_attr( get_option('manzilak_cards_twitter_account') ); ?>" /></td>
            </tr>
            
        </table>
        
        <?php submit_button(); ?>

    </form>
    </div>
<?php } ?>
