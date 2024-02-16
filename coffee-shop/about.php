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
<style type="text/css">
    <?php include 'style.css'; ?>
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/boxicons/2.0.7/css/boxicons.min.css">
    <title>Coffee - About us page</title>
</head>
<body>
    <?php include 'components/header.php'; ?>
    <div class="main">
        <div class="banner">
            <h1>about us</h1>
        </div>
        <div class="title2">
            <a href="home.php">home</a><span>/about</span>
        </div>
        <div class="about-category">
            <div class="box">
                <img src="images/IC.webp">
                <div class="detail">
                    <span>Coffee</span>
                    <h1>Iced Coffee</h1>
                    <a href="view_products.php" class="btn">shop now</a>
                </div>
            </div>
            <div class="box">
                <img src="images/DR.jpg">
                <div class="detail">
                    <span>Coffee</span>
                    <h1>Dark Roast</h1>
                    <a href="view_products.php" class="btn">shop now</a>
                </div>
            </div>
            <div class="box">
                <img src="images/C.jpeg">
                <div class="detail">
                    <span>Coffee</span>
                    <h1>Capaccino</h1>
                    <a href="view_products.php" class="btn">shop now</a>
                </div>
            </div>
            <div class="box">
                <img src="images/BC.jpg">
                <div class="detail">
                    <span>Coffee</span>
                    <h1>Black Coffee</h1>
                    <a href="view_products.php" class="btn">shop now</a>
                </div>
            </div>
        </div>
        <section class="services">
            <div class="title">
                <img src="images/coffeebeans.webp" class="logo">
                <h1>why choose us</h1>
                <p>we are here at your service</p>
            </div>
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
        <div class="about">
            <div class="row">
                <div class="img-box">
                    <img src="images/shop.jpg">
                </div>
                <div class="detail">
                    <h1>visit our beautiful shop !</h1>
                    <p>The coffee house will offer a variety of choices to the customers. Coffee of all sorts will be offered. The choices of coffee will range from espresso to latte, from regular flavor to raspberry-mocha.The interior design of the building will focus on projecting a relaxed atmosphere. The bottom portion of the walls will be chocolate brown with the upper being eggshell white. The carpeting will be chocolate brown. The table and chairs will be custom made from light oak. The chair coverings will be of chocolate brown material and heavily padded for comfort. The table tops will be a marbleized chocolate brown laminate</p>
                    <a href="view_products.php" class="btn">shop now</a>
                </div>
            </div>
        </div>
        <div class="testimonial-container">
            <div class="title">
                <img src="images/coffeebeans.webp" class="logo">
                <h1>what poeple say about us</h1>
                <p>Our Reviews....</p>
            </div>
                <div class="container">
                    <div class="testimonial-item active">
                        <img src="images/f2.jpeg">
                        <h1>Elon Musk</h1>
                        <p>I really like the atmosphere, good coffee, and nice interior. This is a good place to study or chill with friends. The drinks and foods were all tasty and worthwhile. If you’re up for a fresh place with beautiful architecture then this is a must to visit.</p>
                    </div>
                    <div class="testimonial-item">
                        <img src="images/f1.jpeg">
                        <h1>Aishwarya Rai</h1>
                        <p>Will go again.I only popped in to get take-away cappuccinos, but I was struck by how friendly the service was. The cappuccinos were wonderful too! And very well priced</p>
                    </div>
                    <div class="testimonial-item">
                        <img src="images/f3.jpeg">
                        <h1>Saipallavi Senthamarai</h1>
                        <p> This place is amazing! They offered the best coffee and showed the best attitude to its costumers. Internet connection is very fast and is unlimited as well. This place is indeed perfect for studying and chilling out. It was very quiet and air-conditioned. I just want to keep coming back to this place. Thank you!</p>
                    </div>
                    
                    <div class="right-arrow" onclick="prevSlide()"><i class="bx bxs-right-arrow-alt"></i></div>
                    <div class="left-arrow" onclick="nextSlide()"><i class="bx bxs-left-arrow-alt"></i></div>
                </div>
        </div>
        <script>
            var slideIndex = 0;
            showSlide(slideIndex);

            function nextSlide() {
                showSlide(slideIndex + 1);
            }

            function prevSlide() {
                showSlide(slideIndex - 1);
            }

            function showSlide(index) {
                var slides = document.getElementsByClassName('testimonial-item');

                if (index >= slides.length) {
                    index = 0;
                } else if (index < 0) {
                    index = slides.length - 1;
                }

                for (var i = 0; i < slides.length; i++) {
                    slides[i].classList.remove('active');
                }

                slides[index].classList.add('active');
                slideIndex = index;
            }
        </script>
        <?php include 'components/footer.php'; ?>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.2/dist/boxicons.min.js" integrity="sha512-lJnB3NZ8cxFjfTz9Z0asB+FDVgtHDqaE1+nNRgPmnWZvSKp6FMV3Z6vPU/H5v49cJfmeRQpuE32lW0SUQrbEWQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="script.js"></script>
    <?php include 'components/alert.php'; ?>
</body>
</html>