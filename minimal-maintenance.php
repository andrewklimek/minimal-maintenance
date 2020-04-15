<?php
/*
Plugin Name: Minimal Maintenance
Plugin URI:  https://github.com/andrewklimek/minimal-maintenance
Description: Shows a basic maintenance page with login to logged-out visitors.
Version:     1.1.0
Author:      Andrew J Klimek
Author URI:  https://github.com/andrewklimek
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Minimal Maintenance is free software: you can redistribute it and/or modify 
it under the terms of the GNU General Public License as published by the Free 
Software Foundation, either version 2 of the License, or any later version.

Minimal Maintenance is distributed in the hope that it will be useful, but WITHOUT 
ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A 
PARTICULAR PURPOSE. See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with 
Minimal Maintenance. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/

add_action( 'template_redirect', function(){
	if ( current_user_can( 'manage_options' ) ) return;
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width">
		<title><?php echo get_option('blogname', 'Under Construction'); ?></title>
		<style>
			body{text-align:center;background:#fffcf5;font-family:monospace;}
			svg{fill: #F66;}
			form#loginform{width:320px;margin:auto;}
			input[type=text],input[type=password]{font-size:24px;text-align:center;background:none;border:none;border-bottom:1px solid #B9B1A0;width:260px;}
			input[type=text]:focus,input[type=password]:focus,input[type=submit]:focus{outline:none;border-color:#ff6666;}
			input[type=submit]{background:none;border:1px solid #B9B1A0;padding:3ex;cursor:pointer;color:#7A6F58;margin-top:3ex;width:260px;}
			input[type=submit]:hover{border-color:#ff6666;}
		</style>
	</head>
	<body>
		<div style="margin:10%;">
		<?php
		print file_get_contents( __DIR__ .'/images/under-construction.svg' );
		// print file_get_contents( __DIR__ .'/images/down-for-maintenance.svg' );
		?>
		<p style="letter-spacing:1ex;font-family:sans-serif;">CHECK BACK SOON!</p>
	</div>
		<?php wp_login_form( array( 'label_username' => 'Username', 'value_remember' => true ) ); ?>
	</body>
	</html>
	<?php
	exit();
});
