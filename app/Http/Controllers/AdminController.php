<?php

namespace App\Http\Controllers;

use App\Models\Post;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function post_page()
    {
        return view('admin.post_page');
    }

    public function add_post(Request $request)
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

    public function view_post()

    {
        $post = Post::all();

        return view('admin.view_post', compact('post'));
    }

    public function admin_edit_post($id)
    {
        $data = Post::find($id);
        return view('admin.edit_mypost', compact('data'));
    }

    public function admin_update_post(Request $request, $id)
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

    public function delete_post($id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect()->back()->with('message', 'Post Deleted Successfully');
    }
}
