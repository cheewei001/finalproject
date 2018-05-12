<?php
session_start();
//include 'includes/security.php';
include 'includes/header.php';
?>
<div class="container-fluid" style="padding:0; height: 100%">
        <div class="col-lg-12 text-center" style="background-image: url('img/hero_image.jpg'); height: 100vh; background-position: center; background-repeat: no-repeat; background-size: cover">
            <div class="container" style="color: white; position: absolute; height: auto; top: 50%; left: 50%; transform: translate(-50%, -50%)">
                <h1 style="font-size: 65px">DO WHAT YOU LOVE</h1>
                <h3>Explore jobs, internships, courses and other opportunities!</h3>
                <br/><br/>
                <a href="#companyhistory1"><img src="img/more_icon.png"></a>
            </div>            
        </div>
    </div>
    <div class="container-fluid" style="padding:0">
        <div class="col-lg-12 text-center" id="companyhistory1" style="background-color: #FF6600">
            <div class="row">
            <div class="col-lg-1 col-md-1"></div>
            <div class="col-lg-10 col-md-10" style="color: white; padding: 50px">
                <h1 style="font-size: 65px; padding-bottom: 20px">Company History</h1>
                <p>Jeff Weiner is the CEO of the company, and management includes experienced executives from companies such as Yahoo!, Google, Microsoft, TiVo, PayPal and Electronic Arts.
                    ABC Job leads a diversified business with revenues from membership subscriptions, advertising sales and recruitment solutions. In December 2016, 
                    Microsoft completed its acquisition of ABC Job, bringing together the world’s leading professional cloud and the world’s leading professional network.
                       <br/><br/>
                    For more information about our company, please visit our Company Page and check out our ABC Job Blog.
                    For more information about our Products & Services, visit our Products & Services page.</p>
                <br/><br/>
                <a href="#top"><img src="img/up_icon.png"></a>
            </div>
            <div class="col-lg-1 col-md-1"></div>
            </div>
        </div>
    </div>
    <div class="container text-center" style="margin-top:30px">
        <div class="row">
            <div class="col-sm-12 col-md-4">
                <div class="thumbnail" style="border: 0px">
                <img src="img/whatson_1.jpg" alt="...">
                <div class="caption">
                    <h3>ABC Jobs Employees’ Choice Awards 2018</h3>
                    <p>ABC Jobs Employees’ Choice Awards honor the Best Places to Work across Singapore and parts of South East Adia.</p>
                </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="thumbnail" style="border: 0px">
                <img src="img/whatson_2.jpg" alt="...">
                <div class="caption">
                    <h3>31 Companies Hiring Like Crazy in the New Year!</h3>
                    <p>Great work-life balance, impressive perks, enviable benefits and jobs that will truly deliver!</p>
                </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="thumbnail" style="border: 0px">
                <img src="img/whatson_3.jpg" alt="...">
                <div class="caption">
                    <h3>Are You Paid Fairly? See Your Market Worth in Seconds</h3>
                    <p>Receive a custom salary estimate based on your title, company, location, and experience.</p>
                </div>
                </div>
            </div>
        </div>
    </div>

<?php
include 'includes/footer.php';
?>
