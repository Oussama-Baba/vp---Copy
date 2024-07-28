<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->query('status');

        if ($status === 'processing') {
            $posts = Post::where('user_id', auth()->id())
                         ->where('status', 'processing')
                         ->get();
        } else {
            $posts = Post::where('user_id', auth()->id())->get();
        }

        return view('clientpanel.client_post', compact('posts'));
    }


    public function accept(Post $post) {
        $post->update(['status' => 'accepted']);
        return response()->json(['status' => 'accepted', 'message' => 'Post accepted successfully.']);
    }

    public function decline(Post $post) {
        $post->update(['status' => 'declined']);
        return response()->json(['status' => 'declined', 'message' => 'Post declined successfully.']);
    }

    public function reset(Post $post) {
        $post->update(['status' => 'processing']);
        return response()->json(['status' => 'processing', 'message' => 'Post status reset successfully.']);
    }


}
