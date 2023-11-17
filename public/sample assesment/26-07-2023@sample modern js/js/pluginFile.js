var mainArray;

var update=[];

(function(pWindow) {
	if(typeof pWindow.CustomList == "function") {
		throw new Error("CustomList function already defined");
	}

	/*===================== creating default values =============*/
	 mainArray=[];
	let CustomList= function(pId, options) {
		if(!(this instanceof CustomList)) {
			return new CustomList(pId, options);
		}
		this.domEl = document.getElementById(pId);
		if(!this.domEl) {
			throw new Error("dom not found");
		}
		this.options=options||{};
		if(typeof this.options.data == "undefined") {
			this.options.data = [];
		}
		mainArray.push(options);
		// var aa=mainArray.flat()
		this.displayList(pId);

	};

	/*==================== creating new list ================*/

	CustomList.prototype.displayList = function(way){
		// console.log(mainArray);
		var hh=document.getElementById(way)
		var ff=''
		var aa=mainArray[0].data.students
		// console.log(aa)
		aa.forEach((cc) =>{
			// var grid=document.getElementById(way);
			let ss=`<div class="card" style="width:200px;margin:10px;" onclick="show(${cc.id})">
            <img src="${cc.img}" class="card-img-top " alt="...">
            <div class="card-body">
              <h5 class="card-title">${cc.name}</h5>
            </div>
			</div>`
			ff+=ss
			hh.innerHTML=ff

		});


 	}
	pWindow.CustomList = CustomList;
})(window)

function show(bb){
	// console.log(mainArray)
var aa=mainArray[0].data.students
 var cc=aa.find((de)=>{
	return de.id==bb
 })

 update.push(cc)
 some()
}
function some(){
	var show1=document.getElementById("show1")
	var ff=''
	update.forEach((ff)=>{
		let ss=` <div>Name: 
        <input type="text" id="name"  disabled value="${ff.name}">
      </div>
      <div>m1:
        <input type="text"id="m1" disabled value="${ff.m1}">
      </div>
      <div>m2:
        <input type="text"id="m2" disabled value="${ff.m2}">
      </div>
      <div>m3:
        <input type="text"id="m3" disabled value="${ff.m3}">
      </div>
      <div>m4:
        <input type="text"id="m4" disabled value="${ff.m4}">
      </div>
      <div>m5:
        <input type="text"id="m5" disabled value="${ff.m5}">
      </div> 
	  <div class="btn">
        <button onclick="edit2()">Edit</button>
        <button onclick="save(${ff.id})">Save</button>  
      </div>
	  `

	  ff=ss
	  show1.innerHTML=ff
	    
	})
  update.splice(0,1)

}
function save(event){
	var o=mainArray[0].data.students
	// console.log(o)
	var name1=document.getElementById("name").value

	var m1=parseInt(document.getElementById("m1").value)
	var m2=parseInt(document.getElementById("m2").value)
	var m3=parseInt(document.getElementById("m3").value)
	var m4=parseInt(document.getElementById("m4").value)
	var m5=parseInt(document.getElementById("m5").value)

	var indextop=o.findIndex((obj)=>{
		return obj.id==event
	})
	if(indextop !== -1){
		o[indextop].name=name1
		o[indextop].m1=m1
		o[indextop].m2=m2
		o[indextop].m3=m3
		o[indextop].m4=m4
		o[indextop].m5=m5

		window.OnLoaded()
	
		document.getElementById("name").value=""
		document.getElementById("m1").value=""
		document.getElementById("m2").value=""
		document.getElementById("m3").value=""
		document.getElementById("m4").value=""
		document.getElementById("m5").value=""
		document.getElementById("name").disabled=true
		document.getElementById("m1").disabled=true
		document.getElementById("m2").disabled=true
		document.getElementById("m3").disabled=true
		document.getElementById("m4").disabled=true
		document.getElementById("m5").disabled=true
	}
	else{

	}
}

function edit2(){
	// console.log(edit2)
	var name1=document.getElementById("name")

	var m1=document.getElementById("m1")
	var m2=document.getElementById("m2")
	var m3=document.getElementById("m3")
	var m4=document.getElementById("m4")
	var m5=document.getElementById("m5")

	name1.removeAttribute("disabled")
	m1.removeAttribute("disabled")
	m2.removeAttribute("disabled")
	m3.removeAttribute("disabled")
	m4.removeAttribute("disabled")
	m5.removeAttribute("disabled")
}

