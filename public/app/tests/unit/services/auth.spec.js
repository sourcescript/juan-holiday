describe('AuthSrvc', function() {
	beforeEach(module('app'));

	var srvc, $httpBackend, q, $rootScope;

	beforeEach(inject(function(_$httpBackend_, $q, _$rootScope_, AuthSrvc) {
		$httpBackend 	= _$httpBackend_;
		q 				= $q.defer();
		$rootScope 		= _$rootScope_;
		srvc 			= AuthSrvc;
	}));

	it("should have status set to false by default", function() {
		expect(srvc.status).toBeFalsy();
	});

	it("should have blank data by default", function() {
		expect(srvc.data).toEqual({});
	});

	describe("should have a function that checks if user is a guest", function() {
		it("should resolve if server returns a status with a value of true", function() {
			$httpBackend
				.expectGET('/api/v1/')
				.respond({
					status: true
				});

			srvc.guest()
				.then(function(res) {
					expect(res.data.status).toBeTruthy();
				});

			var promise = srvc.guest();

			$httpBackend.flush();
		});
	});

	// it("should be able to request to server if authenticated", function() {
	// 	//
	// });

	// it("should be able to request to server for data if authenticated", function() {
	// 	// 
	// })

	// it("should set data property to the return value of getData()", function() {

	// });

	// it("should resolve if getData() is successful", function() {

	// });

	// it("should not resolve if getData() failed", function() {

	// });
});