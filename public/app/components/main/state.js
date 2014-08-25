var app = require('../../app');

app.config([
	'$stateProvider',
	function($stateProvider) {
		var state = {
			name: 'main',
			abstract: true,
			url: '/',
			templateUrl: '/app/components/main/template.html'
		};

		$stateProvider.state(state);
	}
]);