var myApp = angular.module('myApp', ['ngRoute']);

myApp.config(['$routeProvider', function ($routeProvider) {
	
	$routeProvider
		.when('/events', {
			templateUrl: './events.html',
			controller: 'EventsController'
		})
		.when('/', {
			templateUrl: './home.html',
			controller: 'HomeController'
		})
		.otherwise({
			redirectTo: '/'
		});

}]);

myApp.controller('MainController', ['$scope', '$location', '$log', function ($scope, $location, $log) {
	// if ($location.path() === '/') {
		
	// 	$scope.headerClass = 'hidden';
	// }
	// $scope.path = $location.path();
	
	$scope.isHome = function () {
		
		return $location.path() === '/';
	}
}]);

myApp.controller('EventsController', ['$scope', function ($scope) {
	
}]);

myApp.controller('HomeController', ['$scope', function ($scope) {
	
}]);