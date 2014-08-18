<?php
/**
 * @file
 * Page template.
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?php print $page['title']; ?></title>
  <!-- link href="theme/styles-static/normalize.css" media="all" rel="stylesheet" -->
  <link href="theme/css/styles.css" media="all" rel="stylesheet">
  <link href="theme/styles-static/static.css" media="all" rel="stylesheet">

  <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
</head>
<body>
  <div id="page">

    <header id="header" class="stripe stripe--header">
      <div class="page-center">
        <?php if(!empty($page['regions']['header'])): ?>
          <?php print $page['regions']['header']; ?>
        <?php endif; ?>
      </div><!-- /.page-center -->
    </header>

    <div id="main" class="stripe stripe--main">
      <div class="page-center">
        <?php if(!empty($page['regions']['content'])): ?>
          <?php print $page['regions']['content']; ?>
        <?php endif; ?>
      </div>
    </div>

    <div id="footer_push"></div>
  </div><!-- /#page -->

  <footer id="footer" class="stripe stripe--footer footer-nav">
    <div class="page-center">
      <?php print $page['navigation']['frame-nav']; ?>
    </div>
  </footer>

  <!-- Script-time. -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.js"></script>
  <script src="theme/js/template.js"></script>
</body>
</html>
