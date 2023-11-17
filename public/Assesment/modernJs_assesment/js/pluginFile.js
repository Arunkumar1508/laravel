
(function(pWindow) {
	if(typeof pWindow.CustomList == "function") {
		throw new Error("CustomList function already defined");
	}

	/*===================== creating default values =============*/
	const mainArray=[];
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
		mainArray.push(options.data.ProductCollection);
		subarray=mainArray.flat();
		// text1=mainArray.flat();
		console.log(subarray)
		this.displayList();
	};

	/*==================== creating new list ================*/

	CustomList.prototype.displayList = function(){
		// console.log(mainArray);
		// list() 
		
 	}
	pWindow.CustomList = CustomList;
})(window)


function search(){
	var inputval=$("#inp1").val()
	$(".span").text(inputval)
    list();
	var sty=document.getElementById("hide")
	$("#hide").css({"display":"block"})
}
function list(){
	var insertval=document.getElementById("insertval")
	// var bb; 
	var b=document.createElement("div")
	b.classList.add("container3")
	// console.log(subarray);
	subarray.forEach((val,i) => {
    // console.log(val.ProductPicUrl);
	var emp =""
	var carry=`
	<div class="col">

	<table>
	<tr> 
		<td>
		<input type="checkbox" onclick="m(${i})" id="check1" name="option1" value="something" >
		</td>   
	<td ><img src="${val.ProductPicUrl}" alt=""></td>
	<td class="">${val.Name}</td>
	
</tr>
</table>
</div>`

	emp+=carry
	b.innerHTML+=emp
	$(insertval).append(b)
	
	})
	var i=`
<div>

<button class="button1 bg-secondary"  onclick="cart()">Ok</button>
<button class="button2 bg-secondary">Cancel</button>
</div>`
insertval.innerHTML+=i;
}


var ary=[];
function m(i){
	let yy=`<div class="row"> <img src="${subarray[i].ProductPicUrl}"alt="no image" style=" width:200px"> <h5>${subarray[i].Name}</h5></div>`
$("#cart").append(yy)
}



