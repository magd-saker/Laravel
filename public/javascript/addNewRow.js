function addNewRow(products) {

    // Get the table body element
    var tableBody = document.getElementById('table-body');

    // Create a new table row
    var newRow = document.createElement('tr');

    // Create cells for the new row
    var cell1 = document.createElement('td');
    var cell2 = document.createElement('td');
    var cell3 = document.createElement('td');
    var cell4 = document.createElement('td');
    var cell5 = document.createElement('td');
    var cell6 = document.createElement('td');
    var cell7 = document.createElement('td');

    var productDropdown = document.getElementById('product-id');
    var selectedProductName = productDropdown.options[productDropdown.selectedIndex].text;
    var orderNumber = document.getElementById('order-number').value;
    var quantity = document.getElementById('quantity').value;
    var unitprice = productDropdown.value;
    var productId = productDropdown.value;
    products.forEach(element => {
        if (element['ProductName'] === selectedProductName) {
            unitprice = element['UnitPrice'];
            productId = element['id'];
        }
    });
    cell2.textContent = selectedProductName;
    cell3.textContent = unitprice; // Set the unit price if available
    cell4.textContent = orderNumber;
    cell5.textContent = quantity;
    var product1 = {}!!, json_encode; (products)!!;
}
