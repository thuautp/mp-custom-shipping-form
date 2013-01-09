<?php

  // Show Custom Fields in shipping form

	function mpcsf_show_custom_fields() {
	    global $mp, $current_user;

	    $meta = get_user_meta($current_user->ID, 'mpcsf_custom_field', true);

	    $cfsettings = wpsf_get_settings( MPCSF_PATH .'inc/mpcsf-custom.php' );

	    if (!empty($cfsettings)) {

	    $output = '';

      $sectiontitle = esc_attr($cfsettings['mpcsfcustom_first_settings_section_title']);
      $enablesectiontitle = esc_attr($cfsettings['mpcsfcustom_first_settings_show_section_title']);

      if ($enablesectiontitle == 'yes') {
          $output .= '<th colspan="2">'.__($sectiontitle, 'mpcsf').'</th>';
      }

        for ($i=1; $i <= 10; $i++) {

            $enablecf = $cfsettings['mpcsfcustom_custom_field_'.$i.'_show_field'];
            $cftitle = esc_attr($cfsettings['mpcsfcustom_custom_field_'.$i.'_field_title']);
            $cfdesc = esc_attr($cfsettings['mpcsfcustom_custom_field_'.$i.'_field_desc']);
            $cftype = esc_attr($cfsettings['mpcsfcustom_custom_field_'.$i.'_field_type']);
            $cfoptions = esc_attr($cfsettings['mpcsfcustom_custom_field_'.$i.'_field_type_options']);
            $cfrequired = $cfsettings['mpcsfcustom_custom_field_'.$i.'_required_field'];
            $cferror = esc_attr($cfsettings['mpcsfcustom_custom_field_'.$i.'_required_field_error']);
            $options = !empty($cfoptions) ? explode(",",$cfoptions) : array();

            if ($enablecf == 'yes') {

              $cf = !empty($_SESSION['mpcsf_custom_field']['cf'.$i]) ? esc_html(esc_attr(trim($_SESSION['mpcsf_custom_field']['cf'.$i]))) : (!empty($meta['cf'.$i]) ? esc_html(esc_attr(trim($meta['cf'.$i]))) : '');

              $output .= '<tr>';
                $output .= '<td align="right"><label class="alignright" for="mpcsf_custom_field_'.$i.'">'.__( $cftitle .':' , 'mpcsf').($cfrequired == 'yes' ? '*' : '').'</label></td>';
                  $output .= '<td>';
                    if ($mp->checkout_error === true) {
                      $output .= apply_filters( 'mpcsf_custom_field_'.$i.'_error', $cferror);
                    }

                    switch ($cftype) {
                      case 'text':
                        $output .= '<input size="45" id="mpcsf_custom_field_'.$i.'" name="mpcsf_custom_field_cf'.$i.'" type="text" value="'.esc_attr($cf).'" class="mpcsf-input-text" />';
                        $output .= (!empty($cfdesc) ? '<br /><small><em>'.__($cfdesc, 'mpcsf').'</em></small>' : '');
                        break;

                      case 'textarea':
                        $output .= '<textarea id="mpcsf_custom_field_'.$i.'" name="mpcsf_custom_field_cf'.$i.'" rows="5" class="mpcsf-input-textarea">'.esc_attr($cf).'</textarea>';
                        $output .= (!empty($cfdesc) ? '<br /><small><em>'.__($cfdesc, 'mpcsf').'</em></small>' : '');
                        break;

                      case 'select':
                        $cf = esc_attr($cf);
                        $output .= '<select id="mpcsf_custom_field_'.$i.'" name="mpcsf_custom_field_cf'.$i.'" class="mpcsf-input-select">';
                          foreach($options as $key=>$value) {
                            $output .= '<option value="'.$value.'" '.selected( $cf, $value, false ).'>'.$value.'</option>';
                          }
                        $output .= '</select>';
                        $output .= (!empty($cfdesc) ? '<br /><small><em>'.__($cfdesc, 'mpcsf').'</em></small>' : '');
                        break;

                      case 'radio':
                        $cf = esc_attr($cf);
                        foreach($options as $key=>$cval){
                            $output .= '<label><input type="radio" id="mpcsf_custom_field_'.$i.'" name="mpcsf_custom_field_cf'.$i.'" value="'. $cval .'"'. (($cval == $cf) ? ' checked="checked"' : '') .' class="mpcsf-input-radio" /> '. $cval .'</label>';
                        }
                        $output .= (!empty($cfdesc) ? '<br /><small><em>'.__($cfdesc, 'mpcsf').'</em></small>' : '');
                        break;

                      case 'checkbox':
                        $cf = esc_attr($cf);
                        $output .= '<label><input type="checkbox" name="mpcsf_custom_field_cf'.$i.'" id="mpcsf_custom_field_'.$i.'" value="1"'. (($cf) ? ' checked="checked"' : '') .' class="mpcsf-input-checkbox" /> '. (!empty($cfdesc) ? __($cfdesc, 'mpcsf') : '') .'</label>';
                        break;
                      
                      default:
                        $output .= '<input size="45" id="mpcsf_custom_field_'.$i.'" name="mpcsf_custom_field_cf'.$i.'" type="text" value="'.esc_attr($cf).'" class="mpcsf-input-text" />';
                        $output .= (!empty($cfdesc) ? '<br /><small><em>'.__($cfdesc, 'mpcsf').'</em></small>' : '');
                        break;
                    }

                  $output .= '</td>';
              $output .= '</tr>';

            }
          }
	    }

	    return $output;
	}

  // error message filter
  function mpcsf_customfield_error_message( $error = '') {

    if (!empty($error)) {
      return '<span class="mpcsf-error-message">'. $error . '</span><br />';
    } else {
      return '<span class="mpcsf-error-message">'. __('Please fill out this field') . '</span><br />';
    }

  }

  // Show Custom Fields (read only) in Order confirmation page

	function mpcsf_show_custom_fields_readonly() {
	    global $current_user;

	    $meta = get_user_meta($current_user->ID, 'mpcsf_custom_field', true);

	    $cfsettings = wpsf_get_settings( MPCSF_PATH .'inc/mpcsf-custom.php' );

	    if (!empty($cfsettings)) {

	    $output = '';

      $sectiontitle = esc_attr($cfsettings['mpcsfcustom_first_settings_section_title']);
      $enablesectiontitle = esc_attr($cfsettings['mpcsfcustom_first_settings_show_section_title']);

      if ($enablesectiontitle == 'yes') {
          $output .= '<th colspan="2">'.__($sectiontitle, 'mpcsf').'</th>';
      }

        for ($i=1; $i <= 10; $i++) {

            $enablecf = $cfsettings['mpcsfcustom_custom_field_'.$i.'_show_field'];
            $cftitle = esc_attr($cfsettings['mpcsfcustom_custom_field_'.$i.'_field_title']);
            $cftype = esc_attr($cfsettings['mpcsfcustom_custom_field_'.$i.'_field_type']);

            if ($enablecf == 'yes') {

              $cf = !empty($_SESSION['mpcsf_custom_field']['cf'.$i]) ? esc_html(esc_attr(trim($_SESSION['mpcsf_custom_field']['cf'.$i]))) : (!empty($meta['cf'.$i]) ? esc_html(esc_attr(trim($meta['cf'.$i]))) : '');

              $output .= '<tr>';
                $output .= '<td align="right" class="align-right">'.__( $cftitle .': ' , 'mpcsf').'</td>';
                  $output .= '<td>';

                    switch ($cftype) {
                      case 'text':
                        $output .= esc_attr($cf);
                        break;

                      case 'textarea':
                        $output .= esc_attr($cf);
                        break;

                      case 'select':
                        $output .= esc_attr($cf);
                        break;

                      case 'radio':
                        $output .= esc_attr($cf);
                        break;

                      case 'checkbox':
                        $output .= ($cf) ? 'Yes' : 'No';
                        break;
                      
                      default:
                        $output .= esc_attr($cf);
                        break;
                    }

                  $output .= '</td>';
              $output .= '</tr>';

            }
          }
	    }

	    return $output;
	}

  // Process Custom Field

	function mpcsf_process_shipping_form() {

	    global $mp, $current_user;

	    $meta = get_user_meta($current_user->ID, 'mpcsf_custom_field', true);

      $cfsettings = wpsf_get_settings( MPCSF_PATH .'inc/mpcsf-custom.php' );

      for ($i=1; $i <= 10; $i++) {

        if (empty($_POST['mpcsf_custom_field_cf'.$i])) {
          if ($cfsettings['mpcsfcustom_custom_field_'.$i.'_required_field'] == 'yes') {
            add_filter('mpcsf_custom_field_'.$i.'_error' , 'mpcsf_customfield_error_message');
            $mp->checkout_error = true;
          }
        }

      }

  		if (isset($_POST['mpcsf_custom_field_cf1'])) {

  			$_SESSION['mpcsf_custom_field']['cf1'] = esc_html(esc_attr(trim($_POST['mpcsf_custom_field_cf1'])));
  			$custom_field_1 = esc_html(esc_attr(trim($_POST['mpcsf_custom_field_cf1'])));
  		} else {

        $custom_field_1 = esc_html(esc_attr(trim($meta['cf1'])));
      }
  			
  		if (isset($_POST['mpcsf_custom_field_cf2'])) {

  			$_SESSION['mpcsf_custom_field']['cf2'] = esc_html(esc_attr(trim($_POST['mpcsf_custom_field_cf2'])));
  			$custom_field_2 = esc_html(esc_attr(trim($_POST['mpcsf_custom_field_cf2'])));
  		} else {

  			$custom_field_2 = esc_html(esc_attr(trim($meta['cf2'])));
  		}
  			

  		if (isset($_POST['mpcsf_custom_field_cf3'])) {

  			$_SESSION['mpcsf_custom_field']['cf3'] = esc_html(esc_attr(trim($_POST['mpcsf_custom_field_cf3'])));
  			$custom_field_3 = esc_html(esc_attr(trim($_POST['mpcsf_custom_field_cf3'])));
  		} else {

  			$custom_field_3 = esc_html(esc_attr(trim($meta['cf3'])));
  		}
  			

  		if (isset($_POST['mpcsf_custom_field_cf4'])) {

  			$_SESSION['mpcsf_custom_field']['cf4'] = esc_html(esc_attr(trim($_POST['mpcsf_custom_field_cf4'])));
  			$custom_field_4 = esc_html(esc_attr(trim($_POST['mpcsf_custom_field_cf4'])));
  		} else {

  			$custom_field_4 = esc_html(esc_attr(trim($meta['cf4'])));
  		}
  			

  		if (isset($_POST['mpcsf_custom_field_cf5'])) {

  			$_SESSION['mpcsf_custom_field']['cf5'] = esc_html(esc_attr(trim($_POST['mpcsf_custom_field_cf5'])));
  			$custom_field_5 = esc_html(esc_attr(trim($_POST['mpcsf_custom_field_cf5'])));
  		} else {

  			$custom_field_5 = esc_html(esc_attr(trim($meta['cf5'])));
  		}

      if (isset($_POST['mpcsf_custom_field_cf6'])) {

        $_SESSION['mpcsf_custom_field']['cf6'] = esc_html(esc_attr(trim($_POST['mpcsf_custom_field_cf6'])));
        $custom_field_6 = esc_html(esc_attr(trim($_POST['mpcsf_custom_field_cf6'])));
      } else {

        $custom_field_6 = esc_html(esc_attr(trim($meta['cf6'])));
      }
        
      if (isset($_POST['mpcsf_custom_field_cf7'])) {

        $_SESSION['mpcsf_custom_field']['cf7'] = esc_html(esc_attr(trim($_POST['mpcsf_custom_field_cf7'])));
        $custom_field_7 = esc_html(esc_attr(trim($_POST['mpcsf_custom_field_cf7'])));
      } else {

        $custom_field_7 = esc_html(esc_attr(trim($meta['cf7'])));
      }
        

      if (isset($_POST['mpcsf_custom_field_cf8'])) {

        $_SESSION['mpcsf_custom_field']['cf8'] = esc_html(esc_attr(trim($_POST['mpcsf_custom_field_cf8'])));
        $custom_field_8 = esc_html(esc_attr(trim($_POST['mpcsf_custom_field_cf8'])));
      } else {

        $custom_field_8 = esc_html(esc_attr(trim($meta['cf8'])));
      }
        

      if (isset($_POST['mpcsf_custom_field_cf9'])) {

        $_SESSION['mpcsf_custom_field']['cf9'] = esc_html(esc_attr(trim($_POST['mpcsf_custom_field_cf9'])));
        $custom_field_9 = esc_html(esc_attr(trim($_POST['mpcsf_custom_field_cf9'])));
      } else {

        $custom_field_9 = esc_html(esc_attr(trim($meta['cf9'])));
      }
        

      if (isset($_POST['mpcsf_custom_field_cf10'])) {

        $_SESSION['mpcsf_custom_field']['cf10'] = esc_html(esc_attr(trim($_POST['mpcsf_custom_field_cf10'])));
        $custom_field_10 = esc_html(esc_attr(trim($_POST['mpcsf_custom_field_cf10'])));
      } else {

        $custom_field_10 = esc_html(esc_attr(trim($meta['cf10'])));
      }

  	  $custom_field_meta = array(
            'cf1' => $custom_field_1,
            'cf2' => $custom_field_2,
            'cf3' => $custom_field_3,
            'cf4' => $custom_field_4,
            'cf5' => $custom_field_5, 
            'cf6' => $custom_field_6,
            'cf7' => $custom_field_7,
            'cf8' => $custom_field_8,
            'cf9' => $custom_field_9,
            'cf10' => $custom_field_10		 
  	      );

      //save to user meta
      if ($current_user->ID)
          update_user_meta($current_user->ID, 'mpcsf_custom_field', $custom_field_meta);

    }

    // insert custom fields data to $order

    function mpcsf_customfield_add_data_to_new_order($order = '') {

      global $current_user;

      $meta = get_user_meta($current_user->ID, 'mpcsf_custom_field', true);

      if (isset($_POST['mpcsf_custom_field_cf1'])) {

        $_SESSION['mpcsf_custom_field']['cf1'] = esc_html(esc_attr(trim($_POST['mpcsf_custom_field_cf1'])));
        $custom_field_1 = esc_html(esc_attr(trim($_POST['mpcsf_custom_field_cf1'])));
      } else {
        $custom_field_1 = esc_html(esc_attr(trim($meta['cf1'])));
      }
        
      if (isset($_POST['mpcsf_custom_field_cf2'])) {

        $_SESSION['mpcsf_custom_field']['cf2'] = esc_html(esc_attr(trim($_POST['mpcsf_custom_field_cf2'])));
        $custom_field_2 = esc_html(esc_attr(trim($_POST['mpcsf_custom_field_cf2'])));
      } else {
        $custom_field_2 = esc_html(esc_attr(trim($meta['cf2'])));
      }
        

      if (isset($_POST['mpcsf_custom_field_cf3'])) {

        $_SESSION['mpcsf_custom_field']['cf3'] = esc_html(esc_attr(trim($_POST['mpcsf_custom_field_cf3'])));
        $custom_field_3 = esc_html(esc_attr(trim($_POST['mpcsf_custom_field_cf3'])));
      } else {
        $custom_field_3 = esc_html(esc_attr(trim($meta['cf3'])));
      }
        

      if (isset($_POST['mpcsf_custom_field_cf4'])) {

        $_SESSION['mpcsf_custom_field']['cf4'] = esc_html(esc_attr(trim($_POST['mpcsf_custom_field_cf4'])));
        $custom_field_4 = esc_html(esc_attr(trim($_POST['mpcsf_custom_field_cf4'])));
      } else {
        $custom_field_4 = esc_html(esc_attr(trim($meta['cf4'])));
      }
        

      if (isset($_POST['mpcsf_custom_field_cf5'])) {

        $_SESSION['mpcsf_custom_field']['cf5'] = esc_html(esc_attr(trim($_POST['mpcsf_custom_field_cf5'])));
        $custom_field_5 = esc_html(esc_attr(trim($_POST['mpcsf_custom_field_cf5'])));
      } else {
        $custom_field_5 = esc_html(esc_attr(trim($meta['cf5'])));
      }

      if (isset($_POST['mpcsf_custom_field_cf6'])) {

        $_SESSION['mpcsf_custom_field']['cf6'] = esc_html(esc_attr(trim($_POST['mpcsf_custom_field_cf6'])));
        $custom_field_6 = esc_html(esc_attr(trim($_POST['mpcsf_custom_field_cf6'])));
      } else {
        $custom_field_6 = esc_html(esc_attr(trim($meta['cf6'])));
      }
        
      if (isset($_POST['mpcsf_custom_field_cf7'])) {

        $_SESSION['mpcsf_custom_field']['cf7'] = esc_html(esc_attr(trim($_POST['mpcsf_custom_field_cf7'])));
        $custom_field_7 = esc_html(esc_attr(trim($_POST['mpcsf_custom_field_cf7'])));
      } else {
        $custom_field_7 = esc_html(esc_attr(trim($meta['cf7'])));
      }
        

      if (isset($_POST['mpcsf_custom_field_cf8'])) {

        $_SESSION['mpcsf_custom_field']['cf8'] = esc_html(esc_attr(trim($_POST['mpcsf_custom_field_cf8'])));
        $custom_field_8 = esc_html(esc_attr(trim($_POST['mpcsf_custom_field_cf8'])));
      } else {
        $custom_field_8 = esc_html(esc_attr(trim($meta['cf8'])));
      }
        

      if (isset($_POST['mpcsf_custom_field_cf9'])) {

        $_SESSION['mpcsf_custom_field']['cf9'] = esc_html(esc_attr(trim($_POST['mpcsf_custom_field_cf9'])));
        $custom_field_9 = esc_html(esc_attr(trim($_POST['mpcsf_custom_field_cf9'])));
      } else {
        $custom_field_9 = esc_html(esc_attr(trim($meta['cf9'])));
      }
        

      if (isset($_POST['mpcsf_custom_field_cf10'])) {

        $_SESSION['mpcsf_custom_field']['cf10'] = esc_html(esc_attr(trim($_POST['mpcsf_custom_field_cf10'])));
        $custom_field_10 = esc_html(esc_attr(trim($_POST['mpcsf_custom_field_cf10'])));
      } else {
        $custom_field_10 = esc_html(esc_attr(trim($meta['cf10'])));
      }

      $custom_field_meta = array(
          'cf1' => $custom_field_1,
          'cf2' => $custom_field_2,
          'cf3' => $custom_field_3,
          'cf4' => $custom_field_4,
          'cf5' => $custom_field_5, 
          'cf6' => $custom_field_6,
          'cf7' => $custom_field_7,
          'cf8' => $custom_field_8,
          'cf9' => $custom_field_9,
          'cf10' => $custom_field_10     
        );

      add_post_meta($order->ID, 'mpcsf_custom_field', $custom_field_meta, true);

    }


    // Custom Field Output in Order Status Page (frontend)

    function mpcsf_customfield_order_status_output($order = '') {

      $meta = get_post_meta($order->ID, 'mpcsf_custom_field');

      $cfsettings = wpsf_get_settings( MPCSF_PATH .'inc/mpcsf-custom.php' );

      if (!empty($cfsettings)) {

      $output = '';

      $sectiontitle = esc_attr($cfsettings['mpcsfcustom_first_settings_section_title']);
      $enablesectiontitle = esc_attr($cfsettings['mpcsfcustom_first_settings_show_section_title']);

      if ($enablesectiontitle == 'yes') {
          $output .= '<h3>'.__($sectiontitle, 'mpcsf').'</h3>';
      }

      $output .= '<table class="table table-striped table-bordered table-hover">';

        for ($i=1; $i <= 10; $i++) {

            $enablecf = $cfsettings['mpcsfcustom_custom_field_'.$i.'_show_field'];
            $cftitle = esc_attr($cfsettings['mpcsfcustom_custom_field_'.$i.'_field_title']);
            $cftype = esc_attr($cfsettings['mpcsfcustom_custom_field_'.$i.'_field_type']);

            if ($enablecf == 'yes') {

              $cf = esc_html(esc_attr(trim($meta[0]['cf'.$i])));

              $output .= '<tr>';
                $output .= '<td align="right" class="span4 align-right">'.__( $cftitle .': ' , 'mpcsf').'</td>';
                  $output .= '<td>';

                    switch ($cftype) {
                      case 'text':
                        $output .= esc_attr($cf);
                        break;

                      case 'textarea':
                        $output .= esc_attr($cf);
                        break;

                      case 'select':
                        $output .= esc_attr($cf);
                        break;

                      case 'radio':
                        $output .= esc_attr($cf);
                        break;

                      case 'checkbox':
                        $output .= ($cf) ? 'Yes' : 'No';
                        break;
                      
                      default:
                        $output .= esc_attr($cf);
                        break;
                    }

                  $output .= '</td>';
              $output .= '</tr>';

            }

          }

        $output .= '</table>';
      }

     echo $output;

    }

    function mpcsf_customfield_display_in_single_order($order = '') {

      $meta = get_post_meta($order->ID, 'mpcsf_custom_field');

      $cfsettings = wpsf_get_settings( MPCSF_PATH .'inc/mpcsf-custom.php' );

      if (!empty($cfsettings)) {

      $output = '';

      $sectiontitle = esc_attr($cfsettings['mpcsfcustom_first_settings_section_title']);
      $enablesectiontitle = esc_attr($cfsettings['mpcsfcustom_first_settings_show_section_title']);

      if ($enablesectiontitle == 'yes') {
          $output .= '<h3>'.__($sectiontitle, 'mpcsf').'</h3>';
      }

      $output .= '<table>';

        for ($i=1; $i <= 10; $i++) {

            $enablecf = $cfsettings['mpcsfcustom_custom_field_'.$i.'_show_field'];
            $cftitle = esc_attr($cfsettings['mpcsfcustom_custom_field_'.$i.'_field_title']);
            $cftype = esc_attr($cfsettings['mpcsfcustom_custom_field_'.$i.'_field_type']);

            if ($enablecf == 'yes') {

              $cf = esc_html(esc_attr(trim($meta[0]['cf'.$i])));

              $output .= '<tr>';
                $output .= '<td align="right" class="span4 align-right">'.__( $cftitle .': ' , 'mpcsf').'</td>';
                  $output .= '<td>';

                    switch ($cftype) {
                      case 'text':
                        $output .= esc_attr($cf);
                        break;

                      case 'textarea':
                        $output .= esc_attr($cf);
                        break;

                      case 'select':
                        $output .= esc_attr($cf);
                        break;

                      case 'radio':
                        $output .= esc_attr($cf);
                        break;

                      case 'checkbox':
                        $output .= ($cf) ? 'Yes' : 'No';
                        break;
                      
                      default:
                        $output .= esc_attr($cf);
                        break;
                    }

                  $output .= '</td>';
              $output .= '</tr>';

            }

          }

        $output .= '</table>';
      }

     echo $output;

    }

    function mpcsf_customfield_add_filter_order_notification($order = '') {

      if (!empty($_SESSION['mp_payment_method'])) {
        add_filter( 'mp_order_notification_' . $_SESSION['mp_payment_method'], 'mpcsf_customfield_filter_email_order_notification' , 10 , 2);
      }

    }

    function mpcsf_customfield_filter_email_order_notification( $msg = '' , $order = array()) {

      $meta = get_post_meta($order->ID, 'mpcsf_custom_field');

      $cfsettings = wpsf_get_settings( MPCSF_PATH .'inc/mpcsf-custom.php' );

      if (!empty($cfsettings)) {

        $customfield = '';

        for ($i=1; $i <= 10; $i++) {

            $enablecf = $cfsettings['mpcsfcustom_custom_field_'.$i.'_show_field'];
            $cftitle = esc_attr($cfsettings['mpcsfcustom_custom_field_'.$i.'_field_title']);
            $cftype = esc_attr($cfsettings['mpcsfcustom_custom_field_'.$i.'_field_type']);

            if ($enablecf == 'yes') {

              $cf = esc_html(esc_attr(trim($meta[0]['cf'.$i])));

              $customfield .= "\n" .__( $cftitle .': ' , 'mpcsf');

              switch ($cftype) {
                case 'text':
                  $customfield .= esc_attr($cf);
                  break;

                case 'textarea':
                  $customfield .= "\n" . esc_attr($cf);
                  break;

                case 'select':
                  $customfield .= esc_attr($cf);
                  break;

                case 'radio':
                  $customfield .= esc_attr($cf);
                  break;

                case 'checkbox':
                  $customfield .= ($cf) ? 'Yes' : 'No';
                  break;
                
                default:
                  $customfield .= esc_attr($cf);
                  break;
              }
            }

          }

        $customfield .= "\n\n";
      }

      //replace
      $text = str_replace('MPCSFDETAILS', $customfield, $msg);

      return $text;

    }