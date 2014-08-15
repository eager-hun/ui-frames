<?php
/**
 * @file
 * Demo content.
 */

$content_version = 1;

$page = array();
$page['title'] = 'Feature 1 demo';

$images = array();

$images[1] = '<img src="demo/demo-frames/wireframe-1.png?v=' . $content_version . '" />';
$images[2] = '<img src="demo/demo-frames/wireframe-2.png?v=' . $content_version . '" />';
$images[3] = '<img src="demo/demo-frames/wireframe-3.png?v=' . $content_version . '" />';


$frames = array();

$frames['frame-1'] = array(
  'frame-title' => 'Frame 1',
  'description' => '<p>Frame one description.</p>',
  'content' => $images[1],
);
$frames['frame-2'] = array(
  'frame-title' => 'Frame 2',
  'description' => '<p>Frame two description.</p>',
  'content' => $images[2],
);
$frames['frame-3'] = array(
  'frame-title' => 'Frame 3',
  'description' => '<p>Frame three description.</p>',
  'content' => $images[3],
);

$page['content'] = '';

foreach ($frames as $frame_id => $frame_data) {
  $id = $frame_id;
  $frame_title = (!empty($frame_data['frame-title'])) ? $frame_data['frame-title'] : '';
  $description = (!empty($frame_data['description'])) ? $frame_data['description'] : '';
  $content = (!empty($frame_data['content'])) ? $frame_data['content'] : '';

  $visibility = ' style="display: none"'; // Reset on each loop.
  if ($frame_id == $page_id) {
    $visibility   = '';
  }

  ob_start();
  include('demo/templates/frame-template.php');
  $page['content'] .= ob_get_clean();
}
unset($frame_id, $frame_data);
