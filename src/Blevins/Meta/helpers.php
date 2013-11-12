<?php

if (!function_exists('meta')) {
	
	function meta() {

		$meta = app('blevins.meta');

		return $meta->credits() . $meta->title() . $meta->charset() . $meta->pragmas() . $meta->properties()  . $meta->styles() . $meta->scripts();
	}
}