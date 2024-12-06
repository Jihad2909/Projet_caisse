let orderItems = [];

  
  function calRendu(){
    let userInput = prompt("Donner une billet:");
    let number = parseFloat(userInput);
    let total = 0;
    orderItems.forEach(item => {
      total += item.total;
    });
    
    if (!isNaN(number)) {
      document.getElementById('billet').textContent = `${number} DT`;
      document.getElementById('rendu').textContent = `${(number-total).toFixed(3)} DT`;     
      
    } else {
        alert("No input provided.");
    }

    
  } 

  function addToOrder(itemName, price) {
    
    let item = orderItems.find(i => i.name === itemName);
    if (item) {
      item.quantity += 1;
      item.total = item.quantity * price;
    } else {
      orderItems.push({ name: itemName.toString(), price: price, quantity: 1, total: price });
    }    
    updateOrderSummary();
    
  }

  function updateOrderSummary() {
    const orderList = document.getElementById('order-list');
    orderList.innerHTML = '';
    let subtotal = 0;

    orderItems.forEach(item => {
      subtotal += item.total;
      const listItem = document.createElement('li');
      listItem.className = 'list-group-item ';
      listItem.innerHTML = `<table style="width:100%;"><tr><td style="width:33%" >${item.name.toString()}</td> <td style="width:33%" class="text-center">${item.quantity}</td> <td style="width:33%" class="text-end">${item.total.toFixed(2)} DT</td></tr></table>`;
      orderList.appendChild(listItem);
    });

    const tax = 0 //subtotal * 0.1; pour avoir de tax
    const total = subtotal + tax;

    
    document.getElementById('total').textContent = `${total.toFixed(3)} DT`;
    document.getElementById('cash-button').textContent = `Total : ${total.toFixed(3)} DT`;    
   
  }

  function clearOrder() {
    orderItems = [];
    document.getElementById('billet').textContent = `0.000 DT`;
    document.getElementById('rendu').textContent = `0.000 DT`;
    updateOrderSummary();
  }

  function saveOrder() {
    if(orderItems.length===0){
      alert("Non commande trouvée!!")
    }else{
      const orderData = JSON.stringify(orderItems);
    fetch('save_order.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ order: orderData })
    })
    .then(response => response.text())
    .then(data => {
      if (data.includes("success")) {
        alert("Ajouter avec successs");
        clearOrder();
        window.location.reload();
      } else {
        alert("Failed to save the order. Please try again.");
      }
    });
    }    
  }


function imprimer() {
    window.print();
}