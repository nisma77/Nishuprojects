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

//deleting products from database
    if(isset($_GET['delete'])){
     $delete_id = $_GET['delete'];

    $delete_product = $conn->prepare("DELETE FROM message WHERE id = :delete_id");
    $delete_product->execute(array(':delete_id' => $delete_id));
    
    header('location: admin_message.php');
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
                <h1>Messages</h1>
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
    <div class="line2"></div>
    <!-- <section class="message-container"> -->
        <h1 class="title">unread messages</h1>
        <!-- <div class="box-container">-->
            <?php  
                $select_message = $conn->prepare("SELECT * FROM message ");
                $select_message->execute();
                    if($select_message->rowCount() > 0){
                       
                       
            ?>
            <div class="product-display">
                <table class="product-display-table">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>name</th>
                            <th>email</th>
                            <th>number</th>
                            <th>message</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                         while($fetch_message = $select_message->fetch(PDO::FETCH_ASSOC)){
                            ?>
                    
                    <tr>
                            <td><?=$fetch_message['id']; ?></td>
                            <td><?=$fetch_message['name']; ?></td>
                            <td><?=$fetch_message['email']; ?></td>
                            <td><?=$fetch_message['number']; ?></td>
                            <td><?=$fetch_message['message']; ?></td>
                            <td>
                            <a href="admin_message.php?delete=<?=$fetch_message['id']; ?>" class="delete" onclick="return confirm('want to delete this message?');">delete</a>
                            </td>
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
            <!-- <div class="box">
                <p>user id: <span><?=$fetch_message['id']; ?></span></p>
                <p>name: <span><?=$fetch_message['name']; ?></span></p>
                <p>email: <span><?=$fetch_message['email']; ?></span></p>
                <p>number: <span><?=$fetch_message['number']; ?></span></p>
                <p><?=$fetch_message['message']; ?></p>
            <a href="admin_message.php?delete=<?=$fetch_message['id']; ?>" class="delete" onclick="return confirm('want to delete this message?');">delete</a>
            </div> -->
            <?php   
                     }else{
                    echo '<div class="empty">
                    <p>no messages added yet! </p>
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