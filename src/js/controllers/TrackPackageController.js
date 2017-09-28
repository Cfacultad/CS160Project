app.controller('TrackPackageController', ['$scope', 'data', function($scope, data) {
	$scope.fillBackgroundWithOpaqueWhite();
	$scope.title = data.title;
  $scope.message = data.message;
  $scope.views = data.views;
	$scope.iframeHeight = window.innerHeight;
	$scope.trackPackageStyle = {
		"margin-top" : "40px"
  };

  // $scope.initMap = function () {
  //       var uluru = {lat: -25.363, lng: 131.044};
  //       var map = new google.maps.Map(document.getElementById('map'), {
  //         zoom: 4,
  //         center: uluru
  //       });
  //       var marker = new google.maps.Marker({
  //         position: uluru,
  //         map: map
  //       });
  //     }











  $("#trackPackage").click(function(e) {
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
