var data=[{
    id:1,
    productName:"Laptop",
    img:"./image/download.jpg",
    price:150000,
},
{
    id:2,
    productName:"CPU",
    img:"./image/download (1).jpg",
    price:25000,
},
{
    id:3,
    productName:"Mouse",
    img:"./image/download (2).jpg",
    price:1000,
},
{
    id:4,
    productName:"I-Phone",
    img:"./image/download (3).jpg",
    price:170000,
},
{
    id:5,
    productName:"Smart Watch",
    Image:"./image/download (4).jpg",        
    price:2000,
},
{
    id:6,
    productName:"EarBuds",
    img:"./image/download (5).jpg",
    price:5000,
},
{
    id:7,
    productName:"I-Mac",
    img:"./image/download (6).jpg",
    price:89000,
},
{
    id:8,
    productName:"Gaming Laptop",
    img:"./image/download (7).jpg",
    price:190000,
},
{
    id:9,
    productName:"KTM",
    img:"./image/download (8).jpg",
    price:20000,
},
{
    id:10,
    productName:"BMW",
    img:"./image/download (9).jpg",
    price:150000,
},
]
var goToCard=[]
var cardbtn=$('.btn-info')
var balance=200000;
var balanceCard=$('.balance')
var getValue;
var pay=$('.show')
var orderss;

var product;
data.forEach((ev,i)=>{
    product=$('.productList')
    let cards=`
    <div class="col-md-2>
    <div class="card">
    <img class="card-img-top" src="${ev.img}"alt="card image cap">
    <div class="card-body">
    <h4 class="card-title">${ev.productName}</h4>
    <h3 class="card-title priceRs${i}">Rs:${ev.price}</h3>
    <input type="number" class="item${i}">
    <button class="btn btn-secondary mt-1"onclick="cards(${ev.id})">buy</button>
    </div>
    </div>
    </div>`
    product.append(cards);
})
cardbtn.on('click',()=>{
    pay.show(1000)
   product.hide()
    way()
    balanceCard.html("current amount:"+balance)
})

function cards(i){
    let ap=data.filter((a)=>{
        return a.id==i
    })
    orders(ap)
}
function orders(ap){
    ap.forEach((ee)=>{
        goToCard.push(ee)
    })
}

var card;
function delet(i){
    goToCard.splice(i,1)
   
}

function way(){
    let yy=""
    goToCard.forEach((ev,i)=>{
        console.log(ev);
        orderss=$(".orderss")
        let listCard= `<div class="col-md-2><div class="card"><img class="card-img-top" src="${ev.img}" alt="card image cap"><div class="card-body></div>
        <h4 class="card-title">${ev.productName}</h4>
        <h3 class="card-title">Rs:${ev.price}</h3>
        <button class="btn btn-danger mt-1" onclick="delet(${i}">delet</button>
        </div>
        <div>

        </div>`
        yy=yy+listCard
        orderss.html(yy)
    })
    }
