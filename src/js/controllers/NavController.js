// https://www.youtube.com/watch?v=7Xu163MMzio
// remember that view.php has the script source
// remember that navigationElement.php has angular junk to add too
app.controller('NavController', ['$scope', '$location', function($scope, $location){

  $scope.isActive = function(destination){
    return destination === $location.path(); 
  }

}])
