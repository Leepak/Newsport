<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
class UrlController extends Controller
{
public function getUrl($slug){
   $blog= Blog::where('slug','=',$slug)->first();
   return view('pages.url')->withBlog($blog);
}
public function getIndex(){

$blog= Blog::paginate(5);
return view('news.index')->withBlog($blog);
}


}
