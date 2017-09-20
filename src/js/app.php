<script>//actually causes a crash if not commented out, here to make atom editor pretty
var app = angular.module("myApp", []);
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

app.config(['$locationProvider', '$httpProvider', function($locationProvider, $httpProvider) {
    $locationProvider.html5Mode({
      enabled: true,
      requireBase: true
    });
    //$httpProvider.defaults.withCredentials = true; // once requests are working, delete this and in app.config too, until it works keep this
}]);

//console.log(obj);
</script>
