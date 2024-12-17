<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Download\DownloadRepository;
use Image;
use Str;

class DownloadController extends Controller
{
    public function __construct(DownloadRepository $download){
        $this->download = $download;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $details = $this->download->orderBy('created_at','desc')->get();
        return view('admin.download.list',compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.download.create');
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
        if($request->file){
            $file=$this->imageProcessing($request->file('file'));
            $data['file']=$file;
        }

        $this->download->create($data);
        return redirect()->route('download.index')->with('message','Download Added Successfully');
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
        $detail = $this->download->findOrFail($id);
        return view('admin.download.edit',compact('detail'));
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
        if($request->file){
            $file=$this->imageProcessing($request->file('file'));
            $value['file']=$file;
        }
        $this->download->update($value,$id);
        return redirect()->route('download.index')->with('message','Download Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $download=$this->download->findOrFail($id);
        if($download->file){
            
           
            
            $filePath = public_path('files');
            if((file_exists($filePath.'/'.$download->file))){
                unlink($filePath.'/'.$download->file);
            }
        }
        $this->download->destroy($id);
        return redirect()->back()->with('message','Item Deleted Successfully');
    }
    public function imageProcessing($image){
       $input['imagename'] = time().'download.'.$image->getClientOriginalName();
       $image->move(public_path('files/'),$input['imagename']);
       return $input['imagename'];     
    }
    public function rules($team_id=null){
        $rules =  [

            'title' => 'required|max:200',
        ];
       
        return $rules;
    }
}
