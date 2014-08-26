var app = require('../../../app');

app.config([
	'$stateProvider',
	function($stateProvider) {
		var state = {
			name: 'main.holiday',
			url: 'holiday',
			data: {
				pageTitle: 'Manage Holidays'
			},
			resolve: {
				holidays: ['HolidaySrvc', function(HolidaySrvc) {
					var year = new Date().getFullYear();
					return HolidaySrvc.get(year);
				}]
			},
			templateUrl: '/app/components/main/holiday/template.html',
			controller: 'HolidayCtrl'
		};

		$stateProvider.state(state);
	}
]);