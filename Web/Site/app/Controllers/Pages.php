<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\user;
use App\Models\NewsModel;
use App\Models\userCon;
use CodeIgniter\Exceptions\PageNotFoundException;

class Pages extends BaseController
{
    public function view(string $page = 'home')
    {

            if (! is_file(APPPATH . 'Views/pages/' . $page . '.php')) {
                // Whoops, we don't have a page for that!
                throw new PageNotFoundException($page);
            }
    
            return view('templates/header')
                . view('pages/' . $page)
                . view('templates/footer');
      

    }

    public function create_user()
    {
        helper('form');

        $data = $this->request->getPost(['username', 'password', 'password_verif']);

        // Checks whether the submitted data passed the validation rules.
        if (! $this->validateData($data, [
            'username' => 'required|max_length[50]|min_length[3]|is_unique[utilisateur.username]',
            'password'  => 'required|max_length[5000]|min_length[8]',
            'password_verif' => 'matches[password]'
        ])) {
            // The validation fails, so returns the form.
            return $this->view('inscription');
        }

        // Gets the validated data.
        $post = $this->validator->getValidated();
        $model = model(NewsModel::class);
        $salt = bin2hex(random_bytes(16));
        $password = $post['password'] . $salt;
        $username = $post['username'];
        $role_id  = 1;
        $model->save([
            'role_id'   => 1,
            'username'  => $post['username'],
            'password'  => password_hash($password, PASSWORD_BCRYPT),
            'sel'       => $salt,
        ]);
        $this->SignUpSetSession($username,$role_id);
        return $this->view('home');
    }

    public function SignUpSetSession($username,$role_id)
    {
        $session = session();
        $userModel = model(NewsModel::class);
                $ses_data = [
                    'role_id' => $role_id,
                    'username' => $username,
                    'isLoggedIn' => TRUE
                ];
                $session->set($ses_data);
                return $this->view('home');
    }
    public function loginAuth()
    {
        $session = session();
        $userModel = model(NewsModel::class);
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        
        $data = $userModel->where('username', $username)->first();
 
        
        if($data){
            $pass = $data['password'];
            $salt = $data['sel'];
            $password = $password . $salt;
            $authenticatePassword = password_verify($password, $pass);

            if($authenticatePassword){
                $ses_data = [
                    'role_id' => $data['role_id'],
                    'username' => $data['username'],
                    'isLoggedIn' => TRUE
                ];
                $session->set($ses_data);
                return $this->view('home');
            
            }else{
                $session->setFlashdata('msg', 'Password is incorrect.');
                return $this->view('home');
            }
        }else{
            $session->setFlashdata('msg', 'Email does not exist.');
            return $this->view('home');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return $this->view("home");

    }

    public function login()
    {       
         helper('form');
         return $this->view('login');

    }

    public function inscription()
    {
        helper('form');

        return $this->view('inscription');
    }
    
    public function admin()
    {

        return $this->view('admin');
    }


    public function EditRoles()
    {
        helper('form');
        $session = session();
        $userModel = model(NewsModel::class);
        $data = $this->request->getPost(['user','id','nb']);
        $users = $data['user'];
        $id = $data['id'];
        $nb = $data['nb'];

        // Checks whether the submitted data passed the validation rules.

        for ($x = 0; $x < $nb; $x++)
         {
            $data2 = $userModel->where('username', $users[$x])->first();
            if ($id[$x] == "")
            {
                $users[$x] = 'x';
            }
            else
            {
                if ($id[$x] != "1" && $id[$x] != "2" && $id[$x] != "3")
                {
                    $id[$x] = "3";
                }
            }

            if ($users[$x] != 'x')
            {

                $int_id = (int)$id[$x];
                $data2Upd = [
                    'role_id' =>$int_id,
                    'username'  => $users[$x],
                    'password'  => $data2['password'],
                    'sel'       => $data2['sel'],
                ];
                $ses_data = [
                    'role_id' => $int_id,
                ];
                $session->set($ses_data);
                
                $userModel->replace($data2Upd);
            }
            else{}

            
        }
            return $this->view('home');

    }


    public function latestInput()
    {
        return $this->view('latestInput');
    }

}
  
