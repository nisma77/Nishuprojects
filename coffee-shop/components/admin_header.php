<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start(); // Start the session if it's not already started
    }
    $admin_name = "admin"; // Replace with the actual admin name
    $admin_email = "admin12345@gmail.com"; // Replace with the actual admin email



    // // Check if user is logged in and set session variables
    // $user_name = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : "";
    // $user_email = isset($_SESSION['user_email']) ? $_SESSION['user_email'] : "";

    //  // Check if user is logged in
    //  if (isset($_SESSION['user_id'])) {
    //     $user_id = $_SESSION['user_id'];

    //     // Fetch wishlist items count
    //     $count_wishlist_items = $conn->prepare("SELECT * FROM wishlist WHERE user_id = ?");
    //     $count_wishlist_items->execute([$user_id]);
    //     $total_wishlist_items = $count_wishlist_items->rowCount();

    //     // Fetch cart items count
    //     $count_cart_items = $conn->prepare("SELECT * FROM cart WHERE user_id = ?");
    //     $count_cart_items->execute([$user_id]);
    //     $total_cart_items = $count_cart_items->rowCount();


    // } else {
    //     // User is not logged in, set counts to 0
    //     $total_wishlist_items = 0;
    //     $total_cart_items = 0;
    // }
    ?>

<!DOCTYPE html>
<header class="header">
    <div class="flex">
        <a href="admin_panel.php" class="logo"><img src="images/logo.jpg"></a>
        <nav class="navbar">
            <a href="admin_panel.php">Home</a>
            <a href="admin_products.php">Products</a>
            <a href="admin_order.php">Orders</a>
            <a href="admin_user.php">Users</a>
            <a href="admin_message.php">Message</a>
        </nav>
        <div class="icons">
            <i class="bx bxs-user" id="user-btn"></i>            
            <i class="bx bx-list-plus" id="menu-btn" style="font-size:2rem ;"></i>
        </div>
        <div class="user-box">
            <p>username : <span><?php echo $admin_name; ?></span></p>
            <p>email : <span><?php echo $admin_email; ?></span></p>
            <?php if (!isset($_SESSION['admin_name'])) : ?>
                <a href="login.php" class="btn" style="color: #000;">login</a>
                <a href="register.php" class="btn" style="color: #000;">register</a>
            <?php endif; ?>
            <?php if (isset($_SESSION['admin_name'])) : ?>
                <form method="post" action="admin_panel.php">
                    <button type="submit" name="logout" class="logout-btn">log out</button>
                </form>
            <?php endif; ?>
        </div>
    </div>
</header>
<!-- <div class="abanner">
    <div class="detail">
        <h1>admin dashboard</h1>
        <p>hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
    </div>
</div>
<div class="line">

</div> -->
