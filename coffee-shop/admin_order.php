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

//deleting orders from database
    if(isset($_GET['delete'])){
     $delete_id = $_GET['delete'];

    $delete_orders = $conn->prepare("DELETE FROM orders WHERE id = :delete_id");
    $delete_orders->execute(array(':delete_id' => $delete_id));
    $message [] = 'order removed successfully';
    header('location: admin_order.php');
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
    <!-- <section class="admin-products">
            <div class="title">
                <img src="images/coffeebeans.webp" >
                <h1>Users</h1>
            </div>
            <div class="row">
                <img src="images/coffee1.jpeg" >
                <div class="row-detail">
                    <img src="images/making.jpg" >
                    <div class="top-footer">
                        <h1>a cup of coffee makes you healthy</h1>
                    </div>
                </div>
            </div>
    </section> -->
    <!-- <div class="line2"></div>
    <section class="order-container"> -->
        <h1 class="title">total orders</h1>
        <!-- <div class="box-container"> -->
            <?php 
                $select_orders = $conn->prepare("SELECT * FROM orders ");
                $select_orders->execute();
                    if($select_orders->rowCount() > 0){
                        

                       
            ?>
            <div class="order-display">
                <table class="order-display-table">
                    <thead>
                        <tr>
                            <th>name</th>
                            <th>user id</th>
                            <th>number</th>
                            <th>email</th>
                            <th>address</th>
                            <th>address type</th>
                            <th>method</th>
                            <th>status</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        while($fetch_orders = $select_orders->fetch(PDO::FETCH_ASSOC)){   ?>
                    
                    <tr>
                            <td><?=$fetch_orders['name']; ?></td>
                            <td><?=$fetch_orders['user_id']; ?></td>
                            <td><?=$fetch_orders['number']; ?></td>
                            <td><?=$fetch_orders['email']; ?></td>
                            <td><?=$fetch_orders['address']; ?></td>
                            <td><?=$fetch_orders['address_type']; ?></td>
                            <td><?=$fetch_orders['method']; ?></td>
                            <td><form method="post">
                                <input type="hidden" name="order_id" value="<?=$fetch_orders['id']; ?>">
                                <select name="status">
                                    <option value="delivered">delivered</option>
                                    <option value="canceled">canceled</option>
                                </select>
                                </form>
                            </td>
                            <td>
                            <a href="admin_order.php?delete=<?=$fetch_orders['id']; ?>" class="delete" onclick="return confirm('want to delete this order?');">delete</a>
                            </td>
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
            <!-- <div class="box">
                <p>name: <span><?=$fetch_orders['name']; ?></span></p>
                <p>user id: <span><?=$fetch_orders['user_id']; ?></span></p>
                <p>number: <span><?=$fetch_orders['number']; ?></span></p>
                <p>email: <span><?=$fetch_orders['email']; ?></span></p>
                <p>address: <span><?=$fetch_orders['address']; ?></span></p>
                <p>address_type: <span><?=$fetch_orders['address_type']; ?></span></p>
                <p>method: <span><?=$fetch_orders['method']; ?></span></p> -->
                <!-- <form method="post">
                    <input type="hidden" name="order_id" value="<?=$fetch_orders['id']; ?>">
                    <select name="status">
                        <option value="delivered">delivered</option>
                        <option value="canceled">canceled</option>
                    </select>
                </form> -->
            <!-- <a href="admin_order.php?delete=<?=$fetch_orders['id']; ?>" class="delete" onclick="return confirm('want to delete this order?');">delete</a>
            </div> -->
            <?php   
                     }
                   else{
                    echo '<div class="empty">
                    <p>no orders added yet! </p>
                </div> ';
                 } 
            ?>
        <!-- </div>
    </section> -->
        <!-- <?php include 'components/footer.php'; ?> -->
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.2/dist/boxicons.min.js" integrity="sha512-lJnB3NZ8cxFjfTz9Z0asB+FDVgtHDqaE1+nNRgPmnWZvSKp6FMV3Z6vPU/H5v49cJfmeRQpuE32lW0SUQrbEWQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="script.js"></script>
    <script src="slider-script.js"></script>
    <?php include 'components/alert.php'; ?>
</body>
</html>