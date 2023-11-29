function clearForm() {
    document.getElementById('productForm').reset();
}

function clearUpdateForm() {
    document.getElementById('product-name').value = '';
    document.getElementById('unit-price').value = '';
    document.getElementById('supplier-id').value = '';
    document.getElementById('UpdateProductForm').reset();
    // document.getElementById('UpdateProductForm').clearForm;
}


function addNewRow() {

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
    var unitprice=productDropdown.value;
    var productId = productDropdown.value;
    products.forEach(element => {
        if (element['ProductName'] === selectedProductName) {
            unitprice = element['UnitPrice'];
            productId = element['id'];
        }
    });
    cell2.textContent = selectedProductName;
    cell3.textContent = unitprice;
    cell4.textContent = orderNumber;
    cell5.textContent = quantity;
    cell6.innerHTML = '<button style="padding: 1px 3px;  font-size: 12px;" class="btn btn-sm btn-primary modify-button" type="button" onclick="modifyRow(this,products)"><i  class="bi bi-pencil-square"></i></button>';
    cell7.innerHTML = '<button style="padding: 1px 3px;  font-size: 12px;" class="btn btn-sm btn-danger" type="button" onclick="removeRow(this)"><i class="bi bi-trash3-fill"></button>';

    newRow.appendChild(cell2);
    newRow.appendChild(cell3);
    newRow.appendChild(cell4);
    newRow.appendChild(cell5);
    newRow.appendChild(cell6);
    newRow.appendChild(cell7);

    tableBody.appendChild(newRow);
}



function modifyRow(button,products ) {

    alert('please Select the new Product and the Quantity To complite Modify');
    var element = document.getElementById('product-id');
    element.scrollIntoView({ behavior: 'smooth', block: 'end' });
    function productChangeListener() {
        handleProductChange(button, products);
        document.getElementById('product-id').removeEventListener('change', productChangeListener);
    }
    document.getElementById('product-id').addEventListener('change', productChangeListener);


}
function handleProductChange(button,products) {
        var tr = button.closest('tr');
        var rowIndex = tr.rowIndex;
        var productDropdown = document.getElementById('product-id');
        var newProductName = productDropdown.options[productDropdown.selectedIndex].text;
        var element = document.getElementById('quantity');
        element.scrollIntoView({ behavior: 'smooth', block: 'end' });
        function quantityChangeListener() {
            handleQuantityChange(button, products, tr, rowIndex, newProductName);
            document.getElementById('quantity').removeEventListener('change', quantityChangeListener);
        }
        document.getElementById('quantity').addEventListener('change', quantityChangeListener);


}
function handleQuantityChange(button,products,tr,rowIndex,newProductName){
    alert('please select the Quantity Now To complite Modify');
    newQuantity = document.getElementById('quantity').value
    var orderNumber = tr.cells[2].textContent;
    var unitprice;
    var productId;
    products.forEach(element => {
        if (element['ProductName'] === newProductName) {
            unitprice = element['UnitPrice'];
            productId = element['id'];
        }
    });
    var tableBody = document.getElementById('table-body');

    var newRow = document.createElement('tr');

    var cell1 = document.createElement('td');
    var cell2 = document.createElement('td');
    var cell3 = document.createElement('td');
    var cell4 = document.createElement('td');
    var cell5 = document.createElement('td');
    var cell6 = document.createElement('td');
    var cell7 = document.createElement('td');

    cell2.textContent = newProductName;
    cell3.textContent = unitprice;
    cell4.textContent = orderNumber;
    cell5.textContent = newQuantity;
    cell6.innerHTML = '<button style="padding: 1px 3px;  font-size: 12px;" class="btn btn-sm btn-primary modify-button" type="button" onclick="modifyRow(this,products)"><i  class="bi bi-pencil-square"></i></button>';
    cell7.innerHTML = '<button style="padding: 1px 3px;  font-size: 12px;" class="btn btn-sm btn-danger" type="button" onclick="removeRow(this)"><i class="bi bi-trash3-fill"></button>';

    newRow.appendChild(cell2);
    newRow.appendChild(cell3);
    newRow.appendChild(cell4);
    newRow.appendChild(cell5);
    newRow.appendChild(cell6);
    newRow.appendChild(cell7);
    tableBody.insertBefore(newRow, tableBody.children[rowIndex]);
    removeRow(button)

}


function removeRow(button) {
    // Remove the row when the "Remove" button is clicked
    var row = button.parentNode.parentNode;
    row.parentNode.removeChild(row);
}

function serializeTableData(products,event) {
    event.preventDefault();
    var tableData = [];
    var tableRows = document.getElementById('table-body').getElementsByTagName('tr');

    for (var i = 0; i < tableRows.length; i++) {
        var cells = tableRows[i].getElementsByTagName('td');
        var productId=0
        products.forEach(element => {
            if (element['ProductName'] === cells[0].textContent) {
                productId = element['id'];
            }
             });
        var rowData = {
            'product-id': (parseInt(productId)), // Change this based on your actual structure
            'unit-price': (cells[1].textContent),
            'quantity': (cells[3].textContent)

            // Add other fields as needed
        };
        tableData.push(rowData);
    }
    console.log("tableData",tableData);
    document.getElementById('orderit').value = JSON.stringify(tableData);
    console.log("orderit", document.getElementById('orderit').value)
    var form = document.getElementById('productForm');
    form.submit();
}

