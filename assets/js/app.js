var app = angular.module('myApp', ["ngRoute"]);
app.controller('myCtrl',['$scope', '$http', '$routeParams', function($scope, $http, $routeParams) {
/*************************************************************************************************************************/
/*												Get JSON from model/showJSON.php 										 */
/* 						location: root/model/show_json.php																 */
/*************************************************************************************************************************/
$scope.employee = [];
$http.get("model/showJSON.php ").then(function (response) {$scope.employee = response.data.records;});

$scope.check_url=$routeParams.id;
}]);