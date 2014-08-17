<?php
/**
 * @file
 * Definitions of content.
 *
 * Follow/mimic the presented patterns.
 */


/**
 * This version will be added to content images as an uri param.
 *
 * By changing it, you can ensure that viewers' browsers download the most
 * recent version of them.
 */
$content_v = 1;


/**
 * Global page title.
 *
 * It remains the same accross all case- and frame displays.
 */
$page['title'] = 'Demo: Foo project, bar feature';


/**
 * Map your content sructure.
 *
 * On the top level of the array are the cases' machine names (will be part of
 * the URL params), then each of these case definitions should have 'title' and
 * a set of 'frames'.
 *
 * NOTE: the top level of the $contents array should only contain case
 * identifiers, nothing else.
 *
 * The frames and their details will be set a little bit more below in this
 * file.
 */
$contents = array(
  'case-a' => array(
    'title' => 'Case Alpha',
    'frames' => array(),
  ),
  'case-b' => array(
    'title' => 'Case Bravo',
    'frames' => array(),
  ),
  'case-c' => array(
    'title' => 'Case Charlie',
    'frames' => array(),
  ),
);
$contents['case-a']['description'] = <<< EOT
<p>Case Alpha description.</p>
EOT;
$contents['case-b']['description'] = <<< EOT
<p>Case Bravo description.</p>
EOT;
$contents['case-c']['description'] = <<< EOT
<p>Case Charlie description.</p>
EOT;

/**
 * Define your images.
 *
 * Predefining images independently of frames will allow you to use the same
 * image for different frames - if the state they represent happen to occur
 * multiple times throughout the interaction sequence.
 *
 * Images should be placed into the 'frames' subdirectory. Grouping images into
 * further subdirectories in there is currently discouraged, since the app is
 * not yet that smart to handle it.
 *
 * NOTE: only one image will be presented at each frame.
 */
$images['a1'] = 'wireframe-a1.png';
$images['a2'] = 'wireframe-a2.png';
$images['a3'] = 'wireframe-a3.png';

$images['b1'] = 'wireframe-b1.png';
$images['b2'] = 'wireframe-b2.png';
$images['b3'] = 'wireframe-b3.png';
$images['b4'] = 'wireframe-b4.png';

$images['c1'] = 'wireframe-c1.png';
$images['c2'] = 'wireframe-c2.png';
$images['c3'] = 'wireframe-c3.png';
$images['c4'] = 'wireframe-c4.png';
$images['c5'] = 'wireframe-c5.png';


/**
 * Define frames.
 *
 * Frames can have
 * - 'title'       (optional)
 * - 'content'     (mandatory)
 *     One of the $images array's items is expected here - that you defined
 *     above in the "Define your images" section.
 * - 'link-text'   (optional)
 *     This may appear in the frame's corresponding menu link. If not supplied,
 *     the menu link will feature an automatically assigned order-number on it.
 * - 'description' (optional)
 *     HTML tags may be used here, also the php 'heredoc' syntax.
 *     @see http://php.net/manual/en/language.types.string.php#language.types.string.syntax.heredoc
 *
 * NOTE: if neither 'title' and 'description' are supplied, the content column
 * gets wider, and the content (assumedly and image) will be aligned to the
 * center of the page.
 */


// -----------------------------------------------------------------------------
// Case Alpha.
$contents['case-a']['frames']['frame-1'] = array(
  'title' => 'Initial state',
  'content' => $images['a1'],
);
$contents['case-a']['frames']['frame-1']['description'] = <<< EOT
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum dignissim elementum suscipit. Proin consectetur sem at dui feugiat faucibus id in sem. Morbi sollicitudin nulla in quam dignissim porta.</p>

<p>Nunc sed placerat augue, at tincidunt urna. Vestibulum et malesuada velit. Vivamus porta tortor id malesuada vulputate.</p>
EOT;

$contents['case-a']['frames']['frame-2'] = array(
  'title' => 'Intermediary step',
  'content' => $images['a2'],
);
$contents['case-a']['frames']['frame-2']['description'] = <<< EOT
<p>Curabitur suscipit tempus enim, a sagittis felis laoreet vitae. In eu justo nibh. Integer eu tempor nisl, sed tincidunt augue. Sed non est ac dui tempor interdum. Vivamus ut vestibulum purus. Mauris orci mauris, commodo quis eros et, consectetur auctor nisi. Maecenas ut nulla eu orci accumsan rhoncus ac eu elit.</p>
<p>Interdum et malesuada fames ac ante ipsum primis in faucibus. Integer pharetra metus sed ultricies molestie. Maecenas tempus ligula sed placerat venenatis. Praesent sed placerat lacus. Proin lobortis ipsum id arcu pharetra porttitor. Vestibulum et interdum dolor, sed pulvinar eros. Nulla tempor facilisis nibh sed tincidunt. Aliquam id velit neque.</p>
EOT;

$contents['case-a']['frames']['frame-3'] = array(
  'title' => 'Finish',
  'content' => $images['a3'],
);
$contents['case-a']['frames']['frame-3']['description'] = <<< EOT
<p>Suspendisse vel magna et nibh imperdiet aliquam. Quisque eu accumsan quam. Proin ut urna imperdiet, imperdiet enim at, ultricies turpis. Curabitur vel ultricies ligula. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
EOT;


// -----------------------------------------------------------------------------
// Case Bravo.
$contents['case-b']['frames']['frame-1'] = array(
  'title' => 'Initial state',
  'content' => $images['b1'],
);
$contents['case-b']['frames']['frame-1']['description'] = <<< EOT
<p>Lorem ipsum dolor sit amet.</p>
EOT;

$contents['case-b']['frames']['frame-2'] = array(
  'title' => 'Some step',
  'content' => $images['b2'],
);
$contents['case-b']['frames']['frame-2']['description'] = <<< EOT
<p>Aliquam id velit neque.</p>
EOT;

$contents['case-b']['frames']['frame-3'] = array(
  'title' => 'Another state',
  'content' => $images['b3'],
);
$contents['case-b']['frames']['frame-3']['description'] = <<< EOT
<p>Suspendisse vel magna et nibh imperdiet aliquam.</p>
EOT;

$contents['case-b']['frames']['frame-4'] = array(
  'title' => 'Finish',
  'content' => $images['b4'],
);
$contents['case-b']['frames']['frame-4']['description'] = <<< EOT
<p>Curabitur vel ultricies ligula.</p>
EOT;


// -----------------------------------------------------------------------------
// Case Charlie.
$contents['case-c']['frames']['frame-1'] = array(
  'title' => 'Initial state',
  'content' => $images['c1'],
  'link-text' => 'Arbitrary text here',
);
$contents['case-c']['frames']['frame-1']['description'] = <<< EOT
<p>Curabitur suscipit tempus enim.</p>
EOT;

$contents['case-c']['frames']['frame-2'] = array(
  'title' => 'After interaction',
  'content' => $images['c2'],
);
$contents['case-c']['frames']['frame-2']['description'] = <<< EOT
<p>Vivamus ut vestibulum purus.</p>
EOT;

$contents['case-c']['frames']['frame-3'] = array(
  'title' => 'Next step',
  'content' => $images['c3'],
);
$contents['case-c']['frames']['frame-3']['description'] = <<< EOT
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
EOT;

$contents['case-c']['frames']['frame-4'] = array(
  'title' => 'Another state',
  'content' => $images['c4'],
);
$contents['case-c']['frames']['frame-4']['description'] = <<< EOT
<p>Proin ut urna imperdiet, imperdiet enim at, ultricies turpis.</p>
EOT;

$contents['case-c']['frames']['frame-5'] = array(
  'title' => 'Completed',
  'content' => $images['c5'],
);
$contents['case-c']['frames']['frame-5']['description'] = <<< EOT
<p>Vestibulum et malesuada velit.</p>
EOT;

/**
 * No more editing needed here, all the content is now defined.
 */
