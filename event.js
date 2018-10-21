function Event(item, price, qty){
    this.item = item;
    this.price = price;
    this.qty = qty;
}

function addEvent(){
    var eventList = [
        new Event("Mid-autumn Mooncake Festival", 20, 0),
        new Event("Stories in A Tea Cup", 30, 0)
    ];
    checkQty();
    for (var i = 0; i < 2; i++){
        added = document.getElementById("event" + i).value;
        if (added > 0){
            var item = document.getElementById("item" + i);
            item.innerHTML = eventList[i].item;
            var price = document.getElementById("price" + i);
            price.innerHTML = eventList[i].price;
            var qty = document.getElementById("qty" + i);
            qty.innerHTML = added;
            eventList[i].qty = added;
        }
        else {
            var item = document.getElementById("item" + i);
            item.innerHTML = "";
            var price = document.getElementById("price" + i);
            price.innerHTML = "";
            var qty = document.getElementById("qty" + i);
            qty.innerHTML = "";
        }
        compute(eventList);
    }
}

function checkQty(){
    var check = document.getElementsByClassName("qty");
    for (var i = 0; i <= 1; i++){
        if ((check[i].value<0)||(check[i].value%1!=0)){
            alert("The quantity is not valid.\n" + "It must be a positive integer.");
            check[i].focus();
            check[i].select();
            return false;
        }
    }
}

function compute(eventList){
    var total = document.getElementById("amount");
    var temp = 0;
    for (var i = 0; i < 2; i++){
        temp += eventList[i].price * eventList[i].qty;
    }
    total.value = temp; 
}


