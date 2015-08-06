var myApp = angular.module('myApp', ['ngRoute']);

myApp.config(['$routeProvider', function ($routeProvider) {
	
	$routeProvider
		.when('/events', {
			templateUrl: './events.html',
			controller: 'EventsController'
		})
		// .when('/', {
		// 	templateUrl: 'home.html',
		// 	controller: 'HomeController'
		// })
		.otherwise({
			redirectTo: '/'
		});

}]);

myApp.controller('EventsController', ['$scope', function ($scope) {
	
}]);

myApp.controller('HomeController', ['$scope', function ($scope) {
	
}]);