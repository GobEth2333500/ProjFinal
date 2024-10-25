<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index(): string
    {
        return view('accueil');
    }

    public function histoire($id){
        return view('histoire');
    }
}
