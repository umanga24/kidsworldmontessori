<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Team\TeamRepository;
use App\Repositories\TeamCategory\TeamCategoryRepository;
use Image;
use Str;

class TeamController extends Controller
{
    public function __construct(TeamRepository $team,TeamCategoryRepository $team_category){
        $this->team = $team;
        $this->team_category = $team_category;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $details = $this->team->orderBy('created_at','desc')->get();
        return view('admin.team.list',compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $team_categories = $this->team_category->get();
        return view('admin.team.create',compact('team_categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->rules(),['image.dimensions'=>'Image should be less then 250*250 ']);
        $data = $request->except('publish','image');
        $data['publish'] = is_null($request->publish)?0:1;
        if($request->image){
            $image=$this->imageProcessing($request->file('image'));
            $data['image']=$image;
        }

        $this->team->create($data);
        return redirect()->route('team.index')->with('message','Team Added Successfully');
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
        $detail = $this->team->findOrFail($id);
        $team_categories = $this->team_category->get();
        return view('admin.team.edit',compact('detail','team_categories'));
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
        $this->validate($request, $this->rules($id),['image.dimensions'=>'Image should be less then 250*250 ']);
        $value=$request->except('image','publish');
        $value['publish']=is_null($request->publish)? 0 : 1 ;
        if($request->image){
            
            $image=$this->imageProcessing($request->file('image'));
            $value['image']=$image;
        }
        $this->team->update($value,$id);
        return redirect()->route('team.index')->with('message','Team Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $team=$this->team->findOrFail($id);
        if($team->image){
            
            $thumbnailPath = public_path('images/thumbnail');
            
            $listingPath = public_path('images/listing');
            if((file_exists($listingPath.'/'.$team->image)) &&(file_exists($thumbnailPath.'/'.$team->image))){
                unlink($listingPath.'/'.$team->image);
                unlink($thumbnailPath.'/'.$team->image);
            }
        }
        $this->team->destroy($id);
        return redirect()->back()->with('message','Team Deleted Successfully');
    }
    public function imageProcessing($image){
       $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
       $thumbPath = public_path('images/thumbnail');
      
       $listingPath = public_path('images/listing');
       
       $img2 = Image::make($image->getRealPath());
       $img2->save($listingPath.'/'.$input['imagename']);

       $image->move(public_path('images/thumbnail'),$input['imagename']);
       
      
       $destinationPath = public_path('/images');
       return $input['imagename'];     
    }
    public function rules($team_id=null){
        $rules =  [

            'name' => 'required|max:200',
            'image'=>'image|mimes:jpeg,png,jpg'
        ];
       
        return $rules;
    }
}
