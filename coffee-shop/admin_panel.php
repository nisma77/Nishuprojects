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
    <?php include 'components/admin_header.php'; ?>
    <div class="main">
        <section class="home-section">
        <div class="slider">
            <div class="slider_slider slide1">
                <div class="overlay"></div>
                    <div class="slide-detail">
                        <h1>admin dashboard</h1>
                    </div>
                    <div class="hero-dec-top"></div>
                    <div class="hero-dec-bottom"></div>
            </div>
            <!----slide end---->
            <div class="slider_slider slide2">
                <div class="overlay"></div>
                    <div class="slide-detail">
                        <<h1>admin dashboard</h1>
                    </div>
                    <div class="hero-dec-top"></div>
                    <div class="hero-dec-bottom"></div>
            </div>
            <!----slide end---->
            <div class="slider_slider slide3">
                <div class="overlay"></div>
                    <div class="slide-detail">
                        <<h1>admin dashboard</h1>
                    </div>
                    <div class="hero-dec-top"></div>
                    <div class="hero-dec-bottom"></div>
            </div>
            <!----slide end---->
            <div class="slider_slider slide4">
                <div class="overlay"></div>
                    <div class="slide-detail">
                    <h1>admin dashboard</h1>
                    </div>
                    <div class="hero-dec-top"></div>
                    <div class="hero-dec-bottom"></div>
            </div>
            <!----slide end---->
            <div class="slider_slider slide5">
                <div class="overlay"></div>
                    <div class="slide-detail">
                    <h1>admin dashboard</h1>
                    </div>
                    <div class="hero-dec-top"></div>
                    <div class="hero-dec-bottom"></div>
            </div>
            <!----slide end---->
            <div class="left-arrow"><i class="bx bxs-left-arrow"></i></div>
            <div class="right-arrow"><i class="bx bxs-right-arrow"></i></div>
        </div>
        </section>
        <section class="dashboard">
            <div class="box-container">
                <div class="box">
                    <?php  
                    $total_delivered = 0;
                    $select_delivered = $conn->prepare("SELECT * FROM orders WHERE status='delivered' ");
                    while($fetch_delivered = $select_delivered->fetch(PDO::FETCH_ASSOC)) {
                        $total_delivered += $fetch_delivered['grand_total'];
                    }
                    ?>
                    <h3>$ <?php echo $total_delivered; ?>/-</h3>
                    <p>total delivered</p>
                </div>
                <div class="box">
                    <?php  
                    $total_canceled = 0;
                    $select_canceled = $conn->prepare("SELECT * FROM orders WHERE status='canceled' ");
                    while($fetch_canceled = $select_canceled->fetch(PDO::FETCH_ASSOC)) {
                        $total_canceled += $fetch_canceled['grand_total'];
                    }
                    ?>
                    <h3>$ <?php echo $total_canceled; ?>/-</h3>
                    <p>total canceled</p>
                </div>
                <div class="box">
                    <?php  
                    $select_orders = $conn->prepare("SELECT * FROM orders");
                    $select_orders->execute(); // You need to execute the prepared statement
                    $num_of_orders = $select_orders->rowCount(); // Use rowCount() method
                    ?>
                    <h3> <?php echo $num_of_orders; ?></h3>
                    <p>order placed</p>
                </div>
                <div class="box">
                    <?php  
                    $select_products = $conn->prepare("SELECT * FROM orders");
                    $select_products->execute(); // You need to execute the prepared statement
                    $num_of_products = $select_products->rowCount(); // Use rowCount() method
                    ?>
                    <h3> <?php echo $num_of_products; ?></h3>
                    <p>products added</p>
                </div>
                <div class="box">
                    <?php  
                    $select_users = $conn->prepare("SELECT * FROM users WHERE user_type='user' ");
                    $select_users->execute(); // You need to execute the prepared statement
                    $num_of_users = $select_users->rowCount(); // Use rowCount() method
                    ?>
                    <h3> <?php echo $num_of_users; ?></h3>
                    <p>total users</p>
                </div>
                <div class="box">
                    <?php  
                    $select_message = $conn->prepare("SELECT * FROM message ");
                    $select_message->execute(); // You need to execute the prepared statement
                    $num_of_message = $select_message->rowCount(); // Use rowCount() method
                    ?>
                    <h3> <?php echo $num_of_message; ?></h3>
                    <p>new messages</p>
                </div>
            </div>

        </section>
        <!-- <?php include 'components/footer.php'; ?> -->
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.2/dist/boxicons.min.js" integrity="sha512-lJnB3NZ8cxFjfTz9Z0asB+FDVgtHDqaE1+nNRgPmnWZvSKp6FMV3Z6vPU/H5v49cJfmeRQpuE32lW0SUQrbEWQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="script.js"></script>
    <script src="slider-script.js"></script>
    <?php include 'components/alert.php'; ?>
</body>
</html>