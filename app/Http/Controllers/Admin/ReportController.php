<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Report\ReportRepository;
use Image;
use Str;

class ReportController extends Controller
{
    public function __construct(ReportRepository $report){
        $this->report = $report;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $details = $this->report->orderBy('created_at','desc')->get();
        return view('admin.report.list',compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.report.create');
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

        $this->report->create($data);
        return redirect()->route('report.index')->with('message','Report Added Successfully');
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
        $detail = $this->report->findOrFail($id);
        return view('admin.report.edit',compact('detail'));
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
        $this->report->update($value,$id);
        return redirect()->route('report.index')->with('message','Report Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $report=$this->report->findOrFail($id);
        if($report->file){
            
           
            
            $filePath = public_path('files');
            if((file_exists($filePath.'/'.$report->file))){
                unlink($filePath.'/'.$report->file);
            }
        }
        $this->report->destroy($id);
        return redirect()->back()->with('message','Item Deleted Successfully');
    }
    public function imageProcessing($image){
       $input['imagename'] = time().'report.'.$image->getClientOriginalName();
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
