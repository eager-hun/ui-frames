<?php
/**
 * @file
 * Demo content.
 */

$content_version = 1;

$page = array();
$page['title'] = 'Demo: Foo project, bar feature';

$images = array();

$images[1] = '<img src="demo/demo-frames/wireframe-1.png?v=' . $content_version . '" />';
$images[2] = '<img src="demo/demo-frames/wireframe-2.png?v=' . $content_version . '" />';
$images[3] = '<img src="demo/demo-frames/wireframe-3.png?v=' . $content_version . '" />';


$frames = array();

$frames['frame-1'] = array(
  'frame-title' => 'Initial state',
  'description' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum dignissim elementum suscipit. Proin consectetur sem at dui feugiat faucibus id in sem. Morbi sollicitudin nulla in quam dignissim porta.</p>'
    . '<p>Nunc sed placerat augue, at tincidunt urna. Vestibulum et malesuada velit. Vivamus porta tortor id malesuada vulputate.</p>',
  'content' => $images[1],
);
$frames['frame-2'] = array(
  'frame-title' => 'Intermediary step',
  'description' => '<p>Curabitur suscipit tempus enim, a sagittis felis laoreet vitae. In eu justo nibh. Integer eu tempor nisl, sed tincidunt augue. Sed non est ac dui tempor interdum. Vivamus ut vestibulum purus. Mauris orci mauris, commodo quis eros et, consectetur auctor nisi. Maecenas ut nulla eu orci accumsan rhoncus ac eu elit.</p>'
    . '<p>Interdum et malesuada fames ac ante ipsum primis in faucibus. Integer pharetra metus sed ultricies molestie. Maecenas tempus ligula sed placerat venenatis. Praesent sed placerat lacus. Proin lobortis ipsum id arcu pharetra porttitor. Vestibulum et interdum dolor, sed pulvinar eros. Nulla tempor facilisis nibh sed tincidunt. Aliquam id velit neque.</p>',
  'content' => $images[2],
);
$frames['frame-3'] = array(
  'frame-title' => 'Finish',
  'description' => '<p>Suspendisse vel magna et nibh imperdiet aliquam. Quisque eu accumsan quam. Proin ut urna imperdiet, imperdiet enim at, ultricies turpis. Curabitur vel ultricies ligula. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>',
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
