<?php

namespace App\Controllers;

use App\Models\UserModel;

class AuthController extends BaseController 
{
  public function authenticate()
  {
    return view('auth/authenticate');
  }
  
  public function signIn() 
  {
    $data = (new UserModel())->where('email', $_POST['email'])->first();
    
    if ($data) {
      $userData = [
        'name' => $data['name'],
        'email' => $data['email'],
        'type' => $data['type'],
      ];

      $session = session();
      $session->set($userData);
    }
    
    return redirect()->to('books');
  }

  public function signUp()
  {
    return view('auth/signUp');
  }
  
  public function signOut() {
    $session = session();
    $session->destroy();
    
    return redirect()->to('books');
  }
}

?>