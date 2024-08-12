<?php

namespace Http\Forms;

use core\Validator;

class LoginForm{
  protected $errors = [];
  public function validate($email, $password){
    if (!Validator::email($email)) {
      $this->errors['email'] = "Please provide a valid email address";
    }

    if (!Validator::string($password)) {
      $this->errors['password'] = "Please provide a vlaid password";
    }

    return empty($this->errors);
  }

  public function errors(){
    // getter function
    return $this->errors;
  }
}