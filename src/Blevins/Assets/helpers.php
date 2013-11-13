<?php

if (!function_exists('assets')) {
	
	function assets() {

		$assets = app('blevins.assets');

		return $assets->styles() . $assets->scripts();
	}
}