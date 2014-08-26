(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);var f=new Error("Cannot find module '"+o+"'");throw f.code="MODULE_NOT_FOUND",f}var l=n[o]={exports:{}};t[o][0].call(l.exports,function(e){var n=t[o][1][e];return s(n?n:e)},l,l.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
var

	app = require('./app');

	/**
	 * 
	 */
	utils = require('./components/utils'),

	/**
	 * 
	 */
	srvcs = require('./components/srvcs'),

	/**
	 * 
	 */
	dirs = require('./components/dirs'),
	
	/**
	 * 
	 */
	modules = require('./components/_modules'),

	/**
	 * 
	 */
	bootstrapper = require('./bootstrapper');
	bootstrapper();
},{"./app":2,"./bootstrapper":3,"./components/_modules":4,"./components/dirs":5,"./components/srvcs":13,"./components/utils":14}],2:[function(require,module,exports){
var app = angular.module('app', ['ui.router', 'ui.calendar']);

module.exports = app;
},{}],3:[function(require,module,exports){
/**
 * Initializes the app to the given module
 */
var bootstrapper = function() {
	try {
		angular.bootstrap(document, ['app']);
	} catch(e) {
		console.error(e.stack || e.message || e);
	}
}

module.exports = bootstrapper;
},{}],4:[function(require,module,exports){
var

	/**
	 * Login
	 */
	login_state = require('./login/state'),
	login_ctrl 	= require('./login/ctrl'),

	/**
	 * Logout
	 */
	logout_state = require('./logout/state'),

	/**
	 * Main
	 */
	main_state 	= require('./main/state'),

	/**
	 * 
	 */
	home_state = require('./main/home/state'),

	/**
	 * 
	 */
	holiday_ctrl  = require('./main/holiday/ctrl'),
	holiday_state = require('./main/holiday/state');
},{"./login/ctrl":6,"./login/state":7,"./logout/state":8,"./main/holiday/ctrl":9,"./main/holiday/state":10,"./main/home/state":11,"./main/state":12}],5:[function(require,module,exports){

},{}],6:[function(require,module,exports){
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
},{"../../app":2}],7:[function(require,module,exports){
var app = require('../../app');

app.config([
	'$stateProvider',
	function($stateProvider) {
		var state = {
			name: 'login',
			url: '/login',
			// resolve: {
			// 	guest: ['AuthSrvc', function(AuthSrvc) {
			// 		return AuthSrvc.guest();
			// 	}]
			// }
			templateUrl: '/app/components/login/template.html',
			data: {
				pageTitle: 'Login'
			},
			controller: 'LoginCtrl'
		};

		$stateProvider.state(state);
	}
]);
},{"../../app":2}],8:[function(require,module,exports){
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
},{"../../app":2}],9:[function(require,module,exports){
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
},{"../../../app":2}],10:[function(require,module,exports){
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
},{"../../../app":2}],11:[function(require,module,exports){
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
},{"../../../app":2}],12:[function(require,module,exports){
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
},{"../../app":2}],13:[function(require,module,exports){
var 

	auth	= require('../srvc/auth'),
	holiday = require('../srvc/holiday');
},{"../srvc/auth":15,"../srvc/holiday":16}],14:[function(require,module,exports){
var

	/**
	 * accessibility
	 */
	accessibility = require('../utils/accessibility'),

	/**
	 * location
	 */
	html5 = require('../utils/html5'),

	/**
	 * constants
	 */
	apiv1 = require('../utils/constants/apiv1'),

	/**
	 * states
	 */
	missing = require('../utils/states/missing');
},{"../utils/accessibility":17,"../utils/constants/apiv1":18,"../utils/html5":19,"../utils/states/missing":20}],15:[function(require,module,exports){
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
},{"../app":2}],16:[function(require,module,exports){
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
},{"../app":2}],17:[function(require,module,exports){
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
},{"../app":2}],18:[function(require,module,exports){
var app = require('../../app');

/**
 * API v1 route constantss
 * @type {String}
 */
app.constant('APIv1', (function() {
	/**
	 * Base URL
	 * @type {String}
	 */
	var base = window.location.origin + '/api/',

	/**
	 * API object
	 * @type {Object}
	 */
		api = {};

	/**
	 * auth
	 */
	api.auth = {};
	api.auth.base 	= base;
	api.auth.guest 	= base;
	api.auth.check 	= base;
	api.auth.data 	= base;

	/**
	 * 
	 */
	api.holiday = {};
	api.holiday.index = function(year) {
		return base + year;
	}

	return api;
})());
},{"../../app":2}],19:[function(require,module,exports){
var app = require('../app');

/**
 * Activate HTML 5 mode
 */
app.config([
	'$locationProvider',
	function($locationProvider) {
		$locationProvider.html5Mode(true);
	}
]);
},{"../app":2}],20:[function(require,module,exports){
var app = require('../../app');

app.config([
	'$urlRouterProvider',
	function($urlRouterProvider) {
		$urlRouterProvider.otherwise('/');
	}
]);
},{"../../app":2}]},{},[1]);
