var app = require('../app');

/**
 * Activate HTML 5 mode
 */
app.config([
	'$locationProvider',
	function($locationProvider) {
		$locationProvider.html5Mode(true);
	}
]);