<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\Storage;  // image
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;



class PostsController extends Controller
{
    //action
    public function index(){
        //SELECT * from posts
        //$posts = Post::all();
        $posts = Post::paginate(10);

        // $allposts = [
        //     ['id' => 1, 'title' => 'laravel', 'posted_by' => 'ahmed', 'created_at' => '2025-03-08 12:47:00'],
        //     ['id' => 2, 'title' => 'HTML', 'posted_by' => 'mohamed', 'created_at' => '2025-04-10 11:00:00'],
        //     ['id' => 3, 'title' => 'css', 'posted_by' => 'Hagar', 'created_at' => '2025-03-08 12:47:00'],
        //     ['id' => 4, 'title' => 'js', 'posted_by' => 'lina', 'created_at' => '2025-04-10 11:00:00'],
        // ];

        // //SELECT * FROM posts where title = 'Laravel';
        // $laravelPosts = Post::where('title', '=', 'Laravel')->get();
        
        return view('posts.index',['posts' => $posts]);
    }

    public function show($identifier)
    {
        // identifier => id or slug
        $post = Post::where('slug', $identifier)->first();

        if (!$post) {
            $post = Post::findOrFail($identifier);
        }
        //SELECT * FROM posts where id = 1 limit 1;
        //$post = Post::find($id);
       

        // $post = [
        //     'id' => 1, 
        //     'title' => 'laravel',
        //     'description' => 'some description',
        //     'posted_by' => [
        //         'name' => 'ahmed',
        //         'email' => 'test@gmail.com',
        //         'created_at' => 'Thursday 25th of December 1975 02:15:16 PM'
        //     ],
        //     'created_at' => '2025-03-08 12:47:00',
        // ];
        return view('posts.show', ['post' => $post]);
    }

    public function create() {
        $users = User::all();
        return view('posts.create', ['users' =>$users]);
    }

    public function store(StorePostRequest $request) { 
        // dd($_FILES);
        // // dd($request->file('image'));
        // dd($request->all());
        //upload and save image
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('posts', 'public');
            
        } else {
            $imagePath = null;
        }
        
        // dd([
        //     'title' => $request->title,
        //     'description' => $request->description,
        //     'user_id' => $request->post_creator,
        //     'image' => $imagePath,
        // ]);

        // $post = Post::create([
        //     'title' => $request->title,
        //     'description' => $request->description,
        //     'user_id' => $request->post_creator,
        //     'image' => $imagePath,
        // ]);

        $postId = DB::table('posts')->insert([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $request->post_creator,
            'image' => $imagePath,
            'slug' => Str::slug($request->title), 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        
        //validition      //move this code to storePostRequest.php
    
        // request()->validate([
        //     'title' => ['required', 'min:3'],     //at least 3 chars
        //     'description' => ['required', 'min:5'],   
        // ],[
        //     'title.required' => 'My Custom Message For Required',    
        //     'title.min' => 'override of min:3 chars',    //override the default message
        // ]);       

        // $title = request()->title;
        // $description = request()->description;
        // $postCreator = request()->post_creator;

        // $post = Post::create([
        //     'title' => $title,
        //     'description' => $description,
        //     'user_id' => $postCreator,
        // ]);

        return to_route('posts.index',  $postId);
    }

    //delete
    public function destroy($id)
    {
        $singlePost = Post::findOrFail($id);

        // when delete post=> delete image from storage
        if ($singlePost->image) {
            Storage::disk('public')->delete($singlePost->image);
        }

        $singlePost->delete();

        // dd($id); 
        return to_route('posts.index');
    }


    //edit
    public function edit($id) {
        $post = Post::findOrFail($id);
        $users = User::all();
        
        return view('posts.edit', compact('post', 'users'));
    }

    //update
    public function update(Request $request,$id) {  
        $post = Post::findOrFail($id); 


        $updateData = [
            'title' => $request->title,
            'description' => $request->description,
            // 'user_id' => $request->post_creator, 
            'slug' => Str::slug($request->title),
            'updated_at' => now(),
        ];
    
        
        if ($request->hasFile('image')) {
            //delete old
            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }
            // new image
            $imagePath = $request->file('image')->store('posts', 'public');
            $updateData['image'] = $imagePath;
        }
    
        // update image in database
        DB::table('posts')->where('id', $id)->update($updateData);

    
        return to_route('posts.index');
    }




}
