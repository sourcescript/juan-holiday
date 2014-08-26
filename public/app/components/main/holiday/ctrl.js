var app = require('../../../app');

app.controller('HolidayCtrl', [
	'$scope',
	'HolidaySrvc',
	function($scope, HolidaySrvc) {
		$scope.holidays = HolidaySrvc.data;

		// ui-calendar config | object
		$scope.calendar = {
			config: {
				height: 450,
				editable: true,
				header: {

				},
				dayClick: $scope.alertEventOnClick,
				eventDrop: $scope.alertOnDrop,
				eventResize: $scope.alertOnResize
			}
		};
	}
]);