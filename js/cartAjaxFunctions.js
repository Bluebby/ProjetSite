// Ajoute un produit au panier.
function addToCart(product, price, quantity) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById(product).value = 0;
        }
    };

    xhr.open("POST", "./php/add_to_cart.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("product=" + encodeURIComponent(product) + "&price=" + encodeURIComponent(price) + "&quantity=" + encodeURIComponent(quantity));
}

// Supprime un produit du panier.
function removeProduct(product) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById(product).remove(); // Le produit n'est plus affiché dans le panier.
            document.getElementById("subtotal").innerHTML = this.responseText + " €"; // Actualisation du sous-total.
        }
    };

    xhr.open("POST", "./php/delete_cart.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("product=" + encodeURIComponent(product));
}