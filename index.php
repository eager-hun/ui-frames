<?php
/**
 * @file
 * Moderately simple scaffolding for demonstrating various sequences.
 */

if (function_exists('xdebug_disable')) {
  xdebug_disable();
}


$contents           = array();
$images             = array();
$request            = array();
$page               = array();
$page['navigation'] = array();
$page['regions']    = array();

include('demo/content-definitions.php');


// #############################################################################
// Request analisys.

// Which case.
$case_ids = array_keys($contents);
$request['case_id'] = $case_ids[0]; // Default.
if (!empty($_GET['case'])) {
  // We don't store the $_GET param, but our corresponding data.
  $index = array_search($_GET['case'], $case_ids);
  if ($index !== false) {
    $request['case_id'] = $case_ids[$index];
  }
}

// Which frame.
$frame_ids = array_keys($contents[$request['case_id']]['frames']);
$request['frame_id'] = $frame_ids[0]; // Default.
if (!empty($_GET['frame'])) {
  // We don't store the $_GET param, but our corresponding data.
  $index = array_search($_GET['frame'], $frame_ids);
  if ($index !== false) {
    $request['frame_id'] = $frame_ids[$index];
  }
}


// #############################################################################
//  Sanitizing user input (TODO).

// $content_v.                      - ?
// Page title.                      - htmlspecialchars ?
// Case- and frame identifiers.     - preg_replace non-ascii ?
// Case titles.                     - htmlspecialchars ?
// Case descriptions.               - strip_tags custom ?
// Frame title.                     - htmlspecialchars ?
// Frame link text.                 - htmlspecialchars ?
// Frame content (image filename?). - ?
// Frame description.               - strip_tags custom ?


// #############################################################################
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


// -----------------------------------------------------------------------------
// Rendering the case-nav menu links.
$page['navigation']['case-nav']  = '<nav class="case-nav"><ul class="menu">';
$missing_link_text = 'Case title undefined';
foreach ($case_ids as $case) {
  // Rendering menu links.
  $link_data = array(
    'href' => '?case=' . $case,
  );
  $link_data['text'] = (!empty($contents[$case]['title'])) ? $contents[$case]['title'] : $missing_link_text;
  if ($case == $request['case_id']) {
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


// -----------------------------------------------------------------------------
// Rendering the required set of frames and the frame-nav menu.
$page['regions']['content'] = '';
$missing_content = 'Main content undefined';
$page['navigation']['frame-nav'] = '<nav class="frame-nav"><ul class="menu">';
$index = 1;
foreach ($contents[$request['case_id']]['frames'] as $frame_id => $frame_data) {

  // Rendering a frame.
  $id          = $frame_id;
  $frame_title = (!empty($frame_data['title'])) ? $frame_data['title'] : '';
  $description = (!empty($frame_data['description'])) ? $frame_data['description'] : '';
  if (!empty($frame_data['content'])) {
    if (!empty($content_v)) {
      $content = '<img src="demo/frames/' . $frame_data['content'] . '?v=' . $content_v . '" />';
    }
    else {
      $content = '<img src="demo/frames/' . $frame_data['content'] . '" />';
    }
  }
  else {
    $content = $missing_content;
  }

  $visibility  = ' style="display: none"'; // Reset on each loop.
  if ($frame_id == $request['frame_id']) {
    $visibility = '';                      // The active one is visible.
  }

  ob_start();
  include('theme/templates/frame-template.php');
  $page['regions']['content'] .= ob_get_clean();

  // Rendering the corresponding frame-nav menu link.
  $link_data = array();
  $link_data['target'] = $frame_id;
  $link_data['href']   = (!empty($_GET['case'])) ? '?case=' . $request['case_id'] . '&frame=' . $frame_id : '?frame=' . $frame_id;
  $link_data['text']   = (!empty($frame_data['link-text'])) ? $frame_data['link-text'] : $index;
  if ($frame_id == $request['frame_id']) {
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
// Rendering further global page elements.

$page['regions']['header'] = array();
if (!empty($page['title'])) {
  $page['regions']['header'][] = '<h1 class="page__title">'
    . $page['title'] . '</h1>';
}
if (!empty($page['navigation']['case-nav'])) {
  $page['regions']['header'][] = $page['navigation']['case-nav'];
}
if (!empty($contents[$request['case_id']]['description'])) {
  $page['regions']['header'][] = '<div class="description description--case">'
    . $contents[$request['case_id']]['description'] . '</div>';
}
$page['regions']['header'] = implode("\n", $page['regions']['header']);


// -----------------------------------------------------------------------------
// Printing into page template.

include('theme/templates/page-template.php');

exit;
