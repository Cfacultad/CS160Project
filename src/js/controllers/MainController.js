app.controller('MainController', ['$scope', 'data', '$window', '$location', function($scope, data, $window, $location) {
	// $scope.screenWidth = window.screen.width; and $scope.screenHeight = window.screen.height;// stays constant throughout resize window
	$scope.title = data.title;
  $scope.message = data.message;
  $scope.views = data.views;
	var navbarHeight = $("body.ng-scope").height(); // used Google Chrome Developer tools to see what css class I needed to call
	var windowSizeMinusNavbar = $window.innerHeight - navbarHeight;
	$scope.degrees = $window.orientation; //this is needed! Orientation hasn't been set yet
	$scope.bootstrapCenterColumnStyle = {};

// fills center column with an opaque white over the light teel background
	$scope.fillBackgroundWithOpaqueWhite = function() {
		//if home page, then have a clear background, otherwise fill center column with a bit of white.
		if($location.path() === "/"){
			$scope.bootstrapCenterColumnStyle["background-color"] = "rgba(255, 255, 255, 0.0)";
		}
		else{
			$scope.bootstrapCenterColumnStyle["background-color"] = "rgba(255, 255, 255, 0.7)";
		}
	}
// call the above function
	$scope.fillBackgroundWithOpaqueWhite();

// set background to a light teel color
	$scope.backgroundStyle = {
		"background-color" : "#c3f5f5"
	};

	$scope.initializeWindowSize = function() {
		if($scope.degrees == 90 || $scope.degrees == -90){
			windowSizeMinusNavbar = window.screen.width - navbarHeight;
		}
		// if it switches back to portrait from landscape orientation, it needs to update
		else if($scope.degrees == 0){
			windowSizeMinusNavbar = $window.innerHeight; // made it bigger here due to iPhone navigation taking up space and made it feel kludgy
		}
		else{
			windowSizeMinusNavbar = $window.innerHeight - navbarHeight;
		}
		$("#mainCenterColumn").css("min-height", windowSizeMinusNavbar);
		$("#mainCenterColumn").css("height", "auto");
	};

	angular.element($window).bind("resize", function() {
		$scope.initializeWindowSize();
		$scope.$apply();
	});
	$scope.initializeWindowSize();

	$scope.getWindowOrientation = function () {
	    return $window.orientation;
	  };

  $scope.$watch($scope.getWindowOrientation, function (newValue, oldValue) {
    $scope.degrees = newValue;
		$scope.initializeWindowSize();
  }, true);

  angular.element($window).bind('orientationchange', function () {
    $scope.$apply();
  });

// Bootstrap's collapse on link request for multipage applications, so this must be added here for nav bar to collapse on mobile devices
	$(document).ready(function () {
	  $(".navbar-nav li a").click(function(event) {
	    $(".navbar-collapse").collapse('hide');
	  });
	});

}]);
