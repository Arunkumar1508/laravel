var app = angular.module('myApp', []);
app.controller('HomeController', function($scope,$http) {


var homeCtrl=this;

homeCtrl.openNav=()=> {
        document.getElementById("mySidenav").style.width = "250px";
      }

      homeCtrl.closeNav=()=> {
        document.getElementById("mySidenav").style.width = "0";
      }

      homeCtrl.approve=function(evt,$id){

        $http({
            method : "post",
            url : '/amazon/admim/approve/' + $id,
            data:{
                'id':$id,
            }
          }).then(function (response) {
            var change=response.data

            // change.map((val,x)=>{
                if(change ==1){
                    evt.target.innerHTML="disapprove";
                    evt.target.style.addClass="btn-danger";
                    evt.target.style.removeClass="btn-primary";

                }
                else{


                    evt.target.innerHTML="approve";
                    evt.target.style.addClass="btn-info";
                    evt.target.style.removeClass="btn-secondary";


                }

          }, function myError(response) {
            $scope.myWelcome = response.statusText;
          });

      }

    //   homeCtrl.disapprove=function($id){

    //     $http({
    //         method : "post",
    //         url : '/amazon/admim/disapprove/' + $id,
    //         data:{
    //             'id':$id,
    //         }
    //       }).then(function mySuccess(response) {
    //         $scope.myWelcome = response.data;
    //       }, function myError(response) {
    //         $scope.myWelcome = response.statusText;
    //       });

    //   }


// task

    //   homeCtrl.alldata=function(){
    //     $http({
    //         method :"GET",
    //         url :'/amazon/alldata'



    //       }).then(function (response) {
    //         vv=response.data
            // ae=vv.filter(function(e){
            //     if(e.product_name="oneplus"){
            //         return true
            //     }
            // })


    //         console.log(vv);

    //       })

    //   }








      homeCtrl.delete=function($id){
        $http({
            method : "delete",
            url : '/amazon/admim/delete/' + $id,
            data:{
                'id':$id,
            }
          }).then(function mySuccess(response) {
            $scope.myWelcome = response.data;
          }, function myError(response) {
            $scope.myWelcome = response.statusText;
          });

      }

    //   addtocart remove

    homeCtrl.remove=function(evn,$id){
        // alert();
    //   console.log($id);

         homeCtrl.id=$id;
        //  console.log( homeCtrl.id);
        $http({
            method : "post",
            url : '/amazon/remove',
            data:{
                'id':homeCtrl.id,
            }
          }).then(function (response) {

            evn.target.parentNode.parentNode. parentNode.style.display="none";

          }, function myError(response) {
            // $scope.myWelcome = response.statusText;
          });


    }






        homeCtrl.count=1;
      homeCtrl.addtoCart=function($id,userid){
        var count=homeCtrl.count++
        $http({
            method : "post",
            url : '/amazon/addtocart/id=' + $id+'/userid='+userid+'/count='+count,
            data:{
                'id':$id,
                'usersid':userid,
                'count':count
            }
          }).then(function mySuccess(response) {
            $scope.myWelcome = response.data;
          }, function myError(response) {
            $scope.myWelcome = response.statusText;
          });



      }

    //   console.log("afja");

    //   homeCtrl.add=function(evnt,quan){
    //     console.log(evnt,quan);
    //     $http({
    //         method : "post",
    //         url : '/amazon/add',
    //         data:{
    //             'quan':quan,
    //         }
    //       }).then(function (response) {
    //         // $scope.myWelcome = response.data;
    //         console.log('success');


    //         // evn.target.parentNode.parentNode. parentNode.style.display="none";

    //       }, function myError(response) {
    //         // $scope.myWelcome = response.statusText;
    //       });

    //   }








});
