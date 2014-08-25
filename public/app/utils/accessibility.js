var app = require('../app');

app.run([
	'$state',
	'$stateParams',
	'$rootScope',
	function($state, $stateParams, $rootScope) {
		$rootScope.$state = $state;
		$rootScope.$stateParams = $stateParams;
	}
]);