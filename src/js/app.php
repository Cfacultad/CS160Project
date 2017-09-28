<script>//actually causes a crash if not commented out, here to make atom editor pretty
var app = angular.module("myApp", ["ngRoute"]);

app.config(function($routeProvider, $locationProvider) {


    $routeProvider
    .when("/", {
        templateUrl : "src/js/partials/home.html",
        controller : "HomeController"
    })
    .when("/shop", {
        templateUrl : "src/js/partials/shop.html",
        controller : "ShopController"
    })
    .when("/shoppingCart", {
        templateUrl : "src/js/partials/shoppingCart.html",
        controller : "ShoppingCartController"
    })
    .when("/checkOut", {
        templateUrl : "src/js/partials/checkOut.html",
        controller : "CheckOutController"
    })
    .when("/trackPackage", {
        templateUrl : "src/js/partials/trackPackage.html",
        controller : "TrackPackageController"
    })
    .otherwise({
        redirectTo: '/'
    });
});

app.value('data', <?php echo json_encode($this->data); ?>);
app.directive('resizable', function($window) {
        return function($scope) {
          $scope.initializeWindowSize = function() {
            $scope.windowHeight = $window.innerHeight;
            $scope.windowWidth  = $window.innerWidth;
          };
          angular.element($window).bind("resize", function() {
            $scope.initializeWindowSize();
            $scope.$apply();
          });
          $scope.initializeWindowSize();
        }
      });

app.directive('helloWorld', function(){
  return {
    template: 'Hello World'
  }
});

</script>
