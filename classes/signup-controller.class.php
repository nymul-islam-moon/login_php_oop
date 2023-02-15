<?php
    class SignupController {
        private $name;
        private $email;
        private $phone;
        private $pwd;
        private $Repeatpwd;
        private $address;
        private $city;
        private $state;
        private $zip;

        private $result = false;

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

        private function emptyInput() {
     
            if ( empty($this->name) || empty($this->email) || empty($this->phone) || empty($this->address) || empty($this->city) || empty($this->state) || empty($this->zip) || empty($this->pwd) || empty($this->Repeatpwd) ){
                $result = false;
            }else{
                $result = true;
            }

            return $result;
        }


        private function invalidName () {
            if (!preg_match ('/^[a-zA-Z0-9]*$/', $this->name)){
                $result = false;
            }else{
                $result = true;
            }
            return $result;
        }


        private function invalidEmail () {
            if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
                $result = false;
            }else{
                $result = true;
            }

            return $result;
        }

        private function passwordMatch() {
            $result;

            if ($this->pwd !== $this->Repeatpwd){
                $return = false;
                
            }else{
                $result = true;
            }
            return $result;
        }



    }