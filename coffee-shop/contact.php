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
 if(isset($_POST['submit-btn'])){
    $name = $_POST['name'];
    $name = filter_var($name, FILTER_SANITIZE_STRING);
    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_STRING);
    $number = $_POST['number'];
    $number = filter_var($number, FILTER_SANITIZE_STRING);
    $message = $_POST['message'];
    $message = filter_var($message, FILTER_SANITIZE_STRING);
    
    $select_message = $conn->prepare("SELECT * FROM message WHERE  name = ? AND email = ? AND number = ? AND message = ?");
    $select_message->execute([$name,$email,$number,$message]);
    //$select_message->execute();
    $row = $select_message->fetch(PDO::FETCH_ASSOC);

    //$message = []; // Initialize $message as an empty array

        if($select_message->rowCount() > 0){
            
            //echo  'message already sent' ;
            echo 'message already sent' ;
            
            }else{
            $insert_message = $conn->prepare("INSERT INTO message (user_id, name, email, number, message) VALUES (?, ?, ?, ?, ?)");
            $insert_message->execute([$user_id, $name, $email, $number, $message]);
            echo 'message inserted succeessfully';
        }
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
    <title>Coffee - Home page</title>
</head>
<body> 


    <?php include 'components/header.php'; ?>
    <div class="main">
        <div class="banner">
            <h1>contact us</h1>
        </div>
            <div class="title2">
                <a href="home.php">home</a><span>/contact us</span>
        </div>
        <section class="services">
            <div class="box-container">
            <div class="box">
                    <img src="images/savings.png">
                    <div class="detail">
                        <h3>great savings</h3>
                        <p>save big every order</p>
                    </div>
                </div>
                <div class="box">
                    <img src="images/support.jpg">
                    <div class="detail">
                        <h3>24*7 support</h3>
                        <p>one-on-one support</p>
                    </div>
                </div>
                <div class="box">
                    <img src="images/gift.jpg">
                    <div class="detail">
                        <h3>gift vouchers</h3>
                        <p>vouchers on every festivals</p>
                    </div>
                </div>
                <div class="box">
                    <img src="images/delivery.jpg">
                    <div class="detail">
                        <h3>worldwide delivery</h3>
                        <p>dropship worldwide</p>
                    </div>
                </div>
            </div>
        </section>
        <div class="form-container">
            <form method="post">
                <div class="title">
                    <img src="images/coffeebeans.webp" class="logo">
                    <h1>leave a message</h1>
                </div>
                <div class="input-field">
                    <p>your name <sup>*</sup></p>
                    <input type="text" name="name">
                </div>
                <div class="input-field">
                    <p>your email <sup>*</sup></p>
                    <input type="text" name="email">
                </div>
                <div class="input-field">
                    <p>your number <sup>*</sup></p>
                    <input type="text" name="number">
                </div>
                <div class="input-field">
                    <p>your message <sup>*</sup></p>
                    <textarea name="message"></textarea>
                </div>
                <button type="submit" name="submit-btn" class="btn">send message</button>
            </form>
        </div>
        <div class="address">
                <div class="title">
                    <img src="images/coffeebeans.webp" class="logo">
                    <h1>Contact detail</h1>
                    <p>For more information , Contact here</p>
                </div> 
                <div class="box-container">
                    <div class="box">
                        <i class="bx bxs-map-pin"></i>
                        <div>
                            <h4>address</h4>
                            <p>12/297, Tharalanda road Matale</p>
                        </div>
                    </div>
                    <div class="box">
                        <i class="bx bxs-phone-call"></i>
                        <div>
                            <h4>phone number</h4>
                            <p>0773532940</p>
                        </div>
                    </div>
                    <div class="box">
                        <i class="bx bxs-envelope"></i>
                        <div>
                            <h4>email</h4>
                            <p>nismanausar@gmail.com</p>
                        </div>
                    </div>
                </div>
            </div>
        <?php include 'components/footer.php'; ?>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.2/sweetalert.js"></script>
    <script src="script.js"></script>
    <?php include 'components/alert.php'; ?>
</body>
</html>