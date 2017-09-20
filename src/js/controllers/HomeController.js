app.controller('HomeController', ['$scope', 'data', function($scope, data) {
	$scope.title = data.title;
  $scope.message = data.message;
  $scope.views = data.views;
	$scope.iframeHeight = window.innerHeight;

	$scope.centerColumnStyle = {
		"margin-top" : "40px"
  };

}]);
