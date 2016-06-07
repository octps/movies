<?

require_once(dirname(__FILE__) . "/../Model/Existence.php");
require_once(dirname(__FILE__) . "/./common.php");
require_once(dirname(__FILE__) . "/./sessionCheck.php");
require_once(dirname(__FILE__) . "/./router.php");

class existence {
	public static function user ($session) {
		$user = Model_Existence::user($session->userId);

		if ($user === false) {
			header("location: /");
			return;
		}
		$path = router::userCheck($user);
		require_once(dirname(__FILE__) . "/../Template" . $path . ".php");
		// if ($path === '/user') {
		// 	require_once(dirname(__FILE__) . "/../Template/User.php");
		// 	return;
		// }

	}
}

existence::user($session);