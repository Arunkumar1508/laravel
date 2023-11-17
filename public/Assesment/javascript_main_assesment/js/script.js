var inputtext=document.querySelector(".inputtext")
var inputdate=document.querySelector(".inputdate")
var plus=document.querySelector("#plus")
var arrow=document.querySelector("#arrow")
var submit=document.querySelector("#submit")
var erase=document.querySelector("#erase")
var search=document.querySelector("#search")
var text=document.querySelector("#text")
var text1=document.querySelector("#text1")
var text2=document.querySelector("#text2")
var text3=document.querySelector("#text3")
var lis=document.querySelector("li")
// var oldTask1=document.querySelector(".oldTask1")
// var edit=document.querySelector(".edit")
array=[];
plus.addEventListener("click",function(){
inputtext.focus();
});

arrow.addEventListener("click",function(){
location.reload();
});
search.addEventListener("click",function(){
inputdate.style.display="none";
submit.style.display="none";
erase.style.display="none";
inputtext.style.width="450px";


});
 submit.addEventListener("click",function(){
//  text.innerHTML=inputtext.value
//  text1.innerHTML=inputdate.value
 array.push({inputtext:inputtext.value,inputdate:inputdate.value})
 add();
 filter()
 });
 function add(){
    let varr="";
    array.forEach((element,ai ) => {
    var li=`<div class="flex"><li>${element.inputtext}</li><li>${element.inputdate}</li><button id="edit" >edit</button> <button onclick=remove(${ai})>delete</button></div>`
    varr+=li;
    console.log(varr);
    lis.innerHTML=varr;
    })
 }  
function remove(ai){
   array.splice(ai,1)
   add()
}
// remove.addEventListener("click",function(){
  
// });
// function remove(){
//    var list1=document.querySelector(".inputtext");
//    list1.remove(list1.firstElementChild);
// }

erase.addEventListener("click",function(){
   inputtext.value="";
   inputdate.value="";
})

// var edit=(e)=>();{
//    if(e.add.inputtext === "edit"){
//       var inputtext=e.add.parentElement. inputtext[1];
//       }
// }
// edit.addEventListener("click",edit)
//filter

var new1
var old

function filter(){
new1 =document.querySelector('.oldTask1')
old=array.filter((way)=>{
   return(way.inputdate !=='2023-07-13');
})
way1()
}
function way1(){
   let way2="";
   old.forEach((even)=>{
      var add1=`<li>${even.inputtext},${even.inputdate}</li>`
      way2=way2+add1
      new1.innerHTML=way2;
   })
}
