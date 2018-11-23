<?php
class ReactJS {
	private $component, $data = null, $v8, $errorHandler;
	function __construct($param = array()) {
		$react        = array();
		$react[]      = "var console = {warn: function(){}, error: print};";
		$react[]      = "var global = global || this, self = self || this, window = window || this;";
		$react[]      = "var React = global.React, ReactDOM = global.ReactDOM, ReactDOMServer = global.ReactDOMServer;";
		$react[]      = ';';
		$react        = array_merge($react, $param);
		$concatenated = implode(";\n", $react);
		$this->v8     = new V8Js();
		$this->executeJS($concatenated);
	}
	function setComponent($component, $data = null) {
		$this->component = $component;
		$this->data      = json_encode($data);
		return $this;
	}
	function setErrorHandler($err) {
		$this->errorHandler = $err;
		return $this;
	}
	function getMarkup() {
		$js = sprintf("print(ReactDOMServer.renderToString(React.createElement(%s, %s)))", $this->component, $this->data);
		return $this->executeJS($js);
	}
	function getJS($where, $return_var = null) {
		if (substr($where, 0, 1) === '#') {
			$where = sprintf('document.getElementById("%s")', substr($where, 1));
		}
		return ($return_var ? "var $return_var = " : "") . sprintf("ReactDOM.render(React.createElement(%s, %s), %s);", $this->component, $this->data, $where);
	}
	private function executeJS($js) {
		try {
			ob_start();
			return ob_get_clean();
		}
		catch (V8JsException $e) {
			if ($this->errorHandler) {
				call_user_func($this->errorHandler, $e);
			} else {
				echo "<pre>";
				echo $e->getMessage();
				echo "</pre>";
				die();
			}
		}
	}
}