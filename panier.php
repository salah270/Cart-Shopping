<?php
session_start();
require_once('./Connect.db.php');

if(isset($_GET['del'])){
    $id_del = $_GET['del'];
    
    //suppression
    unset($_SESSION['panier'][$id_del]);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier</title>
    <link rel="stylesheet" href="style.css">
</head> 
<body class="panier">
    <a href="index.php" class="link lien">Bouitque</a> 
    <section>
        <table>
            <tr>
                <th></th>
                <th >Nom</th>
                <th>Prix</th>
                <th>quantite
                <th>action</th>
                </th>
            </tr>
            <?php 
                    //list of producr
                $total = 0 ;
                $ids = array_keys($_SESSION['panier']);
                //if there are no keys
                if(empty($ids)){
                echo "Your Cart is Empty";
            } else {

                $products = mysqli_query($conn, "SELECT * FROM items WHERE id IN (". implode(',', $ids) . ")");
                //read items with boucle 
                foreach($products as $product):
                    $total = $total + $product['product_price'] * $_SESSION['panier'][$product['id']] ;
                ?>
                <tr>
                    <td><img src="./project_images/<?=$product['product_img']?>"></td>
                    <td><?=$product['product_name']?></td>
                    <td><?=$product['product_price']?>$</td>
                    <td><?=$_SESSION['panier'][$product ['id']] //Qt ?></td>
                    <td><a href="panier.php?del=<?=$product['id']?>"><img src="./project_images/delete.png"></a></td>
                </tr>
            <?php endforeach ;} ?>

            <tr class="total">
                <th>Total : <?=$total?> $</th>
            </tr>
        </table>
    </section> 
</body>
</html>