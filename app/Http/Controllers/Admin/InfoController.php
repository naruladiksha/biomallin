<?php

namespace App\Http\Controllers\Admin;

use App\CPU\Helpers;
use App\CPU\ImageManager;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Model\Homecontent;

class InfoController extends Controller
{
 public function index()
 {
     return view('admin-views.whyus.index');
 }
  public function storecontent(Request $request)
 {
    
        $homecontent = new Homecontent;
        $homecontent->whytitle = $request->whytitle;
        $homecontent->whycontent = $request->whycontent;
        $homecontent->teamcontent = $request->teamcontent;
        $homecontent->producttitle = $request->producttitle;
        $homecontent->productcontent = $request->productcontent;
        $homecontent->offertitle = $request->offertitle;
        $homecontent->offercontent = $request->offercontent;
        $homecontent->whyimage = ImageManager::upload('homecontent/', 'png', $request->file('whyimage'));
        $homecontent->teambimage = ImageManager::upload('homecontent/', 'png', $request->file('teambimage'));
        $homecontent->newsletterbg = ImageManager::upload('homecontent/', 'png', $request->file('newsletterbg'));
        $homecontent->couponbg = ImageManager::upload('homecontent/', 'png', $request->file('couponbg'));
        $homecontent->newproducttitle = $request->newproducttitle;
        $homecontent->newproductcontent = $request->newproductcontent;
        $homecontent->extratitle = $request->extratitle;
        $homecontent->featuredtitle = $request->featuredtitle;
        $homecontent->featuredcontent = $request->featuredcontent;
        $homecontent->counter = $request->counter;
        $homecontent->save();
        
        return view('admin-views.whyus.index');
 }
 public function editcontent()
 {
       $homee = Homecontent::where(['id' => 1])->withoutGlobalScopes()->first();
      
       return view('admin-views.whyus.edit', compact('homee'));
 }
  public function update(Request $request)
  {
        $homecontent = Homecontent::find(1);
        $homecontent->whytitle = $request->whytitle;
        $homecontent->whycontent = $request->whycontent;
        $homecontent->teamcontent = $request->teamcontent;
        $homecontent->producttitle = $request->producttitle;
        $homecontent->productcontent = $request->productcontent;
        $homecontent->offertitle = $request->offertitle;
        $homecontent->offercontent = $request->offercontent;
       if ($request->has('whyimage')) {
            $homecontent->whyimage = ImageManager::update('homecontent/', $homecontent['whyimage'], 'png', $request->file('whyimage'));
         }
      
        if ($request->has('teambimage')) {
            $homecontent->teambimage = ImageManager::update('homecontent/', $homecontent['teambimage'], 'png', $request->file('teambimage'));
         }
         
         if ($request->has('newsletterbg')) {
            $homecontent->newsletterbg = ImageManager::update('homecontent/', $homecontent['newsletterbg'], 'png', $request->file('newsletterbg'));
         }
         
         if ($request->has('couponbg')) {
            $homecontent->couponbg = ImageManager::update('homecontent/', $homecontent['couponbg'], 'png', $request->file('couponbg'));
         }
           $homecontent->newproducttitle = $request->newproducttitle;
        $homecontent->newproductcontent = $request->newproductcontent;
        $homecontent->extratitle = $request->extratitle;
         $homecontent->featuredtitle = $request->featuredtitle;
        $homecontent->featuredcontent = $request->featuredcontent;
        $homecontent->counter = $request->counter;
        $homecontent->save();
       

        Toastr::success('Home Content updated successfully!');
        return back();
  }
}
