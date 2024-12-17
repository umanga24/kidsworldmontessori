<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use App\Repositories\Branch\BranchRepository;
use App\Repositories\ShareHolder\ShareHolderRepository;

class BranchController extends Controller
{
    public function __construct(ShareHolderRepository $shareholder)
    {
        $this->shareholder = $shareholder;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $details = $this->shareholder->orderBy('created_at', 'desc')->get();
        return view('admin.branch.list', compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.branch.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $this->validate($request, $this->rules());
        $data = $request->except('publish');
        $data['publish'] = is_null($request->publish) ? 0 : 1;
        $this->shareholder->create($data);
        return redirect()->route('branch.index')->with('message', 'Branch Added Successfully');
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
        $detail = $this->shareholder->findOrFail($id);
        return view('admin.branch.edit', compact('detail'));
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
        $value = $request->except('publish');
        $value['publish'] = is_null($request->publish) ? 0 : 1;

        $this->shareholder->update($value, $id);
        return redirect()->route('branch.index')->with('message', 'Branch Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->shareholder->destroy($id);
        return redirect()->back()->with('message', 'Branch Deleted Successfully');
    }
    public function rules($blog_id = null)
    {
        $rules =  [
            'name' => 'required|max:200',
            'email' => 'email'
        ];

        return $rules;
    }
}
