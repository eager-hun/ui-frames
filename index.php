<?php
/**
 * @file
 * Simple scaffolding for demo purposes.
 */

if (function_exists('xdebug_disable')) {
  xdebug_disable();
}

// #############################################################################
// Global setup.

$page_ids = array(
  'frame-1',
  'frame-2',
  'frame-3',
);

// demo-specific assets, e.g. footable.js, footable.css.
// $demo_css = '<link href="demo/demo-assets/demo.css" rel="stylesheet" type="text/css">'. "\n";
// $demo_js  = '<script src="demo/demo-assets/demo.js"></script>' . "\n";


// -----------------------------------------------------------------------------
// Request analisys.

$page_id = 'frame-1';
if (!empty($_GET['frame'])) {
  $requested_page = $_GET['frame'];
  $index = array_search($requested_page, $page_ids);
  if ($index !== false) {
    $page_id = $page_ids[$index];
  }
}

// -----------------------------------------------------------------------------
// Contents.
include('demo/demo-assets/demo-content.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?php print $page['title']; ?></title>
  <!-- link href="theme/styles-static/normalize.css" media="all" rel="stylesheet" -->
  <link href="theme/css/styles.css" media="all" rel="stylesheet">
  <!-- link href="theme/styles-static/static.css" media="all" rel="stylesheet" -->

  <?php if (!empty($demo_css)): ?>
    <?php print $demo_css . "\n"; ?>
  <?php endif; ?>

  <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
</head>
<body>
  <div id="page">

    <header id="header" class="stripe stripe--header">
      <div class="page-center">
        <h1 class="page__title"><?php print $page['title']; ?></h1>
      </div><!-- /.page-center -->
    </header>

    <div id="main" class="stripe stripe--main">
      <div class="page-center">
        <?php print $page['content']; ?>
      </div>
    </div>

    <div id="footer_push"></div>
  </div><!-- /#page -->

  <footer id="footer" class="stripe stripe--footer footer-nav">
    <div class="page-center">

      <?php
        ob_start();
        include('demo/demo-assets/demo-nav.php');
        $navigation = ob_get_clean();
        print $navigation;
      ?>

    </div>
  </footer>

  <!-- Script-time. -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.js"></script>
  <script src="theme/js/template.js"></script>

  <?php if (!empty($demo_js)): ?>
    <?php print $demo_js; ?>
  <?php endif; ?>

</body>
</html>
