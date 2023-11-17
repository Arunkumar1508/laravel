// alert("hii");
let hlo=document.getElementById("hlo")
let square=document.querySelector(".rectangle")
let generate=randomColor()
let way1=generate.textRGB
colorget=[];
 let emptyarray=[];

hlo.addEventListener("click",function(){
    generate=randomColor()
    color=generate.rgb
    way1=generate.textRGB
    square.style.background=color;
    var red=generate.red
  var green=generate.green
  var blue=generate.blue

 var obj={
RED:red,
GREEN:green,
BLUE:blue};

emptyarray.push(obj);
});



function randomColor(){
 var r = Math.floor(Math.random() * 256);
 var g = Math.floor(Math.random() * 256);
 var b = Math.floor(Math.random() * 256);
//  return "rgb(" + r + ", " + g + ", " + b + ")";

 let object1={
    'red':r,
    'green':g,
    'blue':b,
    'rgb':`rgb(${r},${g},${b})`,
    'textRGB':`red:${r},green:${g},blue:${b}`
 }
 return object1
 }
 
  




 let Add=document.querySelector(".Add");
 let Remove=document.querySelector(".Remove");
 let lis=document.querySelector("ul");

 Add.addEventListener("click",function(){
    colorget.unshift(way1);
 
     way();
 });

 function Addtodo(todo){
    var list=document.createElement("li");
    list.innerHTML=todo
    lis.prepend(list)      
} 

Remove.addEventListener("click",function(){
    colorget.shift();
    lis.removeChild(lis.firstElementChild)
 
 });

//  below..

let Add1=document.querySelector(".Add1");
 let Remove1=document.querySelector(".Remove1");
 

 Add1.addEventListener("click",function(){
    colorget.push(way1);
 
   way();
 });

 function Addtodo1(todo){
    var list=document.createElement("li");
    list.innerHTML=todo
    lis.appendChild(list)      
} 

Remove1.addEventListener("click",function(){
    colorget.pop();
    lis.removeChild(lis.lastElementChild)
 });

 let value1=document.querySelector(".pass1")
 let copy=document.querySelector(".copy")
 let move=document.querySelector(".move")
 copy.addEventListener("click",function(){
    let begin=document.getElementById("begin").value
    let end=document.getElementById("End").value
    let list2=document.createElement("li")
    let copy1=colorget.splice(begin,end)
   
    list2.innerHTML=copy1
    value1.appendChild(list2)

 })

 move.addEventListener("click",function(){
    let begin=document.getElementById("begin1").value
    let end=document.getElementById("End1").value
    let list2=document.createElement("li")
    let move1=colorget.splice(begin,end)
   
    list2.innerHTML=move1
 
    value1.appendChild(list2)
    way();
   
 });
 function way(){
   let varr="";
   colorget.forEach((element) => {
      var li=`<li>${element}</li>`
      varr+=li;
      console.log(varr);
      lis.innerHTML=varr;
   });
 }
///sort
 var redbtn=document.querySelector(".redbtn")
 var greenbtn=document.querySelector(".greenbtn");
 var bluebtn=document.querySelector(".bluebtn");
 //red
 redbtn.addEventListener("click",function(){
   var red1=emptyarray.sort(function(a, b){
      return a.RED - b.RED;
   });
   for(i=0;i<red1.length;i++){
      lis.removeChild(lis.firstElementChild);
   }
   red1.forEach((hii)=>{
      var back=document.createElement("li");
      back.innerHTML=JSON.stringify(hii);
      lis.appendChild(back);
   });

 });
//green
greenbtn.addEventListener("click",function(){
   var green1=emptyarray.sort(function(a, b){
      return a.GREEN - b.GREEN;
   });
   for(i=0;i<green1.length;i++){
      lis.removeChild(lis.firstElementChild);
   }
   green1.forEach((hii)=>{
      var back=document.createElement("li");
      back.innerHTML=JSON.stringify(hii);
      lis.appendChild(back);
   });
});
//blue
bluebtn.addEventListener("click",function(){
   var blue1=emptyarray.sort(function(a, b){
      return a.BLUE - b.BLUE;
   });
   for(i=0;i<blue1.length;i++){
      lis.removeChild(lis.firstElementChild);
   }
   blue1.forEach((hii)=>{
      var back=document.createElement("li");
      back.innerHTML=JSON.stringify(hii);
      lis.appendChild(back);
   });
});