<?php
namespace App\Services;

use App\Models\Blog;

 class BlogService {

    public function store(array $data) {

        $createdBlog = Blog::create($data);
        Log::info('Blog created', [
            'id' => $data->id,
        ]);

        return $createdBlog;
    }
 }