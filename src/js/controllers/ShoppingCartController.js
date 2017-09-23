app.controller('ShoppingCartController', ['$scope', 'data', function($scope, data) {
	$scope.title = data.title;
  $scope.message = data.message;
  $scope.views = data.views;
	$scope.iframeHeight = window.innerHeight;

	$scope.shoppingCartStyle = {
		"margin-top" : "40px"
  };

	$("#shoppingCart").click(function(e) {
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
