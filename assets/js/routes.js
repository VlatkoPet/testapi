app.config(function($routeProvider) {
  $routeProvider
  .when("/main", {
    templateUrl : "view/main.html"
  })
  .when("/employee", {
    templateUrl : "view/employee.html"
  })
  .when("/details_employee/", {
    templateUrl : "view/details_employee.html"
  })
  .when("/details_employee/:id", {
    templateUrl : "view/details_employee.html"
  })
});