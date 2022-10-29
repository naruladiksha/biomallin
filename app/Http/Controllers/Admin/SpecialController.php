<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Special;
use App\CPU\ImageManager;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class SpecialController extends Controller
{
    public function index()
   {
    return view('admin-views.special.index');
   }
   public function store(Request $request)
   {
       $specialcontent = new Special;
       $specialcontent->title= $request->title;
       $specialcontent->link = $request->link;
       $specialcontent->specialcontent = $request->specialcont;
       $specialcontent->image = ImageManager::upload('blogs/', 'png', $request->file('image'));
       $specialcontent->save();
        Toastr::success('Special Content Created successfully!');
       return view('admin-views.special.index');
   }
   public function list()
   {
        $specialcnt = Special::all();
        return view('admin-views.special.list',compact('specialcnt'));
   }
    public function edit($id)
   {
        $special = Special::where(['id' => $id])->first();
        return view('admin-views.special.edit',compact('special'));
   }
   public function delete($id)
   {
        $data = Special::find($id);
        $data->delete();
        Toastr::success('Special Content Deleted successfully!');
        return back();
   }
   public function update(Request $request,$id)
   {
        $special = Special::find($id);
        $special->title = $request->title;
        $special->link = $request->link;
        $special->specialcontent = $request->specialcont;
        if ($request->has('image')) {
            $special->image = ImageManager::update('blogs/', $special['image'], 'png', $request->file('image'));
         }
           $special->save();
         Toastr::success('Special Content updated successfully!');
        return back();
   }
}
