<?php
/**
 * @file
 * Simple scaffolding for demo purposes.
 */

if (function_exists('xdebug_disable')) {
  xdebug_disable();
}

$pages = array();
$frames = array();
$images = array();
$page = array();

include('demo/definitions-and-config.php');

// -----------------------------------------------------------------------------
// Request analisys.

$page_id = 'frame-1';
if (!empty($_GET['frame'])) {
  $requested_page = $_GET['frame'];
  $index = array_search($requested_page, $frame_ids);
  if ($index !== false) {
    $page_id = $frame_ids[$index];
  }
}

// -----------------------------------------------------------------------------
// Response compiler.

function _draw_menu_link($link_opts, &$output) {
  $output .= '<li><a data-target-frame="' . $link_opts['target'] . '" href="?frame='
    . $link_opts['target'] . '" ' . $link_opts['classes'] . '>'
    . $link_opts['text'] . '</a></li>';
}

$page['content'] = '';
$page['navigation'] = '<nav><ul class="main-menu">';

$index = 1;
foreach ($frames as $frame_id => $frame_data) {
  // Rendering frames.
  $id          = $frame_id;
  $frame_title = (!empty($frame_data['title'])) ? $frame_data['title'] : '';
  $description = (!empty($frame_data['description'])) ? $frame_data['description'] : '';
  $content     = (!empty($frame_data['content'])) ? $frame_data['content'] : '';

  $visibility  = ' style="display: none"'; // Reset on each loop.
  if ($frame_id == $page_id) {
    $visibility   = '';                    // The active one is visible.
  }

  ob_start();
  include('theme/templates/frame-template.php');
  $page['content'] .= ob_get_clean();

  // Rendering menu links.
  $link_data = array(
    'target' => $frame_id,
  );
  $link_data['text'] = (!empty($frame_data['link-text'])) ? $frame_data['link-text'] : $index;
  if ($frame_id == $page_id) {
    $classes = array('active');
    $link_data['classes'] = ' class="' . implode(' ', $classes) . '"';
  }
  else {
    $link_data['classes'] = '';
  }
  _draw_menu_link($link_data, $page['navigation']);
  $index++;
}
unset($frame_id, $frame_data);

$page['navigation'] .= '</ul></nav>';


// -----------------------------------------------------------------------------
// Printing into page template.

include('theme/templates/page-template.php');

exit;
