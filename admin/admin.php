<?php
function admin_options_page_html() {
    // check user capabilities
    if ( ! current_user_can( 'manage_options' ) ) {
        return;
    }
    ?>
    <div class="wrap">
        <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
        <form action="options.php" method="post">
            <?php
            // output security fields for the registered setting "clp_options"
            settings_fields( 'clp_options' );
            // output setting sections and their fields
            // (sections are registered for "clp", each field is registered to a specific section)
            do_settings_sections( 'clp' );
            // output save settings button
            submit_button( __( 'Save Settings', 'textdomain' ) );
            ?>
        </form>
    </div>
    <?php
}

// settings submenu
function admin_options_page()
{
    add_options_page(
        'Custom Admin Login',
        'Custom Login Page',
        'manage_options',
        'clp',
        'admin_options_page_html',
    );
}
add_action('admin_menu', 'admin_options_page');

// register fields
function clp_register_settings() {
    register_setting( 'clp_options', 'clp_options' );
    add_settings_section( 'clp_style', 'Customize Style', 'clp_plugin_section_text', 'clp' );

    add_settings_field( 'clp_plugin_setting_heading', 'Heading', 'clp_plugin_setting_heading', 'clp', 'clp_style' );
    add_settings_field( 'clp_plugin_setting_message', 'Message', 'clp_plugin_setting_message', 'clp', 'clp_style' );
    add_settings_field( 'clp_plugin_setting_logo', 'Logo', 'clp_plugin_setting_logo', 'clp', 'clp_style' );
    add_settings_field( 'clp_plugin_setting_background_color', 'Background Color', 'clp_plugin_setting_background_color', 'clp', 'clp_style' );
    add_settings_field( 'clp_plugin_setting_box_background', 'Box Background', 'clp_plugin_setting_box_background', 'clp', 'clp_style' );
    add_settings_field( 'clp_plugin_setting_input_border_color', 'Input Border Color', 'clp_plugin_setting_input_border_color', 'clp', 'clp_style' );
    add_settings_field( 'clp_plugin_setting_login_button_color', 'Login Button Color', 'clp_plugin_setting_login_button_color', 'clp', 'clp_style' );
    add_settings_field( 'clp_plugin_setting_box_text_color', 'Box Text Color', 'clp_plugin_setting_box_text_color', 'clp', 'clp_style' );
    add_settings_field( 'clp_plugin_setting_text_color', 'Text Color', 'clp_plugin_setting_text_color', 'clp', 'clp_style' );
}
add_action( 'admin_init', 'clp_register_settings' );
/*
// CLP validation
function clp_options_validate( $input ) {
    $newinput['Heading'] = trim( $input['Heading'] );
    if ( ! preg_match( '/^[a-z0-9]{32}$/i', $newinput['Heading'] ) ) {
        $newinput['Heading'] = '';
    }

    return $newinput;
}*/
// hint text
function clp_plugin_section_text() {
    echo '<p>Here you can set all the styling options for admin login page</p>';
}

function clp_plugin_setting_heading() {
    $options = get_option( 'clp_options' );
    if( is_array($options) ){
    	echo "<textarea id='clp_plugin_setting_heading' name='clp_options[Heading]' ' rows='4' cols='50'>". esc_attr( $options['Heading'] )."</textarea>";
    }
    else{
    	echo "<textarea id='clp_plugin_setting_heading' name='clp_options[Heading]' rows='4' cols='50'></textarea>";
    }
}
function clp_plugin_setting_message() {
    $options = get_option( 'clp_options' );
    if( is_array($options) ){
    	echo "<textarea id='clp_plugin_setting_message' name='clp_options[message]' ' rows='4' cols='50'>". esc_attr( $options['message'] )."</textarea>";
    }
    else{
    	echo "<textarea id='clp_plugin_setting_message' name='clp_options[message]' rows='4' cols='50'></textarea>";
    }
}
function clp_plugin_setting_logo() {
    $options = get_option( 'clp_options' );
    if( is_array($options) ){
    	echo "<input id='clp_plugin_setting_logo' name='clp_options[logo]' type='text' value='" . esc_attr( $options['logo'] ) . "' />";
    	echo '<input id="upload_image_button" type="button" class="button-primary" value="Choose Image" />';
    }
    else{
    	echo "<input id='clp_plugin_setting_logo' name='clp_options[logo]' type='file' accept='image/*' />";
    }
}
function clp_plugin_setting_background_color() {
    $options = get_option( 'clp_options' );
    if( is_array($options) ){
    	echo "<input id='clp_plugin_setting_background_color' name='clp_options[background_color]' type='color' value='" . esc_attr( $options['background_color'] ) . "' />";
    }
    else{
    	echo "<input id='clp_plugin_setting_background_color' name='clp_options[background_color]' type='color' value='#f0f0f1' />";
    }
}
function clp_plugin_setting_box_background() {
    $options = get_option( 'clp_options' );
    if( is_array($options) ){
    	echo "<input id='clp_plugin_setting_box_background' name='clp_options[box_background]' type='color' value='" . esc_attr( $options['box_background'] ) . "' />";
    }
    else{
    	echo "<input id='clp_plugin_setting_box_background' name='clp_options[box_background]' type='color' value='#FFFFFF' />";
    }
}
function clp_plugin_setting_input_border_color() {
    $options = get_option( 'clp_options' );
    if( is_array($options) ){
    	echo "<input id='clp_plugin_setting_input_border_color' name='clp_options[border_color]' type='color' value='" . esc_attr( $options['border_color'] ) . "' />";
    }
    else{
    	echo "<input id='clp_plugin_setting_input_border_color' name='clp_options[border_color]' type='color' value='#135e96' />";
    }
}
function clp_plugin_setting_login_button_color() {
    $options = get_option( 'clp_options' );
    if( is_array($options) ){
    	echo "<input id='clp_plugin_setting_login_button_color' name='clp_options[button_color]' type='color' value='" . esc_attr( $options['button_color'] ) . "' />";
    }
    else{
    	echo "<input id='clp_plugin_setting_login_button_color' name='clp_options[button_color]' type='color' value='#FFFFFF' />";
    }
}
function clp_plugin_setting_box_text_color() {
    $options = get_option( 'clp_options' );
    if( is_array($options) ){
    	echo "<input id='clp_plugin_setting_box_text_color' name='clp_options[box_text_color]' type='color' value='" . esc_attr( $options['box_text_color'] ) . "' />";
    }
    else{
    	echo "<input id='clp_plugin_setting_box_text_color' name='clp_options[box_text_color]' type='color' value='#3c434a' />";
    }
}
function clp_plugin_setting_text_color() {
    $options = get_option( 'clp_options' );
    if( is_array($options) ){
    	echo "<input id='clp_plugin_setting_text_color' name='clp_options[text_color]' type='color' value='" . esc_attr( $options['text_color'] ) . "' />";
    }
    else{
    	echo "<input id='clp_plugin_setting_text_color' name='clp_options[text_color]' type='color' value='#50575e' />";
    }
}
// media upload
function media_uploader_enqueue() {
	wp_enqueue_media();
	wp_register_script('media_uploader', plugins_url('media_uploader.js' , __FILE__ ), array('jquery'));
	wp_enqueue_script('media_uploader');
}
add_action('admin_enqueue_scripts', 'media_uploader_enqueue');
