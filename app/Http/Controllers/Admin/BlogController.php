<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Repositories\Blog\BlogRepository;
use Illuminate\Http\Request;
use Image;
use Str;

class BlogController extends Controller
{
    public function __construct(BlogRepository $blog){
        $this->blog = $blog;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $details = $this->blog->orderBy('created_at','desc')->get();
        return view('admin.blog.list',compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.create');
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
        $data = $request->except('publish','file');
        $data['publish'] = is_null($request->publish)?0:1;
        if($request->image){
            $image=$this->imageProcessing($request->file('image'));
            $data['image']=$image;
        }

        if($request->banner_image){
            $image=$this->imageProcessing($request->file('banner_image'));
            $data['banner_image']=$image;
        }
        $this->blog->create($data);
        return redirect()->route('blog.index')->with('message','Blog Added Successfully');
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
        $detail = $this->blog->findOrFail($id);
        return view('admin.blog.edit',compact('detail'));
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
        if($request->banner_image){
            
            $image=$this->imageProcessing($request->file('banner_image'));
            $value['banner_image']=$image;
        }
        $this->blog->update($value,$id);
        return redirect()->route('blog.index')->with('message','Blog Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog=$this->blog->findOrFail($id);
        if($blog->file){
            
           
            
            $filePath = public_path('files');
            if((file_exists($filePath.'/'.$blog->file))){
                unlink($filePath.'/'.$blog->file);
            }
        }
        $this->blog->destroy($id);
        return redirect()->back()->with('message','Item Deleted Successfully');
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
       $img2->save($mainPath.'/'.$input['imagename']);
      
       $destinationPath = public_path('/images');
       return $input['imagename'];     
    }
    public function rules($team_id=null){
        $rules =  [

            'title' => 'required|max:200',
        ];
       
        return $rules;
    }
}
