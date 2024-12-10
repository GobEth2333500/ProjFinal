<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\user;
use App\Models\Input;
use App\Models\NewsModel;
use App\Models\Score;
use App\Models\odel;
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
                    'id' => $data['id'],
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
        $db = \Config\Database::connect();
        $session = session();
        $userModel = model(NewsModel::class);
        $data = $this->request->getPost(['user','id','nb']);
        $users = $data['user'];
        $role_id = $data['id'];
        $nb = $data['nb'];

        // Checks whether the submitted data passed the validation rules.

        for ($x = 0; $x < $nb; $x++)
         {
            $data2 = $userModel->where('username', $users[$x])->first();
            if ($role_id[$x] == "")
            {
                $users[$x] = 'x';
            }
            else
            {
                if ($role_id[$x] != "1" && $role_id[$x] != "2" && $role_id[$x] != "3")
                {
                    $role_id[$x] = "3";
                }
            }

            if ($users[$x] != 'x')
            {
                if ($session->username == $data2['username'])
                {
                    $ses_data = [
                        'role_id' => $int_id,
                    ];
                    $session->set($ses_data);
                }
                $int_id = (int)$role_id[$x];


                
                $db->query("UPDATE utilisateur SET role_id = ? WHERE id = ?", [$role_id[$x], $data2['id']]);
            }
            else{}

            
        }
            return $this->view('home');

    }


    public function latestInput()
    {
        return $this->view('latestInput');
    }


    public function scores()
    {
        return $this->view('scores');
    }


    public function jeu()
    { 
        return view('templates/header', ['title' => 'A little game'])
        . view('pages/jeu')
        . view('templates/footer');
    }

    public function ajaxMethod(){
        if(isset($_GET["score"])){
            $db = \Config\Database::connect();
            $model = model(Score::class);
            $session = session();
            $id = $session->id;

            $data = [
                'score' => $model->getScore($id),
            ];
            $input = new Input();
            $data['input'] = $input->findAll();
            $left = 0;
            $right = 0;
            $up = 0;
            $down = 0;
            $pressed = 0;
            foreach($data['input'] as $x){
                if($x['inputName'] == "up"){
                    $up = $up + 1;
                }
                else if($x['inputName'] == "down"){
                    $down = $down + 1;
                }
                else if($x['inputName'] == "left"){
                    $left = $left + 1;
                }
                else if($x['inputName'] == "right"){
                    $right = $right + 1;
                }
                else{
                    $pressed = $pressed + 1;
                }
            }
            if($data['score']['score'] <= $_GET['score']){
                $db->query("UPDATE score SET score = ?, up_input = up_input + ?, down_input = down_input + ?, left_input = left_input + ?, right_input = right_input + ?, pressed_input = pressed_input + ? WHERE id_user = $id", [$_GET["score"], $up, $down, $left, $right, $pressed]);
            }
            else{
                $db->query("UPDATE score SET up_input = up_input + ?, down_input = down_input + ?, left_input = left_input + ?, right_input = right_input + ?, pressed_input = pressed_input + ? WHERE id_user = $id", [$up, $down, $left, $right, $pressed]);
            }
            $db->query("DELETE FROM input");
        }
        return view('templates/header', ['title' => 'A little game'])
        . view('pages/ajax')
        . view('templates/footer');
    }

    public function fetch(){
        $input = new Input();
        $data['input'] = $input->findAll();
        return $this->response->setJSON($data);
    }

}
  
