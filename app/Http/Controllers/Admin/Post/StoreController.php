<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request): RedirectResponse
    {
        try {
            $data = $request->validated();
            $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);

            $tagsIds = $data['tag_ids'];
            unset($data['tag_ids']);

            $post = Post::firstOrCreate($data);
            $post->tags()->attach($tagsIds);
        } catch (\Exception $exception) {
            abort(404);
        }


        return redirect()->route('admin.post.index')
            ->with('message', 'Post ' . $data['title'] . ' was created!');
    }
}
