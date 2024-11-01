<?php
/*
Plugin Name: Step Index For Relevanssi
Plugin URI: https://wordpress.org/plugins/step-index-for-relevanssi/
Description: Automatically reindex in steps for big indexes on relevanssi
Version: 1.0.1
Author: James Low
Author URI: http://jameslow.com
License: MIT License
*/

class RelevanssiStepIndex {
	static $_plugin = null;
	public function plugin() {
		return self::$_plugin ? self::$_plugin : self::$_plugin = plugins_url(null,__FILE__);
	}
	public static function add_hooks() {
		add_action('admin_init', array(RelevanssiStepIndex, 'register_cssjs'));
		add_action('admin_enqueue_scripts', array(RelevanssiStepIndex, 'include_cssjs'));
	}
	public static function register_cssjs() {
		wp_register_script('step-index-for-relevanssi', self::plugin().'/step-index.js');
	}
	public static function include_cssjs() {
		if ($_GET['page'] == 'relevanssi/relevanssi.php') {
			wp_enqueue_script('step-index-for-relevanssi');
		}
	}
}
RelevanssiStepIndex::add_hooks();