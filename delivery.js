function Product(item, price, qty){
    this.item = item;
    this.price = price;
    this.qty = qty;
}

var productList = [
    new Product("Sliced Beef with Black Pepper Sauce", price0, 0),
    new Product("Double Cooked Pork with Chinese Leek", price1, 0),
    new Product("Spicy Chicken", price2, 0),
    new Product("Fish Filets in Hot Chili Oil", price3, 0),
    new Product("Egg Plant with Minced Chicken and Sichuan Chilli Sauce", price4, 0),
    new Product("Lettuce in Oyster Sauce", price5, 0),
    new Product("Bai Mu Dan White Peony Tea", price6, 0),
    new Product("Oolong Tea", price7, 0),
    new Product("Sweet-sour Plum Juice", price8, 0),
    new Product("Traditional Chinese Liquor", price9, 0)
];

function addProduct(){
    checkQty();
    for (var i = 0; i < 10; i++){
        added = document.getElementById("delivery" + i).value;
        var item = document.getElementById("item" + i);
        var price = document.getElementById("price" + i);
        var qty = document.getElementById("qty" + i);
        var sect = document.getElementById("sect" + i);
        if (added > 0){
            sect.style.display = "table-row";
            item.innerHTML = productList[i].item; 
            price.innerHTML = productList[i].price;
            qty.innerHTML = added;
            productList[i].qty = added;
        }
        else {
            sect.style.display = "none";
            productList[i].qty = 0;
            //item.innerHTML = "";
            //price.innerHTML = "";
            //qty.innerHTML = "";
        }
        compute(productList);
    }
}

function checkQty(){
    var qty = document.getElementsByClassName("qty");
    for (var i = 0; i < 10; i++){
        if ((qty[i].value < 0)||(qty[i].value % 1 != 0)){
            alert("The qty is not valid.\n" + "It must be a positive integer.");
            qty[i].focus();
            qty[i].select();
            return false;
        }
    }
}

function compute(productList){
    var total = document.getElementById("amount");
    var temp = 0;
    for (var i = 0; i < 10; i++){
        temp += productList[i].price * productList[i].qty;
    }
    total.value = temp; 
}


