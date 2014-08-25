var app = require('../../app');

app.controller('LoginCtrl', [
	'$scope',
	'$window',
	'AuthSrvc',
	function($scope, AuthSrvc) {
		// Error variables
		$scope.attemptError = false;
		$scope.processError = false;

		// Form data
		$scope.formData = {};

		$scope.attempt = function(data) {
			// Reset error variables to default
			$scope.attemptError = false;
			$scope.processError = false;

			// Attempt login
			AuthSrvc
				.attempt(data)
				.then(function(res) {
					if(res.data.status) {
						return attemptSuccess();
					}

					attemptError();
				}, function() {
					processError();
				});
		}

		attemptSuccess = function() {
			$window.location.href = '/panel/';
		}

		attemptError = function() {
			$scope.attemptError = true;
		}

		processError = function(){
			$scope.proccessError = true;
		}
	}
]);