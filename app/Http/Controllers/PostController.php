<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index($date = null)
    {
        $date = Carbon::parse(\request('date'))->format('yy-m-d');

        $posts = Post::where([
            ['user_id', Auth::user()->id],
            ['date', $date ?? $date = Carbon::now()->toDateString()],
        ])->orderBy('is_completed', 'DESC')->get();

        return view('dashboard',
            ['posts' => $posts, 'date' => Carbon::parse($date)->format('d.m.yy')]);
    }

    public function create(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'body' => 'required',
            'date' => 'required',
        ]);

        $post = new Post();

        $post->body = $data['body'];
        $post->date = Carbon::parse($data['date'])->format('yy-m-d');
        $post->user_id = Auth::user()->id;

        $post->save();

        return redirect()->back()->with('success', 'Событие успешно добоавлено!');
    }

    public function complete($id): RedirectResponse
    {
        $post = Post::find($id);

        $post->is_completed = true;

        $post->save();

        return redirect()->back()->with('success', 'Событие выполнено!');
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $post = Post::find($id);

        $data = $request->validate([
            'body' => 'required'
        ]);

        $post->body = $data['body'];
        $post->save();

        return redirect()->back()->with('success', 'Событие успешно изменено');
    }

    public function destroy($id): RedirectResponse
    {
        $post = Post::find($id);
        $post->delete();

        return redirect()->back()->with('success', 'Событие успешно удалено');

    }
}
