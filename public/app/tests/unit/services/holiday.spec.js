describe('HolidaySrvc', function() {
	beforeEach(module('app'));

	var $q, $httpBackend, srvc;
	beforeEach(inject(_$q_, $_httpBackend_, HolidaySrvc) {
		$q = _$q_;
		$httpBackend = $_httpBackend_;
		srvc = HolidaySrvc;
	});

	it("should have empty dates by default", function() {
		expect(srvc.data.length).toBe(0);
	});

	it("should be able to request to server for dates and resolve", function() {
		$httpBackend.expectGET('/api/2014')
			.respond([
				{
					"name": "Labor Day",
					"start": "2014-05-01",
					"end": "2014-05-01",
					"type": "regular"
				}
			]);

		$httpBackend.flush();
	});
});