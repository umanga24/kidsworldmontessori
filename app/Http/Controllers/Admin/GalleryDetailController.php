<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\GalleryDetail\GalleryDetailRepository;
use Image;
use Str;

class GalleryDetailController extends Controller
{
    public function __construct(GalleryDetailRepository $gallerydetail)
    {
        $this->gallerydetail = $gallerydetail;
    }
    // public function index()
    // {
    //     $details = $this->gallery->orderBy('created_at', 'desc')->get();
    //     return view('admin.career.list', compact('details'));
    // }


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



    // public function store(Request $request)
    // {

    //     $data = $request->except('image2');
    //     //$data['publish'] = is_null($request->publish)?0:1;
    //     $data['gallery_id'] = $request->gallery_id;

    //     if ($request->image2) {

    //         $image = $this->imageProcessing($request->file('image2'));
    //         $data['image2'] = $image;
    //     }

    //     $this->gallerydetail->create($data);
    //     return back()->with('message', 'Gallery Added Successfully');
    // }


    public function store(Request $request)
    {
        $data = $request->except('image2');
        $data['gallery_id'] = $request->gallery_id;

        if ($request->hasFile('image2')) {
            $image_array = $request->file('image2');

            foreach ($image_array as $image) {
                // Process each image and get its name
                $imageName = $this->imageProcessing($image);

                // Save the image name and gallery_id to the database
                $formInput = [
                    'image2' => $imageName,
                    'gallery_id' => $data['gallery_id']
                ];
                $this->gallerydetail->create($formInput);
            }
        }

        return back()->with('message', 'Gallery Added Successfully');
    }









    // public function edit($id)
    //     {
    //         $detail = $this->gallery->findOrFail($id);
    //         return view('admin.career.edit',compact('detail'));
    //     }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    //     $this->validate($request, $this->rules($id));
    //     $value=$request->except('file','publish');
    //     $value['publish']=is_null($request->publish)? 0 : 1 ;
    //     if($request->image){

    //         $image=$this->imageProcessing($request->file('image'));
    //         $value['image']=$image;
    //     }
    //     // if($request->banner_image){

    //     //     $image=$this->imageProcessing($request->file('banner_image'));
    //     //     $value['banner_image']=$image;
    //     // }
    //     $this->gallery->update($value,$id);
    //     return redirect()->route('gallery.index')->with('message','Gallery Updated Successfully');
    // }




    public function destroy($id)
    {
        $gallerydetail = $this->gallerydetail->findOrFail($id);
        if ($gallerydetail->file) {



            $filePath = public_path('files');
            if ((file_exists($filePath . '/' . $gallerydetail->file))) {
                unlink($filePath . '/' . $gallerydetail->file);
            }
        }
        $this->gallerydetail->destroy($id);
        return back()->with('message', 'Item Deleted Successfully');
    }

    public function imageProcessing($image)
    {
        // Generate a unique name for the image
        $uniqueName = uniqid() . '_' . time() . '.' . $image->getClientOriginalExtension();

        // Define paths
        $thumbPath = public_path('images/thumbnail');
        $mainPath = public_path('images/main');
        $listingPath = public_path('images/listing');

        // Save to the respective directories
        $img1 = Image::make($image->getRealPath());
        $img1->save($thumbPath . '/' . $uniqueName);

        $img2 = Image::make($image->getRealPath());
        $img2->save($listingPath . '/' . $uniqueName);

        $img3 = Image::make($image->getRealPath());
        $img3->save($mainPath . '/' . $uniqueName);

        return $uniqueName; // Return the unique image name
    }


    public function rules($team_id = null)
    {
        $rules =  [

            'title' => 'required|max:200',
        ];

        return $rules;
    }
}
