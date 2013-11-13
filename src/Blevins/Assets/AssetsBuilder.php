<?php namespace Blevins\Assets;

use Illuminate\Support\Facades\HTML;

class AssetsBuilder {

	private $config;

	public function __construct(array $config) {

		$this->config = $config;
	}

	public function scripts() {

		$scripts = '';

		foreach ($this->config['scripts'] as $key => $src) {

			$scripts .= HTML::script($src);
		}

		return $scripts;
	}

	public function styles() {

		$styles = '';

		foreach ($this->config['styles'] as $key => $href) {

			$styles .= HTML::style($href);
		}

		return $styles;
	}
}