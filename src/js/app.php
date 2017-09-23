<script>//actually causes a crash if not commented out, here to make atom editor pretty
var app = angular.module("myApp", ["ngRoute"]);

app.config(function($routeProvider, $locationProvider) {


    $routeProvider
    .when("/", {
        templateUrl : "src/js/partials/home.html"
    })
    .when("/shop", {
        templateUrl : "src/js/partials/shop.html"
    })
    .when("/shoppingCart", {
        templateUrl : "src/js/partials/shoppingCart.html"
    })
    .when("/checkOut", {
        templateUrl : "src/js/partials/checkOut.html"
    })
    .otherwise({
        redirectTo: '/home'
    });
});

// app.config(['$routeProvider', '$locationProvider', function config($routeProvider, $locationProvider) {
//     $locationProvider.hashPrefix('')
//     $routeProvider
//     .when("/", {
//         templateUrl : "src/js/partials/home.html"
//     })
//     .when("/shop", {
//         templateUrl : "shop.html"
//     })
//     .when("/shoppingCart", {
//         templateUrl : "shoppingCart.html"
//     })
//     .when("/checkOut", {
//         templateUrl : "checkOut.html"
//     })
//     .otherwise({
//         redirectTo: '/home'
//     });
// }]);




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

// app.config(['$locationProvider', '$httpProvider', function($locationProvider, $httpProvider) {
//     $locationProvider.html5Mode({
//       enabled: true,
//       requireBase: true
//     });
//     // $locationProvider.html5Mode(true);
//     //$httpProvider.defaults.withCredentials = true; // once requests are working, delete this and in app.config too, until it works keep this
// }]);

//console.log(obj);
</script>
