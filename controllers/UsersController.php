<?php



class UsersController {

    public function log() {
        if(isset($_POST['submit'])) {
            $data['username'] = $_POST['username'];
            $result= User::login($data);

            if($result->username === $_POST['username'] && password_verify($_POST['password'], $result->password)) {
                   $_SESSION['logged'] = true;
                   $_SESSION['username'] = $result->username;
                    Redirect::to('home');

            } else {
                Session::set('success', 'Your username or password may be incorrect');
                Redirect::to('home');
            }
        }
    }


    public function register() {
        if(isset($_POST['submit'])) {
            $options = [          // CRYPTE PW
                'cost' => 12        //  cost = integer
            ];

            $password = password_hash($_POST['password'],PASSWORD_BCRYPT,$options);
            $data = array(
                'fullname' => $_POST['fullname'],
                'username' => $_POST['username'],
                'password' => $password,
            );
            $result = User::createUser($data);
            if($result === 'ok') {
                Session::set('success', 'Your account has been created successfully');
                Redirect::to('login');

            }else {
                echo $result;
            }
        }
    }


	static public function logout() {
		session_destroy();
	}



  
}