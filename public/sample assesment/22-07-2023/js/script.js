var data=[
    {"id":1 , "name":"Imthi","class":1,"DOB":"1999-05-13","school":"paalvadi"},
    {"id":2 , "name":"Bharath","class":10,"DOB":"2002-08-16","school":"oneapapu"},
    {"id":3 , "name":"Vijay","class":8,"DOB":"2001-09-19","school":"hr sec"},
    {"id":4 , "name":"Sanjau","class":6,"DOB":"2000-05-23","school":"matric"}
]

// var array=[]
add()
function add(){
    var row=document.querySelector(".row");
    var way=""
    data.forEach((aa) =>{
    let itmes=`<div class="card mt-4 p-3" style="width: 20rem;">
    <div class="card-body">
      <h3> name:${aa.name}</h3>
      <h6> class:${aa.class}</h6>
      <h6> DOB:${aa.DOB}</h6>
      <h6> school:${aa.school}</h6>
      <button class="btn btn-success"onclick="edit(${aa.id})">Edit</button>
    </div>
    </div>`
    way+=itmes
    // console.log(way);
    row.innerHTML=way;
    // console.log(itmes);
    });
    
}
function edit(a1){
  // console.log(a1);
let button=data.find((b)=>b.id === a1)
console.log(button);
let xx =`<div class="card mt-4 p-3" style="width: 25rem;">
<div class="card-body">
  <h3> name:<input class="input1" type="text" value=${button.name}></h3>
  <h6> class:<input class="input2"  type="text" value=${button.class}></h6>
  <h6> DOB:<input class="input3"  type="text" value=${button.DOB}></h6>
  <h6> school:<input class="input4"  type="text" value=${button.school}></h6>
  <button class="btn btn-success"onclick="edits(${button.id})">Edit</button>
</div>
</div>`
// console.log(xx);
 $(".hlo").html(xx);
}
function edits(b1){
  console.log(b1);
  var button1=data.find((c)=>c.id === b1)
  console.log(button1);
console.log(button1.name);
  var inp1= $('.input1').val()
  var inp2= $('.input2').val()
  var inp3= $('.input3').val()
  var inp4= $('.input4').val()
  console.log(inp1,inp2,inp3,inp4);

  button1.name=inp1;
  button1.class=inp2;
  button1.DOB=inp3;
  button1.school=inp4;
add();
}


