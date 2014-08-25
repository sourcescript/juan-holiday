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