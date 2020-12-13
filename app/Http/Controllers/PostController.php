<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::where('user_id', Auth::user()->id)->orderBy('is_completed', 'DESC')->get();

        return view('dashboard', ['posts' => $posts]);
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            'content' => 'required',
            'date' => 'required',
        ]);

        $data['date'] = Carbon::parse($data['date'])->format('Y-m-d');

        $post = new Post();

        $post->body = $data['content'];
        $post->date = $data['date'];
        $post->user_id = Auth::user()->id;

        $post->save();

        return redirect()->back()->with('success', 'Событие успешно добоавлено!');
    }

    public function complete($id)
    {
        $post = Post::find($id);

        $post->is_completed = true;

        $post->save();

        return $this->index();
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
