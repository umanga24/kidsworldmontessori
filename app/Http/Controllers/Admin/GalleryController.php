<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Gallery\GalleryRepository;
use App\Repositories\GalleryDetail\GalleryDetailRepository;

use Image;
use Str;

class GalleryController extends Controller
{
    public function __construct(GalleryRepository $gallery, GalleryDetailRepository $gallerydetail)
    {
        $this->gallery = $gallery;
         $this->gallerydetail = $gallerydetail;
        
    }
    public function index()
    {
        $details = $this->gallery->orderBy('created_at', 'desc')->get();
        return view('admin.career.list', compact('details'));
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
        // $slug = !empty($request->slug)? Str::slug($request->slug) : Str::slug($request->title);
        // $request->request->add(['slug' => $slug]); 
        $this->validate($request, $this->rules());
        $data = $request->except('image');
        //$data['publish'] = is_null($request->publish)?0:1;
        if ($request->image) {
            
            $image = $this->imageProcessing($request->file('image'));
            $data['image']=$image;
           // $value['image'] = $image;
        }

        $this->gallery->create($data);
        return redirect()->route('gallery.index')->with('message', 'Gallery Added Successfully');
    }
    public function edit($id)
        {
            $detail = $this->gallery->findOrFail($id);
             //$detail = GalleryDetail::findOrFail($id);
            $galleryId = $detail->id;
           // $id =  $gallery->gallerydetail->id;
            
            //dd($id);
            $details = $this->gallerydetail->orderBy('created_at', 'desc')->get();
            //dd( $galleryId);
            return view('admin.career.edit',compact('detail', 'details','galleryId', 'id'));
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
        $value=$request->except('file','publish');
        $value['publish']=is_null($request->publish)? 0 : 1 ;
        if($request->image){
            
            $image=$this->imageProcessing($request->file('image'));
            $value['image']=$image;
        }
        // if($request->banner_image){
            
        //     $image=$this->imageProcessing($request->file('banner_image'));
        //     $value['banner_image']=$image;
        // }
        $this->gallery->update($value,$id);
        return redirect()->route('gallery.index')->with('message','Gallery Updated Successfully');
    }
    
    
    
    
     public function destroy($id)
    {
        $blog=$this->gallery->findOrFail($id);
        if($blog->file){
            
           
            
            $filePath = public_path('files');
            if((file_exists($filePath.'/'.$blog->file))){
                unlink($filePath.'/'.$blog->file);
            }
        }
        $this->gallery->destroy($id);
        return redirect()->back()->with('message','Item Deleted Successfully');
    }

    public function imageProcessing($image)
    {
        $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();
        $thumbPath = public_path('images/thumbnail');
        $mainPath = public_path('images/main');
        $listingPath = public_path('images/listing');

        $img1 = Image::make($image->getRealPath());
        $img1->save($thumbPath . '/' . $input['imagename']);
        $img2 = Image::make($image->getRealPath());
        $img2->save($listingPath . '/' . $input['imagename']);
        $img2 = Image::make($image->getRealPath());
        $img2->save($mainPath . '/' . $input['imagename']);

        $destinationPath = public_path('/images');
        return $input['imagename'];
    }

    public function rules($team_id = null)
    {
        $rules =  [

            'title' => 'required|max:200',
        ];

        return $rules;
    }
}
