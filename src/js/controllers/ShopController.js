app.controller('ShopController', ['$scope', 'data', function($scope, data) {
	$scope.title = data.title;
  $scope.message = data.message;
  $scope.views = data.views;
	$scope.iframeHeight = window.innerHeight;

	$scope.shopStyle = {
		"margin-top" : "40px"
  };

	$("#shop").click(function(e) {
    e.preventDefault();
    $.ajax({
        type: "POST",
        url: "/database",
        data: {
            product: "lettuce", // < note use of 'this' here
            howMany: 4
        },
        success: function(result) {
            alert(result);
        },
        error: function(result) {
            alert('error');
        }
    });
});

}]);
