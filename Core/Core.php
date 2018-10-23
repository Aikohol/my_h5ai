<?php

namespace Core;

class Core {
	public function run() {

		include_once 'Router.php';
		include_once './Core/UrlController.php';

		$url = substr($_SERVER['REQUEST_URI'], strlen(BASE_URI));
		$path = Router::get($url);

		$call = new UrlController($path);
		$call->scan_dir();
	}
}
?>
