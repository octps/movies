<?

require_once(dirname(__FILE__) . "/../Model/Existence.php");
require_once(dirname(__FILE__) . "/./common.php");
require_once(dirname(__FILE__) . "/./sessionCheck.php");

class existence {
	public static function user ($session) {
		//get Model
		// $user = ['me'=>true,'you'=>true];
		$user = Model_Existence::user($session->userId);

		if ($user === false) {
			header("location: /");
		}

		require_once(dirname(__FILE__) . "/../Template/User.php");


		// $url = $_SERVER["REQUEST_URI"];
		// $access = ltrim($url, '/');

		// if (isset($user[$access])) {
		//   require_once(dirname(__FILE__) . "/../Template/User.php");
		//   return;
		// }

		// require_once(dirname(__FILE__) . "/../Template/404.php");
	}
}

existence::user($session);