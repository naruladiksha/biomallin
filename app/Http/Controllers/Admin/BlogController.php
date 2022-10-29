<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Blog;
use App\CPU\ImageManager;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class BlogController extends Controller
{
   public function index()
   {
       return view('admin-views.blog.index');
   }
    public function store(Request $request)
   {
       $blogcontent = new Blog;
       $blogcontent->title=$request->title;
       $blogcontent->description=$request->description;
       $blogcontent->image = ImageManager::upload('blogs/', 'png', $request->file('image'));
       $blogcontent->save();
        Toastr::success('Blog Created successfully!');
       return view('admin-views.blog.index');
   }
   public function list()
   {
        $blogs = Blog::all();
        return view('admin-views.blog.list',compact('blogs'));
   }
     public function edit($id)
   {
        $blogs = Blog::where(['id' => $id])->first();
        return view('admin-views.blog.edit',compact('blogs'));
   }
   public function delete($id)
   {
        $data = Blog::find($id);
        $data->delete();
        Toastr::success('Blog Deleted successfully!');
        return back();
   }
   public function update(Request $request,$id)
   {
        $blog = Blog::find($id);
        $blog->title = $request->title;
        $blog->description = $request->description;
        if ($request->has('image')) {
            $blog->image = ImageManager::update('blogs/', $blog['image'], 'png', $request->file('image'));
         }
         $blog->save();
         Toastr::success('Blog Content updated successfully!');
        return back();
   }
}
