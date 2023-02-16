<?php

    class Signup extends DBh {

        protected function setUser ($email, $pwd, $name) {
            $statement = $this->connect()->prepare('INSERT INTO `user` (`email`, `name`, `password`) VALUES (?,?,?)');

            $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

            if(!$statement->execute(array($email, $hashedPwd, $name))) {
                $statement = null;
                header('location: ../index.php?error=statementfailed');
                exit();

            }

            $statement = null;
        }

        protected function checkUser ($email, $name) {
            $statement = $this->connect()->prepare('SELECT `id` FROM `users` WHERE `name`= ? OR `email`= ?');
    
            if (!$statement->execute(arra($email, $name))) {
                $statement = null;
                header("location: ../index.php?error=statemented");
                exit();
            }
    
            $resultCheck;
    
            if ($statement->rowCount() > 0) {
                $resultCheck = false;
            }else{
                $resultCheck = true;
            }
            return $resultCheck;
        }

    }