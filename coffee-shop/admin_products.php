<?php
 include 'components/connection.php';
 session_start();
 if(isset($_SESSION['admin_id'])) {
    $admin_id = $_SESSION['admin_id'];
}else{
    // $user_id = '';
    header('location: login.php');
}
 if(isset($_POST['logout'])){
    session_destroy();
    header('location: login.php');
 }
//adding products to database
 if(isset($_POST['add_product'])){
    $product_name = $_POST['name'];
    $product_price = $_POST['price'];
    $product_detail = $_POST['detail'];
    $image = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = 'images/'.$image;

    if(empty($product_name) || empty($product_price) || empty($product_detail) || empty($image)) {
        $message [] = 'please fill out all';
    }

    // $select_product_name = $conn->prepare("SELECT * FROM products WHERE  name = '$product_name'");
    // $select_product_name->execute(); 
    // $row = $select_product_name->fetch(PDO::FETCH_ASSOC);

    //  if($select_product_name->rowCount() > 0){
    //      //$message [] = 'product name alredy exists' ;
    // }
    else{
        $insert_product = $conn->prepare("INSERT INTO products (name, price, product_detail, image) VALUES('$product_name','$product_price','$product_detail','$image')");
        //$insert_product->execute([$product_name,$product_price,$product_detail,$image]); 
        $insert_product->execute();
        // $row = $select_product_name->fetch(PDO::FETCH_ASSOC);

        if($insert_product) {
            if($image_size > 2000000) {
                $message [] = 'image size is too large';
            }else {
                move_uploaded_file($image_tmp_name, $image_folder);
                $message [] = 'product added successfully';
            }
        }
    }
}


//deleting products from database
    if(isset($_GET['delete'])){
     $delete_id = $_GET['delete'];
     $select_delete_image = $conn->prepare("SELECT * FROM products WHERE id = :delete_id");
     $select_delete_image->execute(array(':delete_id' => $delete_id));
     $fetch_delete_image = $select_delete_image->fetch(PDO::FETCH_ASSOC);

    $imageFilePath = 'images/' . $fetch_delete_image['image'];
    if (file_exists($imageFilePath)) {
    unlink($imageFilePath);
    }
    $delete_product = $conn->prepare("DELETE FROM products WHERE id = :delete_id");
    $delete_product->execute(array(':delete_id' => $delete_id));
    
    header('location: admin_products.php');
    }
?>

<style type="text/css">
    <?php include 'style.css'; ?>
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Coffee - Admin panel</title>
</head>
<body>
<?php 
    if(isset($message)) {
        foreach($message as $msg) {
            echo '<span class="alert-message">' .$msg.'</span>';
        }
    }
?>
    <?php include 'components/admin_header.php'; ?>
    
    <div class="main">
    <section class="admin-products">
            <div class="title">
                <img src="images/coffeebeans.webp" >
                <h1>Products</h1>
            </div>

            <!-- <div class="row">
                <img src="images/coffee1.jpeg" >
                <div class="row-detail">
                    <img src="images/making.jpg" >
                    <div class="top-footer">
                        <h1>a cup of coffee makes you healthy</h1>
                    </div>
                </div>
            </div> -->
    </section>
    <div class="line2"></div>
    <section class="add-products form-container">
        <form method="POST" enctype="multipart/form-data">
            <div class="input-field">
                <label>product name</label>
                <input type="text" name="name" >
            </div>
            <div class="input-field">
                <label>product price</label>
                <input type="text" name="price" >
            </div>
            <div class="input-field">
                <label>product detail</label>
                <textarea name="detail" ></textarea>
            </div>
            <div class="input-field">
                <label>product image</label>
                <input type="file" name="image" accept="images/jpg,images/jpeg, images/png, images/webp" >
            </div>
            <input type="submit" name="add_product" value="add product" class="btn">
        </form>
    </section>
      <!-- <div class="line3"></div>
    <div class="line4"></div>
    <section class="show-products">
       <div class="box-container"> -->
            <?php 
            $select_products = $conn->prepare("SELECT * FROM products ");
            $select_products->execute();
            if($select_products->rowCount() > 0){      

                       
            ?>
            <div class="product-display">
                <table class="product-display-table">
                    <thead>
                        <tr>
                            <th>product image</th>
                            <th>product name</th>
                            <th>product price</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){   ?>
                    
                    <tr>
                            <td><img src="images/<?=$fetch_products['image']; ?>" height="100"></td>
                            <td><?=$fetch_products['name']; ?></td>
                            <td>$<?=$fetch_products['price']; ?>/-</td>
                            <td>
                                <a href="admin_products.php?delete=<?=$fetch_products['id']; ?>" class="delete" onclick="return confirm('want to delete this product?');">delete</a>
                            </td>
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
            <!-- <div class="box">
            <img src="images/<?=$fetch_products['image']; ?>">
            <p class="price">price: $<?=$fetch_products['price']; ?>/-</p>
            <a href="admin_products.php?delete=<?=$fetch_products['id']; ?>" class="delete" onclick="return confirm('want to delete this product?');">delete</a>
            </div> -->

            <?php   
                     }else{
                    echo '<div class="empty">
                    <p>np products added yet! </p>
                </div> ';
                 } 
            ?>
            
        <!-- </div> -->
    <!-- </section> -->
        <!-- <?php include 'components/footer.php'; ?> -->
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.2/dist/boxicons.min.js" integrity="sha512-lJnB3NZ8cxFjfTz9Z0asB+FDVgtHDqaE1+nNRgPmnWZvSKp6FMV3Z6vPU/H5v49cJfmeRQpuE32lW0SUQrbEWQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="script.js"></script>
    <script src="slider-script.js"></script>
    <?php include 'components/alert.php'; ?>
</body>
</html>