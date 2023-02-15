<?php

    if(isset($_POST['submit'])){

        /**
         * Grabbing the data form the signup form
         */

        $name = $_POST['full_name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $pwd = $_POST['password'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $zip = $_POST['zip'];

        /**
         * Instantiate SignupContr class
         */
        include "../classes/signup.class.php";
        include "../classes/signup-controller.class.php";

        $signup = new SignupController($name, $email, $phone, $pwd, $address, $city, $state, $zip);
    }