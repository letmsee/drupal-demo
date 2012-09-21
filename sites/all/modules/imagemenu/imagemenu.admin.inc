<?php

/**
 * @file
 *
 * Admin settings for imagemenu
 */


/**
 * Settings form
 */
function imagemenu_admin_form() {
  $form = array();

  $form['imagemenu_menus'] = array(
    '#type' => 'select',
    '#multiple' => TRUE,
    '#title' => t('Use images for following menus'),
    '#default_value' => variable_get('imagemenu_menus', array()),
    '#options' => menu_get_menus(),
  );

  $settings = variable_get('imagemenu_settings', imagemenu_default_settings());
//kpr($settings);
  $form['imagemenu_image_style'] = array(
    '#type' => 'select',
    '#multiple' => FALSE,
    '#title' => t('Display images using following style'),
    '#default_value' => $settings['image_style'],
    '#options' => image_style_options(FALSE),
  );

  $form['imagemenu_use_hover'] = array(
    '#type' => 'checkbox',
    '#title' => t('Change image on mouse over'),
    '#default_value' => $settings['use_hover'],
  );

  $form['imagemenu_preload_hover'] = array(
    '#type' => 'checkbox',
    '#title' => t('Preload images used on mouse over'),
    '#default_value' => $settings['preload_hover'],
    '#states' => array(
      'invisible' => array(
        'input[name="imagemenu_use_hover"]' => array('checked' => FALSE),
      ),
    ),
  );

  $form['imagemenu_replace'] = array(
    '#type' => 'checkbox',
    '#title' => t('Replace menu title with image'),
    '#default_value' => $settings['replace'],
  );

  $form['imagemenu_use_default'] = array(
    '#type' => 'checkbox',
    '#title' => t('Use default images if none provided'),
    '#default_value' => $settings['use_default'],
  );

  $form['imagemenu_default'] = array(
    '#type' => 'container',
    '#states' => array(
      'invisible' => array(
        'input[name="imagemenu_use_default"]' => array('checked' => FALSE),
      ),
    ),
  );
  $form['imagemenu_default']['imagemenu_default_image'] = array(
    '#type' => 'managed_file',
    '#title' => t('Default image file'),
    '#default_value' => $settings['default_image'],
    '#upload_validators' => array('
      file_validate_extensions' => array(implode(' ', array('png', 'gif', 'jpg', 'jpeg')))
    ),
    '#upload_location' => 'public://imagemenu',
  );
  $form['imagemenu_default']['imagemenu_default_image_hover'] = array(
    '#type' => 'managed_file',
    '#title' => t('Default mouse over image file'),
    '#default_value' => $settings['default_image_hover'],
    '#upload_validators' => array('
      file_validate_extensions' => array(implode(' ', array('png', 'gif', 'jpg', 'jpeg')))
    ),
    '#upload_location' => 'public://imagemenu',
    '#states' => array(
      'invisible' => array(
        'input[name="imagemenu_use_hover"]' => array('checked' => FALSE),
      ),
    ),
  );

  $form = system_settings_form($form);

  // will not use system_settings_form_submit
  $form['#submit'] = array('imagemenu_admin_form_submit');

  return $form;
}

/**
 * Submit handler for file elements
 */
function imagemenu_admin_form_submit($form, &$form_state) {
  variable_set('imagemenu_menus', $form_state['values']['imagemenu_menus']);
  $settings = array(
    'image_style' => $form_state['values']['imagemenu_image_style'],
    'use_hover' => $form_state['values']['imagemenu_use_hover'],
    'preload_hover' => $form_state['values']['imagemenu_preload_hover'],
    'replace' => $form_state['values']['imagemenu_replace'],
    'use_default' => $form_state['values']['imagemenu_use_default'],
    'default_image' => $form_state['values']['imagemenu_default_image'],
    'default_image_hover' => $form_state['values']['imagemenu_default_image_hover'],
  );

  variable_set('imagemenu_settings', $settings);

  // store uploaded files for default images
  foreach (array('imagemenu_default_image', 'imagemenu_default_image_hover') as $key => $image_file) {

    $old_image_id = $form['imagemenu_default'][$image_file]['#default_value'];
    $old_file = NULL;
    // uploaded image file
    $file = $form['imagemenu_default'][$image_file]['#file'];
    if ($old_image_id) {
      $old_file = file_load($old_image_id);
    }

    // delete old file if there is a prev file and file is removed or file is replaced
    if ($old_file && is_object($old_file) && (!$file || $file->fid != $old_image_id)) {
      file_delete($old_file, TRUE);
      file_usage_delete($old_file, 'imagemenu');
    }

    // if there is a new file change status and add usage record
    if ($file && $file->fid != $form['imagemenu_default'][$image_file]['#default_value']) {
      $file->status = FILE_STATUS_PERMANENT;
      file_save($file);
      // managed file requires a usage record
      file_usage_add($file, 'imagemenu', str_replace('imagemenu_', '', $image_file), $key + 1);
    }
  }

  drupal_set_message(t('The configuration options have been saved.'));
}
