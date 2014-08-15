<?php
/**
 * @file
 * Demo content.
 */


/**
 * This version will be added to content images as an uri param.
 *
 * By changing it, you can ensure that viewers' browsers download the most
 * recent version of them.
 */
$content_v = 1;


/**
 * Name your frames. Bear in mind that these will need to be URI GET params.
 */
$frame_ids = array(
  'frame-1',
  'frame-2',
  'frame-3',
);


/**
 * There will be only one page title, remains the same accross frame displays.
 */
$page['title'] = 'Demo: Foo project, bar feature';


/**
 * Define your images.
 *
 * Predefining images independently of frames will allow you to use the same
 * image for different frames - if the state they represent happen to occur
 * multiple times throughout the interaction sequence.
 */
$images[1] = '<img src="demo/frames/wireframe-1.png?v=' . $content_v . '" />';
$images[2] = '<img src="demo/frames/wireframe-2.png?v=' . $content_v . '" />';
$images[3] = '<img src="demo/frames/wireframe-3.png?v=' . $content_v . '" />';


/**
 * Define frames.
 *
 * Frames can have
 * - 'title'       (optional)
 * - 'description' (optional)
 * - 'content'     (mandatory)
 *     Typically a HTML <img> tag.
 * - 'link-text'   (optional)
 *     This may appear in the frame's corresponding menu link. If not supplied,
 *     the menu link will feature an automatically assigned order-number on it.
 *
 * NOTE: if neither 'title' and 'description' are supplied, the content column
 * gets wider, and the content (assumedly and image) will be aligned to the
 * center of the page.
 */
$frames['frame-1'] = array(
  'title' => 'Initial state',
  'description' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum dignissim elementum suscipit. Proin consectetur sem at dui feugiat faucibus id in sem. Morbi sollicitudin nulla in quam dignissim porta.</p>'
    . '<p>Nunc sed placerat augue, at tincidunt urna. Vestibulum et malesuada velit. Vivamus porta tortor id malesuada vulputate.</p>',
  'content' => $images[1],
);
$frames['frame-2'] = array(
  'title' => 'Intermediary step',
  'description' => '<p>Curabitur suscipit tempus enim, a sagittis felis laoreet vitae. In eu justo nibh. Integer eu tempor nisl, sed tincidunt augue. Sed non est ac dui tempor interdum. Vivamus ut vestibulum purus. Mauris orci mauris, commodo quis eros et, consectetur auctor nisi. Maecenas ut nulla eu orci accumsan rhoncus ac eu elit.</p>'
    . '<p>Interdum et malesuada fames ac ante ipsum primis in faucibus. Integer pharetra metus sed ultricies molestie. Maecenas tempus ligula sed placerat venenatis. Praesent sed placerat lacus. Proin lobortis ipsum id arcu pharetra porttitor. Vestibulum et interdum dolor, sed pulvinar eros. Nulla tempor facilisis nibh sed tincidunt. Aliquam id velit neque.</p>',
  'content' => $images[2],
);
$frames['frame-3'] = array(
  'title' => 'Finish',
  'description' => '<p>Suspendisse vel magna et nibh imperdiet aliquam. Quisque eu accumsan quam. Proin ut urna imperdiet, imperdiet enim at, ultricies turpis. Curabitur vel ultricies ligula. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>',
  'content' => $images[3],
  'link-text' => 'Arbitrary text here',
);


/**
 * That was it, enjoy your demo!
 */
