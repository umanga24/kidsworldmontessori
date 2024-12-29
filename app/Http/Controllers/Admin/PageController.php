<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Page\PageRepository;
use Image;

class PageController extends Controller
{
    public function __construct(PageRepository $page){
        $this->page = $page;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $details = $this->page->orderBy('created_at','desc')->where('publish',1)->get();
        return view('admin.page.list',compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.page.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $slug = !empty($request->slug)? str_slug($request->slug) : str_slug($request->name);
        $request->request->add(['slug' => $slug]); 
        $this->validate($request, $this->rules());
        $data = $request->except('publish','image');
        $data['publish'] = is_null($request->publish)?0:1;
        if($request->image){
            $image=$request->file('image');
            $name= time().'.'.$image->getClientOriginalExtension();
            // $mainPath = public_path('images/main');
            // $img = Image::make($image->getRealPath());
            // $img->fit(817,545)->save($mainPath.'/'.$name);
            $image->move(public_path('images/main'),$filename);
            $data['image']=$name; 
        }
        $data['home']=1;
        $this->page->create($data);
        return redirect()->route('page.index')->with('message','Page Added Successfully');
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
        $detail = $this->page->findOrFail($id);
        return view('admin.page.edit',compact('detail'));
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
        $page = $this->page->findOrFail($id);
    
        $data = $request->except('publish','title','image1','image2','image3','image4');
        if($request->image1){
            $image=$request->file('image1');
            $name= time().'img1.'.$image->getClientOriginalExtension();
            // $mainPath = public_path('images/main');
            // $img = Image::make($image->getRealPath());
            // $img->fit(542,532)->save($mainPath.'/'.$name);
            $image->move(public_path('images/main'),$name);
            $data['image1']=$name;     
        }
        if($request->image2){
            $image=$request->file('image2');
            $name= time().'img2.'.$image->getClientOriginalExtension();
            $image->move(public_path('images/main'),$name);
            $data['image2']=$name;     
        }
        if($request->image3){
            $image=$request->file('image3');
            $name= time().'img3.'.$image->getClientOriginalExtension();
            $image->move(public_path('images/main'),$name);
            $data['image3']=$name;     
        }
        if($request->image4){
            $image=$request->file('image4');
            $name= time().'img4.'.$image->getClientOriginalExtension();
            $image->move(public_path('images/main'),$name);
            $data['image4']=$name;     
        }

        $this->page->update($data,$id);
        return redirect()->route('page.index')->with('message','Page Edited Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
    public function rules($service_id=null){

        $rules =  [
            'name' => 'required|max:200',
            'slug' => 'unique:pages,slug,'.$service_id,
            'image1'=>'dimensions:max_width=600,max_height=600',
            'image2'=>'dimensions:max_width=500,max_height=500'
            
        ];
       
        return $rules;
    }
}
