<?php namespace Blevins\Assets;

use Illuminate\Support\Facades\HTML;

class AssetsBuilder {

	private $config;

	public function __construct(array $config) {

		$this->config = $config;
	}

	public function scripts() {

		$scripts = '';

		foreach ($this->config['scripts'] as $src) {

			$scripts .= HTML::script($src);
		}

		return $scripts;
	}

	public function styles(array $media = array()) {

		$styles = array();

		if (empty($media)) {

			$styles = $this->config['styles'];
		}
		else {

			foreach ($media as $query) {
				
				$styles[$query] = array_get($this->config['styles'], $query);
			}
		}

		$markup = '';

		foreach (array_dot($styles) as $key => $href) {
			
			list($media) = explode('.', $key);
			
			$markup .= HTML::style($href, array('media' => $media));
		}

		return $markup;
	}
}