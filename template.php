<?php

/**
 * @author Semyon Dragunov <sam.dragunov@gmail.com>
 * https://github.com/SemyonDragunov
 */

/**
 * Implements hook_theme().
 */
function prime_theme($existing, $type, $theme, $path) {
  $theme = array();

  // Rewrite checkboxes.
  $theme['checkbox'] = array(
    'render element' => 'element',
    'template' => 'templates/fields/field--type-checkbox',
  );

  // Rewrite radios.
  $theme['radio'] = array(
    'render element' => 'element',
    'template' => 'templates/fields/field--type-radio',
  );

  // Header.
  $theme['header'] = array(
    'template' => 'templates/themes/header',
    'variables' => array(),
  );

  // Footer.
  $theme['footer'] = array(
    'template' => 'templates/themes/footer',
    'variables' => array(),
  );

  return $theme;
}

/**
 * Implements hook_preprocess_page().
 */
function prime_preprocess_page(&$variables) {
  global $user;

  // Templates for node.
  // page--node--blog.tpl.php for "blog" machine name node type.
  if (!empty($variables['node']) && !empty($variables['node']->type)) {
    $variables['theme_hook_suggestions'][] = 'page__node__' . $variables['node']->type;
  }

  // Special login pages and a password recovery.
  if (arg(0) == 'user' && !arg(1) && !$user->uid) {
    $variables['theme_hook_suggestions'][] = 'page__user__login';
  }
  if (arg(0) == 'user' && arg(1) == 'password' && !$user->uid) {
    $variables['theme_hook_suggestions'][] = 'page__user__password';
  }

  // Error pages.
  // Files in /templates/errors/ folder.
  // page--403.tpl.php & page--404.tpl.php
  $status = drupal_get_http_header("status");
  if ($status == "404 Not Found") {
    $variables['theme_hook_suggestions'][] = 'page__404';
    drupal_set_title('404 - Страница не найдена');
  }
  if ($status == "403 Forbidden") {
    $variables['theme_hook_suggestions'][] = 'page__403';
    drupal_set_title('403 - Доступ запрещён');
  }

  // Regions.
  $variables['header'] = theme('header');
  $variables['footer'] = theme('footer');
}

/**
 * Implements hook_preprocess_html().
 */
function prime_preprocess_html(&$variables) {
  global $user;

  // HTML Attributes
  $html_attributes = array(
    'lang' => $variables['language']->language,
    'dir' => $variables['language']->dir,
  );
  $variables['html_attributes'] = drupal_attributes($html_attributes);

  // Login and a password recovery pages.
  if(arg(0) == 'user' && !arg(1) && !$user->uid) {
    $variables['theme_hook_suggestions'][] = 'html__user__login';
  }
  if(arg(0) == 'user' && arg(1) == 'password' && !$user->uid) {
    $variables['theme_hook_suggestions'][] = 'html__user__login';
  }
}

/**
 * Implements hook_preprocess_footer().
 *
 * For footer.tpl.php
 */
function prime_preprocess_footer(&$variables) {
  $variables['footer_right'] = block_get_blocks_by_region('footer_right');
  $variables['footer'] = block_get_blocks_by_region('footer');
}

/**
 * Implements hook_preprocess_header().
 *
 * For header.tpl.php
 */
function prime_preprocess_header(&$variables) {
  $variables['action'] = block_get_blocks_by_region('action');
}

/**
 * Implements hook_css_alter().
 */
function prime_css_alter(&$css) {
  unset($css[drupal_get_path('module', 'system') . '/system.menus.css']);
  unset($css[drupal_get_path('module', 'system') . '/system.theme.css']);
}

/**
 * Implements hook_preprocess_block().
 */
function prime_preprocess_block(&$variables, $hook) {
  $variables['title'] = isset($variables['block']->subject) ? $variables['block']->subject : '';
}

/**
 * Implements hook_form_FORM_ID_alter().
 * Login and a password recovery pages.
 */
function prime_form_user_login_block_alter(&$form, &$form_state) {
  $form['name']['#title_display'] = 'invisible';
  $form['name']['#attributes'] = array('placeholder' => 'Логин');
  $form['pass']['#title_display'] = 'invisible';
  $form['pass']['#attributes'] = array('placeholder' => 'Пароль');
  $form['actions']['submit']['#attributes']['class'][] = 'expand';
}

function prime_form_user_login_alter(&$form, &$form_state) {
  $form['name']['#title_display'] = 'invisible';
  $form['name']['#attributes'] = array('placeholder' => 'Логин');
  $form['name']['#description'] = '';
  $form['pass']['#title_display'] = 'invisible';
  $form['pass']['#attributes'] = array('placeholder' => 'Пароль');
  $form['pass']['#description'] = '';
  $form['actions']['submit']['#attributes']['class'][] = 'expand';
}

function prime_form_user_pass_alter(&$form, &$form_state) {
  $form['name']['#title_display'] = 'invisible';
  $form['name']['#attributes'] = array('placeholder' => 'E-mail');
  $form['name']['#description'] = '';
  $form['actions']['submit']['#attributes']['class'][] = 'expand';
}

/**
 * Implements template_preprocess_html().
 */
function prime_process_html(&$variables) {
  if (module_exists('color')) {
    _color_html_alter($variables);
  }
}

/**
 * Implements template_process_page().
 */
function prime_process_page(&$variables, $hook) {
  if (module_exists('color')) {
    _color_page_alter($variables);
  }
}