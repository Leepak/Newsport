<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Hashtag;
use Illuminate\Http\Request;
use Session;
use Image;
use Storage;

class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

   
    public function index(Request $request)
    {

        $blog = Blog::orderBy('id','DESC')->paginate(7);
        return view('blogs.index',compact('blog'))
            ->with('i', ($request->input('page', 1) - 1) * 5);


   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       

        return view('blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request, array(
            'title' => 'required|max:255',
            'slug'=>'required|alpha_dash|min:5|max:255',
            'body' => 'required',
            'featured_image' => 'sometimes|image'
            
        ));
        $blog = new Blog;
        $blog->title = $request->title;
        $blog->slug = $request->slug;
        $blog->body = $request->body;
        

        if($request->hasFile('featured_image')){
            $image=$request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('image/'. $filename);
            Image::make($image)->resize(800,400)->save($location);
            
            $blog->image = $filename;
           
        }
        $blog->save();
        
        Session::flash('success', 'Successfuly saved!! ');
        return redirect()->route('blogs.show', $blog->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog = Blog::find($id);

        return view('blogs.show')->withBlog($blog);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::find($id);
        return view('blogs.edit')->withBlog($blog);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $blog = Blog::find($id);
        
        // if ($request->input('slug') == $blog->slug) {
        //     $this->validate($request, array(
        //         'title' => 'required|max:255',
        //         'body'  => 'required'
        //     ));
        // } else {
        $this->validate($request, array(
            'title' => 'required|max:255',
            'slug'=>"required|alpha_dash|min:5|max:255|unique:blogs,slug,$id",
            'body' => 'required',
            'featured_image' => 'sometimes|image'
        ));
    // }
        $blog = Blog::find($id);
        $blog->title = $request->input('title');
        $blog->slug = $request->input('slug');
        $blog->body = $request->input('body');
        
        if($request->hasFile('featured_image')){

            $image=$request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('image/'. $filename);
            Image::make($image)->resize(800,400)->save($location);
            
            $oldFilename=$blog->image;

            $blog->image = $filename;
            Storage::delete($oldFilename);
        }
        $blog->save();
        Session::flash('success', 'Successfuly saved!! ');
        return redirect()->route('blogs.show', $blog->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::find($id);
        $blog->delete();
        Session::flash('success', 'Deleted Successfully!! ');
        return redirect()->route('blogs.index');
    }
}
