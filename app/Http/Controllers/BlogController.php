<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;


class BlogController extends Controller {

    public function index() {
        $blogs = Blog::query()->paginate(15);
        return response()->json([
       'blogs' => $blogs,
        'message' => 'Tasks indexed successfully',
        ], 200);
    }
}