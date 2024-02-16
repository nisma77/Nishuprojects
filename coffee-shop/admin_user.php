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

    $delete_users = $conn->prepare("DELETE FROM users WHERE id = :delete_id");
    $delete_users->execute(array(':delete_id' => $delete_id));
    $message [] = 'user removed successfully';
    header('location: admin_user.php');
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
    <div class="line2"></div>
    <!-- <section class="message-container"> -->
        <h1 class="title">total user accounts</h1>
        <!-- <div class="box-container"> -->
            <?php 
                $select_users = $conn->prepare("SELECT * FROM users ");
                $select_users->execute();
                if($select_users->rowCount() > 0){

                       
            ?>
            <div class="user-display">
                <table class="user-display-table">
                    <thead>
                        <tr>
                            <th>user id</th>
                            <th>name</th>
                            <th>email</th>
                            <th>user_type</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        while($fetch_users = $select_users->fetch(PDO::FETCH_ASSOC)){   ?>
                    
                    <tr>
                            <td><?=$fetch_users['id']; ?></td>
                            <td><?=$fetch_users['name']; ?></td>
                            <td><?=$fetch_users['email']; ?></td>
                            <td><?=$fetch_users['user_type']; ?></td>
                            <td>
                            <a href="admin_user.php?delete=<?=$fetch_users['id']; ?>" class="delete" onclick="return confirm('want to delete this user?');">delete</a>
                            </td>
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
            <!-- <div class="box">
                <p>user id: <span><?=$fetch_users['id']; ?></span></p>
                <p>name: <span><?=$fetch_users['name']; ?></span></p>
                <p>email: <span><?=$fetch_users['email']; ?></span></p>
                <p>user_type: <span><?=$fetch_users['user_type']; ?></span></p>
            <a href="admin_user.php?delete=<?=$fetch_users['id']; ?>" class="delete" onclick="return confirm('want to delete this user?');">delete</a>
            </div> -->
            <?php   
                    
                  }else{
                    echo '<div class="empty">
                    <p>no users added yet! </p>
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