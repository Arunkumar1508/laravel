// alert("helo");
var app = angular.module("myApp", []);
// filter("gender",function(){
//     return function(gender){
//         switch(gender){
//             case 1:
//                 return "Male";
//                 case 2:
//                     return "FeMale";   
//         }
//     }
// })
app.controller("myCtrl", function($scope) {
    $scope.firstName = "John";
    $scope.lastName = "Doe";
});


// var myApp=angular.module("myModule",[]);

app.controller("myconrtoler",function($scope){
    var msg="Angular js module"
    $scope.message=msg
})


app.controller("mycontroller",function($scope){
var employee={
    name:"arun",
    age:"23",
    place:"kallakurichi",
    image:"/image/download.jpg"
};
$scope.employee=employee;
})


app.controller("myconrtoler",function($scope){
    var msg1="Angular"
    $scope.message1=msg1
})


// ng-repeat
app.controller("mycontroller",function($scope){
    var employees=[
        {firstName:"Ben",lastName:"10",gender:"male",salary:1000},
        {firstName:"Dora",lastName:"cat",gender:"Female",salary:2000},
        {firstName:"Power",lastName:"Ranger",gender:"male",salary:3000},
        {firstName:"Dore",lastName:"Mon",gender:"male",salary:4000},
        {firstName:"Jackie",lastName:"Jan",gender:"male",salary:5000},

    ];
    $scope.employees=employees;
});


// ng-repeat nested repeat

app.controller("mycontrollers",function($scope){
    var countries=[
        {
            name:"UK",
            cities:[
                {name:"Londan"},
                {name:"Manchester"},
                {name:"Birmingham"}
            ]
        },
        {
            name:"USA",
            cities:[
                {name:"Los Angles"},
                {name:"Chicago"},
                {name:"Houston"}
            ]
        },
        {
            name:"INDIA",
            cities:[
                {name:"Chennai"},
                {name:"Mumbai"},
                {name:"Delhi"}
            ]
        },
    ];
    $scope.countries=countries;
});

// sort column
app.controller("mycontrollerss",function($scope){
    var employees2=[
        {Name:"Ben",DOB:"23-01-2000",Gender:"male",salary:1000},
        {Name:"Dora",DOB:"18-07-2022",Gender:"Female",salary:2000},
        {Name:"Power",DOB:"07-07-1968",Gender:"male",salary:3000},
        {Name:"Dore",DOB:"14-02-2001",Gender:"male",salary:4000},
        

    ];
    $scope.employees2=employees2;
    $scope.sortColumn="Name";
});


// search filter

app.controller("mycontrolleerss",function($scope){
    var employees3=[
        {Name:"Ben",DOB:"23-01-2000",Gender:"male",salary:1000},
        {Name:"Dora",DOB:"18-07-2022",Gender:"Female",salary:2000},
        {Name:"Power",DOB:"07-07-1968",Gender:"male",salary:3000},
        {Name:"Dore",DOB:"14-02-2001",Gender:"male",salary:4000},
        {Name:"Julie",DOB:"10-07-2005",Gender:"Female",salary:5000},
        {Name:"Tom",DOB:"10-09-2003",Gender:"male",salary:6000},
        {Name:"Jerry",DOB:"10-08-2009",Gender:"male",salary:7000},
        

    ];
    $scope.employees3=employees3;
});


// custom filter



app.controller("mycontrollss",function($scope){
    var students=[
        {Name:"Ben",DOB:"23-01-2000",Gender:"1",salary:1000},
        {Name:"Dora",DOB:"18-07-2022",Gender:"2",salary:2000},
        {Name:"Power",DOB:"07-07-1968",Gender:"1",salary:3000},
        {Name:"Dore",DOB:"14-02-2001",Gender:"2",salary:4000},
        

    ];
    $scope.students=students;
   
});

// https request

app.controller("myscontrollss",function($scope,$http,$log){
    $http.get("./js/students.json")   
    .then(function(response){
        $scope.content = response.data.students;
        $log.info(response)
    },function(response){
        $scope.content="something went wrong"
    })
});

// custom services

app.controller("my1qcontrollss",function($scope){
$scope.transformstring=function(input){
    if(!input){
        return input;
    }
    var output="";
    for(var i=0; i<input.length; i++){
         if(i>0 && input[i] == input[i].toUpperCase()){
            output=output +" ";
         }   
         output=output+input[i];
    }
    $scope.output=output;
}

})

// creating own service

app.service('arun',function(){
    this.myFunc = function(a){
        return a * 2;
    }
    
});
app.controller('my1qcontrollss',function($scope,arun){
    $scope.val = arun.myFunc(6);
});

// location path


