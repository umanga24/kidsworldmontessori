<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Setting\SettingRepository;
use Image;

class SettingController extends Controller
{
    public function __construct(SettingRepository $setting){
        $this->setting = $setting;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detail = $this->setting->first();
        return view('admin.setting',compact('detail'));
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
    public function show($id)
    {
        //
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
        $data=$request->except('image');
        if($request->image1){
            $image=$request->file('image1');
            $filename=time().'.'.$image->getClientOriginalName();
            $mainPath = public_path('images/main');
            $img1 = Image::make($image->getRealPath());
            $img1->save($mainPath.'/'.$filename);
            $data['image1']=$filename;
        }
        if($request->image2){
            $image=$request->file('image2');
            $filename=time().'.'.$image->getClientOriginalName();
            $mainPath = public_path('images/main');
            $img1 = Image::make($image->getRealPath());
            $img1->save($mainPath.'/'.$filename);
            $data['image2']=$filename;
        }
        $this->setting->find($id)->update($data);
        return redirect()->back()->with('message','Setting Updated Successfully');
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
}
