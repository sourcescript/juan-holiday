var app = require('../../../app');

app.config([
	'$stateProvider',
	function($stateProvider) {
		var state =  {
			name: 'main.home',
			url: '',
			templateUrl: '/app/components/main/home/template.html',
			data: {
				pageTitle: 'Dashboard'
			},
			// resolve: {
				
			// }
		};

		$stateProvider.state(state);
	}
]);