<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AboutMd;
use Auth;
use Session;
use Image;
use Validator;

class AboutsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admincheck.admin');
    }

    public function update()
    {
        //content
        $content = array(
            'about' => About::find(1)
        );
        $pagecontent = view('admin.content.aboutme', $content);

        //masterpage
        $pagemain = array(
            'title' => 'About Embun Pagi Islamic School',
            'description' => 'dashboard About',
            'menu' => 'About',
            'pagecontent' => $page,
        );

        return view('admin.masterpage', $pagemain);
    }

    public function update_save(Request $request)
    {
        //validator
        $rules = array(
            'desc_id' => 'required',
            'desc_en' => 'required',
            'image' => 'image',
        );
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            Session::put('validator', $validator->errors()->all());
            return redirect()->to('/admin/About');
        }

        //find about md
        $saveabout = About::find(1);
        if(count($saveabout) == 0) {
            Session::put('error', 'About Data Not Found');
            return redirect()->to('/admin/About');
        }

        //store image
        if($request->hasFile('image')) {
            if($request->file('image')->isValid()) {
                $image = $request->file('image');
                $imgext = $image->getClientOriginalExtension();
                $imgname = str_random(20).'.'.$imgext;
                $path = env('IMGPATH').$imgname;
                Image::make($image->getRealPath())
                    ->resize(700, 1050)
                    ->save($path);
                $saveabout->image = $imgname;
            }
        }

        //save artist
        $saveabout->fill($request->all());
        $saveabout->updated_by = Auth::id();
        $saveabout->save();

        //write log
        store_log(
            'About',
            url('admin/About'),
            'About ',
            'About Embun Pagi Islamic School Updated by '.Auth::user()->name
        );

        Session::put('success', 'About EMBUN Updated Successfully');
        return redirect()->to('/admin/About');
    }
}
