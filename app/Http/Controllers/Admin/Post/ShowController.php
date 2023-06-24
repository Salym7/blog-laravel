<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

class ShowController extends BaseController
{
    public function __invoke(Post $post)
    {
        $category = Category::find($post->category_id);
        $tags = Tag::all();
        return view('admin.post.show', compact('post', 'category', 'tags'));
    }
}
