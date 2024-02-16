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
    <title>Coffee - Home page</title>
</head>
<body>
    <?php include 'components/header.php'; ?>
    <div class="main">
        <section class="home-section">
        <div class="slider">
            <div class="slider_slider slide1">
                <div class="overlay"></div>
                    <div class="slide-detail">
                        <h1>Welcome to my coffee house</h1>
                        <p>Get best discount on all flavour</p>
                        <a href="view_products.php" class="btn">shop now</a>
                    </div>
                    <div class="hero-dec-top"></div>
                    <div class="hero-dec-bottom"></div>
            </div>
            <!----slide end---->
            <div class="slider_slider slide2">
                <div class="overlay"></div>
                    <div class="slide-detail">
                    <h1>Welcome to my coffee house</h1>
                    <p>Get best discount on all flavour</p>
                        <a href="view_products.php" class="btn">shop now</a>
                    </div>
                    <div class="hero-dec-top"></div>
                    <div class="hero-dec-bottom"></div>
            </div>
            <!----slide end---->
            <div class="slider_slider slide3">
                <div class="overlay"></div>
                    <div class="slide-detail">
                    <h1>Welcome to my coffee house</h1>
                    <p>Get best discount on all flavour</p>
                        <a href="view_products.php" class="btn">shop now</a>
                    </div>
                    <div class="hero-dec-top"></div>
                    <div class="hero-dec-bottom"></div>
            </div>
            <!----slide end---->
            <div class="slider_slider slide4">
                <div class="overlay"></div>
                    <div class="slide-detail">
                    <h1>Welcome to my coffee house</h1>
                    <p>Get best discount on all flavour</p>
                        <a href="view_products.php" class="btn">shop now</a>
                    </div>
                    <div class="hero-dec-top"></div>
                    <div class="hero-dec-bottom"></div>
            </div>
            <!----slide end---->
            <div class="slider_slider slide5">
                <div class="overlay"></div>
                    <div class="slide-detail">
                    <h1>Welcome to my coffee house</h1>
                    <p>Get best discount on all flavour</p>
                        <a href="view_products.php" class="btn">shop now</a>
                    </div>
                    <div class="hero-dec-top"></div>
                    <div class="hero-dec-bottom"></div>
            </div>
            <!----slide end---->
            <div class="left-arrow"><i class="bx bxs-left-arrow"></i></div>
            <div class="right-arrow"><i class="bx bxs-right-arrow"></i></div>
        </div>
        </section>
        <!----home slider end---->
        <section class="thumb">
            <div class="box-container">
                <div class="box">
                    <img src="images/BC.jpg">
                    <h3>Black Coffee</h3>
                    <p>a cup of coffee makes you healthy</p>
                    <i class="bx bx-chevron-right"></i>
                </div>
                <div class="box">
                    <img src="images/DR.jpg">
                    <h3>Dark Roast</h3>
                    <p>a cup of coffee makes you healthy</p>
                    <i class="bx bx-chevron-right"></i>
                </div>
                <div class="box">
                    <img src="images/C.jpeg">
                    <h3>Cappuccino</h3>
                    <p>a cup of coffee makes you healthy</p>
                    <i class="bx bx-chevron-right"></i>
                </div>
                <div class="box">
                    <img src="images/IC.jpg">
                    <h3>Iced Coffee</h3>
                    <p>a cup of coffee makes you healthy</p>
                    <i class="bx bx-chevron-right"></i>
                </div>
            </div>
        </section>
        <section class="container">
            <div class="box-container">
                <div class="box" id="box1">
                    <img src="images/save.png" >
                </div>
                <div class="box" id="box2">
                    <img src="images/coffeebeans.webp" >
                    <span>healthy coffee</span>
                    <h1>save upto 50% off</h1>
                    <p>Feel our warm and  cozy atmosphere , where<br> everybody can find aromatic sort of  coffee and<br> try our delicious desserts,  perfectly coupled with<br> hot coffee.  Our stylish interior and friendly <br>staff will make your day</p>
                </div>
            </div>
        </section>
        <section class="shop">
            <div class="title">
                <img src="images/coffeebeans.webp" >
                <h1>Trending Products</h1>
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
            <div class="box-container">
                <div class="box">
                    <img src="images/card0.jpg">
                    <a href="view_products.php" class="btn">shop now</a>
                </div>
                <div class="box">
                    <img src="images/card1.jpg">
                    <a href="view_products.php" class="btn">shop now</a>
                </div>
                <div class="box">
                    <img src="images/card2.jpg">
                    <a href="view_products.php" class="btn">shop now</a>
                </div>
                <div class="box">
                    <img src="images/card3.jpeg">
                    <a href="view_products.php" class="btn">shop now</a>
                </div>
                <div class="box">
                    <img src="images/card4.jpg">
                    <a href="view_products.php" class="btn">shop now</a>
                </div>
                <div class="box">
                    <img src="images/card5.jpg">
                    <a href="view_products.php" class="btn">shop now</a>
                </div>
            </div>
        </section>
        <section class="shop-category">
            <div class="box-container">
                <div class="box">
                    <img src="images/powder1.webp">
                    <div class="detail">
                        <span>BIG OFFERS</span>
                        <h1>Extra 15% off</h1>
                        <a href="view_products.php" class="btn">shop now</a>
                    </div>
                </div>
                <div class="box">
                    <img src="images/powder2.jpg">
                    <div class="detail">
                        <span>new in taste</span>
                        <h1>coffee house</h1>
                        <a href="view_products.php" class="btn">shop now</a>
                    </div>
                </div>
            </div>
        </section>
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
        <section class="brand">
            <div class="box-container">
                <div class="box">
                    <img src="images/logo11.jpg">
                </div>
                <div class="box">
                    <img src="images/logo12.jpg">
                </div>
                <div class="box">
                    <img src="images/logo13.jpg">
                </div>
                <div class="box">
                    <img src="images/logo14.jpg">
                </div>
                <div class="box">
                    <img src="images/logo15.jpg">
                </div>
            </div>
        </section>
        <?php include 'components/footer.php'; ?>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.2/dist/boxicons.min.js" integrity="sha512-lJnB3NZ8cxFjfTz9Z0asB+FDVgtHDqaE1+nNRgPmnWZvSKp6FMV3Z6vPU/H5v49cJfmeRQpuE32lW0SUQrbEWQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="script.js"></script>
    <script src="slider-script.js"></script>
    <?php include 'components/alert.php'; ?>
</body>
</html>