<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Contracts\View\View;

class EditController extends Controller
{
    public function __invoke(Post $post) :View
    {
        return view('admin.post.edit', compact('post'));
    }
}
