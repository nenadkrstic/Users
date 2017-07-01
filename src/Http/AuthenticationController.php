<?php

namespace App\Http;



use App\Models\User;

class AuthenticationController extends Controller
{
    //return blade login
    public function loginRender()
    {
        return $this->view('login');
    }

    //Return sign up blade
    public function signUpRender()
    {
        return $this->view('signup-render');
    }

    //Log out
    public function logout()
    {
        session_destroy();
        return $this->redirectTo('?mess=Hvala na poseti!!!');
    }

    // Check user mail and pass and if true login
    public function login()
    {
        //Get data from form
     $email = trim($this->getInput('email'));
     $password = trim($this->getInput('password'));

     //Validate form and check is empty
     if(empty($email) || empty($password))
     {
         // Check mail
         $this->valMail($mail);

        return $this->redirectTo('/login-render?mess=Sva polja moraju biti popunjena!!!');

     }


     $user = User::auth($email, $password);
        if ($user) {
            $_SESSION['user_id'] = $user->id;
            $_SESSION['name'] = $user->name;
            $_SESSION['email'] = $user->email;
        } else {
            return $this->redirectTo('/login-render?mess=Podaci nisu ispravni, molimo vas pokusajte ponovo ili se registrute');
        }
        return $this->redirectTo('/?mess=Dobrodosli u quantox '.$user->name);

    }


    /**
     * Validate vorm and insert data
     *
     * @return \Illuminate\Http\RedirectResponse
     */

    public function signUp()
    {
        $name = trim(ucfirst($this->getInput('name')));
        $email = trim($this->getInput('email'));
        $password_one = $this->getInput('password_one');
        $password_two = $this->getInput('password_two');

        //Check is  field empty
        $this->validate($name, $email, $password_one, $password_two);

        //Create user
        $this->createUser($email,$name,$password_one);

        return $this->redirectTo('/?mess=Dobrodosli u quantox ' . $_SESSION['name']);
    }

    /**
     * @param $name
     * @param $email
     * @param $password_one
     * @param $password_two
     * @return \Illuminate\Http\RedirectResponse
     */
    private function validate($name, $email, $password_one, $password_two)
    {
        if(empty($name) || empty($email) || empty($password_one) || empty($password_two))
        {
            // Check name is string
            $this->isString($name);

            // Check mail
            $this->valMail($email);

            // Check is passwodrs match
            $this->passMatch($password_one, $password_two);

            // Count caracters from pass, cat be less than 5 caracters
            $this->countPass($password_one);

            return $this->redirectTo('/signup-render?mess=Sva polja moraju biti popunjena!!!');
        }
    }

    /**
     * @param $name
     * @return \Illuminate\Http\RedirectResponse
     */
    private function isString($name)
    {
        if(!is_string($name)){
            return $this->redirectTo('/signup-render?mess=U formi za ime mozete koristiti iskljucivo  slova');
        }
    }

    /**
     * @param $email
     * @return \Illuminate\Http\RedirectResponse
     */
    private function valMail($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return $this->redirectTo('/signup-render?mess=Mail nije u odgovarajucoj formi, pokusajte ponovo!!!');
        }
    }

    /**
     * @param $password_one
     * @param $password_two
     * @return \Illuminate\Http\RedirectResponse
     */
    private function passMatch($password_one, $password_two)
    {
        if($password_two != $password_one){
            return $this->redirectTo('/signup-render?mess=Passwor se ne poklapa');
        }
    }

    /**
     * @param $password_one
     * @return \Illuminate\Http\RedirectResponse
     */
    private function countPass($password_one)
    {
        if(count($password_one) < 5 ){
            return $this->redirectTo('/signup-render?mess=Password je slab mora imati vise od 5 karaktera');
        }
    }

    /**
     * @param $email
     * @param $name
     * @param $password_one
     */
    private function createUser($email,$name, $password_one)
       {
            $user = User::create([
            'email' => $email,
            'name' => $name,
            'password' => password_hash($password_one, PASSWORD_BCRYPT)
            ]);
            $_SESSION['user_id'] = $user->id;
            $_SESSION['name'] = $user->name;
            $_SESSION['email'] = $user->email;
       }



}