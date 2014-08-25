var app = require('../../app');

app.config([
	'$stateProvider',
	function($stateProvider) {
		var state = {
			name: 'login',
			url: '/login',
			// resolve: {
			// 	guest: ['AuthSrvc', function(AuthSrvc) {
			// 		return AuthSrvc.guest();
			// 	}]
			// }
			templateUrl: '/app/components/login/template.html',
			data: {
				pageTitle: 'Login'
			},
			controller: 'LoginCtrl'
		};

		$stateProvider.state(state);
	}
]);