<?php
/**
 * @file
 * Include this file to register an spl_autoload for these classes.
 */

// Define a shortcut constant for DIRECTORY_SEPARATOR
if (!defined('DS')) define('DS', DIRECTORY_SEPARATOR);

function sai_autoload($class) {
  if (strpos($class, 'SAI_') !== 0) return; // Not a SAI-class.

  $subclass = substr($class, 4);
  $filename = dirname(__FILE__) . DS . 'lib' . DS . str_replace('_', DS, $subclass) . '.php';

  if (file_exists($filename)) require_once($filename);
}

spl_autoload_register('sai_autoload');

