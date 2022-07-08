<?php

class RegisterValidator {

    private $data;
    private $errors = [];
    private static $fields = ['name', 'username', 'password', 'confirmpassword', 'email', 'confirmemail'];
  
    public function __construct($post_data){
      $this->data = $post_data;
    }
    private function __clone(){}
  
    public function validateForm(){
  
      foreach(self::$fields as $field){
        if(!array_key_exists($field, $this->data)){
          trigger_error("'$field' não está presente.");
          return;
        }
      }
      
      $this->validateName();
      $this->validateLogin();
      $this->validateEmail();
      $this->confirmEmail();
      $this->checkEmail();
      $this->validatePassword();
      $this->confirmPassword();
      return $this->errors;
  
    }
  
    private function validateName(){
      $val = trim($this->data['name']);

      if(empty($val)){
        $this->addError('name', '*Este campo deve ser preenchido');
      } else {
      }
    }


    private function validateLogin(){
  
      $val = trim($this->data['username']);
  
      if(empty($val)){
        $this->addError('username', '*Este campo deve ser preenchido');
      } else {
        if(!preg_match('/^[a-zA-Z0-9]{6,18}$/', $val)){
          $this->addError('username','O nome de usuário deve conter entre 6 e 18 caracteres alfanuméricos');
        }
      }
  
    }
  
    private function validateEmail(){
  
      $val = trim($this->data['email']);
  
      if(empty($val)){
        $this->addError('email', 'Este campo deve ser preenchido');
      } else {
        if(!filter_var($val, FILTER_VALIDATE_EMAIL)){
          $this->addError('email', 'Este não é um e-mail válido');
        }
      }
  
    }
    private function checkEmail(){
      $email = $this->data['email'];
			$sql 	= "SELECT email FROM usuarios WHERE email= :email";
			$query = $this->db->pdo->prepare($sql);
			$query->bindValue(':email',$email);
			$query->execute();
			if ($query->rowCount() > 0) {
				return true;
			}else{
				return false;
			}
		}

    public function confirmEmail(){

      $val = trim($this->data['email']);
      $confirm = trim($this->data['confirmemail']);

      if($val != $confirm){
        $this->addError('confirmemail', 'O endereço de e-mail não conferem');
      }
      else{

      }
    }
    private function validatePassword(){
  
        $val = trim($this->data['password']);
    
        if(empty($val)){
          $this->addError('password', 'Este campo deve ser preenchido');
        } else {
          if(!preg_match('/^[a-zA-Z0-9]{6,12}$/', $val)){
            $this->addError('password','A senha deve conter entre 6 e 12 caracteres alfanuméricos');
          }
        }
    
      }
  
      private function confirmPassword(){

        $val = trim($this->data['password']);
        $confirm = trim($this->data['confirmpassword']);
  
        if($val != $confirm){
          $this->addError('confirmpassword', 'As senhas não conferem');
        }
        else{
  
        }
      }

    private function addError($key, $val){
      $this->errors[$key] = $val;
    }
  
  }
  