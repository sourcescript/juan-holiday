var app = require('../../../app');

app.config([
	'$stateProvider',
	function($stateProvider) {
		var state = {
			name: 'main.holiday',
			url: '/holiday',
			data: {
				pageTitle: 'Manage Holidays'
			},
			abstract: true,
			// resolve: {

			// }
			templateUrl: '/app/components/main/holiday/template.html'
		};

		$stateProvider.state(state);
	}
]);