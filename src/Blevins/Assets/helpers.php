<?php

if (!function_exists('assets')) {
	
	function assets() {

		return app('blevins.assets');
	}
}

if (!function_exists('scripts')) {
	
	function scripts() {

		return $assets()->scripts();
	}
}

if (!function_exists('styles')) {
	
	function styles() {

		return $assets()->styles();;
	}
}