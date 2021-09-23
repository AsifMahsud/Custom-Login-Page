<?php 
$options = get_option( 'clp_options' );
if( is_array($options) ){
?>
<style type="text/css">
body{
	background: <?php echo esc_attr( $options['background_color'] ); ?> !important;
}
.login h1 a{
	background-image: url(<?php echo esc_attr( $options['logo'] ); ?>) !important; 
	background-size: 200px !important;
	width: 200px !important;
}
h2#login_heading, span.login_message, p#nav a, p#backtoblog a{
	color: <?php echo esc_attr( $options['text_color'] ); ?> !important;
}
form#loginform{
	background: <?php echo esc_attr( $options['box_background'] ); ?> !important;
}
.login label{
	color: <?php echo esc_attr( $options['box_text_color'] ); ?> !important;
}
input[type=color], input[type=date], input[type=datetime-local], input[type=datetime], input[type=email], input[type=month], input[type=number], input[type=password], input[type=search], input[type=tel], input[type=text], input[type=time], input[type=url], input[type=week], select, textarea, .wp-core-ui .button-primary:hover, .wp-core-ui .button-primary{
	border-color: <?php echo esc_attr( $options['border_color'] ); ?> !important;
}
.wp-core-ui .button-primary:hover, .wp-core-ui .button-primary{
	background: <?php echo esc_attr( $options['border_color'] ); ?> !important;
}
.login .button.wp-hide-pw .dashicons{
	color: <?php echo esc_attr( $options['border_color'] ); ?> !important;
}
.wp-core-ui .button.button-large{
	color: <?php echo esc_attr( $options['button_color'] ); ?> !important;
}
</style>
<?php 
function login_message_callback($message){
	if(empty($message)){
		return "<center><h2 id='login_heading'>". esc_attr( get_option( 'clp_options' )['Heading'] ) ."</h2> </br> <b><span class='login_message'>". esc_attr( get_option( 'clp_options' )['message'] ) ." </span></b></center>";
	}
	else{
		return $message;
	}
}
add_filter('login_message', 'login_message_callback');
} ?>