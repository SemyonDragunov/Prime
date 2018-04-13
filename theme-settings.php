<?php

/**
 * @author Semyon Dragunov <sam.dragunov@gmail.com>
 * https://github.com/SemyonDragunov
 */

/**
 * Implements hook_form_system_theme_settings_alter().
 */
function prime_form_system_theme_settings_alter(&$form, $form_state, $form_id = NULL) {
  if (isset($form_id)) {
    return;
  }

  // We move default theme settings to new fieldset.
  $form['theme_settings_fieldset'] = array(
    '#type' => 'fieldset',
    '#title' => 'Базовые настройки',
    '#weight' => 10,
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
  );
  $form['theme_settings_fieldset']['theme_settings'] = $form['theme_settings'];
  unset($form['theme_settings']);
  $form['theme_settings_fieldset']['logo'] = $form['logo'];
  unset($form['logo']);
  $form['theme_settings_fieldset']['favicon'] = $form['favicon'];
  unset($form['favicon']);
}