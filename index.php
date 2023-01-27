<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boutique</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="navbar">
        <a href="panier.php" class="link lien"><i class="fa-solid fa-cart-shopping"></i><span><?=array_sum($_SESSION['panier'])?></span></a>
    </div>
    <section class="products_list">
        <?php
        require_once('./Connect.db.php');
        $req = mysqli_query($conn, "SELECT *  FROM items");
        while($row = mysqli_fetch_assoc($req)) {
        ?>
        <form action="" class="product">
            <div class="image_product">
                <img src="./project_images/<?=$row['product_img']?>">
            </div>
                <div class="content">
                    <h4 class="name"><?=$row['product_name']?></h4>
                    <h2 class="price"><?=$row['product_price']?>$</h2>
                <a href="ajouter_panier.php?id=<?=$row['id']?>" class="id_product" >Ajouter au panier</a>
            </div>
        </form>
        <?php }?>
        </section>
</body>
</html>