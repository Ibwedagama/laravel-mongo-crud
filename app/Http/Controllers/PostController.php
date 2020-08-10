<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    //
    public function form($_id = false)
    {
        if ($_id) {
            $data = Post::findOrFail($_id);
            return view('post/form', compact('data'));
        }
        return view('post/form');
    }

    public function save(Request $request)
    {
        // dd($request);
        $data = new Post($request->all());
        $data->author = \Auth::user()->email;
        $data->save();

        if ($data) {
            return redirect()->route('home');
        } else {
            return back();
        }
    }

    public function update(Request $request, $_id)
    {
        $data = Post::findOrFail($_id);
        $data->title = $request->title;
        $data->content = $request->content;
        $data->save();

        if ($data) {
            return redirect()->route('home');
        } else {
            return back();
        }
    }

    public function delete($_id)
    {
        $delete = Post::destroy($_id);
        if ($delete) {
            return redirect()->route('home');
        } else {
            dd("Error Deleting Data!");
        }
    }
}
