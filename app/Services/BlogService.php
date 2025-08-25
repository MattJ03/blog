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
 }