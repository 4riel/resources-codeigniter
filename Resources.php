<?php

/**
 * Resources Library v1.0
 * Librería creada por Eborio Linarez
 * Autocarga de hojas de estilos CSS y scripts JS y funciones jQuery
 * Fecha de Creacion: 06/07/2013
 */

class Resources {

	public $css_path = 'assets/css/';
	public $js_path = 'assets/js/';
	public $css = array();
	public $js = array();
	public $functions = array();

	function __construct($params = array()) {
		if (count($params) > 0) {
			$this->initialize($params);
		}
	}

	function initialize($params = array()) {
		$CI = & get_instance();
		$CI->load->helper('url');
		foreach ($params as $key => $val) {
			if (isset($this->$key)) {
				$this->$key = $val;
			}
		}
	}

	//Metodo para cargar hojas de estilo CSS
	function css() {
		$content = null;
		foreach ($this->css as $item) {
			$content .= '<link href="' . base_url() . $this->css_path . $item . '.css" rel="stylesheet">';
		}
		return $content;
	}

	//Metodo para cargar scripts JS
	function js() {
		$content = null;
		foreach ($this->js as $item) {
			$content .= '<script src="' . base_url() . $this->js_path . $item . '.js"></script>';
		}
		return $content;
	}

	//Metodo para cargar funciones JS
	function functions() {
		if (!empty($this->functions)) {
			$content = '<script>$(function() {';
			foreach ($this->functions as $item) {
				$content .= $item;
			}
			$content .= '});</script>';
			return $content;
		}
	}
}
