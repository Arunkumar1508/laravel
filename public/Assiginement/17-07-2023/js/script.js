// alert("fghj");
// var users=[
//     { name:"imithi"},
//        { name:"bharath"},
//        {name:"vijay"} 
    
// ];
// var a=users.find(function(user){
// return user.name==="bharath";

// });
// console.log(a);



// function getmessage(){
//     const year=new Date().getFullYear();
//     return " this is year " + year;
// }
// getmessage();


const add=(a,b)=>{
    return a  +  b;
}
 var a=add(2,4)
console.log(a);


const double=Number=>2* Number

 var s = double(5);
console.log(s);


//using maping

const Number=[1,2,3];
var w=Number.map(Number => 2 * Number);
console.log(w);


//swap numbers or character

var name1="suriya";
var name2="bharath loves ";
[name1,name2]=[name2,name1];

// name1.concat(name2);
console.log(name1);
console.log(name2);

//rest paramaters

function addnumbers(...numbers){
    return numbers.reduce((sum , number)=>{
        return sum + number;},0)
    }
      var e=  addnumbers(1,2,3,4,5,6,7,8,9,10);
        console.log(e);
    

        //rest spread operators
const color=["red","green","orange"];
const fav=['rose','gray'];
var o=[...color, ...fav];
console.log(o);

//destructing in array

let [firstname,middlename,lastname]=["bharath"," loves ","suriya"]
console.log(firstname + middlename + lastname);

//destucting in object
//example 1
const a1={
    name:"bharath1",
    age:22
}
const{name,age}=a1;
console.log(name);


//example 2

var savedfiles={
    extension:"png",
    color:"red",
    size:12424
};

function filesummery({extension,color,size}){
return `${extension}.${color}.${size}`;
}
console.log(savedfiles );


//promise using then keyword

// Promise = new Promise((resolve, reject) => {
//     resolve();
// })  

// Promise.then(() => {
//     console.log('finally finished!!!!');
// })
// Promise.then(()=>{
//     console.log('Early finished!!!!');
// });
//promise using catch keyword

// Promise = new Promise((resolve, reject) => {
//     reject();
// })  

// Promise.catch(() => {
//     console.log('hlo buddy');
// Promise.then(() => {
//         console.log('finally finished!!!!');
//     })
// })

//async using promise method

Promise = new Promise((resolve,reject) =>{
setTimeout(() =>{
    resolve();
},3000);
});
Promise 
.then(() => console.log('heloodfg dafhdaf'))
.then(() => console.log('welcome'))
.then(() => console.log('Thankyou everyone is here'))
.catch(() => console.log('heloodfg dafhdaf'));

//fetch API

