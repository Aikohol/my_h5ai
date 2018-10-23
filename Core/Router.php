<?
namespace Core;

class Router {

  public static function get ($url) {
    $staticURL = explode('/', $url);
		$url = implode("/", $staticURL);
    if(isset($url)) {
			return $url;
		}
		else {
			return "400";
		}
  }
}
