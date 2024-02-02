document.getElementById("openModal").addEventListener("click", function() {
    document.getElementById("productModal").style.display = "block";
});

document.getElementById("closeModal").addEventListener("click", function() {
    document.getElementById("productModal").style.display = "none";
});

document.getElementById("addProduct").addEventListener("click", function() {
    const productName = document.getElementById("productName").value;
    const productImage = document.getElementById("productImage").value;
    const productDescription = document.getElementById("productDescription").value;
    const productPrice = document.getElementById("productPrice").value;

    // Create and display the product
    const productItem = document.createElement("div");
    productItem.innerHTML = `
        <h3>${productName}</h3>
        <img src="${productImage}" alt="${productName}">
        <p>${productDescription}</p>
        <p>Price: $${productPrice}</p>
    `;
    document.getElementById("productList").appendChild(productItem);

    // Clear form fields and close the modal
    document.getElementById("productForm").reset();
    document.getElementById("productModal").style.display = "none";
});