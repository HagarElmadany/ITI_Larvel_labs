<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    //action
    public function index(){
        $allposts = [
            ['id' => 1, 'title' => 'laravel', 'posted_by' => 'ahmed', 'created_at' => '2025-03-08 12:47:00'],
            ['id' => 2, 'title' => 'HTML', 'posted_by' => 'mohamed', 'created_at' => '2025-04-10 11:00:00'],
            ['id' => 3, 'title' => 'css', 'posted_by' => 'Hagar', 'created_at' => '2025-03-08 12:47:00'],
            ['id' => 4, 'title' => 'js', 'posted_by' => 'lina', 'created_at' => '2025-04-10 11:00:00'],
        ];
        
        return view('posts.index',['posts' => $allposts]);
    }

    public function show($post)
    {
        $post = [
            'id' => 1, 
            'title' => 'laravel',
            'description' => 'some description',
            'posted_by' => [
                'name' => 'ahmed',
                'email' => 'test@gmail.com',
                'created_at' => 'Thursday 25th of December 1975 02:15:16 PM'
            ],
            'created_at' => '2025-03-08 12:47:00',
        ];
        return view('posts.show', ['post' => $post]);
    }

    public function create() {
        return view('posts.create');
    }

    public function store() {  
        return to_route('posts.index');
    }

    public function destroy($id)
    {
        $allposts = [
            ['id' => 1, 'title' => 'laravel', 'posted_by' => 'ahmed', 'created_at' => '2025-03-08 12:47:00'],
            ['id' => 2, 'title' => 'HTML', 'posted_by' => 'mohamed', 'created_at' => '2025-04-10 11:00:00'],
            ['id' => 3, 'title' => 'css', 'posted_by' => 'Hagar', 'created_at' => '2025-03-08 12:47:00'],
            ['id' => 4, 'title' => 'js', 'posted_by' => 'lina', 'created_at' => '2025-04-10 11:00:00'],
        ];

        $allposts = array_filter($allposts, function ($post) use ($id) {
            return $post['id'] != $id;
        });
        dd($id); 
        return to_route('posts.index');
    }


    //edit
    public function edit() {
        $post = [
            'id' => 1,
            'title' => "php",
            'description' => "this is description ", 
            'posted_by' => ['name' => "hagar", 
            "email" => "hagar@gmail.com", 
            "created_at" => "2025-03-8"], 
            ];
        return view('posts.edit', ['post' => $post]);
    }

    //update
    public function update($id) {   
        return to_route('posts.index');
    }




}
