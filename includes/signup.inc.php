<?php

    if($_POST['full_name'] != null && $_POST['phone'] != null && $_POST['email'] != null && $_POST['address'] != null && $_POST['password'] != null && $_POST['confirm_password'] != null && $_POST['city'] != null && $_POST['state'] != null && $_POST['zip'] != null){
       
        /**
         * Grabbing the data form the signup form
         */

        $name = $_POST['full_name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $pwd = $_POST['password'];
        $cof_pwd = $_POST['confirm_password'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $zip = $_POST['zip'];
        
        /**
         * Instantiate SignupContr class
         */
        include "../classes/dbh.classes.php";
        include "../classes/signup.class.php";
        include "../classes/signup-controller.class.php";

        $signup = new SignupController($name, $email, $phone, $pwd, $address, $city, $state, $zip, $cof_pwd);

        // print_r($signup);
        // exit();

        /**
         * Running error handlers and user signup
         */
        $signup->signupUser();

        /**
         * Going to back to front page
         */

         header("location: ../index.php?error=none");

    }