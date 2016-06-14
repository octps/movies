<?

require_once(dirname(__FILE__) . "/../Model/Existence.php");
require_once(dirname(__FILE__) . "/./common.php");
require_once(dirname(__FILE__) . "/./sessionCheck.php");
require_once(dirname(__FILE__) . "/./router.php");

class existence {
	public static function user ($uri) {
		$uri = ltrim($uri, '/');
		$user = Model_Existence::user($uri);
		// $user = Model_Existence::user($session->userId);
		if ($user === false) {
			header("location: /");
			return;
		}
		$path = router::userCheck($user);

		if (file_exists(dirname(__FILE__) . "/../Template" . $path . ".php") === false) {
			require_once(dirname(__FILE__) . "/../Template/404.php");
			return;
		}	
		require_once(dirname(__FILE__) . "/../Template" . $path . ".php");
		// if ($path === '/user') {
		// 	require_once(dirname(__FILE__) . "/../Template/User.php");
		// 	return;
		// }

	}
}

$uri = $_SERVER["REQUEST_URI"];
existence::user($uri);