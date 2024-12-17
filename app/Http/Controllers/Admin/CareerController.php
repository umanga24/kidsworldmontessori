<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Career\CareerRepository;
use Image;
use Str;

class CareerController extends Controller
{
    public function __construct(CareerRepository $career){
        $this->career = $career;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $details = $this->career->orderBy('created_at','desc')->get();
        return view('admin.career.list',compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.career.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $slug = !empty($request->slug)? Str::slug($request->slug) : Str::slug($request->title);
        $request->request->add(['slug' => $slug]); 
        $this->validate($request, $this->rules());
        $data = $request->except('publish','image');
        $data['publish'] = is_null($request->publish)?0:1;
        if($request->image){
            $image=$this->imageProcessing($request->file('image'));
            $data['image']=$image;
        }

        $this->career->create($data);
        return redirect()->route('career.index')->with('message','Career Added Successfully');
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
        $detail = $this->career->findOrFail($id);
        return view('admin.career.edit',compact('detail'));
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
        $slug = !empty($request->slug)? Str::slug($request->slug) : Str::slug($request->title);
        $request->request->add(['slug' => $slug]); 
        $this->validate($request, $this->rules($id));
        $value=$request->except('image','publish');
        $value['publish']=is_null($request->publish)? 0 : 1 ;
        if($request->image){
            
            $image=$this->imageProcessing($request->file('image'));
            $value['image']=$image;
        }
        $this->career->update($value,$id);
        return redirect()->route('career.index')->with('message','Career Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $career=$this->career->findOrFail($id);
        if($career->image){
            
            $thumbnailPath = public_path('images/thumbnail');
            $mainPath = public_path('images/main');
            $listingPath = public_path('images/listing');
            if((file_exists($listingPath.'/'.$career->image)) &&(file_exists($mainPath.'/'.$career->image)) &&(file_exists($thumbnailPath.'/'.$career->image))){
                
                unlink($mainPath.'/'.$career->image);
                unlink($listingPath.'/'.$career->image);
                unlink($thumbnailPath.'/'.$career->image);
            }
        }
        $this->career->destroy($id);
        return redirect()->back()->with('message','Career Deleted Successfully');
    }
    public function imageProcessing($image){
       $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
       $thumbPath = public_path('images/thumbnail');
       $mainPath = public_path('images/main');
       $listingPath = public_path('images/listing');
       
       $img1 = Image::make($image->getRealPath());
       $img1->fit(352,255)->save($thumbPath.'/'.$input['imagename']);
       $img2 = Image::make($image->getRealPath());
       $img2->fit(99, 88)->save($listingPath.'/'.$input['imagename']);
       $img2 = Image::make($image->getRealPath());
       $img2->fit(1200, 490)->save($mainPath.'/'.$input['imagename']);
      
       $destinationPath = public_path('/images');
       return $input['imagename'];     
    }
    public function rules($service_id=null){
        $rules =  [
            'title' => 'required|max:200',
            // 'slug' => 'max:245|unique:careers,slug,'.$service_id,
            
        ];
       
        return $rules;
    }
}
