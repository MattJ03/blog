<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Services\BlogService;

class BlogController extends Controller {

   public function index() {
    return Blog::query()->paginate(5);
   }
   
   public function store() {

   }
   
  }