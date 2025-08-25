<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Services\BlogService;
use App\Models\User;

class BlogController extends Controller {

   protected $blogService;

   public function __construct(BlogService $blogService) {
      $this->blogService = $blogService;
   }

   public function index() {
    return Blog::query()->paginate(5);
   }
   
   public function store(Request $request, BlogService $blogService) {
     
      $validatedData = $request->validate([
        'title' => 'required|max:50',
        'body' => 'required|max:10000',
        'category' => 'nullable|max:25',
      ]);
     $blog = $blogService->store($validatedData);

     return response()->json([
      'data' => $blog], 201);
   }
   
  }