<?php
include 'components/connection.php';
session_start();
if(isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    }else{
        $user_id = '';
    }

if(isset($_POST['logout'])){
    session_destroy();
    header('location: login.php');
 }

?>

 <?php if (isset($success_msg)): ?>
    <div class="success">
         <?php foreach ($success_msg as $message): ?>
             <p><?php echo $message; ?></p>
         <?php endforeach; ?>
     </div>
 <?php endif; ?>

 <?php if (isset($warning_msg)): ?>
         <div class="warning">
         <?php foreach ($warning_msg as $message): ?>
             <p><?php echo $message; ?></p>
         <?php endforeach; ?>
     </div>
 <?php endif; ?>


<style type="text/css">
    <?php include 'style.css'; ?>
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Coffee - Order page</title>
    
</head>
<body>
    <?php include 'components/header.php'; ?>
    <div class="main">
        <div class="banner">
            <h1>my orders</h1>
        </div>
            <div class="title2">
                <a href="home.php">home</a><span>/order</span>
        </div>
        <section class="orders">
                <div class="title">
                    <img src="images/logo.jpg" class="logo">
                    <h1>my orders</h1>
                    <p>Now you can feel the energy</p>
 
                </div>
                
                <div class="box-container">
                    <?php 
                        $select_orders = $conn->prepare("SELECT * FROM orders WHERE user_id = ? ");
                        $select_orders->execute([$user_id]);
                        //var_dump($select_orders->rowCount()); // Debug the row count
                        //var_dump($select_orders->errorInfo()); // Debugging line
                        if ($select_orders->rowCount()> 0) {
                            while($fetch_orders = $select_orders->fetch(PDO::FETCH_ASSOC)){
                                 // var_dump($fetch_order); // Debug output
                                // $select_products = $conn->prepare("SELECT * FROM products WHERE id = ? ");
                                // $select_products->execute([$fetch_orders['product_id']]);
                                // if($select_products->rowCount()>0) {
                                //     while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)) {
                                   // while($fetch_orders = $select_orders->fetch(PDO::FETCH_ASSOC)) {
                                        // var_dump($fetch_product); // Debug output


                    ?>

                    <div class="box">
                        <p>user id : <?= $fetch_orders['user_id'] ?></h3>
                        <p>name : <?= $fetch_orders['name'] ?></h3>
                        <p>number : <?= $fetch_orders['number'] ?></p>
                        <p>email : <?= $fetch_orders['email'] ?></p>
                        <p>address : <?= $fetch_orders['address'] ?></p>
                        <p>address type : <?= $fetch_orders['address_type'] ?></p>
                        <p>method : <?= $fetch_orders['method'] ?></p>
                        <p>product id : <?= $fetch_orders['product_id'] ?></p>
                        <p>Price : $<?= $fetch_orders['price'] ?></p>
                        <p>status : <?= $fetch_orders['status'] ?></p>
                    </div>
                    <!-- <div class="box"> 
                        <?php if($fetch_orders['status']=='cancel'){echo 'style="border:2px solid red";';} ?>
                    <a href="view_order.php?get_id=<?= $fetch_orders['id']; ?>">
                        
                        <img src="images/<?=$fetch_orders['image']; ?>" class="image" >
                        <div class="row">
                            <h3 class="name"><?= $fetch_orders['name']; ?></h3>
                            <p class="price">Price : $<?= $fetch_orders['price']; ?>  X <?= $fetch_orders['qty']; ?></p>
                            <p class="status"><?= $fetch_orders['status'] ?></p>
                            <p class="status" style="color: <?php if($fetch_orders['status']=='delivered') {echo 'green';} elseif($fetch_orders['status']=='canceled') {echo 'red';} else {echo 'orange';} ?>"></p>
                        </div>
                    </a>

                    </div> -->
                     <?php 
                                     }
                                 }else{
                                echo  ' <p class="empty" >no order takes placed yet! </p> ';
                            }
                    ?> 
                </div>
        </section>
        <?php include 'components/footer.php'; ?>
    </div>
    <?php include 'components/alert.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.2/dist/boxicons.min.js" integrity="sha512-lJnB3NZ8cxFjfTz9Z0asB+FDVgtHDqaE1+nNRgPmnWZvSKp6FMV3Z6vPU/H5v49cJfmeRQpuE32lW0SUQrbEWQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="script.js"></script>
    
</body>
</html>