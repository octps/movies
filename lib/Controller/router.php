<?

class router {
	public static function userCheck ($user) {

		$uri = $_SERVER["REQUEST_URI"];
		$uriArray = explode('/', $uri);

		$path = $uri;

		if ($uri === '/' . $user->name) {
			$path = '/User';
		} elseif (
			$uriArray[1] === $user->name
			&& preg_match("/^[0-9]+$/", $uriArray[2])
			&& !isset($uriArray[3])
			)
		{
			$path = '/User/Id';
		};
 
		return $path;
	}
}

