<?php
/**
 * @file
 * Content template.
 */

$frame_classes = array('frame');
if (!empty($frame_title) || !empty($frame_description)) {
  $sidebar = true;
  $frame_classes[] = 'frame--has-sidebar';
  $frame_classes[] = 'sidebar-right';
}
elseif (empty($frame_title) && empty($frame_description)) {
  $frame_classes[] = 'frame--no-sidebar';
}

?>
<div id="<?php print $frame_id; ?>" class="<?php print implode(' ', $frame_classes); ?>"<?php print $visibility; ?>>

  <?php if (!empty($sidebar)): ?>
    <div class="frame__meta condi-column">

      <?php if (!empty($frame_title)): ?>
        <h2 class="frame__title">
          <?php print $frame_title; ?>
        </h2>
      <?php endif; ?>

      <?php if (!empty($description)): ?>
        <div class="description">
          <?php print $description; ?>
        </div>
      <?php endif; ?>

    </div>
  <?php endif; ?>

  <?php if (!empty($content)): ?>
    <div class="frame__content condi-column">
      <?php print $content; ?>
    </div>
  <?php endif; ?>

</div>
