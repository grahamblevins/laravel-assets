<?php namespace Blevins\Meta;

use Illuminate\Support\Facades\HTML;

class MetaBuilder {

	private $config;

	public function __construct(array $config) {

		$this->config = $config;
	}

	public function credits() {

		return HTML::comment('Bubuti, Version '.$this->config['version']);
	}

	public function charset() {

		return HTML::meta(array('charset' => $this->config['charset']));
	}

	public function pragmas() {

		$pragmas = '';

		foreach ($this->config['pragmas'] as $key => $val) {

			if (!empty($val))
				$pragmas .= HTML::meta(array('http-equiv' => $key, 'content' => $val));
		}

		return $pragmas;
	}

	public function properties() {

		$properties = '';

		foreach ($this->config['properties'] as $key => $val) {

			if (!empty($val))
				$properties .= HTML::meta(array('name' => $key, 'content' => $val));
		}

		return $properties;
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

	public function title() {

		return HTML::title($this->config['title']);
	}
}