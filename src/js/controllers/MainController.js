app.controller('MainController', ['$scope', 'data', '$window', '$location', function($scope, data, $window, $location) {
	// $scope.screenWidth = window.screen.width; and $scope.screenHeight = window.screen.height;// stays constant throughout resize window
	$scope.title = data.title;
  $scope.message = data.message;
  $scope.views = data.views;
	$scope.aPath = $location.path();
	$scope.initialWidth = window.innerWidth;
	$scope.initialHeight = window.innerHeight;
	var navbarHeight = 52;
	$scope.degrees = $window.orientation; //this is needed! Orientation hasn't been set yet
	$scope.bootstrapCenterColumnStyle = {
    // "height" : $scope.windowHeight-52 + "px",//window.innerHeight-52 + "px",
    "overflow" : "scroll",
    "-webkit-overflow-scrolling" : "touch"
  };

	$scope.fillBackgroundWithOpaqueWhite = function() {
		//if home page, then have a clear background, otherwise fill center column with a bit of white.
		if($location.path() === "/"){
			$scope.bootstrapCenterColumnStyle["background-color"] = "rgba(255, 255, 255, 0.0)";
		}
		else{
			$scope.bootstrapCenterColumnStyle["background-color"] = "rgba(255, 255, 255, 0.7)";
		}
	}
	$scope.fillBackgroundWithOpaqueWhite();


	$scope.backgroundStyle = {
		"background-color" : "#c3f5f5"
	};

  // $scope.backgroundStyle = {
  //   background : "url('/src/pics/CIMG8680.JPG')",
  //   "background-position" : "top",
  //   "background-repeat" : "no-repeat",
  //   "background-attachment" : "fixed"
  // };

	$scope.initializeWindowSize = function() {
		$scope.windowHeight = $window.innerHeight;
		$scope.windowWidth  = $window.innerWidth;
		$scope.pixelRatio = window.devicePixelRatio;
		$scope.innerWidthNew = window.innerWidth;
		$scope.innerWidthRatio = $scope.initialWidth / $scope.innerWidthNew;
		//------------------------------------------------------------------------------
		//this is the way to do it for now
		if($scope.degrees == 90 || $scope.degrees == -90){
			$scope.bootstrapCenterColumnStyle["height"] = $scope.initialWidth - navbarHeight + "px";//window.screen.width - 52 + "px";
			// $scope.theDegree = 70;
		}
		else if($scope.degrees == 0){
			$scope.bootstrapCenterColumnStyle["height"] = $scope.initialHeight - navbarHeight + "px";//starwhale
			//$scope.browserHeight = $window.innerHeight + "px";
			// $scope.theDegree = 90;
		}
		else{
			$scope.bootstrapCenterColumnStyle["height"] = $window.innerHeight - navbarHeight + "px";
		}
	};

	angular.element($window).bind("resize", function() {
		$scope.initializeWindowSize();
		$scope.$apply();
	});
	$scope.initializeWindowSize();

//picture width by height is 1600 by 1200 so ratio is 1600/1200 = 4/3 = (1.3333)
// add (key, value) to JSON object $scope.backgroundStyle based on device window
	if($scope.degrees == null){
		if (window.screen.width / window.screen.height <= 4/3) { //vertical fill till no white //so if screen was a square for example, the width will be filled, but the height won't so fill the height, and let the width be filled automatically
			// $scope.backgroundStyle["background-size"] = "auto " + window.screen.height - 100 + "px";
		} else { // horizontal fill till no white
			// $scope.backgroundStyle["background-size"] = window.screen.width + "px" + " auto";
		}
	}

	$scope.getWindowOrientation = function () {
	    return $window.orientation;
	  };

  $scope.$watch($scope.getWindowOrientation, function (newValue, oldValue) {
    $scope.degrees = newValue;
		$scope.initializeWindowSize();
		//$scope.browserHeight = $window.innerHeight; //does change based on orientation unlike window.screen.height which stays constant
		if($scope.degrees == 90 || $scope.degrees == -90){
			if (window.screen.height / window.screen.width <= 4/3) { //vertical fill till no white //window.screen.height is actually the width now so window.screen.height by window.screen.width is the width by height. //yes height of screen is now the width since it is in 90 degree orientation or landscape orientation
		    // $scope.backgroundStyle["background-size"] =  "auto " + window.screen.width + "px"; // therefore fill the width of screen which is the height in this orientation, and let the width be filled automatically.
		  } else { // horizontal fill till no white //this is what the iPhone and most devices will have
		    // $scope.backgroundStyle["background-size"] = window.screen.height + "px" + " auto";
		  }
		}
		else if ($scope.degrees == 0){
			if (window.screen.width / window.screen.height <= 4/3) { //vertical fill till no white //iPhone is in portrait mode.
				// $scope.backgroundStyle["background-size"] = "auto " + window.screen.height + "px";
			} else { // horizontal fill till no white
				// $scope.backgroundStyle["background-size"] = window.screen.width + "px" + " auto";
			}
		}
  }, true);

  angular.element($window).bind('orientationchange', function () {
    $scope.$apply();
  });
}]);
