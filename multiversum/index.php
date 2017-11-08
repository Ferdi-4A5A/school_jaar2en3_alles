<!DOCTYPE html>
<html>

<head>
    <?php include 'head.php' ?>
</head>

<!--

- hoe doe je dat het beste met images voor products als een gebruiker ze moet uploaden ivm responsive image size?

- producten in db voegen en sequence AI maken en daarop alles DESC uitspugen zodat klant andere bovenaan kan zetten voor bepaalde tijd

- winkelwagen testen/afmaken(sessie delete/testen toevoegen lege wagen etc) + betaalpagina(iDeal ?checkout? minimaal)
- tablet/desktop afmaken + homepagina(met nieuwe producten in kunnen voegen)/contactpagina/footer/ + alles css
- admin afmaken

- alles beveiligen (SQL injections/img validation+hash in dbivm duplicates) etc
- wireframe/ERD afmaken en functionaliteiten fixen

-->

<body>

<?php include 'header.php' ?>

<div class="col-12 center">
Nieuw in het assortiment.
</div>
    <div class="col-m-12">
      <?php

      $sql = "SELECT * FROM `products` ORDER BY `productID` DESC LIMIT 2";
      $res = $crud->readData($sql);

  //    echo '<div class="row">';
          foreach ($res as $row) {
            echo '<div class="col-1"></div>';
              echo '<div class="col-4">';
                  echo '<form method="get" action="product_detail.php">';
                      echo '<button type="submit" name="name" value="' . $row["productID"] . '" class="page-product-button">';
                          echo '<div class="product-header">';
                              echo '<div class="product-thumbnail-title">';
                                  echo $row['productTitle'];
                              echo '</div>';
                              echo '<div style="max-width:500px;" class="div-img-product-info">';
                                  echo '<img src="img/product/' . $row['productImage'] . '  " class="img-product-info" />';
                              echo '</div>';

                              echo '<div class="div-product-info">';
                                  echo '<span class="product-description">';
                                      echo '* ' . $row['productHighlight1'] . '<br />';
                                      echo '* ' . $row['productHighlight2'] . '<br />';
                                      echo '* ' . $row['productHighlight3'];
                                  echo '</span>';

                                  echo '<span class="product-price" >';
                                      echo '<span class="product-price-total">';
                                          echo 'Totaal: &euro;' . number_format($row['productPrice'], 2, ',', '');
                                      echo '</span>';
                                      echo '<span class="product-price-btw">';
                                          echo 'excl. btw: &euro;' . number_format(($row['productPrice'] / 1.21), 2, ',', '');
                                      echo '</span>';

                                      echo '<span class="product-stock">';
                                          echo 'Stock: ' . $row['productStock'];
                                      echo '</span>';
                                      // a href in button met in winkelwagen, requesturi + name=id?
                                      echo '<span class="product-add-to-cart">';
                                          echo 'In winkelwagen';
                                      echo '</span>';

                                  echo '</span>';
                              echo '</div>';
                          echo '</div>';
                      echo '</button>';
                  echo '</form>';
              echo '</div>';
//              echo '<div class="col-4"> </div>';
          }
          ?>
    </div>

    <?php include 'footer.php' ?>
</body>
</html>
