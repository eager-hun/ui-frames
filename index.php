<?php
/**
 * @file
 * Moderately simple scaffolding for demonstrating various sequences.
 */

if (function_exists('xdebug_disable')) {
  xdebug_disable();
}

require_once('app/app-settings.php');

require_once('app/app-init.php');

require_once($settings['content_source']);

require_once('app/app.php');
