<?php
/*
POPUP HTML
*/ 
function ocep_CreatePopup() {
    $options = get_option( 'optimum_popup_settings' );
    //echo '<pre>';
    //print_r($options);
    if (array_key_exists("optimum_popup_status",$options))
    {
    } else { 
        $options['optimum_popup_status'] = false;
    }
    if($options['optimum_popup_status'] == true){
        $main_heading = $options['optimum_popup_main_heading'];
        $sub_heading = $options['optimum_popup_sub_heading'];
        $sub_form = $options['optimum_popup_mail_form'];
        $policy_text = $options['optimum_popup_policy'];
    $html='';
    $html.='<div id="oc-nl-exit-popup" class="oc-nl-popup-main-wrapper">';
	$html.='<div class="oc-nl-popup-template oc-nl-email-popup oc-nl-email-2">';
	$html.='<div class="oc-nl-popup-close" id="oc-nl-popup-close" tag="closeButton">';

	$html.='</div>';
		$html.='<div class="oc-nl-popup-wrapper" id="">';
			$html.='<div class="oc-nl-popup-content" id="oc-nl-email-form">';
            if($main_heading!=" " && $main_heading!=null){
                $html.='<div class="oc-nl-email-popup-heading" tag="heading">'.$main_heading.'</div>';
            }
            if($sub_heading!='' && $sub_heading!=null){
                $html.='<div class="oc-nl-email-popup-subheading" tag="sub-heading" style="">';
                $html.='<h3>'.$sub_heading.'</h3>';
                $html.='</div>';
            }
            if($sub_form!=''||$sub_form!=null){
                $html.='<div class="oc-nl-email-form-holder">';
                    $html.='<div class="subscribe_form_fields">'.$sub_form.'</div>
                    <p class="email_sub_policy"> '.$policy_text.' </p>';
                $html.='</div>';
            }

        		$html.='</div>  ';
        	$html.='</div>';
        $html.='</div>';
        $html.='</div>';
        $html.='<script type="text/javascript">
        var mouseX = 0;
        var mouseY = 0;
        var popupCounter = 0;
        document.addEventListener("mousemove", function(e) {
        	mouseX = e.clientX;
        	mouseY = e.clientY;
        });
        jQuery(document).mouseleave(function () {
            console.log("X="+mouseX+"  Y="+mouseY);
        	if (mouseY < 100) {
        		if (popupCounter < 1) {
        			 jQuery("#oc-nl-exit-popup").addClass("show");
        		}
        		popupCounter ++;
        	}
        });
        jQuery("#oc-nl-popup-close").click(function(){
            jQuery("#oc-nl-exit-popup").fadeOut(100);
            jQuery("#oc-nl-exit-popup").removeClass("show");
        });

        </script>';

    echo $html;
    }
}
add_action( 'wp_footer', 'ocep_CreatePopup',100 );