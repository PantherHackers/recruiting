var myApp = angular.module('myApp', ['ngRoute']);

myApp.config(['$routeProvider', function ($routeProvider) {
	
	$routeProvider
		.when('/', {
			templateUrl: 'pages/home.html',
			controller: 'HomeController'
		})
		.when('/events', {
			templateUrl: 'pages/events.html',
			controller: 'EventsController'
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