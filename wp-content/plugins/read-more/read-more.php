<?php
/**
 * Plugin Name: Read More
 * Description: The best Read More Plugin.
 * Version: 1.1.2
 * Author: Adam Skaat
 * Author URI: 
 * License: GPLv2
 */

if(!defined('ABSPATH')) {
	exit();
}

require_once(dirname(__FILE__).'/config/boot.php');
require_once(YRM_CLASSES.'ReadMoreInit.php');

$readMoreObj = new ReadMoreInit();