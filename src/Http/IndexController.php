<?php

namespace App\Http;


use App\Models\User;

class IndexController extends Controller
{
    public function index()
    {
        return $this->view('index');
    }
}