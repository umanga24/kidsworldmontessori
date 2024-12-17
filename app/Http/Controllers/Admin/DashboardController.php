<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\News\NewsRepository;
use App\Repositories\Product\ProductRepository;
use App\Repositories\Service\ServiceRepository;
use App\Repositories\Career\CareerRepository;
use App\Repositories\Download\DownloadRepository;

class DashboardController extends Controller
{
    public function __construct(NewsRepository $news,ProductRepository $product,CareerRepository $career,DownloadRepository $download,ServiceRepository $service){
        $this->news = $news;
        $this->product = $product;
        $this->service = $service;
        $this->career = $career;
        $this->download = $download;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = $this->service->get()->count();
        $news = $this->news->get()->count();
        $products = $this->product->get()->count();
        $career = $this->career->get()->count();
        return view('admin.dashboard',compact('services','news','products','career'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
