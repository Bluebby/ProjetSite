// Ajoute un produit au panier.
function addToCart(product, price, quantity) {

    // Si le produit n'a pas encore été ajouté au panier, on doit générer un nouvel élément grâce au DOM.
    if (!document.getElementById("hcart-" + product) && quantity > 0){

        // Initialisation du produit à insérer dans le panier :
        const newProductInCart = document.createElement("div"); 
        newProductInCart.id = "hcart-" + product;

        // Nom du produit :
        const pproduct = document.createElement("p");
        pproduct.appendChild(document.createTextNode(product));
        newProductInCart.appendChild(pproduct);
        // Quantité commandée :
        const pquantity = document.createElement("p");
        pquantity.id = product + "-qty";
        newProductInCart.appendChild(pquantity);
        // Prix de la quantité commandée :
        const pprice = document.createElement("p");
        pprice.id = product + "-price";
        newProductInCart.appendChild(pprice);

        // On insère le nouvel élément au début du panier :
        const hcart = document.getElementById("hcart-products");
        hcart.insertBefore(newProductInCart, hcart.children[0]); 
    }

    // Actualisation des données du panier via AJAX.
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            document.getElementById(product + "-add-qty").value = 1; // Quantité liée au bouton "Ajouter au panier" remise à 1.

            var cartDatas = this.responseText.split(","); // cartDatas = {quantité, prix quantité, prix total}
            // Quantité commandée :
            document.getElementById(product + "-qty").innerHTML = "Quantité : " + cartDatas[0];
            // Prix de la quantité commandée :
            document.getElementById(product + "-price").innerHTML = cartDatas[1] + " €";
            // Sous-total du panier :
            document.getElementById("hcart-subtotal").innerHTML = cartDatas[2] + " €";
        }
    };

    xhr.open("POST", "./php/add_to_cart.php", true);
    xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded");
    xhr.send("product=" + encodeURIComponent(product) + "&price=" + encodeURIComponent(price) + "&quantity=" + encodeURIComponent(quantity));
}

// Supprime un produit du panier.
function removeProduct(product) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // Suppression du produit dans la page panier et dans le panier du header.
            document.getElementById("cart-" + product).remove();
            document.getElementById("hcart-" + product).remove();
            // Actualisation du prix total dans la page panier et dans le panier du header.
            document.getElementById("cart-subtotal").innerHTML = this.responseText + " €";
            document.getElementById("hcart-subtotal").innerHTML = this.responseText + " €";
        }
    };

    xhr.open("POST", "./php/delete_cart.php", true);
    xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded");
    xhr.send("product=" + encodeURIComponent(product));
}