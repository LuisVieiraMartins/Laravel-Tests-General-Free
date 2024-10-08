<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function store(StorePostRequest $request)
    {
        $filename = $request->file('photo')->store('posts');

        Post::create(array_merge($request->validated(), ['photo' => $filename]));

        return 'Success';
    }

    public function update(Request $request, Post $post)
    {

        Storage::delete($post->photo);

        $filename = $request->file('photo')->store('posts');

        $post->update([
            'title' => $request->title,
            'body'  => $request->body,
            'photo' => $filename,
        ]);

        return 'Success';
    }
}
