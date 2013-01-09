<?php

global $mpcsf_custom;

// Settings
$mpcsf_custom[] = array(
    'section_id' => 'first_settings',
    'section_title' => 'Main Settings',
    'section_description' => __('' , 'mpcsf'),
    'section_order' => 4,
    'fields' => array(
        array(
            'id' => 'show_section_title',
            'title' => 'Show Section Title',
            'desc' => __('By default, this option is enabled. If you want to disable this option, then simply select "No".' , 'mpcsf'),
            'type' => 'radio',
            'std' => 'yes',
            'choices' => array(
                'yes' => 'Yes',
                'no' => 'No'
            )
        ),        
        array(
            'id' => 'section_title',
            'title' => 'Section Title',
            'desc' => __('The title of the custom field section' , 'mpcsf'),
            'type' => 'text',
            'std' => 'Additional Info:'
        )
    )
);

// Custom Field 1
$mpcsf_custom[] = array(
    'section_id' => 'custom_field_1',
    'section_title' => 'Custom Field 1',
    'section_description' => __('Enter the details of the first custom field' , 'mpcsf'),
    'section_order' => 5,
    'fields' => array(
        array(
            'id' => 'show_field',
            'title' => 'Show Custom Field 1',
            'desc' => __('By default, this custom field is enabled. If you want to disable this custom field, then simply select "No".' , 'mpcsf'),
            'type' => 'radio',
            'std' => 'yes',
            'choices' => array(
                'yes' => 'Yes',
                'no' => 'No'
            )
        ),
        array(
            'id' => 'field_title',
            'title' => 'Field Title',
            'desc' => __('The title of the custom field' , 'mpcsf'),
            'type' => 'text',
            'std' => 'Custom Field 1'
        ),
        array(
            'id' => 'field_desc',
            'title' => 'Field Description',
            'desc' => __('Description for the custom field' , 'mpcsf'),
            'type' => 'textarea',
            'std' => ''
        ),
        array(
            'id' => 'field_type',
            'title' => 'Field Type',
            'desc' => __('Select type of the custom field' , 'mpcsf'),
            'type' => 'select',
            'std' => 'text',
            'choices' => array(
                'text' => 'Text',
                'textarea' => 'Textarea',
                'select' => 'Select',
                'radio' => 'Radio',
                'checkbox' => 'Checkbox'
            )
        ),
        array(
            'id' => 'field_type_options',
            'title' => 'Field Type Options',
            'desc' => __('Options should be separated by comas (ex: option1,option2,option3). This only applied to field type: select & radio.' , 'mpcsf'),
            'type' => 'textarea',
            'std' => ''
        ),
        array(
            'id' => 'required_field',
            'title' => 'Required Field',
            'desc' => __('Make this required field' , 'mpcsf'),
            'type' => 'radio',
            'std' => 'no',
            'choices' => array(
                'yes' => 'Yes',
                'no' => 'No'
            )
        ),
        array(
            'id' => 'required_field_error',
            'title' => 'Required Field Error Prompt',
            'desc' => __('Error prompt for this field (leave it blank for default)' , 'mpcsf'),
            'type' => 'textarea',
            'std' => ''
        )
    )
);

// Custom Field 2
$mpcsf_custom[] = array(
    'section_id' => 'custom_field_2',
    'section_title' => 'Custom Field 2',
    'section_description' => __('Enter the details of the second custom field' , 'mpcsf'),
    'section_order' => 6,
    'fields' => array(
        array(
            'id' => 'show_field',
            'title' => 'Show Custom Field 2',
            'desc' => __('By default, this custom field is enabled. If you want to disable this custom field, then simply select "No".' , 'mpcsf'),
            'type' => 'radio',
            'std' => 'yes',
            'choices' => array(
                'yes' => 'Yes',
                'no' => 'No'
            )
        ),
        array(
            'id' => 'field_title',
            'title' => 'Field Title',
            'desc' => __('The title of the custom field' , 'mpcsf'),
            'type' => 'text',
            'std' => 'Custom Field 2'
        ),
        array(
            'id' => 'field_desc',
            'title' => 'Field Description',
            'desc' => __('Description for the custom field' , 'mpcsf'),
            'type' => 'textarea',
            'std' => ''
        ),
        array(
            'id' => 'field_type',
            'title' => 'Field Type',
            'desc' => __('Select type of the custom field' , 'mpcsf'),
            'type' => 'select',
            'std' => 'text',
            'choices' => array(
                'text' => 'Text',
                'textarea' => 'Textarea',
                'select' => 'Select',
                'radio' => 'Radio',
                'checkbox' => 'Checkbox'
            )
        ),
        array(
            'id' => 'field_type_options',
            'title' => 'Field Type Options',
            'desc' => __('Options should be separated by comas (ex: option1,option2,option3). This only applied to field type: select & radio.' , 'mpcsf'),
            'type' => 'textarea',
            'std' => ''
        ),
        array(
            'id' => 'required_field',
            'title' => 'Required Field',
            'desc' => __('Make this required field' , 'mpcsf'),
            'type' => 'radio',
            'std' => 'no',
            'choices' => array(
                'yes' => 'Yes',
                'no' => 'No'
            )
        ),
        array(
            'id' => 'required_field_error',
            'title' => 'Required Field Error Prompt',
            'desc' => __('Error prompt for this field (leave it blank for default)' , 'mpcsf'),
            'type' => 'textarea',
            'std' => ''
        )
    )
);

// Custom Field 3
$mpcsf_custom[] = array(
    'section_id' => 'custom_field_3',
    'section_title' => 'Custom Field 3',
    'section_description' => __('Enter the details of the third custom field' , 'mpcsf'),
    'section_order' => 7,
    'fields' => array(
        array(
            'id' => 'show_field',
            'title' => 'Show Custom Field 3',
            'desc' => __('By default, this custom field is disabled. If you want to enable this custom field, then simply select "No".' , 'mpcsf'),
            'type' => 'radio',
            'std' => 'no',
            'choices' => array(
                'yes' => 'Yes',
                'no' => 'No'
            )
        ),
        array(
            'id' => 'field_title',
            'title' => 'Field Title',
            'desc' => __('The title of the custom field' , 'mpcsf'),
            'type' => 'text',
            'std' => 'Custom Field 3'
        ),
        array(
            'id' => 'field_desc',
            'title' => 'Field Description',
            'desc' => __('Description for the custom field' , 'mpcsf'),
            'type' => 'textarea',
            'std' => ''
        ),
        array(
            'id' => 'field_type',
            'title' => 'Field Type',
            'desc' => __('Select type of the custom field' , 'mpcsf'),
            'type' => 'select',
            'std' => 'text',
            'choices' => array(
                'text' => 'Text',
                'textarea' => 'Textarea',
                'select' => 'Select',
                'radio' => 'Radio',
                'checkbox' => 'Checkbox'
            )
        ),
        array(
            'id' => 'field_type_options',
            'title' => 'Field Type Options',
            'desc' => __('Options should be separated by comas (ex: option1,option2,option3). This only applied to field type: select & radio.' , 'mpcsf'),
            'type' => 'textarea',
            'std' => ''
        ),
        array(
            'id' => 'required_field',
            'title' => 'Required Field',
            'desc' => __('Make this required field' , 'mpcsf'),
            'type' => 'radio',
            'std' => 'no',
            'choices' => array(
                'yes' => 'Yes',
                'no' => 'No'
            )
        ),
        array(
            'id' => 'required_field_error',
            'title' => 'Required Field Error Prompt',
            'desc' => __('Error prompt for this field (leave it blank for default)' , 'mpcsf'),
            'type' => 'textarea',
            'std' => ''
        )
    )
);

// Custom Field 4
$mpcsf_custom[] = array(
    'section_id' => 'custom_field_4',
    'section_title' => 'Custom Field 4',
    'section_description' => __('Enter the details of the fourth custom field' , 'mpcsf'),
    'section_order' => 8,
    'fields' => array(
        array(
            'id' => 'show_field',
            'title' => 'Show Custom Field 4',
            'desc' => __('By default, this custom field is disabled. If you want to enable this custom field, then simply select "No".' , 'mpcsf'),
            'type' => 'radio',
            'std' => 'no',
            'choices' => array(
                'yes' => 'Yes',
                'no' => 'No'
            )
        ),
        array(
            'id' => 'field_title',
            'title' => 'Field Title',
            'desc' => __('The title of the custom field' , 'mpcsf'),
            'type' => 'text',
            'std' => 'Custom Field 4'
        ),
        array(
            'id' => 'field_desc',
            'title' => 'Field Description',
            'desc' => __('Description for the custom field' , 'mpcsf'),
            'type' => 'textarea',
            'std' => ''
        ),
        array(
            'id' => 'field_type',
            'title' => 'Field Type',
            'desc' => __('Select type of the custom field' , 'mpcsf'),
            'type' => 'select',
            'std' => 'text',
            'choices' => array(
                'text' => 'Text',
                'textarea' => 'Textarea',
                'select' => 'Select',
                'radio' => 'Radio',
                'checkbox' => 'Checkbox'
            )
        ),
        array(
            'id' => 'field_type_options',
            'title' => 'Field Type Options',
            'desc' => __('Options should be separated by comas (ex: option1,option2,option3). This only applied to field type: select & radio.' , 'mpcsf'),
            'type' => 'textarea',
            'std' => ''
        ),
        array(
            'id' => 'required_field',
            'title' => 'Required Field',
            'desc' => __('Make this required field' , 'mpcsf'),
            'type' => 'radio',
            'std' => 'no',
            'choices' => array(
                'yes' => 'Yes',
                'no' => 'No'
            )
        ),
        array(
            'id' => 'required_field_error',
            'title' => 'Required Field Error Prompt',
            'desc' => __('Error prompt for this field (leave it blank for default)' , 'mpcsf'),
            'type' => 'textarea',
            'std' => ''
        )
    )
);

// Custom Field 5
$mpcsf_custom[] = array(
    'section_id' => 'custom_field_5',
    'section_title' => 'Custom Field 5',
    'section_description' => __('Enter the details of the fifth custom field' , 'mpcsf'),
    'section_order' => 10,
    'fields' => array(
        array(
            'id' => 'show_field',
            'title' => 'Show Custom Field 5',
            'desc' => __('By default, this custom field is disabled. If you want to enable this custom field, then simply select "No".' , 'mpcsf'),
            'type' => 'radio',
            'std' => 'no',
            'choices' => array(
                'yes' => 'Yes',
                'no' => 'No'
            )
        ),
        array(
            'id' => 'field_title',
            'title' => 'Field Title',
            'desc' => __('The title of the custom field' , 'mpcsf'),
            'type' => 'text',
            'std' => 'Custom Field 5'
        ),
        array(
            'id' => 'field_desc',
            'title' => 'Field Description',
            'desc' => __('Description for the custom field' , 'mpcsf'),
            'type' => 'textarea',
            'std' => ''
        ),
        array(
            'id' => 'field_type',
            'title' => 'Field Type',
            'desc' => __('Select type of the custom field' , 'mpcsf'),
            'type' => 'select',
            'std' => 'text',
            'choices' => array(
                'text' => 'Text',
                'textarea' => 'Textarea',
                'select' => 'Select',
                'radio' => 'Radio',
                'checkbox' => 'Checkbox'
            )
        ),
        array(
            'id' => 'field_type_options',
            'title' => 'Field Type Options',
            'desc' => __('Options should be separated by comas (ex: option1,option2,option3). This only applied to field type: select & radio.' , 'mpcsf'),
            'type' => 'textarea',
            'std' => ''
        ),
        array(
            'id' => 'required_field',
            'title' => 'Required Field',
            'desc' => __('Make this required field' , 'mpcsf'),
            'type' => 'radio',
            'std' => 'no',
            'choices' => array(
                'yes' => 'Yes',
                'no' => 'No'
            )
        ),
        array(
            'id' => 'required_field_error',
            'title' => 'Required Field Error Prompt',
            'desc' => __('Error prompt for this field (leave it blank for default)' , 'mpcsf'),
            'type' => 'textarea',
            'std' => ''
        )
    )
);

// Custom Field 6
$mpcsf_custom[] = array(
    'section_id' => 'custom_field_6',
    'section_title' => 'Custom Field 6',
    'section_description' => __('Enter the details of the sixth custom field' , 'mpcsf'),
    'section_order' => 10,
    'fields' => array(
        array(
            'id' => 'show_field',
            'title' => 'Show Custom Field 6',
            'desc' => __('By default, this custom field is disabled. If you want to enable this custom field, then simply select "No".' , 'mpcsf'),
            'type' => 'radio',
            'std' => 'no',
            'choices' => array(
                'yes' => 'Yes',
                'no' => 'No'
            )
        ),
        array(
            'id' => 'field_title',
            'title' => 'Field Title',
            'desc' => __('The title of the custom field' , 'mpcsf'),
            'type' => 'text',
            'std' => 'Custom Field 6'
        ),
        array(
            'id' => 'field_desc',
            'title' => 'Field Description',
            'desc' => __('Description for the custom field' , 'mpcsf'),
            'type' => 'textarea',
            'std' => ''
        ),
        array(
            'id' => 'field_type',
            'title' => 'Field Type',
            'desc' => __('Select type of the custom field' , 'mpcsf'),
            'type' => 'select',
            'std' => 'text',
            'choices' => array(
                'text' => 'Text',
                'textarea' => 'Textarea',
                'select' => 'Select',
                'radio' => 'Radio',
                'checkbox' => 'Checkbox'
            )
        ),
        array(
            'id' => 'field_type_options',
            'title' => 'Field Type Options',
            'desc' => __('Options should be separated by comas (ex: option1,option2,option3). This only applied to field type: select & radio.' , 'mpcsf'),
            'type' => 'textarea',
            'std' => ''
        ),
        array(
            'id' => 'required_field',
            'title' => 'Required Field',
            'desc' => __('Make this required field' , 'mpcsf'),
            'type' => 'radio',
            'std' => 'no',
            'choices' => array(
                'yes' => 'Yes',
                'no' => 'No'
            )
        ),
        array(
            'id' => 'required_field_error',
            'title' => 'Required Field Error Prompt',
            'desc' => __('Error prompt for this field (leave it blank for default)' , 'mpcsf'),
            'type' => 'textarea',
            'std' => ''
        )
    )
);

// Custom Field 7
$mpcsf_custom[] = array(
    'section_id' => 'custom_field_7',
    'section_title' => 'Custom Field 7',
    'section_description' => __('Enter the details of the seventh custom field' , 'mpcsf'),
    'section_order' => 11,
    'fields' => array(
        array(
            'id' => 'show_field',
            'title' => 'Show Custom Field 7',
            'desc' => __('By default, this custom field is disabled. If you want to enable this custom field, then simply select "No".' , 'mpcsf'),
            'type' => 'radio',
            'std' => 'no',
            'choices' => array(
                'yes' => 'Yes',
                'no' => 'No'
            )
        ),
        array(
            'id' => 'field_title',
            'title' => 'Field Title',
            'desc' => __('The title of the custom field' , 'mpcsf'),
            'type' => 'text',
            'std' => 'Custom Field 7'
        ),
        array(
            'id' => 'field_desc',
            'title' => 'Field Description',
            'desc' => __('Description for the custom field' , 'mpcsf'),
            'type' => 'textarea',
            'std' => ''
        ),
        array(
            'id' => 'field_type',
            'title' => 'Field Type',
            'desc' => __('Select type of the custom field' , 'mpcsf'),
            'type' => 'select',
            'std' => 'text',
            'choices' => array(
                'text' => 'Text',
                'textarea' => 'Textarea',
                'select' => 'Select',
                'radio' => 'Radio',
                'checkbox' => 'Checkbox'
            )
        ),
        array(
            'id' => 'field_type_options',
            'title' => 'Field Type Options',
            'desc' => __('Options should be separated by comas (ex: option1,option2,option3). This only applied to field type: select & radio.' , 'mpcsf'),
            'type' => 'textarea',
            'std' => ''
        ),
        array(
            'id' => 'required_field',
            'title' => 'Required Field',
            'desc' => __('Make this required field' , 'mpcsf'),
            'type' => 'radio',
            'std' => 'no',
            'choices' => array(
                'yes' => 'Yes',
                'no' => 'No'
            )
        ),
        array(
            'id' => 'required_field_error',
            'title' => 'Required Field Error Prompt',
            'desc' => __('Error prompt for this field (leave it blank for default)' , 'mpcsf'),
            'type' => 'textarea',
            'std' => ''
        )
    )
);

// Custom Field 8
$mpcsf_custom[] = array(
    'section_id' => 'custom_field_8',
    'section_title' => 'Custom Field 8',
    'section_description' => __('Enter the details of the eigth custom field' , 'mpcsf'),
    'section_order' => 12,
    'fields' => array(
        array(
            'id' => 'show_field',
            'title' => 'Show Custom Field 8',
            'desc' => __('By default, this custom field is disabled. If you want to enable this custom field, then simply select "No".' , 'mpcsf'),
            'type' => 'radio',
            'std' => 'no',
            'choices' => array(
                'yes' => 'Yes',
                'no' => 'No'
            )
        ),
        array(
            'id' => 'field_title',
            'title' => 'Field Title',
            'desc' => __('The title of the custom field' , 'mpcsf'),
            'type' => 'text',
            'std' => 'Custom Field 8'
        ),
        array(
            'id' => 'field_desc',
            'title' => 'Field Description',
            'desc' => __('Description for the custom field' , 'mpcsf'),
            'type' => 'textarea',
            'std' => ''
        ),
        array(
            'id' => 'field_type',
            'title' => 'Field Type',
            'desc' => __('Select type of the custom field' , 'mpcsf'),
            'type' => 'select',
            'std' => 'text',
            'choices' => array(
                'text' => 'Text',
                'textarea' => 'Textarea',
                'select' => 'Select',
                'radio' => 'Radio',
                'checkbox' => 'Checkbox'
            )
        ),
        array(
            'id' => 'field_type_options',
            'title' => 'Field Type Options',
            'desc' => __('Options should be separated by comas (ex: option1,option2,option3). This only applied to field type: select & radio.' , 'mpcsf'),
            'type' => 'textarea',
            'std' => ''
        ),
        array(
            'id' => 'required_field',
            'title' => 'Required Field',
            'desc' => __('Make this required field' , 'mpcsf'),
            'type' => 'radio',
            'std' => 'no',
            'choices' => array(
                'yes' => 'Yes',
                'no' => 'No'
            )
        ),
        array(
            'id' => 'required_field_error',
            'title' => 'Required Field Error Prompt',
            'desc' => __('Error prompt for this field (leave it blank for default)' , 'mpcsf'),
            'type' => 'textarea',
            'std' => ''
        )
    )
);

// Custom Field 9
$mpcsf_custom[] = array(
    'section_id' => 'custom_field_9',
    'section_title' => 'Custom Field 9',
    'section_description' => __('Enter the details of the ninth custom field' , 'mpcsf'),
    'section_order' => 13,
    'fields' => array(
        array(
            'id' => 'show_field',
            'title' => 'Show Custom Field 9',
            'desc' => __('By default, this custom field is disabled. If you want to enable this custom field, then simply select "No".' , 'mpcsf'),
            'type' => 'radio',
            'std' => 'no',
            'choices' => array(
                'yes' => 'Yes',
                'no' => 'No'
            )
        ),
        array(
            'id' => 'field_title',
            'title' => 'Field Title',
            'desc' => __('The title of the custom field' , 'mpcsf'),
            'type' => 'text',
            'std' => 'Custom Field 9'
        ),
        array(
            'id' => 'field_desc',
            'title' => 'Field Description',
            'desc' => __('Description for the custom field' , 'mpcsf'),
            'type' => 'textarea',
            'std' => ''
        ),
        array(
            'id' => 'field_type',
            'title' => 'Field Type',
            'desc' => __('Select type of the custom field' , 'mpcsf'),
            'type' => 'select',
            'std' => 'text',
            'choices' => array(
                'text' => 'Text',
                'textarea' => 'Textarea',
                'select' => 'Select',
                'radio' => 'Radio',
                'checkbox' => 'Checkbox'
            )
        ),
        array(
            'id' => 'field_type_options',
            'title' => 'Field Type Options',
            'desc' => __('Options should be separated by comas (ex: option1,option2,option3). This only applied to field type: select & radio.' , 'mpcsf'),
            'type' => 'textarea',
            'std' => ''
        ),
        array(
            'id' => 'required_field',
            'title' => 'Required Field',
            'desc' => __('Make this required field' , 'mpcsf'),
            'type' => 'radio',
            'std' => 'no',
            'choices' => array(
                'yes' => 'Yes',
                'no' => 'No'
            )
        ),
        array(
            'id' => 'required_field_error',
            'title' => 'Required Field Error Prompt',
            'desc' => __('Error prompt for this field (leave it blank for default)' , 'mpcsf'),
            'type' => 'textarea',
            'std' => ''
        )
    )
);

// Custom Field 10
$mpcsf_custom[] = array(
    'section_id' => 'custom_field_10',
    'section_title' => 'Custom Field 10',
    'section_description' => __('Enter the details of the tenth custom field' , 'mpcsf'),
    'section_order' => 14,
    'fields' => array(
        array(
            'id' => 'show_field',
            'title' => 'Show Custom Field 10',
            'desc' => __('By default, this custom field is disabled. If you want to enable this custom field, then simply select "No".' , 'mpcsf'),
            'type' => 'radio',
            'std' => 'no',
            'choices' => array(
                'yes' => 'Yes',
                'no' => 'No'
            )
        ),
        array(
            'id' => 'field_title',
            'title' => 'Field Title',
            'desc' => __('The title of the custom field' , 'mpcsf'),
            'type' => 'text',
            'std' => 'Custom Field 10'
        ),
        array(
            'id' => 'field_desc',
            'title' => 'Field Description',
            'desc' => __('Description for the custom field' , 'mpcsf'),
            'type' => 'textarea',
            'std' => ''
        ),
        array(
            'id' => 'field_type',
            'title' => 'Field Type',
            'desc' => __('Select type of the custom field' , 'mpcsf'),
            'type' => 'select',
            'std' => 'text',
            'choices' => array(
                'text' => 'Text',
                'textarea' => 'Textarea',
                'select' => 'Select',
                'radio' => 'Radio',
                'checkbox' => 'Checkbox'
            )
        ),
        array(
            'id' => 'field_type_options',
            'title' => 'Field Type Options',
            'desc' => __('Options should be separated by comas (ex: option1,option2,option3). This only applied to field type: select & radio.' , 'mpcsf'),
            'type' => 'textarea',
            'std' => ''
        ),
        array(
            'id' => 'required_field',
            'title' => 'Required Field',
            'desc' => __('Make this required field' , 'mpcsf'),
            'type' => 'radio',
            'std' => 'no',
            'choices' => array(
                'yes' => 'Yes',
                'no' => 'No'
            )
        ),
        array(
            'id' => 'required_field_error',
            'title' => 'Required Field Error Prompt',
            'desc' => __('Error prompt for this field (leave it blank for default)' , 'mpcsf'),
            'type' => 'textarea',
            'std' => ''
        )
    )
);

// Custom Field (last)
$mpcsf_custom[] = array(
    'section_id' => 'custom_field_last',
    'section_title' => '',
    'section_description' => '',
    'section_order' => 99,
    'fields' => array()
);

?>