<?php namespace Controllers;

use Models\User;

class UserController {

    public function index()
    {

        $userModel = new User();

        $userModel->all();

        $users = $userModel->all();

        return view('index', compact('users'));

    }

    public function store()
    {

    }

}