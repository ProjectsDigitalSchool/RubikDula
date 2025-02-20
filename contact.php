<?php include('header.php')?>

<style>

.contact {
    padding: 130px 0;
}

.contact .heading h2 {
    font-size: 30px;
    font-weight: 700;
    margin: 0;
    padding: 0;

}

.contact .heading h2 span {
    color: #02434b;
}

.contact .heading p {
    font-size: 15px;
    font-weight: 400;
    line-height: 1.7;
    color: #999999;
    margin: 20px 0 60px;
    padding: 0;
}

.contact .form-control {
    padding: 25px;
    font-size: 13px;
    margin-bottom: 10px;
    background: #f9f9f9;
    border: 0;
    border-radius: 10px;
}

.contact button.btn {
    padding: 10px;
    border-radius: 10px;
    font-size: 15px;
    background: #010101;
    color: #ffffff;
}

.contact .title h3 {
    font-size: 18px;
    font-weight: 600;
}

.contact .title p {
    font-size: 14px;
    font-weight: 400;
    color: #999;
    line-height: 1.6;
    margin: 0 0 40px;
}

.contact .content .info {
    margin-top: 30px;
}
.contact .content .info i {
    font-size: 30px;
    padding: 0;
    margin: 0;
    color: #02434b;
    margin-right: 20px;
    text-align: center;
    width: 20px;
}
.contact .content .info h4 {
    font-size: 13px;
    line-height: 1.4;
}

.contact .content .info h4 span {
    font-size: 13px;
    font-weight: 300;
    color: #999999;
}

</style>

<section class="contact" id="contact">
    <div class="container">
        <div class="heading text-center">
            <h2>Contact <span> Us </span></h2>
            <p>We work 24/7 to answer your requests</p>
        </div>
        <div class="row">
            <div class="col-md-5">
                <div class="title">
                    <h3>Contact detail</h3>
                    <p>Contact us Via</p>
                </div>
                <div class="content">
                    <!-- Info-1 -->
                    <div class="info">
                        <i class="fas fa-mobile-alt"></i>
                        <h4 class="d-inline-block">PHONE :
                            <br>
                            <span>+12457836913 </span></h4>
                    </div>
                    <!-- Info-2 -->
                    <div class="info">
                        <i class="far fa-envelope"></i>
                        <h4 class="d-inline-block">EMAIL :
                            <br>
                            <span>scentsy@gmail.com</span></h4>
                    </div>
                    <!-- Info-3 -->
                    <div class="info">
                        <i class="fas fa-map-marker-alt"></i>
                        <h4 class="d-inline-block">ADDRESS :<br>
                            <span>6743 last street , Abcd, Xyz</span></h4>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <form id="contactForm" action="server/contact_process.php" method="POST">
                    <p class="text-center" style="color: red;">
                    <?php if(isset($_GET['message'])){echo $_GET['message'];}?>
                    <?php if(isset($_GET['message'])) { ?>

                        <a href="login.php" class="btn btn-primary">Login</a>
                    
                    <?php }  ?>
                    </p>
                    <?php if(isset($_GET['messagegood'])) { ?>
                        <p class="text-center" style="color: green;"><?php echo $_GET['messagegood'];?></p>
                    <?php } ?>
                    <div class="row">
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                        </div>
                        <div class="col-sm-6">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                        </div>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject">
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" rows="5" id="message" name="message" placeholder="Message"></textarea>
                    </div>
                    <button class="btn btn-block" type="submit" id="submitBtn">Send Now!</button>
                </form>
            </div>
        </div>
    </div>
</section>

<div><?php include('footer.php');?></div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    </body>
</html>




