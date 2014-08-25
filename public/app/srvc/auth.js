var app = require('../app');

app.factory('AuthSrvc', [
	'$q',
	'$http',
	'APIv1',
	function($q, $http, APIv1) {
		var srvc = {
			status: false,
			
			data: {},

			check: function() {
				var q 			= $q.defer(),
					url			= APIv1.auth.check,
					request		= $http.get(url);

				request
					.success( (function(_this) {
						return function(res) {
							_this.status = res.status;
							q.resolve();
						}
					})(this) )
					.error(function() {
						q.reject();
					});

				return q.promise;
			},

			guest: function() {
				var q 			= $q.defer(),
					url			= APIv1.auth.guest,
					request		= $http.get(url);

				request
					.success( (function(_this) {
						return function(res) {
							_this.status = res.status;
							q.resolve();
						}
					})(this) )
					.error(function() {
						q.reject();
					});

				return q.promise;
			},

			attempt: function(data) {

			},

			logout: function() {
				var url		= APIv1.auth.logout,
					request = $http.get(url);

				return request;
			},

			getUser: function() {
				var q 			= $q.defer(),
					url			= APIv1.auth.data,
					request		= $http.get(url);

				request
					.success( (function(_this) {
						return function(res) {
							_this.status = res.status;
							q.resolve();
						}
					})(this) )
					.error(function() {
						q.reject();
					});

				return q.promise;
			}
		};

		return srvc;
	}
]);