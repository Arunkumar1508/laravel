// var lis = document.querySelectorAll("li");

// for ( var i = 0; i < lis.length; i++) {
//     lis[i].addEventListener("mouseover", function () {
//         this.style.color = "red ";
//     });
//     lis[i].addEventListener("mouseout", function () {
//         this.style.color = "black";
//     });


// lis[i].addEventListener("click",function(){
// this.classList.toggle("done");
// });
// }

// const numbers =[34,76,44,12,33];
// let results = numbers.sort();

// let result=numbers.find((value)=>{
// return value >40;
// });
// let res=numbers.filter((value)=>{
// return value >40;
// });



var colors = [
    "rgb(255, 0, 0)",
    "rgb(255, 255, 0)",
    "rgb(0, 255, 0)",
    "rgb(0, 255, 255)",
    "rgb(0, 0, 255)",
    "rgb(255, 0, 255)"
]

var numsquares= 6;
var colors= generateRandomColors(numsquares);
var squares = document.querySelectorAll(".square");
var pickedColor = pickcolor();
var colordisplay = document.getElementById("colordisplay");
var messagedisplay = document.querySelector("#message");
var h1= document.querySelector("h1");
var resetButton=document.querySelector("#reset");
var easybtn=document.querySelector("#easybtn");
var hardbtn=document.querySelector("#hardbtn");
easybtn.addEventListener("click",function(){
hardbtn.classList.remove("selected");
easybtn.classList.add("selected");
numsquares=3;
colors=generateRandomColors(numsquares);
pickedColor=pickcolor();
colordisplay.textContent=pickedColor;
for(var i=0;i<squares.length;i++){
  if(colors[i]){
    squares[i].style.background=colors[i];
  }else{
    squares[i].style.display="none";
  }
}
});
hardbtn.addEventListener("click",function(){
  hardbtn.classList.add("selected");
  easybtn.classList.remove("selected");
  numsquares=6;
  colors=generateRandomColors(numsquares);
pickedColor=pickcolor();
colordisplay.textContent=pickedColor;
for(var i=0;i<squares.length;i++){
 
    squares[i].style.background=colors[i];
  
    squares[i].style.display="block";
  }

});



resetButton.addEventListener("click",function(){
colors = generateRandomColors(numsquares);
pickedColor = pickcolor();
colordisplay.textContent=pickedColor;
for(var i=0;i<squares.length;i++){
  squares[i].style.background = colors[i];
}
h1.style.background="steelblue";
})
colordisplay.textContent = pickedColor;
for(var i=0; i< squares.length;i++){
    squares[i].style.background = colors[i];
    squares[i].addEventListener("click",function(){
      var clickedcolor = this.style.background;
      console.log(clickedcolor , pickcolor);
      if(clickedcolor === pickedColor){
        messagedisplay.textContent ="Correct";
        resetButton.textContent="Play again"
        changeColor(clickedcolor);
        h1.style.background = clickedcolor;
      }else{
       this.style.background = "#232323";
       messagedisplay.textContent ="Try again"
      }

    });
}
function changeColor(color){
  for(i=0;i<squares.length;i++){
    squares[i].style.background = color;
  }
}
function pickcolor(){
 var random =Math.floor(Math.random()* colors.length);
 return colors[random];
}
function generateRandomColors(num){
  var arr=[]
  for(var i=0;i<num;i++){
    arr.push(randomColor())

  }
  return arr;
}
function randomColor(){
 var r= Math.floor(Math.random() * 256);
 var g= Math.floor(Math.random() * 256);
 var b= Math.floor(Math.random() * 256);
 return "rgb(" + r + ", " + g + ", " + b + ")";
 }