// alert("helloo");
// var firstname=prompt("what is your firstname");
// var lastname=prompt("what is your lastname");
// var age=promt("what is your age?");
// console.log("your firstname " + firstname + lastname);
// console.log("your age is" + age);
// console.log("your age is"  + age );

// var age=prompt("enter the age");
// var days=age * 365;
// alert(age + " years in rough " + days + "days" );


// var count = -10;
// while (count <20){
//     console.log(count);
//     count++;
// }

// let person={
//     name:"Arun",
//     age:23,
//     gender:"Male"
// }
// console.log(person)

// function colors(){
// let fav=["red","white"];
// console.log(fav);
// }
// let d= colors()
// console.log(d)

// for( var i=0;i<16;i+=8){
//     console.log(i);
// }
// var str="sdwdjslfvjf";
// for(var i=1;i<str.length;i+=2    ){
//     console.log(str[i]);
// }
// function square(x){
//    return x * x;
// console.log(4)
// }
// function test(x,y){
//     return y-x;
// }
// test (4,40);

// function even(num){
//     if(num % 2 ===0)
//     return true;
//     else  
//     return false

// }


// function printreverse(arr){
//     for(var i=arr.length-1;i>=0;i--){
//         console.log(arr[i])
//     }
// }
// printreverse([3,6,9,5]);

// var dogs={
//     name:"karnisha",
//     breed:"Female",
//     type:"street dog",
//     age:"100"
// }

// var dog =["karnisha","kundu amma","aunty"];
// var lady={
//     name:"Aunty",
//     city:"Thanjavur"
// }


// var h1 = document.querySelector("h1");
// h1.style.color ="red";

// var body = document.querySelector("body");
// var isblue= false;
// setInterval(function(){
// if (isblue){
//     body.style.background = "white";
// }
// else{
//     body.style.background ="aqua ";
// }
//         isblue=!isblue;

//     },1000);
    

    // var item = document.getElementById("highlight");
    // var items= document.getElementById("bold")
    // var tags = document.getElementsByTagName("li")
    // var bold = document.querySelectorAll(".bold");

    // var h1= document.getElementsByTagName("h1")
     
    // var p=document.querySelector("p")
    // p.style.color="red";
    // p.style.background="pink"
    // p.style.border="2px solid black"


// var h1=document.querySelector("h1")
//   h1.classList.add("big")


//   var p= document.querySelector("p")
// //   p.textContent = "Lorem ipsum, dolor sit iam going to office amet consectetur adipisicing elit.cats are very good pet";
//   p.innerHTML

//   document.querySelector("h1").textContent ="BYE EVERYONE HERE THANKYOU!"

//  var a= document.querySelector("a")
//  a.textContent="click the text"

// var button= document.querySelector("button");
// var a=document.querySelector("a");
// button.addEventListener("click",function(){
//     a.setAttribute("href","https://www.google.com");
// });

// var button1=document.querySelector(".jii");
// var p=document.querySelector(".hi");
// button1.addEventListener("click",function(){
//     p.textContent = "AND IAM LIVING IN CHENNAI";
// });


// var button1=document.querySelector(".jii");
// var istext=false
// button1.addEventListener("click",function(){
// if(istext){
//     document.textContent="AND IAM LIVING IN CHENNAI";
// }else{
//     document.textContent="AND IAM LIVING IN bangalore";
// }
// istext =!istext
// });

// var button2=document.querySelector(".li");
// var isaqua=false
// button2.addEventListener("click",function(){
// if(isaqua){
//     document.body.style.background ="white";
// }else{
//     document.body.style.background ="aqua";
// }
// isaqua = !isaqua;
// });


  var p1button=document.querySelector("#p1");
  var p2button=document.querySelector("#p2");
  var Reset=document.querySelector("#Reset");
  var p1display=document.querySelector("#p1display");
  var p2display=document.querySelector("#p2display");
  var numberinput=document.querySelector("input");
  var p=document.querySelector("p");
  var winningscoredisplay=document.querySelector("p span");
  var p1score=0;
  var p2score=0;
  var gameover=false;
  var winningscore=5;
    p1button.addEventListener("click",function(){
        if(!gameover){
            p1score++;
           
            if(p1score===winningscore){
                p1display.classList.add('winner')
                gameover=true;
            }
        }
    
 
    p1display.textContent=p1score;
    });
    p2button.addEventListener("click",function(){
        if(!gameover){
            p2score++;
        }
        if(p2score===winningscore){
            p2display.classList.add('winner')
            gameover=true;
        }
     
        p2display.textContent=p2score;
        });
        Reset.addEventListener("click",function(){
            p1score=0;
            p2score=0;
            p1display.textContent=0;
            p2display.textContent=0;
            p1display.classList.remove("winner");
            p2display.classList.remove("winner");
            gameover=false;
        });

        numberinput.addEventListener("change",function(){
        winningscoredisplay.textContent = numberinput.value;
        winningscore = Number(numberinput.value);

        });



    
    