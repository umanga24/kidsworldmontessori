<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Product\ProductRepository;
use App\Repositories\ProductCategory\ProductCategoryRepository;
use Image;
use Str;

class ProductController extends Controller
{
    public function __construct(ProductRepository $product,ProductCategoryRepository $product_category){
        $this->product = $product;
        $this->product_category = $product_category;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $details = $this->product->orderBy('created_at','desc')->get();
        return view('admin.product.list',compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->product_category->get();
        return view('admin.product.create',compact('categories'));
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

        $this->product->create($data);
        return redirect()->route('product.index')->with('message','Product Added Successfully');
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
        $detail = $this->product->findOrFail($id);
        $categories = $this->product_category->get();
        return view('admin.product.edit',compact('detail','categories'));
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
        $this->product->update($value,$id);
        return redirect()->route('product.index')->with('message','Product Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $notice=$this->product->findOrFail($id);
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
        $this->product->destroy($id);
        return redirect()->back()->with('message','Product Deleted Successfully');
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
            'slug' => 'max:245|unique:products,slug,'.$service_id,
            
        ];
       
        return $rules;
    }
}
