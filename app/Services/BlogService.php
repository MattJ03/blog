<?php
namespace App\Services;

use App\Models\Blog;

 class BlogService {

    public function store(array $data) {

        $createdBlog = Blog::create([
          'title' => $data['title'],
          'body' => $data['body'],
          'category' => $data['category'],
          'user_id' => $data['user_id'] ?? null,
        ]);
       
        Log::info('Blog created', [
            'id' => $data->id,
        ]);

        return $createdBlog;
    }
 }