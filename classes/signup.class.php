<?php

    class Signup extends DBh {
        protected function checkUser ($email, $name) {
            $statement = $this->connect()->prepare('SELECT `id` FROM `users` WHERE `name`= ? OR `email`= ?');
        };

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