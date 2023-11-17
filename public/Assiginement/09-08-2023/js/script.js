var app = angular.module("myApp", ["ngRoute"])
.config(function($routeProvider){
    $routeProvider
    .when("/",{
         templateUrl:"pages/home.html",
         controller:"homeController"
    })
      .when("/courses",{
         templateUrl:"pages/courses.html",
         controller:"coursesController"
    })
      .when("/students",{
         templateUrl:"pages/student.html",
         controller:"studentsController"    
    })
})
.controller("homeController",function($scope){
    $scope.message = "Home Page";
})
.controller("coursesController",function($scope){
    $scope.courses = ["C#","SQL","Python","Java","C","Asp.net"];
})

app.controller("studentsController",function($scope,$http){
    $http.get("./js/students.json")   
    .then(function(response){
        $scope.content = response.data.students;
        // $log.info(response)
    },function(response){
        $scope.content="something went wrong"
        console.log(response)
    })
    // $scope.name="arun"
});