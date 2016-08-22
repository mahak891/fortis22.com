<?php
function theme_get_registry($complete = TRUE) {
  // Use the advanced drupal_static() pattern, since this is called very often.
  static $drupal_static_fast;
  if (!isset($drupal_static_fast)) {
    $drupal_static_fast['registry'] = &drupal_static('theme_get_registry');
  }
  $theme_registry = &$drupal_static_fast['registry'];

  // Initialize the theme, if this is called early in the bootstrap, or after
  // static variables have been reset.
  if (!is_array($theme_registry)) {
    drupal_theme_initialize();
    $theme_registry = array();
  }

  $key = (int) $complete;

  if (!isset($theme_registry[$key])) {
    list($callback, $arguments) = _theme_registry_callback();
    if (!$complete) {
      $arguments[] = FALSE;
    }
    $theme_registry[$key] = call_user_func_array($callback, $arguments);
  }

  return $theme_registry[$key];
}
