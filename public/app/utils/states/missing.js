var app = require('../../app');

app.config([
	'$urlRouterProvider',
	function($urlRouterProvider) {
		$urlRouterProvider.otherwise('/');
	}
]);