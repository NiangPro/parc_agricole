<?php

class Fonction {
    public function errors($errors=[], $type="info")
    {
       if(count($errors) > 0){
            $_SESSION['errors']['message'] = $errors;
            $_SESSION['errors']['type'] = $type;
       }
    }

    public function notEmpty($tab = []){
        $response = true;

        if(count($tab) > 0){
            foreach ($tab as $value) {
                if(empty($value)){
                    $response = false;
                }
            }
        }else{
            $response = false; 
        }

        return $response;
    }
}