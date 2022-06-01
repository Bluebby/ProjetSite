// Ajoute un produit au panier.
function addToCart(category, id, product, quantity, stock) {
    if (quantity > 0 && quantity <= stock) {
        // Si le produit n'a pas encore été ajouté au panier, on doit générer un nouvel élément grâce au DOM.
        if (!document.getElementById("hcart-" + product)) {

            // Génération du conteneur du produit dans le panier (un conteneur par produit) :
            const newProductInCart = document.createElement("div");
            newProductInCart.id = "hcart-" + product;

            // Génération d'un paragraphe qui va afficher le nom du produit :
            const pproduct = document.createElement("p");
            pproduct.appendChild(document.createTextNode(product));
            newProductInCart.appendChild(pproduct);
            // Génération d'un paragraphe qui va afficher la quantité commandée :
            const pquantity = document.createElement("p");
            pquantity.id = product + "-qty";
            newProductInCart.appendChild(pquantity);
            // Génération d'un paragraphe qui va afficher le prix de la quantité commandée :
            const pprice = document.createElement("p");
            pprice.id = product + "-price";
            newProductInCart.appendChild(pprice);

            // On insère le nouveau conteneur au début du panier :
            const hcart = document.getElementById("hcart-products");
            hcart.insertBefore(newProductInCart, hcart.children[0]);
        }

        // Actualisation des données du panier via AJAX.
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                // Quantité liée au bouton "Ajouter au panier" remise à 1.
                document.getElementById(product + "-add-qty").value = 1;
                // Mise à jour du stock.
                document.getElementById(product + "-add-qty").name = stock - quantity;

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
        xhr.send("category=" + encodeURIComponent(category) + "&id=" + encodeURIComponent(id) + "&quantity=" + encodeURIComponent(quantity));
    }
}

// Supprime un produit du panier.
function removeProduct(product) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
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