<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Product;

class PublicBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $blogs = Blog::latest()->paginate(6);
        return view('public.blogs.blogs', ['blogs' => $blogs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $blog = Blog::whereSlug($slug)->firstorfail();
        $category = $blog->blogCategory()->first();
        $new_products = Product::latest()->paginate(3);
        $related_blogs = Blog::inRandomOrder()->paginate(3);
        $new_blogs = Blog::latest()->paginate(5);
        $mostview_blogs = Blog::inRandomOrder()->paginate(5);
        $recent_blogs = Blog::inRandomOrder()->paginate(5);
        return view('public.blogs.blog_detail', [
            'blog' => $blog, 
            'category' => $category, 
            'new_products'=>$new_products,
            'related_blogs' => $related_blogs,
            'new_blogs' => $new_blogs,
            'mostview_blogs'=> $mostview_blogs,
            'recent_blogs' => $recent_blogs
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function searchBlog(Request $request){
        $keyword = $_GET['keyword'];
        $blogs = Blog::where('name', 'LIKE', '%' . $keyword . '%')->latest()->paginate(6);
        return view('public.blogs.blogs', ['blogs' => $blogs]);
    }
}
