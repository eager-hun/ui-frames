<?php
/**
 * @file
 * Moderately simple scaffolding for demonstrating various sequences.
 */

if (function_exists('xdebug_disable')) {
  xdebug_disable();
}

$pages              = array();
$frames             = array();
$images             = array();
$page               = array();
$page['navigation'] = array();

include('demo/definitions-and-config.php');

// -----------------------------------------------------------------------------
// Request analisys.

$case_ids = array();
foreach ($contents as $case_id => $case_data) {
  $case_ids[] = $case_id;
}
unset($case_id, $case_data);

$req_case_id = 'case-a';
if (!empty($_GET['case'])) {
  $requested_case = $_GET['case'];
  $index = array_search($requested_case, $case_ids);
  if ($index !== false) {
    $req_case_id = $case_ids[$index];
  }
}

$frame_ids = array();
foreach ($contents[$req_case_id]['frames'] as $frame_id => $frame_data) {
  $frame_ids[] = $frame_id;
}
unset($frame_id, $frame_data);

$req_frame_id = 'frame-1';
if (!empty($_GET['frame'])) {
  $requested_frame = $_GET['frame'];
  $index = array_search($requested_frame, $frame_ids);
  if ($index !== false) {
    $req_frame_id = $frame_ids[$index];
  }
}


// -----------------------------------------------------------------------------
// Response compiler.

// Helpers.
function _draw_case_nav_link($link_opts, &$output) {
  $output .= '<li><a href="' . $link_opts['href']
    . '" ' . $link_opts['classes'] . '>' . $link_opts['text'] . '</a></li>';
}
function _draw_frame_nav_link($link_opts, &$output) {
  $output .= '<li><a data-target-frame="' . $link_opts['target'] . '" href="'
    . $link_opts['href'] . '" ' . $link_opts['classes'] . '>'
    . $link_opts['text'] . '</a></li>';
}

// Rendering the case-nav menu links.
$page['navigation']['case-nav']  = '<nav><ul class="menu case-nav">';
$missing_link_text = 'Case title undefined';
foreach ($case_ids as $case) {
    // Rendering menu links.
  $link_data = array(
    'href' => '?case=' . $case,
  );
  $link_data['text'] = (!empty($contents[$case]['title'])) ? $contents[$case]['title'] : $missing_link_text;
  if ($case == $req_case_id) {
    $classes = array('active');
    $link_data['classes'] = ' class="' . implode(' ', $classes) . '"';
  }
  else {
    $link_data['classes'] = '';
  }
  _draw_case_nav_link($link_data, $page['navigation']['case-nav']);
}
unset($index, $frame_id, $frame_data);
$page['navigation']['case-nav']  .= '</ul></nav>';

// Rendering the required set of frames and the frame-nav menu.
$page['content'] = '';
$page['navigation']['frame-nav'] = '<nav><ul class="menu frame-nav">';
$index = 1;
foreach ($contents[$req_case_id]['frames'] as $frame_id => $frame_data) {

  // Rendering frames.
  $id          = $frame_id;
  $frame_title = (!empty($frame_data['title'])) ? $frame_data['title'] : '';
  $description = (!empty($frame_data['description'])) ? $frame_data['description'] : '';
  $content     = (!empty($frame_data['content'])) ? $frame_data['content'] : '';

  $visibility  = ' style="display: none"'; // Reset on each loop.
  if ($frame_id == $req_frame_id) {
    $visibility = '';                      // The active one is visible.
  }

  ob_start();
  include('theme/templates/frame-template.php');
  $page['content'] .= ob_get_clean();

  // Rendering the frame-nav menu links.
  $link_data = array();
  $link_data['target'] = $frame_id;
  $link_data['href']   = (!empty($_GET['case'])) ? '?case=' . $req_case_id . '&frame=' . $frame_id : '?frame=' . $frame_id;
  $link_data['text']   = (!empty($frame_data['link-text'])) ? $frame_data['link-text'] : $index;
  if ($frame_id == $req_frame_id) {
    $classes = array('active');
    $link_data['classes'] = ' class="' . implode(' ', $classes) . '"';
  }
  else {
    $link_data['classes'] = '';
  }
  _draw_frame_nav_link($link_data, $page['navigation']['frame-nav']);
  $index++;
}
unset($index, $frame_id, $frame_data);
$page['navigation']['frame-nav'] .= '</ul></nav>';


// -----------------------------------------------------------------------------
// Printing into page template.

include('theme/templates/page-template.php');

exit;
