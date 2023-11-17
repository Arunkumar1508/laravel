var app = angular.module("myApp", ["ngRoute"])
.config(function($routeProvider){
    $routeProvider
    .when("/",{
       templateUrl:"login.html",
       controller:"loginController"
  })
  .when("/show",{
    templateUrl:"show.html",
     controller:"showController"
})
.when("/book",{
    templateUrl:"book.html",
    //  controller:"bookController"
})
 
})
app.service("Newdata",function(){
    this.data=[{id:0,Username:"arun",Password:"123"}]
    this.movielist=[{
        movie:"Mission Impossible",
        time:"12:00 PM",
        tickets:"5"
    },
    {
        movie:"Intersteller",
        time:"1:00 PM",
        tickets:"3"

    },{
        movie:"Money Hiest",
        time:"4:00 PM",
        tickets:"5"

    }
]
this.pack=[{
    item:"Coke",
    rate:70,
    num:0
},
{
    item:"Water Bottle",
    rate:40,
    num:0

},
{
    item:"Pop corn",
    rate:200,
    num:0

},
{
    item:"Chicken Buff",
    rate:90,
    num:0
}
]

})
app.controller("loginController",function($scope,Newdata,$location){
$scope.login=function(){
    $scope.login1=true
    $scope.signIn1=false
}
$scope.signIn=function(){
    $scope.login1=false
    $scope.signIn1=true
}
    
    $scope.Register=function(){
       $location.path("/show") 
    // }
        // alert("ksafg")
        $scope.way=Newdata.data
        console.log($scope.way)
        $scope.way.forEach((con)=>{
            console.log(con)
            if(con.Username==$scope.Username && con.Password==$scope.Password){
                console.log("correct")
                $location.path("/show")
            }
            else{
                console.log("wrong")
                $scope.Password="Wrong password"
            }    
        })
    }

    $scope.SignIn11=function(){
        $location.path("/show")

    }

})
// show page

app.controller("showController",function($scope,Newdata){
    $scope.movie1=Newdata.movielist
    $scope.items=Newdata.pack
    var you=$scope.items
 
    

        $scope.show2=function(){
            $scope.show1=true
            $scope.Bevarage1=false
            
        }
        $scope.Bevarage=function(){

             $scope.Bevarage1=true
        $scope.show1=false
       
          }

          $scope.select=function(){
            $scope.show1=true
            $scope.Bevarage1=false
            $scope.movie12=true
          }

          $scope.num1=function(){
            var teddy=0
            var teddy1=0
            for(i=0;i<you.length;i++){
                teddy=you[i].num * you[i].rate
                teddy1=teddy1+teddy
            }
          
            $scope.num2=teddy1
            
          }

          $scope.book=function(x){
    
            $scope.uu=x
            $scope.movie12=true
          }

          $scope.ticketrate=200
          var aa=$scope.quantityticket
        
})




