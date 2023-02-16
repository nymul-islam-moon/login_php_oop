<?php
    class SignupController extends Signup {
        private $name;
        private $email;
        private $phone;
        private $pwd;
        private $Repeatpwd;
        private $address;
        private $city;
        private $state;
        private $zip;


        public function __construct($name, $email, $phone, $pwd, $address, $city, $state, $zip, $Repeatpwd){
            $this->name = $name;
            $this->email = $email;
            $this->phone = $phone;
            $this->address = $address;
            $this->city = $city;
            $this->state = $state;
            $this->zip = $zip;
            $this->pwd = $pwd;
            $this->Repeatpwd = $Repeatpwd;
        }

        public function signupUser () {
            if ($this->emptyInput() == false) {
                // Echo "Empty input!";

                header('location: ../index.php?error=emptyinput');
                exit();
            }

            if ($this->invalidName() == false) {
                // Echo "Empty input!";

                header('location: ../index.php?error=username');
                exit();
            }

            if ($this->invalidEmail() == false) {
                // Echo "Empty input!";

                header('location: ../index.php?error=email');
                exit();
            }

            if ($this->passwordMatch() == false) {
                // Echo "Empty input!";

                header('location: ../index.php?error=Password');
                exit();
            }

            if ($this->nameTakenCheck() == false) {
                // Echo "Empty input!";

                header('location: ../index.php?error=useroremail');
                exit();
            }

        }

        private function emptyInput() {
            $result;
            if ( empty($this->name) || empty($this->email) || empty($this->phone) || empty($this->address) || empty($this->city) || empty($this->state) || empty($this->zip) || empty($this->pwd) || empty($this->Repeatpwd) ){
                $result = false;
            }else{
                $result = true;
            }

            return $result;
        }


        private function invalidName () {
            $result;
            if (!preg_match ("/^[a-zA-Z0-9]*$/", $this->name)){
                $result = false;
            }else{
                $result = true;
            }
            return $result;
        }


        private function invalidEmail () {
            $result;
            if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
                $result = false;
            }else{
                $result = true;
            }

            return $result;
        }

        private function passwordMatch() {
            $result;

           if (!$this->checkUser($this->email, $this->name)){
                $result = false;
           }else{
                $result = true;
           }
           return $result;
        }

        private function nameTakenCheck() {
            $result;

            if (!$this->checkUser($this->$name, $this->email)) {
                $result = false;
            }else {
                $result = true;
            }
            return $result;
        }


    }