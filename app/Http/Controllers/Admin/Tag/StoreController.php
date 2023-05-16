<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tag\StoreRequest;
use App\Models\Tag;
use Illuminate\Http\RedirectResponse;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request): RedirectResponse
    {
        $data = $request->validated();
//        Tag::firstOrCreate($data);
        Tag::create($data);

        return redirect()->route('admin.tag.index')
            ->with('message', 'New tag ' . $data['title'] . ' was created!');
    }
}
