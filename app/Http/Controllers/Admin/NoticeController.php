<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Notice\NoticeRepository;
use Image;
use Str;

class NoticeController extends Controller
{
    public function __construct(NoticeRepository $notice){
        $this->notice = $notice;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $details = $this->notice->orderBy('created_at','desc')->get();
        return view('admin.notice.list',compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.notice.create');
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

        $this->notice->create($data);
        return redirect()->route('notice.index')->with('message','Notice Added Successfully');
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
        $detail = $this->notice->findOrFail($id);
        return view('admin.notice.edit',compact('detail'));
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
        $this->notice->update($value,$id);
        return redirect()->route('notice.index')->with('message','Notice Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $notice=$this->notice->findOrFail($id);
        if($notice->image){
            
            $thumbnailPath = public_path('images/thumbnail');
            $mainPath = public_path('images/main');
            $listingPath = public_path('images/listing');
            if((file_exists($listingPath.'/'.$notice->image)) &&(file_exists($mainPath.'/'.$notice->image)) &&(file_exists($thumbnailPath.'/'.$notice->image))){
                
                unlink($mainPath.'/'.$notice->image);
                unlink($listingPath.'/'.$notice->image);
                unlink($thumbnailPath.'/'.$notice->image);
            }
        }
        $this->notice->destroy($id);
        return redirect()->back()->with('message','notice Deleted Successfully');
    }
    public function imageProcessing($image){
       $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
       $thumbPath = public_path('images/thumbnail');
       $mainPath = public_path('images/main');
       $listingPath = public_path('images/listing');
       
       $img1 = Image::make($image->getRealPath());
       $img1->save($thumbPath.'/'.$input['imagename']);
       $img2 = Image::make($image->getRealPath());
       $img2->save($listingPath.'/'.$input['imagename']);
       $img2 = Image::make($image->getRealPath());
       $image->move(public_path('images/main/'),$input['imagename']);
      
       $destinationPath = public_path('/images');
       return $input['imagename'];     
    }
    public function rules($service_id=null){
        $rules =  [
            'title' => 'required|max:200',
            'slug' => 'max:245|unique:notices,slug,'.$service_id,
            
        ];
       
        return $rules;
    }
}
