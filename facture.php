<?php
session_start();
?>

<!DOCTYPE html>
<head>
  <meta charset="UTF-8"/>
  <title>Facture FISHELECAMP</title>
  <link rel="stylesheet" href="css/facture.css" />

</head>
<body>
  <header>
    <h1>FACTURE
      <h2>FISHLECAMP</h2>
    </h1>
  </header>
  <section class="flex">
    <dl>
      <dt>Facture #</dt>
      <dd><?= $_SESSION['prenom']; ?></dd>
      <dt>Date de facturation</dt>
      <dd>
        <script>
        date = new Date().toLocaleDateString();
        document.write(date);
        </script>
      </dd>
    </dl>
  </section>
  <section class="flex">
    <dl class="bloc">
      <dt>Facturé à:</dt>
      <dd>
      <?= $_SESSION['prenom']; ?>.<br>
      <?= $_SESSION['nom']; ?><br>
      <?= $_SESSION['adresse']; ?>
        <dl>
          <dt>Téléphone</dt>
          <dd><?= "0".$_SESSION['telephone']; ?></dd>
          <dt>Courriel</dt>
          <dd><?= $_SESSION['email']; ?></dd>
        </dl>
      </dd>
    </dl>
  </section>
  <table>
    <thead>
      <tr> 
        <th>Quantité</th>
        <th>Nom du produit</th>
        <th>TVA</th>
        <th>Montant</th>
      </tr>
    </thead>
    <tbody></tbody><?php foreach ($_SESSION['cart'] as $product => $in_cart): ?>
    <tr>
      <td><?=$in_cart['quantity']?></td>
      <td><?=$product?></td>
      <td>20%</td>
      <td><?= $in_cart['price']?></td><?php endforeach; ?>
    </tr>
    <tfoot>
      <tr> 
        <td colspan="2">− La TVA est déja incluse dans nos prix ! −</td>
        <td colspan="2">Total: <?= $_SESSION['subtotal']?></td>
      </tr>
    </tfoot>
  </table>
</body>
