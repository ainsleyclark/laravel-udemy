<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{

    protected $pageData = [];

//    public function __construct(){
//        parent::__construct();
//    }

    public function index() {
        return 'working';

    }

    public function contact() {

        //$this->$pageData['twat'] = ['twatballs'];
        $people = ['tim', 'dave'];

        return view('contact', compact('people'));

    }

    public function postSingle($id) {

        //return view('postsingle')->with('id', $id);

        return view('postsingle', compact('id'));

    }

}
