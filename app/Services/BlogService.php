<?php
namespace App\Services;

use App\Models\Blog;
use Illuminate\Support\Facades\Log;

 class BlogService {

    public function store(array $data) {

        $createdBlog = Blog::create([
          'title' => $data['title'],
          'body' => $data['body'],
          'category' => $data['category'] ?? null,
          'user_id' => $data['user_id'] ?? null,
        ]);
       
        Log::info('Blog created', [
            'id' => $createdBlog->id,
        ]);

        return $createdBlog;
    }

    public function update(array $data, $id) {
        $blog = Blog::findOrFail($id);
        $blog->update([
          'title' => $data['title'] ?? $blog->title,
          'body' => $data['body'] ?? $blog->body,
          'category' => $data['category'] ?? $blog->category,
          'user_id' => $data['user_id'] ?? $blog->user_id,
        ]);
        return $blog;
        }
    }
 