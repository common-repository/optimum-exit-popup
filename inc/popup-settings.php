<?php
/* POP UP SETTINGS PAGE */

/* POPUP SETTINGS */
add_action( 'admin_menu', 'optimum_popup_add_admin_menu' );
add_action( 'admin_init', 'optimum_popup_settings_init' );


function optimum_popup_add_admin_menu(  ) { 
	add_menu_page( 'Optimum Popup', 'Optimum Popup', 'manage_options', 'optimum_popup', 'optimum_popup_options_page' );
}


function optimum_popup_settings_init(  ) { 
	register_setting( 'oc_pluginPage', 'optimum_popup_settings' );
	add_settings_section(
		'optimum_popup_oc_pluginPage_section', 
		__( 'Popup Settings', 'optimum_popup' ), 
		'optimum_popup_settings_section_callback', 
		'oc_pluginPage'
	);

	add_settings_field( 
		'optimum_popup_status', 
		__( 'Popup Status ', 'optimum_popup' ), 
		'optimum_popup_status_render', 
		'oc_pluginPage', 
		'optimum_popup_oc_pluginPage_section' 
	);

	add_settings_field( 
		'optimum_popup_main_heading', 
		__( 'Popup Main Heading', 'optimum_popup' ), 
		'optimum_popup_main_heading_render', 
		'oc_pluginPage', 
		'optimum_popup_oc_pluginPage_section' 
	);
	
	add_settings_field( 
		'optimum_popup_sub_heading', 
		__( 'Popup Sub Heading', 'optimum_popup' ), 
		'optimum_popup_sub_heading_render', 
		'oc_pluginPage', 
		'optimum_popup_oc_pluginPage_section' 
	);
	
	add_settings_field( 
		'optimum_popup_mail_form', 
		__( 'Newsletter Subscription Form Code', 'optimum_popup' ), 
		'optimum_popup_mail_form_render', 
		'oc_pluginPage', 
		'optimum_popup_oc_pluginPage_section' 
	);
	
	add_settings_field( 
		'optimum_popup_policy', 
		__( 'Text below Newsletter form code.', 'optimum_popup' ), 
		'optimum_popup_policy_render', 
		'oc_pluginPage', 
		'optimum_popup_oc_pluginPage_section' 
	);


}


function optimum_popup_status_render(  ) { 
	$options = array();
	$options = get_option( 'optimum_popup_settings' );
	if (array_key_exists("optimum_popup_status",$options))
    {
    } else { 
        $options['optimum_popup_status'] = false;
    }
	?>
	<input type='checkbox' name='optimum_popup_settings[optimum_popup_status]' <?php checked( $options['optimum_popup_status'], 1 ); ?> value='true' <?php echo ( $options['optimum_popup_status'] == true )? 'checked': ''  ?>>
	<span><?php echo  $options['optimum_popup_status'] == true  ? 'Uncheck to Disable': 'Check this to enable' ?>  </span>
	<?php
}

function optimum_popup_main_heading_render( ) { 
	$options = array();
	$options = get_option( 'optimum_popup_settings' );
	if (array_key_exists("optimum_popup_main_heading",$options))
    {
    } else { 
        $options['optimum_popup_main_heading'] = '';
    }
	?>
	<input type='text' name='optimum_popup_settings[optimum_popup_main_heading]' value='<?php echo $options['optimum_popup_main_heading']; ?>'>
	<?php

}

function optimum_popup_sub_heading_render( ) { 
	$options = array();
	$options = get_option( 'optimum_popup_settings' );
    if (!array_key_exists("optimum_popup_sub_heading",$options) )
    {
		$options['optimum_popup_sub_heading'] = '';
    } 
	// Signup to our newsletter <br/> and get daily news in your inbox
	?>
	<input type='text' name='optimum_popup_settings[optimum_popup_sub_heading]' value='<?php echo $options['optimum_popup_sub_heading']; ?>'>
	<?php
}

function optimum_popup_mail_form_render(  ) {
	$options = array(); 
	$options = get_option( 'optimum_popup_settings' );
    if (array_key_exists("optimum_popup_mail_form",$options))
    {
       
    } else { 
        $options['optimum_popup_mail_form'] = '';
    }
	?>	
	<textarea  style="width: 700px; height: 300px;"  name='optimum_popup_settings[optimum_popup_mail_form]'><?php echo $options['optimum_popup_mail_form']; ?></textarea>
	
	<p> Please add mailchimp or any other Newsletter subscription form code in above textarea. You can also use HTML or Contact form 7 shortcode in this field. </p>
	<?php
}

function optimum_popup_policy_render( ) { 
	$a =$options = get_option( 'optimum_popup_settings' );
    if (array_key_exists("optimum_popup_main_heading",$a))
    {
    } else { 
        $options['optimum_popup_policy'] = '';
    }
	?>
	<input type='text' name='optimum_popup_settings[optimum_popup_policy]' value='<?php echo $options['optimum_popup_policy']; ?>'>
	<p> This text will be visible below Subscription form </p>
	<?php
}

function optimum_popup_settings_section_callback(  ) { 
	echo __( 'Please fill below fields for popup. Leave the fields blank, that you donot want to show on Popup.', 'optimum_popup' );
}


function optimum_popup_options_page(  ) { 

	?>
	<style type="text/css">
		#wpcontent{
			background-color: #fff;

		}
		.ocep_admin_wrap input[type="text"], .ocep_admin_wrap textarea{
			border: 1px solid #e8e8e8;
			border-radius: 0px;
			min-width: 300px;
		}
		.ocep_admin_wrap input[type="submit"]{
			border-radius: 0px;
		}
		.ocep_admin_wrap input[type="submit"]:hover{
			background:#22b14e;
			border-color:#22b14e;
		}
	</style>
	<div style="" class="ocep_admin_wrap">
		<form action='options.php' method='post'>
			<h2>Optimum Exit Popup</h2>
			<?php
			settings_fields( 'oc_pluginPage' );
			do_settings_sections( 'oc_pluginPage' );
			submit_button();
			?>
			
			<div style="background: #007bff; color: #FFF; padding: 10px; border-radius: 0; text-align: center; width: calc(100% - 40px) ;font-size: 16px;"> Plugin developed by <a style="color:#fff" href="http://www.optimumcreative"> Optimum Creative </a>. </div>

		</form>
	</div>
	<?php

}