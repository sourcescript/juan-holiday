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