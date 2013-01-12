<?php 

  // Update profile fields
  function mpcsf_user_profile_custom_field_update() {
    $user_id =  $_REQUEST['user_id'];

    // Billing Info
    $meta = get_user_meta($user_id, 'mpcsf_custom_field', true);

    if (!isset($_POST['mpcsf_custom_field']['cf1'])) {
      $meta['cf1'] = '';
    }

    if (!isset($_POST['mpcsf_custom_field']['cf2'])) {
      $meta['cf2'] = '';
    }

    if (!isset($_POST['mpcsf_custom_field']['cf3'])) {
      $meta['cf3'] = '';
    }

    if (!isset($_POST['mpcsf_custom_field']['cf4'])) {
      $meta['cf4'] = '';
    }

    if (!isset($_POST['mpcsf_custom_field']['cf5'])) {
      $meta['cf5'] = '';
    }

    if (!isset($_POST['mpcsf_custom_field']['cf6'])) {
      $meta['cf6'] = '';
    }

    if (!isset($_POST['mpcsf_custom_field']['cf7'])) {
      $meta['cf7'] = '';
    }

    if (!isset($_POST['mpcsf_custom_field']['cf8'])) {
      $meta['cf8'] = '';
    }

    if (!isset($_POST['mpcsf_custom_field']['cf9'])) {
      $meta['cf9'] = '';
    }

    if (!isset($_POST['mpcsf_custom_field']['cf10'])) {
      $meta['cf10'] = '';
    }


    $custom_field_1 = isset($_POST['mpcsf_custom_field']['cf1']) ? esc_html(esc_attr(trim($_POST['mpcsf_custom_field']['cf1']))) : esc_html(esc_attr(trim($meta['cf1'])));
    $custom_field_2 = isset($_POST['mpcsf_custom_field']['cf2']) ? esc_html(esc_attr(trim($_POST['mpcsf_custom_field']['cf2']))) : esc_html(esc_attr(trim($meta['cf2'])));
    $custom_field_3 = isset($_POST['mpcsf_custom_field']['cf3']) ? esc_html(esc_attr(trim($_POST['mpcsf_custom_field']['cf3']))) : esc_html(esc_attr(trim($meta['cf3'])));
    $custom_field_4 = isset($_POST['mpcsf_custom_field']['cf4']) ? esc_html(esc_attr(trim($_POST['mpcsf_custom_field']['cf4']))) : esc_html(esc_attr(trim($meta['cf4'])));
    $custom_field_5 = isset($_POST['mpcsf_custom_field']['cf5']) ? esc_html(esc_attr(trim($_POST['mpcsf_custom_field']['cf5']))) : esc_html(esc_attr(trim($meta['cf5'])));
    $custom_field_6 = isset($_POST['mpcsf_custom_field']['cf6']) ? esc_html(esc_attr(trim($_POST['mpcsf_custom_field']['cf6']))) : esc_html(esc_attr(trim($meta['cf6'])));
    $custom_field_7 = isset($_POST['mpcsf_custom_field']['cf7']) ? esc_html(esc_attr(trim($_POST['mpcsf_custom_field']['cf7']))) : esc_html(esc_attr(trim($meta['cf7'])));
    $custom_field_8 = isset($_POST['mpcsf_custom_field']['cf8']) ? esc_html(esc_attr(trim($_POST['mpcsf_custom_field']['cf8']))) : esc_html(esc_attr(trim($meta['cf8'])));
    $custom_field_9 = isset($_POST['mpcsf_custom_field']['cf9']) ? esc_html(esc_attr(trim($_POST['mpcsf_custom_field']['cf9']))) : esc_html(esc_attr(trim($meta['cf9'])));
    $custom_field_10 = isset($_POST['mpcsf_custom_field']['cf10']) ? esc_html(esc_attr(trim($_POST['mpcsf_custom_field']['cf10']))) : esc_html(esc_attr(trim($meta['cf10'])));

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

    update_user_meta($user_id, 'mpcsf_custom_field', $custom_field_meta);
  }

  function mpcsf_user_profile_custom_fields() {
    global $current_user;
    global $mp;

    if (isset($_REQUEST['user_id'])) {
      $user_id = $_REQUEST['user_id'];
    } else {
      $user_id = $current_user->ID;
    }

    $meta = get_user_meta($user_id, 'mpcsf_custom_field', true);

    $cfsettings = wpsf_get_settings( MPCSF_PATH .'inc/mpcsf-custom.php' );

    if (!empty($cfsettings)) { 

       $sectiontitle = esc_attr($cfsettings['mpcsfcustom_first_settings_section_title']);
       $enablesectiontitle = esc_attr($cfsettings['mpcsfcustom_first_settings_show_section_title']);

       $output = '';

      if ($enablesectiontitle == 'yes') { 
            $output .= '<h3>'.__($sectiontitle, 'mpcsf').'</h3>';
        }

      $output .= '<table class="form-table">';

          for ($i=1; $i <= 10; $i++) {

            $enablecf = $cfsettings['mpcsfcustom_custom_field_'.$i.'_show_field'];
            $cftitle = esc_attr($cfsettings['mpcsfcustom_custom_field_'.$i.'_field_title']);
            $cfdesc = esc_attr($cfsettings['mpcsfcustom_custom_field_'.$i.'_field_desc']);
            $cftype = esc_attr($cfsettings['mpcsfcustom_custom_field_'.$i.'_field_type']);
            $cfoptions = esc_attr($cfsettings['mpcsfcustom_custom_field_'.$i.'_field_type_options']);
            $options = !empty($cfoptions) ? explode(",",$cfoptions) : array();

            if ($enablecf == 'yes') {

              $cf = !empty($_SESSION['mpcsf_custom_field']['cf'.$i]) ? esc_html(esc_attr(trim($_SESSION['mpcsf_custom_field']['cf'.$i]))) : esc_html(esc_attr(trim($meta['cf'.$i])));

              $output .= '<tr>';
                $output .= '<th align="right"><label for="mpcsf_custom_field_'.$i.'">'.__( $cftitle .': ' , 'mpcsf').'&nbsp;</label></th>';
                  $output .= '<td>';
                    $output .= apply_filters( 'mpcsf_custom_field_'.$i.'_error', '');

                    switch ($cftype) {
                      case 'text':
                        $output .= '<input size="45" id="mpcsf_custom_field_'.$i.'" name="mpcsf_custom_field[cf'.$i.']" type="text" value="'.esc_attr($cf).'" />';
                        $output .= (!empty($cfdesc) ? '<br /><small><em>'.__($cfdesc, 'mpcsf').'</em></small>' : '');
                        break;

                      case 'textarea':
                        $output .= '<textarea id="mpcsf_custom_field_'.$i.'" name="mpcsf_custom_field[cf'.$i.']" rows="5">'.esc_attr($cf).'</textarea>';
                        $output .= (!empty($cfdesc) ? '<br /><small><em>'.__($cfdesc, 'mpcsf').'</em></small>' : '');
                        break;

                      case 'select':
                        $cf = esc_attr($cf);
                        $output .= '<select id="mpcsf_custom_field_'.$i.'" name="mpcsf_custom_field[cf'.$i.']">';
                          foreach($options as $key=>$cval) {
                            $output .= '<option value="'.$cval.'"'.(($cval == $cf) ? ' selected="selected"' : '').'>'.$cval.'</option>';
                          }
                        $output .= '</select>';
                        $output .= (!empty($cfdesc) ? '<br /><small><em>'.__($cfdesc, 'mpcsf').'</em></small>' : '');
                        break;

                      case 'radio':
                        $cf = esc_attr($cf);
                        foreach($options as $key=>$cval){
                            $output .= '<label><input type="radio" id="mpcsf_custom_field_'.$i.'" name="mpcsf_custom_field[cf'.$i.']" value="'. $cval .'"'. (($cval == $cf) ? ' checked="checked"' : '') .' /> '. $cval .'</label><br />';
                        }
                        $output .= (!empty($cfdesc) ? '<br /><small><em>'.__($cfdesc, 'mpcsf').'</em></small>' : '');
                        break;

                      case 'checkbox':
                        $cf = esc_attr($cf);
                        $output .= '<input type="hidden" name="mpcsf_custom_field[cf'.$i.']" value="0" />';
                        $output .= '<label><input type="checkbox" name="mpcsf_custom_field[cf'.$i.']" id="mpcsf_custom_field_'.$i.'" value="1"'. (($cf) ? ' checked="checked"' : '') .' /> '. (!empty($cfdesc) ? __($cfdesc, 'mpcsf') : '') .'</label>';
                        break;
                      
                      default:
                        $output .= '<input size="45" id="mpcsf_custom_field_'.$i.'" name="mpcsf_custom_field[cf'.$i.']" type="text" value="'.esc_attr($cf).'" />';
                        $output .= (!empty($cfdesc) ? '<br /><small><em>'.__($cfdesc, 'mpcsf').'</em></small>' : '');
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