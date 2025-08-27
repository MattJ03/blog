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

      if(!$request->user()->is_Admin) {
         return response()->json(['message' => 'you do not have permission to post']);
      }
      $validatedData = $request->validate([
        'title' => 'required|max:50',
        'body' => 'required|max:10000',
        'category' => 'nullable|max:25',
      ]);
     $blog = $blogService->store($validatedData);

     return response()->json([
      'data' => $blog], 201);
   }

   public function update(Request $request, $id) {

      if(!$request->user()->is_Admin) {
         return response()->json(['message' => 'you do not have permission to update posts']);
      }
   
      $validatedData = $request->validate([
         'title' => 'required|max:50',
        'body' => 'required|max:10000',
        'category' => 'nullable|max:25',
      ]);

      $blog = $this->blogService->update($validatedData, $id);
      return response()->json([
         'data' => $blog,
         'message' => 'blog updated',
      ], 200);
   }

   public function delete($id) {
      $blog = Blog::findOrFail($id);

      $blog->delete();
      if($blog) {
          return response()->json(['message' => 'blog not deleted', 'blog' => $blog]);
      }
      return response()->json(['message' => 'blog deleted'], 204);
   }
   
  }