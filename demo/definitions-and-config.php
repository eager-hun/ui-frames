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
 * Map your content sructure.
 *
 * On the top level of the array are the cases' machine names (will be part of
 * the URL params), then each of these case definitions should have 'title' and
 * a set of 'frames'.
 * 
 * The frame details will be set a little bit more below in this file.
 */
$contents = array(
  'case-a' => array(
    'title' => 'Case Alpha',
    'frames' => array(
      'frame-1' => array(),
      'frame-2' => array(),
      'frame-3' => array(),
    ),
  ),
  'case-b' => array(
    'title' => 'Case Bravo',
    'frames' => array(
      'frame-1' => array(),
      'frame-2' => array(),
      'frame-3' => array(),
      'frame-4' => array(),
    ),
  ),
  'case-c' => array(
    'title' => 'Case Charlie',
    'frames' => array(
      'frame-1' => array(),
      'frame-2' => array(),
      'frame-3' => array(),
      'frame-4' => array(),
      'frame-5' => array(),
    ),
  ),
);


/**
 * There will be only one page title.
 *
 * It remains the same accross all case- and frame displays.
 */
$page['title'] = 'Demo: Foo project, bar feature';


/**
 * Define your images.
 *
 * Predefining images independently of frames will allow you to use the same
 * image for different frames - if the state they represent happen to occur
 * multiple times throughout the interaction sequence.
 */
$images['a1'] = '<img src="demo/frames/wireframe-a1.png?v=' . $content_v . '" />';
$images['a2'] = '<img src="demo/frames/wireframe-a2.png?v=' . $content_v . '" />';
$images['a3'] = '<img src="demo/frames/wireframe-a3.png?v=' . $content_v . '" />';

$images['b1'] = '<img src="demo/frames/wireframe-b1.png?v=' . $content_v . '" />';
$images['b2'] = '<img src="demo/frames/wireframe-b2.png?v=' . $content_v . '" />';
$images['b3'] = '<img src="demo/frames/wireframe-b3.png?v=' . $content_v . '" />';
$images['b4'] = '<img src="demo/frames/wireframe-b4.png?v=' . $content_v . '" />';

$images['c1'] = '<img src="demo/frames/wireframe-c1.png?v=' . $content_v . '" />';
$images['c2'] = '<img src="demo/frames/wireframe-c2.png?v=' . $content_v . '" />';
$images['c3'] = '<img src="demo/frames/wireframe-c3.png?v=' . $content_v . '" />';
$images['c4'] = '<img src="demo/frames/wireframe-c4.png?v=' . $content_v . '" />';
$images['c5'] = '<img src="demo/frames/wireframe-c5.png?v=' . $content_v . '" />';


/**
 * Define frames.
 *
 * Frames can have
 * - 'title'       (optional)
 * - 'description' (optional)
 * - 'content'     (optional) (but there's not much point in leaving it out)
 *     Typically a HTML <img> tag.
 * - 'link-text'   (optional)
 *     This may appear in the frame's corresponding menu link. If not supplied,
 *     the menu link will feature an automatically assigned order-number on it.
 *
 * NOTE: if neither 'title' and 'description' are supplied, the content column
 * gets wider, and the content (assumedly and image) will be aligned to the
 * center of the page.
 */

// -----------------------------------------------------------------------------
// Case Alpha.
$contents['case-a']['frames']['frame-1'] = array(
  'title' => 'Initial state',
  'description' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum dignissim elementum suscipit. Proin consectetur sem at dui feugiat faucibus id in sem. Morbi sollicitudin nulla in quam dignissim porta.</p>'
    . '<p>Nunc sed placerat augue, at tincidunt urna. Vestibulum et malesuada velit. Vivamus porta tortor id malesuada vulputate.</p>',
  'content' => $images['a1'],
);
$contents['case-a']['frames']['frame-2'] = array(
  'title' => 'Intermediary step',
  'description' => '<p>Curabitur suscipit tempus enim, a sagittis felis laoreet vitae. In eu justo nibh. Integer eu tempor nisl, sed tincidunt augue. Sed non est ac dui tempor interdum. Vivamus ut vestibulum purus. Mauris orci mauris, commodo quis eros et, consectetur auctor nisi. Maecenas ut nulla eu orci accumsan rhoncus ac eu elit.</p>'
    . '<p>Interdum et malesuada fames ac ante ipsum primis in faucibus. Integer pharetra metus sed ultricies molestie. Maecenas tempus ligula sed placerat venenatis. Praesent sed placerat lacus. Proin lobortis ipsum id arcu pharetra porttitor. Vestibulum et interdum dolor, sed pulvinar eros. Nulla tempor facilisis nibh sed tincidunt. Aliquam id velit neque.</p>',
  'content' => $images['a2'],
);
$contents['case-a']['frames']['frame-3'] = array(
  'title' => 'Finish',
  'description' => '<p>Suspendisse vel magna et nibh imperdiet aliquam. Quisque eu accumsan quam. Proin ut urna imperdiet, imperdiet enim at, ultricies turpis. Curabitur vel ultricies ligula. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>',
  'content' => $images['a3'],
);

// -----------------------------------------------------------------------------
// Case Bravo.
$contents['case-b']['frames']['frame-1'] = array(
  'title' => 'Initial state',
  'description' => '<p>Lorem ipsum dolor sit amet.</p>',
  'content' => $images['b1'],
  'link-text' => 'Arbitrary text here',
);
$contents['case-b']['frames']['frame-2'] = array(
  'title' => 'Some step',
  'description' => '<p>Aliquam id velit neque.</p>',
  'content' => $images['b2'],
);
$contents['case-b']['frames']['frame-3'] = array(
  'title' => 'Another state',
  'description' => '<p>Suspendisse vel magna et nibh imperdiet aliquam.</p>',
  'content' => $images['b3'],
);
$contents['case-b']['frames']['frame-4'] = array(
  'title' => 'Finish',
  'description' => '<p>Curabitur vel ultricies ligula.</p>',
  'content' => $images['b4'],
);


// -----------------------------------------------------------------------------
// Case Charlie.
$contents['case-c']['frames']['frame-1'] = array(
  'title' => 'Initial state',
  'description' => '<p>Curabitur suscipit tempus enim.</p>',
  'content' => $images['c1'],
);
$contents['case-c']['frames']['frame-2'] = array(
  'title' => 'After interaction',
  'description' => '<p>Vivamus ut vestibulum purus.</p>',
  'content' => $images['c2'],
);
$contents['case-c']['frames']['frame-3'] = array(
  'title' => 'Next step',
  'description' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>',
  'content' => $images['c3'],
);
$contents['case-c']['frames']['frame-4'] = array(
  'title' => 'Another state',
  'description' => '<p>Proin ut urna imperdiet, imperdiet enim at, ultricies turpis.</p>',
  'content' => $images['c4'],
);
$contents['case-c']['frames']['frame-5'] = array(
  'title' => 'Completed',
  'description' => '<p>Vestibulum et malesuada velit.</p>',
  'content' => $images['c5'],
);


/**
 * No more editing needed.
 */
