<?php
/**
 * @file
 * App init.
 */

$contents           = array();
$images             = array();
$request            = array();

$page               = array();
$page['printables'] = array();
$page['navigation'] = array();
$page['regions']    = array();


/**
 * Escaping output strings at various places.
 *
 * @param string $string
 *   The string to be processed.
 * @param string $usage
 *   Optional. Defaults to 'display'. Valid values are:
 *   'display':     Text nodes to be displayed on screen.
 *   'html':        Where you want to allow HTML.
 *   'href':        href's, without the GET params.
 *   'attrib_name': Speaks for itself.
 *   'attrib_val':  Speaks for itself.
 *   'file_name':   Speaks for itself.
 * @return string
 */
function escape_string($string, $usage = 'display') {
  switch ($usage) {
    case 'html':
      // Perhaps this should really be a job for the HTMLPurifier library.
      $esc = $string; // TODO! Do some sanitizing processes.
      break;
    case 'href':
      $esc = preg_replace('/[^-_a-z0-9\/]/', '', $string);
      break;
    case 'attrib_name':
      $esc = preg_replace('/[^-_a-z0-9]/', '', $string);
      break;
    case 'attrib_val':
      $esc = preg_replace('/[^-_a-z0-9]/', '', $string);
      break;
    case 'file_name':
      $esc = preg_replace('/[^-_.a-z0-9]/', '', $string);
      break;
    // Default is same as 'display'.
    default:
      $esc = htmlentities($string, ENT_QUOTES);
      break;
  }
  return $esc;
}

/**
 * Helper: escaping strings in an array. Implemented as array_walk() callback.
 *
 * @param string $usage
 *   Optional. Defaults to 'attribute'. Valid values are escape_string()'s
 *   parameters.
 */
function escape_array_vals(&$val, $key, $usage = 'attrib_val') {
  $val = escape_string($val, $usage);
}
