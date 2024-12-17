<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Slider\SliderRepository;
use Image;
use Str;

class SliderController extends Controller
{
    public function __construct(SliderRepository $slider){
        $this->slider = $slider;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $details = $this->slider->orderBy('created_at','desc')->get();
        return view('admin.slider.list',compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->rules());
        $data = $request->except('publish','image');
        $data['publish'] = is_null($request->publish)?0:1;
        if($request->image){
            $image=$this->imageProcessing($request->file('image'));
            $data['image']=$image;
        }

        $this->slider->create($data);
        return redirect()->route('slider.index')->with('message','Slider Added Successfully');
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
        $detail = $this->slider->findOrFail($id);
        return view('admin.slider.edit',compact('detail'));
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
        $this->validate($request, $this->rules($id));
        $value=$request->except('image','publish');
        $value['publish']=is_null($request->publish)? 0 : 1 ;
        if($request->image){
            
            $image=$this->imageProcessing($request->file('image'));
            $value['image']=$image;
        }
        $this->slider->update($value,$id);
        return redirect()->route('slider.index')->with('message','Slider Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider=$this->slider->findOrFail($id);
        if($slider->image){
            
            $thumbnailPath = public_path('images/thumbnail');
            
            $listingPath = public_path('images/listing');
            if((file_exists($listingPath.'/'.$slider->image)) &&(file_exists($thumbnailPath.'/'.$slider->image))){
                unlink($listingPath.'/'.$slider->image);
                unlink($thumbnailPath.'/'.$slider->image);
            }
        }
        $this->slider->destroy($id);
        return redirect()->back()->with('message','Slider Deleted Successfully');
    }
    public function imageProcessing($image){
       $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
       $thumbPath = public_path('images/thumbnail');
      
       $listingPath = public_path('images/listing');
       
       $img1 = Image::make($image->getRealPath());
       $img1->save($thumbPath.'/'.$input['imagename']);
       $img2 = Image::make($image->getRealPath());
       $img2->save($listingPath.'/'.$input['imagename']);
       
      
       $destinationPath = public_path('/images');
       return $input['imagename'];     
    }
    public function rules($team_id=null){
        $rules =  [

            'title' => 'required|max:250',
            'sub_title'=>'string|max:250',
            'image'=>'mimes:jpeg,png,jpg'
        ];
       
        return $rules;
    }
}
