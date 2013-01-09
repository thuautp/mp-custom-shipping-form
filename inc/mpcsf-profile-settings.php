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

    ?> 

      <?php if ($enablesectiontitle == 'yes') { ?>  
        <h3><?php _e($sectiontitle, 'mpcsf'); ?></h3>
      <?php } ?>

      <table class="form-table">

        <?php 

          for ($i=1; $i <= 10; $i++) {

            $enablecf = $cfsettings['mpcsfcustom_custom_field_'.$i.'_show_field'];
            $cftitle = esc_attr($cfsettings['mpcsfcustom_custom_field_'.$i.'_field_title']);
            $cfdesc = esc_attr($cfsettings['mpcsfcustom_custom_field_'.$i.'_field_desc']);
            $cftype = esc_attr($cfsettings['mpcsfcustom_custom_field_'.$i.'_field_type']);
            $cfoptions = esc_attr($cfsettings['mpcsfcustom_custom_field_'.$i.'_field_type_options']);
            $options = !empty($cfoptions) ? explode(",",$cfoptions) : array();

            if ($enablecf == 'yes') {

              $cf = !empty($_SESSION['mpcsf_custom_field']['cf'.$i]) ? esc_html(esc_attr(trim($_SESSION['mpcsf_custom_field']['cf'.$i]))) : esc_html(esc_attr(trim($meta['cf'.$i])));

              echo '<tr>';
                echo '<th align="right"><label for="mpcsf_custom_field_'.$i.'">'.__( $cftitle .': ' , 'mpcsf').'&nbsp;</label></th>';
                  echo '<td>';
                    echo apply_filters( 'mpcsf_custom_field_'.$i.'_error', '');

                    switch ($cftype) {
                      case 'text':
                        echo '<input size="45" id="mpcsf_custom_field_'.$i.'" name="mpcsf_custom_field[cf'.$i.']" type="text" value="'.esc_attr($cf).'" />';
                        echo (!empty($cfdesc) ? '<br /><small><em>'.__($cfdesc, 'mpcsf').'</em></small>' : '');
                        break;

                      case 'textarea':
                        echo '<textarea id="mpcsf_custom_field_'.$i.'" name="mpcsf_custom_field[cf'.$i.']" rows="5">'.esc_attr($cf).'</textarea>';
                        echo (!empty($cfdesc) ? '<br /><small><em>'.__($cfdesc, 'mpcsf').'</em></small>' : '');
                        break;

                      case 'select':
                        $cf = esc_attr($cf);
                        echo '<select id="mpcsf_custom_field_'.$i.'" name="mpcsf_custom_field[cf'.$i.']">';
                          foreach($options as $key=>$value) {
                            echo '<option value="'.$value.'" '.selected( $cf, $value, false ).'>'.$value.'</option>';
                          }
                        echo '</select>';
                        echo (!empty($cfdesc) ? '<br /><small><em>'.__($cfdesc, 'mpcsf').'</em></small>' : '');
                        break;

                      case 'radio':
                        $cf = esc_attr($cf);
                        foreach($options as $key=>$cval){
                            echo '<label><input type="radio" id="mpcsf_custom_field_'.$i.'" name="mpcsf_custom_field[cf'.$i.']" value="'. $cval .'"'. (($cval == $cf) ? ' checked="checked"' : '') .' /> '. $cval .'</label><br />';
                        }
                        echo (!empty($cfdesc) ? '<br /><small><em>'.__($cfdesc, 'mpcsf').'</em></small>' : '');
                        break;

                      case 'checkbox':
                        $cf = esc_attr($cf);
                        echo '<input type="hidden" name="mpcsf_custom_field[cf'.$i.']" value="0" />';
                        echo '<label><input type="checkbox" name="mpcsf_custom_field[cf'.$i.']" id="mpcsf_custom_field_'.$i.'" value="1"'. (($cf) ? ' checked="checked"' : '') .' /> '. (!empty($cfdesc) ? __($cfdesc, 'mpcsf') : '') .'</label>';
                        break;

                      case 'checkboxes':
                        $cf = esc_attr($cf);
                        foreach($options as $key=>$cval){
                            echo '<input type="hidden" name="mpcsf_custom_field[cf'.$i.']" value="0" />';
                            echo '<label><input type="checkbox" name="mpcsf_custom_field[cf'.$i.']" id="mpcsf_custom_field_'.$i.'" value="'. $key .'"'. (($key == $cf) ? ' checked="checked"' : '') .' /> '. $cval .'</label><br />';
                        }
                        echo (!empty($cfdesc) ? '<br /><small><em>'.__($cfdesc, 'mpcsf').'</em></small>' : '');
                        break;

                      case 'multiselect':
                        echo '<select id="mpcsf_custom_field_'.$i.'" multiple="multiple" name="mpcsf_custom_field[cf'.$i.']">';
                          foreach ($options as $key => $option) {
                            $selected = (is_array($cf) && in_array($option, $cf)) ? 'selected="selected"' : '';      
                            echo '<option id="mpcsf_custom_field_'.$i.'_'. $option .'" value="'.$option.'" '. $selected .'>'.$option.'</option>';
                          }
                        echo '</select>';
                        echo (!empty($cfdesc) ? '<br /><small><em>'.__($cfdesc, 'mpcsf').'</em></small>' : '');
                        break;
                      
                      default:
                        echo '<input size="45" id="mpcsf_custom_field_'.$i.'" name="mpcsf_custom_field[cf'.$i.']" type="text" value="'.esc_attr($cf).'" />';
                        echo (!empty($cfdesc) ? '<br /><small><em>'.__($cfdesc, 'mpcsf').'</em></small>' : '');
                        break;
                    }

                  echo '</td>';
              echo '</tr>';

            }
          }

        ?>

      </table>

    <?php 

    }

  }