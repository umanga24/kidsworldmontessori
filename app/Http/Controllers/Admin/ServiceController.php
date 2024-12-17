<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Service\ServiceRepository;
use Image;
use Str;

class ServiceController extends Controller
{
    public function __construct(ServiceRepository $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $details = $this->service->orderBy('created_at', 'desc')->get();
        return view('admin.service.list', compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.service.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $slug = !empty($request->slug) ? Str::slug($request->slug) : Str::slug($request->title);
        $request->request->add(['slug' => $slug]);
        $this->validate($request, $this->rules());
        $data = $request->except('publish', 'image');
        $data['publish'] = is_null($request->publish) ? 0 : 1;
        if ($request->image) {
            $image = $this->imageProcessing($request->file('image'));
            $data['image'] = $image;
        }

        if ($request->banner_image) {
            $image = $this->imageProcessing($request->file('banner_image'));
            $data['banner_image'] = $image;
        }

        $this->service->create($data);
        return redirect()->route('project.index')->with('message', 'service Added Successfully');
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
        $detail = $this->service->findOrFail($id);
        return view('admin.service.edit', compact('detail'));
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
        $slug = !empty($request->slug) ? Str::slug($request->slug) : Str::slug($request->title);
        $request->request->add(['slug' => $slug]);
        $this->validate($request, $this->rules($id));
        $value = $request->except('image', 'publish');
        $value['publish'] = is_null($request->publish) ? 0 : 1;
        if ($request->image) {

            $image = $this->imageProcessing($request->file('image'));
            $value['image'] = $image;
        }
        if ($request->banner_image) {

            $image = $this->imageProcessing($request->file('banner_image'));
            $value['banner_image'] = $image;
        }
        $this->service->update($value, $id);
        return redirect()->route('project.index')->with('message', 'Service Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = $this->service->findOrFail($id);
        if ($blog->image) {

            $thumbnailPath = public_path('images/thumbnail');
            $mainPath = public_path('images/main');
            $listingPath = public_path('images/listing');
            if ((file_exists($listingPath . '/' . $blog->image)) && (file_exists($mainPath . '/' . $blog->image)) && (file_exists($thumbnailPath . '/' . $blog->image))) {

                unlink($mainPath . '/' . $blog->image);
                unlink($listingPath . '/' . $blog->image);
                unlink($thumbnailPath . '/' . $blog->image);
            }
        }

        if ($blog->banner_image) {

            $thumbnailPath = public_path('images/thumbnail');
            $mainPath = public_path('images/main');
            $listingPath = public_path('images/listing');
            if ((file_exists($listingPath . '/' . $blog->banner_image)) && (file_exists($mainPath . '/' . $blog->banner_image)) && (file_exists($thumbnailPath . '/' . $blog->banner_image))) {

                unlink($mainPath . '/' . $blog->banner_image);
                unlink($listingPath . '/' . $blog->banner_image);
                unlink($thumbnailPath . '/' . $blog->banner_image);
            }
        }
        $this->service->destroy($id);
        return redirect()->back()->with('message', 'Service Deleted Successfully');
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
    public function rules($service_id = null)
    {
        $rules =  [
            'title' => 'required|max:200',
            'slug' => 'max:245|unique:services,slug,' . $service_id,

        ];

        return $rules;
    }
}
