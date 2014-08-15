<?php
/**
 * @file
 * Demo navigation.
 */

$link_defs = array();

// -----------------------------------------------------------------------------
// EDIT LINK DEFINITIONS.

$link_defs['frame-1'] = array(
  'param' => 'frame-1',
  'text' => '1',
);
$link_defs['frame-2'] = array(
  'param' => 'frame-2',
  'text' => '2',
);
$link_defs['frame-3'] = array(
  'param' => 'frame-3',
  'text' => '3',
);

// EDITING END.
// -----------------------------------------------------------------------------

function _draw_menu_link($link_opts, &$output) {
  $output .= '<li><a data-target-frame="' . $link_opts['param'] . '" href="?frame='
    . $link_opts['param'] . '" ' . $link_opts['classes'] . '>'
    . $link_opts['text'] . '</a></li>';
}

$links = '';

foreach ($link_defs as $link_id => $link_data) {
  if ($link_id == $page_id) {
    $classes = array('active');
    $link_data['classes'] = ' class="' . implode(' ', $classes) . '"';
  }
  else {
    $link_data['classes'] = '';
  }
  _draw_menu_link($link_data, $links);
}
unset($link_id, $link_data);

?>

<nav>
  <ul class="main-menu">
    <?php print $links; ?>
  </ul>
</nav>
