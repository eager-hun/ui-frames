<?php
/**
 * @file
 * App.
 */

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
// Notes for escaping user submitted data upon using it.

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
  // Variables should be passed in already sanitized.
  $output .= '<li><a href="' . $link_opts['href']
    . '" ' . $link_opts['classes'] . '>' . $link_opts['text'] . '</a></li>' . "\n";
}
function _draw_frame_nav_link($link_opts, &$output) {
  // Variables should be passed in already sanitized.
  $output .= '<li><a data-target-frame="' . $link_opts['target'] . '" href="'
    . $link_opts['href'] . '" ' . $link_opts['classes'] . '>'
    . $link_opts['text'] . '</a></li>' . "\n";
}


// -----------------------------------------------------------------------------
// Rendering the case-nav menu links.
$page['navigation']['case-nav']  = '<nav class="case-nav"><ul class="menu">' . "\n";
$missing_link_text = 'Case title undefined';
foreach ($case_ids as $case) {
  // Rendering menu links.
  $link_data = array(
    'href' => '?case=' . escape_string($case, 'attrib_val'),
  );
  if (!empty($contents[$case]['title'])) {
    $link_data['text'] = escape_string($contents[$case]['title']);
  }
  else {
    $link_data['text'] = escape_string($missing_link_text);
  }
  if ($case == $request['case_id']) {
    $classes = array('active');
    array_walk($classes, 'escape_array_vals', 'attrib_val');
    $link_data['classes'] = ' class="' . implode(' ', $classes) . '"';
  }
  else {
    $link_data['classes'] = '';
  }
  _draw_case_nav_link($link_data, $page['navigation']['case-nav']);
}
unset($index, $frame_id, $frame_data, $classes);
$page['navigation']['case-nav']  .= '</ul></nav>' . "\n";


// -----------------------------------------------------------------------------
// Rendering the required set of frames and the frame-nav menu.
$page['regions']['content'] = '';
if (!empty($contents[$request['case_id']]['description'])) {
  $page['regions']['content'] .= '<div class="description description--case">'
    . escape_string($contents[$request['case_id']]['description'], 'html') . '</div>';
}
$missing_content = 'Main content undefined.';
$page['navigation']['frame-nav'] = '<nav class="frame-nav"><ul class="menu">' . "\n";
$index = 1;
foreach ($contents[$request['case_id']]['frames'] as $frame_id => $frame_data) {

  // Rendering a frame.
  $frame_classes = array('frame');
  $id            = escape_string($frame_id, 'attrib_val');
  $frame_title   = (!empty($frame_data['title'])) ? escape_string($frame_data['title']) : '';
  $description   = (!empty($frame_data['description'])) ? escape_string($frame_data['description'], 'html') : '';
  if (!empty($frame_data['content'])) {
    if ($frame_data['content']['type'] == 'image') {
      $frame_classes[] = 'frame-type--image';
      if (!empty($content_v)) {
        $content = '<img src="demo/frames/' . escape_string($frame_data['content']['markup'], 'file_name')
          . '?v=' . escape_string($content_v, 'attrib_val') . '" />';
      }
      else {
        $content = '<img src="demo/frames/'
          . escape_string($frame_data['content']['markup'], 'file_name') . '" />';
      }
    }
    elseif ($frame_data['content']['type'] == 'text') {
      $frame_classes[] = 'frame-type--text';
      $content = escape_string($frame_data['content']['markup'], 'html');
    }
  }
  else {
    $content = escape_string($missing_content);
  }

  // FIXME: this should be managed by an 'active' class, and some CSS.
  $visibility  = ' style="display: none"'; // Reset on each loop.
  if ($frame_id == $request['frame_id']) {
    $visibility = '';                      // The active one is visible.
  }

  ob_start();
  include('theme/templates/frame-template.php');
  $page['regions']['content'] .= ob_get_clean();

  // Rendering the corresponding frame-nav menu link.
  $link_data = array();
  $link_data['target'] = escape_string($frame_id, 'attrib_val');
  if (!empty($_GET['case'])) {
    $link_data['href'] = '?case='. escape_string($request['case_id'], 'href')
      . '&frame=' . escape_string($frame_id, 'attrib_val');
  }
  else {
    $link_data['href'] = '?frame=' . escape_string($frame_id, 'attrib_val');
  }
  if (!empty($frame_data['link-text'])) {
    $link_data['text'] = escape_string($frame_data['link-text']);
  }
  else {
    $link_data['text'] = escape_string($index);
  }
  if ($frame_id == $request['frame_id']) {
    $classes = array('active');
    array_walk($classes, 'escape_array_vals', 'attrib_val');
    $link_data['classes'] = ' class="' . implode(' ', $classes) . '"';
  }
  else {
    $link_data['classes'] = '';
  }
  _draw_frame_nav_link($link_data, $page['navigation']['frame-nav']);
  $index++;
}
unset($index, $frame_id, $frame_data, $classes);
$page['navigation']['frame-nav'] .= '</ul></nav>' . "\n";


// -----------------------------------------------------------------------------
// Rendering further global page elements.

// Preparing values for printing in the templates.
$page['printables']['page-title'] = escape_string($page['title']);


$page['regions']['header'] = array();
if (!empty($page['title'])) {
  $page['regions']['header'][] = '<h1 class="page__title">'
    . $page['printables']['page-title'] . '</h1>';
}
if (!empty($page['navigation']['case-nav'])) {
  $page['regions']['header'][] = $page['navigation']['case-nav'];
}
$page['regions']['header'] = implode("\n", $page['regions']['header']);


// -----------------------------------------------------------------------------
// Printing into page template.

require_once('theme/templates/page-template.php');

exit;
