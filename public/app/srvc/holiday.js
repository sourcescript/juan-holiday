var app = require('../app');

app.factory('HolidaySrvc', [
	'$q',
	'$http',
	'$window',
	'APIv1',
	function($q, $http, $window, APIv1) {
		var service = {
			/**
			 * Array of dates
			 * @type {Array}
			 */
			data: [],

			/**
			 * Fetches all holidays with the given year
			 * @return {$q} {promise}
			 */
			get: function(year) {
				var q 		= $q.defer(),
					// url 	= $window.location.origin + '/api/' + year,
					url 	= APIv1.holiday.index(year),
					request = $http.get(url);
					
				request
					.success( (function(_this) {
						return function(res) {
							_this.data.push(res);
							q.resolve();
						};
					})(this) )
					.error(function() {
						// q.reject();
					});

				return q.promise;
			}
		};

		return service;
	}
]);