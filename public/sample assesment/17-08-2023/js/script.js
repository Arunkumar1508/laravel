var app = angular.module("myApp", ["ngRoute"])
.config(function($routeProvider){
    $routeProvider
    .when("/",{
         templateUrl:"signup.html",
         controller:"signupController"
    })
      .when("/login",{
         templateUrl:"login.html",
         controller:"loginController"
    })
      .when("/page2",{
         templateUrl:"page2.html",
         controller:"page2Controller"
    })
    .when("/page3",{
        templateUrl:"page3.html",
        // controller:"page3Controller"
   })
})

app.service("Newdata",function(){
this.data=[{id:1,username:"arun",upiId:123456,friends:[],userAmount:8000}]
this.id=1
})

app.controller("signupController",function($scope,Newdata){
    $scope.regData=function(){
        $scope.unique=Newdata.id++
        $scope.username
        $scope.phonenumber
        Newdata.data.push({id:$scope.unique,username:$scope.userName,upiId:$scope.upi,phonenumber:$scope.phonenumber,account:$scope.account,userAmount:60000,
        friends:[]})
        console.log(Newdata.data)
    }
    $scope.upii=function(){
        $scope.upi=Math.floor(1000000+ Math.random()*7000000)
        // alert("huh")

    }
    $scope.ranAcc=function(){
        $scope.account=Math.floor(100000000000+ Math.random()*700000000000)  
    }
    $scope.num=function(){
        $scope.number=Math.floor(9000000000+ Math.random()*1000000000)  
    }
   
})

app.controller("loginController",function($scope,Newdata,$location){
    $scope.data1=function(){
        // $scope.userName
        // $scope.upi
        $scope.way= Newdata.data
       $scope.way.forEach((con)=>{
            console.log(con)
            if(con.username==$scope.dd && con.upiId == $scope.upi){
                console.log("correct")
                $location.path("/page2")
                
                // Newdata.userName=con.username
            }
            else{
                console.log("wrong")
                $scope.password="password wrong"
            }
        })
    }
})
app.controller("page2Controller",function($scope ,Newdata){
    $scope.name=Newdata.sendname;

    $scope.Friends=function(){
        $scope.Emp=Newdata.data
      console.log($scope.Emp)
    }
})