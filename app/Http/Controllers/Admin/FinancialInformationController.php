<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\FinancialInformation\FinancialInformationRepository;
use App\Repositories\FinancialCategory\FinancialCategoryRepository;
use Image;
use Str;

class FinancialInformationController extends Controller
{
    public function __construct(FinancialInformationRepository $information, FinancialCategoryRepository $category){
        $this->information = $information;
        $this->category = $category;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $details = $this->information->orderBy('created_at','desc')->get();
        return view('admin.financialInformation.list',compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->category->orderBy('show_order','asc')->get();
        return view('admin.financialInformation.create',compact('categories'));
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

        $this->information->create($data);
        return redirect()->route('financial-information.index')->with('message','Financial Information Added Successfully');
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
        $detail = $this->information->findOrFail($id);
        $categories = $this->category->get();
        return view('admin.financialInformation.edit',compact('detail','categories'));
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
            $data['file']=$file;
        }
        $this->information->update($value,$id);
        return redirect()->route('financial-information.index')->with('message','Financial Information Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $download=$this->information->findOrFail($id);
        if($download->file){
            $filePath = public_path('files');
            if((file_exists($filePath.'/'.$download->file))){
                unlink($filePath.'/'.$download->file);
            }
        }
        $this->information->destroy($id);
        return redirect()->back()->with('message','Financial Information Deleted Successfully');
    }
    public function imageProcessing($image){
       $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
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
