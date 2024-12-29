<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Banner\BannerRepository;

class BannerController extends Controller
{
    public function __construct(BannerRepository $banner)
    {
        $this->banner = $banner;
    }
    public function index()
    {
        $details = $this->banner->orderBy('created_at', 'desc')->get();
        return view('admin.banner.list', compact('details'));
    }

    public function create()
    {
        return view('admin.banner.create');
    }

    public function store(Request $request)
    {

        // $this->validate($request, $this->rules());


        if ($request->updates) {
            $image = $request->file('updates');
            $name = time() . 'img1.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/main'), $name);
            $data['updates'] = $name;
        }
        if ($request->contactus) {
            $image = $request->file('contactus');
            $name = time() . 'img2.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/main'), $name);
            $data['contactus'] = $name;
        }
        if ($request->team) {
            $image = $request->file('team');
            $name = time() . 'img3.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/main'), $name);
            $data['team'] = $name;
        }
        if ($request->gallery) {
            $image = $request->file('gallery');
            $name = time() . 'img4.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/main'), $name);
            $data['gallery'] = $name;
        }

        $this->banner->create($data);
        return redirect()->route('banner.index')->with('message', 'Banner Added Successfully');
    }


    public function edit($id) {
        
        $detail = $this->banner->findOrFail($id);
        return view('admin.banner.edit', compact('detail'));
    }

    public function update(Request $request, $id) {

        $banner = $this->banner->findOrFail($id);
        if ($request->updates) {
            $image = $request->file('updates');
            $name = time() . 'img1.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/main'), $name);
            $data['updates'] = $name;
        }
        if ($request->contactus) {
            $image = $request->file('contactus');
            $name = time() . 'img2.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/main'), $name);
            $data['contactus'] = $name;
        }
        if ($request->team) {
            $image = $request->file('team');
            $name = time() . 'img3.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/main'), $name);
            $data['team'] = $name;
        }
        if ($request->gallery) {
            $image = $request->file('gallery');
            $name = time() . 'img4.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/main'), $name);
            $data['gallery'] = $name;
        }

        $this->banner->where('id', $id)->update($data);
        return redirect()->route('banner.index')->with('message', 'Banner Update Successfully');
    }
}
