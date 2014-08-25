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
	ctrls = require('./components/ctrls'),

	/**
	 * 
	 */
	modules = require('./components/_modules'),

	/**
	 * 
	 */
	bootstrapper = require('./bootstrapper');
	bootstrapper();
},{"./app":2,"./bootstrapper":3,"./components/_modules":4,"./components/ctrls":5,"./components/dirs":6,"./components/srvcs":12,"./components/utils":13}],2:[function(require,module,exports){
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
	home_state = require('./main/home/state');
},{"./login/ctrl":7,"./login/state":8,"./logout/state":9,"./main/home/state":10,"./main/state":11}],5:[function(require,module,exports){

},{}],6:[function(require,module,exports){
module.exports=require(5)
},{}],7:[function(require,module,exports){
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
},{"../../app":2}],8:[function(require,module,exports){
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
},{"../../app":2}],9:[function(require,module,exports){
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
},{"../../app":2}],10:[function(require,module,exports){
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
},{"../../../app":2}],11:[function(require,module,exports){
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
},{"../../app":2}],12:[function(require,module,exports){
var 

	auth	= require('../srvc/auth');
},{"../srvc/auth":14}],13:[function(require,module,exports){
var

	/**
	 * accessibility
	 */
	accessibility = require('../utils/accessibility'),

	/**
	 * constants
	 */
	apiv1 = require('../utils/constants/apiv1'),

	/**
	 * states
	 */
	missing = require('../utils/states/missing');
},{"../utils/accessibility":15,"../utils/constants/apiv1":16,"../utils/states/missing":17}],14:[function(require,module,exports){
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
},{"../app":2}],15:[function(require,module,exports){
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
},{"../app":2}],16:[function(require,module,exports){
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
	var base = '/api/v1/',

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

	return api;
}()));
},{"../../app":2}],17:[function(require,module,exports){
var app = require('../../app');

app.config([
	'$urlRouterProvider',
	function($urlRouterProvider) {
		$urlRouterProvider.otherwise('/');
	}
]);
},{"../../app":2}]},{},[1]);
