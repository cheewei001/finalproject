<?php
session_start();
use classes\business\UserManager;
use classes\business\Validation;

require_once 'includes/autoload.php';
include 'includes/header.php';
?>


<div class="container-fluid" style="padding:0; background-image: url('img/Signin_bg.jpg'); height: 100vh; background-position: center; background-repeat: no-repeat; background-size: cover">
            <div class="col-lg-3 col-md-2 col-sm-1 col-xs-1"></div>
            <!-- clearspace -->
            
            <div class="col-lg-6 col-md-8 col-sm-10 col-xs-10" style="padding-top:50px">
            <div style="background-color:white; padding: 20px; border-radius: 10px; text-align:center;">
                <h1 style="color: #FF6600">ABC Jobs Portal</h1>
                <p>
				Tired searching for a job? Feeling helpless? Tired of waiting for a response after applying on those job portals? We are there to help you out.

				Brand You has come up with an amazing job portal where candidates can apply for desired jobs and even employers can post their requirements. With two separate registrations, this portal allows both candidates and the employers, an ease in searching for the suitable match for each other. It allows the employers to send an email or sms to the candidates they feel are fit for the vacancy they have.
				</p>
 
				<p>
				<b>Features for Candidates:</b><br>

				Candidates can search for a job according to their preferred city.
				Candidates can send their resumes to the companies which are located in their preferred cities.
				Candidates can fill the bio data form which is designed for them in the portal with an attachment of their resume.
				Candidates shall receive an email or sms if they are being short listed for the interview by an employer.
				</p>
				<p>
				<b>Features for Employers:</b><br>

				Employers can find suitable candidates by searching with the desired key words for the vacancy.
				Employers can post the vacancies by filling up a form designed for the same. They can mention the job description and salary offered in that.
				Employers will be allowed to send out an email or sms to those candidates directly who found to fit the criteria of the job opening.
				</p>                
                <br>
            </div>
            </div>
            
            <!-- clearspace -->
            <div class="col-lg-3 col-md-2 col-sm-1 col-xs-1"></div>     
    

<?php
include 'includes/footer.php';
?>