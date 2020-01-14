<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com
*/
session_start();
include('db.php');
$status="";
if (isset($_POST['ID_Produto']) && $_POST['ID_Produto']!=""){
    $code = $_POST['ID_Produto'];
    $result = mysqli_query($con,"SELECT * FROM `produto` WHERE `ID_Produto`='$code'");
    $row = mysqli_fetch_assoc($result);
    $name = $row['nome'];
    $code = $row['ID_Produto'];
    $preco = $row['preco'];
    $image = $row['imagens'];
    $desconto = $row['desconto'];
    $descricao = $row['descricao'];
    $cartArray = array(
        $code=>array(
            'nome'=>$name,
            'ID_Produto'=>$code,
            'preco'=>$preco,
            'descricao'=>$descricao,
            'desconto'=>$desconto,
            'quantity'=>1,
            'imagens'=>$image)
    );

    if(empty($_SESSION["shopping_cart"])) {
        $_SESSION["shopping_cart"] = $cartArray;
        $status = "<div class='box'>Produto esta adicionado ao carrinho</div>";
    }else{
        $array_keys = array_keys($_SESSION["shopping_cart"]);
        if(in_array($code,$array_keys)) {
            $status = "<div class='box' style='color:red;'>
		Product is already added to your cart!</div>";
        } else {
            $_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
            $status = "<div class='box'>Product is added to your cart!</div>";
        }

    }
}
?>
    <html>
    <head>
        <title>Demo Simple Shopping Cart using PHP and MySQL - AllPHPTricks.com</title>
        <link rel='stylesheet' href='css/style.css' type='text/css' media='all' />
    </head>
<body>
<div style="width:700px; margin:50 auto;">

    <h2>Demonstração do carrinho de compras utilizando PHP e MYSQL</h2>

    <?php
    if(!empty($_SESSION["shopping_cart"])) {
        $cart_count = count(array_keys($_SESSION["shopping_cart"]));
        ?>
        <div class="cart_div">
            <a href="carrinho.php"><img src="cart-icon.png" /> Carrinho<span><?php echo $cart_count; ?></span></a>
        </div>
        <?php
    }

    $result = mysqli_query($con,"SELECT * FROM `produto`");
    while($row = mysqli_fetch_assoc($result)){
        echo "<div class='product_wrapper'>
			  <form method='post' action=''>
			  <input type='hidden' name='code' value=".$row['ID_Produto']." />
			  <div class='imagens'><img src='".$row['imagens']."' /></div>
			  <div class='name'>".$row['nome']."</div>
		   	  <div class='preco'>$".$row['preco']."</div>
			  <button type='submit' class='buy'>Compre</button>
			  </form>
		   	  </div>";
    }
    mysqli_close($con);
    ?>

    <div style="clear:both;"></div>

    <div class="message_box" style="margin:10px 0px;">
        <?php echo $status; ?>
    </div>

    <br /><br />
    <a href="https://www.allphptricks.com/simple-shopping-cart-using-php-and-mysql/"><strong></strong></a> <br /><br />
    <a href="https://www.allphptricks.com/"><strong></strong></a>
</div>
</body><?php
