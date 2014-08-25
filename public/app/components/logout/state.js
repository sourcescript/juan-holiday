var app = require('../../app');

app.config([
	'$stateProvider',
	function($stateProvider) {
		var state = {
			name: 'logout',
			url: '/logout',
			data: {
				pageTitle: 'Logout'
			},
			resolve: {
				logout: ['AuthSrvc', function(AuthSrvc) {
					AuthSrvc
						.logout
						.then(function() {
							$window.location.href = '/login';
						});
				}]
			}
		};

		$stateProvider.state(state);
	}
]);