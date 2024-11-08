<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\user;
use App\Models\NewsModel;
use App\Models\userCon;
use CodeIgniter\Exceptions\PageNotFoundException;

class Pages extends BaseController
{
  

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
            return view('pages/inscription');
        }

        // Gets the validated data.
        $post = $this->validator->getValidated();
        $model = model(NewsModel::class);
        $salt = bin2hex(random_bytes(16));
        $password = $post['password'] . $salt;

        $model->save([
            'role_id'   => 1,
            'username'  => $post['username'],
            'password'  => password_hash($password, PASSWORD_BCRYPT),
            'sel'       => $salt,
        ]);

        return view('pages/index');
    }


    public function loginAuth()
    {
        helper('form');
        $session = session();
        $userModel = new NewsModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        
        $data = $userModel->where('username', $username)->first();
 
        
        if($data){
            $pass = $data['password'];
            $salt = $data['sel'];
            $password = $password . $salt;
            $password = password_hash($password, PASSWORD_BCRYPT);
            $authenticatePassword = password_verify($password, $pass);

            if($authenticatePassword){
                $ses_data = [
                    'role_id' => $data['role_id'],
                    'username' => $data['username'],
                    'isLoggedIn' => TRUE
                ];
                $session->set($ses_data);
                return view('pages/index');
            
            }else{
                $session->setFlashdata('msg', 'Password is incorrect.');
                return view('pages/login');
            }
        }else{
            $session->setFlashdata('msg', 'Email does not exist.');
            return view('pages/login');
        }
    }
  
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }
    public function view(string $page = 'home')
    {
        if (! is_file(APPPATH . 'Views/pages/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            throw new PageNotFoundException($page);
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter

        return view('templates/header', $data)
            . view('pages/' . $page)
            . view('templates/footer');
    }
    
    public function index()
    {
        $model = model(NewsModel::class);

        $data = [
            'users_list' => $model->getUsers(),
            'title'     => 'Users list',
        ];

        return view('templates/header', $data)
            . view('pages/index')
            . view('templates/footer');
    }

    public function show(?string $id = null)
    {
        $model = model(NewsModel::class);

        $data['users'] = $model->getUsers($id);

        if ($data['users'] === null) {
            throw new PageNotFoundException('Cannot find the users item: ' . $id);
        }

        $data['username'] = $data['users']['username'];

        return view('templates/header', $data)
            . view('pages/view')
            . view('templates/footer');
    }

    public function login()
    {       
         helper('form');


    }

    public function inscription()
    {
        helper('form');

        return view('templates/header', ['title' => 'Create a new user'])
            . view('pages/inscription')
            . view('templates/footer');
    }

}
  
