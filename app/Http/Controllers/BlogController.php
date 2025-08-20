<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Services\BlogService;

class BlogController extends Controller {

   public function index() {
    return Blog::query()->paginate(5);
   }
   
   public function store(Request $request, BlogService $blogService) {
     
      $validatedData = $request->validate([
        'name' => 'required|max:50',
        'body' => 'required|max:10000',
        'category' => 'nullable|max:25',
      ]);
      $blogService->store($validatedData);
   }
   
  }