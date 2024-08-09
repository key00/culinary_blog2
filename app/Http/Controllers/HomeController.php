<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use ReflectionFunctionAbstract;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::id()) {
            $post = Post::all();
            $usertype = Auth()->user()->usertype;
            if ($usertype == 'user') {
                return view('home.homepage', compact('post'));
            } else if ($usertype == 'admin') {
                return view('admin.adminhome');
            } else {
                return redirect()->back();
            }
        }
    }

    public function homepage()
    {
        $post = Post::all();
        return view('home.homepage', compact('post'));
    }

    public function post_details($id)
    {
        $post = Post::find($id);
        return view('home.post_details', compact('post'));
    }

    public function create_post()
    {
        return view('home.create_post');
    }

    public function user_post(Request $request)
    {

        $user = Auth()->user();
        $user_id = $user->id;
        $name = $user->name;
        $usertype = $user->usertype;


        $post = new Post;

        $post->title = $request->title;
        $post->description = $request->description;
        $post->instruction = $request->instruction;
        $post->name = $name;
        $post->userId = $user_id;
        $post->postStatus = 'active';
        $post->usertype = $usertype;

        $image = $request->image;

        if ($image) {

            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('postimage', $imagename);

            $post->image = $imagename;
        }

        $post->save();

        return redirect()->back()->with('message', 'Post Added Successfully');
    }

    public function myPosts()

    {
        $user = Auth()->user();
        $user_id = $user->id;

        $data = Post::where('userId', '=', $user_id)->get();
        return view('home.myPosts', compact('data'));
    }

    public function edit_mypost($id)
    {
        $data = Post::find($id);
        return view('home.edit_mypost', compact('data'));
    }

    public function update_post(Request $request, $id)
    {
        $post = Post::find($id);



        $post = Post::find($id);

        $post->title = $request->title;
        $post->description = $request->description;
        $post->instruction = $request->instruction;

        $post->postStatus = 'active';


        $image = $request->image;

        if ($image) {

            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('postimage', $imagename);

            $post->image = $imagename;
        }

        $post->save();

        return redirect()->back()->with('message', 'Post Edited Successfully');
    }

    public function delete_mypost($id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect()->back()->with('message', 'Post Deleted Successfully');
    }
}
