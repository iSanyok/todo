<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::where('user_id', Auth::user()->id)->get();

        return view('dashboard', ['posts' => $posts]);
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            'content' => 'required'
        ]);

        $post = new Post();
        $post->title = 'title';
        $post->body = $data['content'];
        $post->user_id = Auth::user()->id;
        $post->save();

        return redirect()->back()->with('success', 'Событие успешно добоавлено!');
    }

    public function complete($id)
    {

    }

    public function update($id)
    {
        $post = Post::find($id);
        $post->body = 'changed';
        $post->save();

        return redirect()->back()->with('success', 'Событие успешно изменено');
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect()->back()->with('success', 'Событие успешно удалено');

    }
}
