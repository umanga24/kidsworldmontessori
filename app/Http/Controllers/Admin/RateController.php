<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Rate\RateRepository;
use App\Models\RateCategory;

class RateController extends Controller
{
    public function __construct(RateRepository $rate){
        $this->rate = $rate;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $details = $this->rate->orderBy('created_at','desc')->get();
        return view('admin.rate.list',compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = RateCategory::get();

        return view('admin.rate.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,['month'=>'required','base_rate'=>'required']);
        $data =  $request->except('publish');
        $data['publish'] = is_null($request->publish)?0:1;
        $this->rate->create($data);
        return redirect()->route('rate.index')->with('message','Rate Added Successfully');
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
        $detail = $this->rate->findOrFail($id);
        $categories = RateCategory::get();
        return view('admin.rate.edit',compact('detail','categories'));
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
        $this->validate($request,['month'=>'required','base_rate'=>'required']);
        $data =  $request->except('publish');
        $data['publish'] = is_null($request->publish)?0:1;
        $this->rate->find($id)->update($data);
        return redirect()->route('rate.index')->with('message','Rate Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->rate->destroy($id);
        return redirect()->back()->with('message','Rate Deleted Successfully');
    }
}
