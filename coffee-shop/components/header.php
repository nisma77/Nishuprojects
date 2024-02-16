 <?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start(); // Start the session if it's not already started
    }

     //Check if user is logged in and set session variables
    $user_name = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : "";
    $user_email = isset($_SESSION['user_email']) ? $_SESSION['user_email'] : "";

     // Check if user is logged in
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
        <a href="home.php" class="logo"><img src="images/logo.jpg"></a>
        <nav class="navbar">
            <a href="home.php">Home</a>
            <a href="view_products.php">Products</a>
            <a href="order.php">Orders</a>
            <a href="about.php">About us</a>
            <a href="contact.php">Contact us</a>
        </nav>
        <div class="icons">
            <i class="bx bxs-user" id="user-btn"></i>
            <?php 
                $count_wishlist_items = $conn->prepare("SELECT * FROM  wishlist WHERE user_id = '$user_id'");
                $count_wishlist_items->execute();
                $total_wishlist_items = $count_wishlist_items->rowCount();
            ?>
            <a href="wishlist.php" class="cart-btn"><i class="bx bx-heart"></i><sup><?=$total_wishlist_items ?></sup></a>
            <?php 
                $count_cart_items = $conn->prepare("SELECT * FROM cart WHERE user_id = '$user_id'");
                $count_cart_items->execute();
                $total_cart_items = $count_cart_items->rowCount();
            ?>
            <a href="cart.php" class="cart-btn"><i class="bx bx-cart-download"></i><sup><?=$total_cart_items ?></sup></a>
            <i class="bx bx-list-plus" id="menu-btn" style="font-size:2rem ;"></i>
        </div>
        <div class="user-box">
            <!-- <p>username : <span><?php echo $_SESSION['user_name']; ?></span></p>
            <p>email : <span><?php echo $_SESSION['user_email']; ?></span></p> -->
            <p>username : <span><?php echo $user_name; ?></span></p> 
            <p>email : <span><?php echo $user_email; ?></span></p>
            <?php if (!isset($_SESSION['user_name'])) : ?>
                <a href="login.php" class="btn" style="color: #000;">login</a>
                <a href="register.php" class="btn" style="color: #000;">register</a>
            <?php endif; ?>
            <?php if (isset($_SESSION['user_name'])) : ?>
                <form method="post" action="home.php">
                    <button type="submit" name="logout" class="logout-btn">log out</button>
                </form>
            <?php endif; ?>
        </div>
    </div>
</header>
