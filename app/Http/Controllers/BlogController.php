<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;
use App\Category;
use App\Tags;

class BlogController extends Controller
{
    public function index(Posts $posts){
        $categorys=Category::all();
        $data = Posts::where('status', '=',1 )->orderBy('created_at','desc')->take(4)->get();
        $data_1 = Posts::orderBy('created_at','asc')->take(4)->get();
        $tags=Tags::all();
        return View('blogdev',compact('data','data_1','categorys','tags'));
    }
    public function content_post($slug){
        $categorys=Category::all();
        $data = Posts::where('slug',$slug)->get();
        $tags=Tags::all();
  
        return View('blog_post.content_post',compact('data','categorys','tags',));
    }
    public function list_post(){
        $categorys=Category::all();
        $data = Posts::latest()->paginate(5);
        $tags=Tags::all();
        return View('blog_post.list_post',compact('data','categorys','tags'));
    }
    public function list_category( Category $category){
        $categorys=Category::all();
        $data = $category->Posts()->paginate(5);
        $tags=Tags::all();
        return View('blog_post.list_post',compact('data','categorys','tags'));

    } 
   
     
}
