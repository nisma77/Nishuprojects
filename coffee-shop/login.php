<?php
    include 'components/connection.php';
    session_start();

    if(isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
    }else{
        $user_id = '';
    }


    
    //login user
    if(isset($_POST['submit'])){
        // $id = unique_id();
        $email = $_POST['email'];
        $email = filter_var($email, FILTER_SANITIZE_STRING);
        $pass = $_POST['pass'];
        $pass = filter_var($pass, FILTER_SANITIZE_STRING);

        $select_user = $conn->prepare("SELECT * FROM users WHERE  email = ? AND password = ?");
        $select_user->execute([$email,$pass]);
        $row = $select_user->fetch(PDO::FETCH_ASSOC);


        if($select_user->rowCount() > 0){
            if($row['user_type']=='admin') {
                    $_SESSION['admin_id'] = $row['id'];
                    $_SESSION['admin_name'] = $row['name'];
                    $_SESSION['admin_email'] = $row['email'];
                    header('location: admin_panel.php');
            }elseif($row['user_type']=='user'){
                    $_SESSION['user_id'] = $row['id'];
                    $_SESSION['user_name'] = $row['name'];
                    $_SESSION['user_email'] = $row['email'];
                    header('location: home.php');
            }else{
           
                    $message[] = 'incorrect username or password';
                    //echo 'incorrect username or password';
        }
    } else {
        $message[] = 'incorrect username or password';
        //echo 'incorrect username or password';
    }
    
    }


?>
<!-- <?php if (isset($success_msg)): ?>
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
 <?php endif; ?> -->

<style type="text/css">
    <?php include 'style.css'; ?>
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coffee - login now</title>
</head>
<body>
<?php 
    if(isset($message)) {
        foreach($message as $msg) {
            echo '<span class="alert-message">' .$msg.'</span>';
        }
    }
?>
    <div class="main-container">
        <section class="form-container">
            <div class="title">
                <img src="images/coffeebeans.webp">
                <h1>login now</h1>
                <p>Already have an account</p>
            </div>
            <form action="login.php" method="post">
                <div class="input-field">
                    <p>your email <sup>*</sup></p>
                    <input type="email" name="email" required placeholder="enter your email" maxlength="50" oninput="this.value = this.value.replace(/\s/g,'')">
                </div>
                <div class="input-field">
                    <p>your password <sup>*</sup></p>
                    <input type="password" name="pass" required placeholder="enter your password" maxlength="50" oninput="this.value = this.value.replace(/\s/g,'')">
                </div>
                <input type="submit" name="submit" value="login now" class="btn">
                <p>don't have an account? <a href="register.php">register now</a></p>
            </form>
        </section>
    </div>
    <script src="script.js"></script>
    <?php include 'components/alert.php'; ?>


</body>
</html>