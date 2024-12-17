<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Slider\SliderRepository;
use App\Repositories\ProductCategory\ProductCategoryRepository;
use App\Repositories\Service\ServiceRepository;
use App\Repositories\Notice\NoticeRepository;
use App\Repositories\News\NewsRepository;
use App\Repositories\Download\DownloadRepository;
use App\Repositories\Team\TeamRepository;
use App\Repositories\TeamCategory\TeamCategoryRepository;
use App\Repositories\FinancialCategory\FinancialCategoryRepository;
use App\Repositories\Career\CareerRepository;
use App\Repositories\Setting\SettingRepository;
use App\Repositories\Product\ProductRepository;
use App\Repositories\Page\PageRepository;
use App\Repositories\Branch\BranchRepository;
use App\Repositories\Blog\BlogRepository;
use App\Repositories\ShareHolder\ShareHolderRepository;
use App\Repositories\Gallery\GalleryRepository;
use App\Repositories\Report\ReportRepository;
use App\Repositories\GalleryDetail\GalleryDetailRepository;

use App\Models\RateCategory;
use App\Models\Contact;
use App\Models\Application;
use Mail;
use App\Rules\ReCaptcha;
use App\Models\GalleryDetail;

class DefaultController extends Controller
{
    public function __construct(SliderRepository $slider, ProductCategoryRepository $product_category, ServiceRepository $service, NoticeRepository $notice, NewsRepository $news, DownloadRepository $download, TeamRepository $team, TeamCategoryRepository $team_category, FinancialCategoryRepository $financial_category, CareerRepository $career, BranchRepository $branch, BlogRepository $blog, ShareHolderRepository $share_holder, GalleryRepository $gallery, ReportRepository $report, GalleryDetailRepository $gallerydetail)
    {
        $this->slider = $slider;
        $this->product_category = $product_category;
        $this->service = $service;
        $this->notice = $notice;
        $this->news = $news;
        $this->download = $download;
        $this->team = $team;
        $this->team_category = $team_category;
        $this->financial_category = $financial_category;
        $this->career = $career;
        $this->branch = $branch;
        $this->blog = $blog;
        $this->share_holder = $share_holder;
        $this->gallery = $gallery;
        $this->report = $report;
        $this->gallerydetail = $gallerydetail;
    }
    public function index()
    {
        $sliders = $this->slider->orderBy('created_at', 'desc')->take(3)->get();
        $product_category = $this->product_category->with(['products'])->get();
        $services = $this->service->orderBy('created_at', 'desc')->where('publish', 1)->latest()->take(3)->get();
        $notices = $this->notice->orderBy('created_at', 'desc')->where('publish', 1)->get();
        $allnews = $this->news->orderBy('created_at', 'desc')->where('publish', 1)->take(10)->get();
        $downloads = $this->download->orderBy('created_at', 'desc')->where('publish', 1)->take(3)->get();
        $galleries = $this->gallery->orderBy('created_at','desc')->get();
        //dd($galleries);
        return view('front.index', compact('sliders', 'product_category', 'services', 'notices', 'allnews', 'downloads', 'galleries'));
    }
    public function news()
    {
        $allnews = $this->news->orderBy('created_at', 'desc')->where('publish', 1)->paginate(12);
        return view('front.news-list', compact('allnews'));
    }

    public function teams()
    {
        $teams = $this->team->where('publish', 1)->orderBy('sort_order', 'asc')->get();

        return view('front.teams', compact('teams'));
    }

    public function reports()
    {
        $downloads = $this->report->orderBy('created_at', 'desc')->where('publish', 1)->get();
        return view('front.reports', compact('downloads'));
    }

    // public function galleries()
    // {
    //     dd("test");
    //     return view('front.galleries');
    // }

    // public function test()
    // {
    //     return view('front.test');
    // }

    // public function financialInformation($slug){
    //     $financial_category = $this->financial_category->where('slug',$slug)->with(['financialInformations'=>function($query){
    //         $query->where('publish',1);
    //     }])->first();
    //     if($financial_category){
    //         return view('front.financialInformation',compact('financial_category'));
    //     }else{
    //         abort(404);
    //     }
    // }
    public function downloads()
    {
        $downloads = $this->download->orderBy('created_at', 'desc')->where('publish', 1)->get();
        return view('front.downloads', compact('downloads'));
    }

    public function blogs()
    {
        $blogs = $this->blog->orderBy('created_at', 'desc')->where('publish', 1)->get();
        return view('front.blog-list', compact('blogs'));
    }

    public function blogDetails($slug)
    {
        $blog = $this->blog->where('publish', 1)->where('slug', $slug)->first();
        $other_blogs = $this->blog->orderBy('created_at', 'desc')->where('publish', 1)->where('id', '!=', $blog->id)->take(5)->get();
        return view('front.blog-details', compact('blog', 'other_blogs'));
    }

    public function gallery()
    {
        $galleries = $this->gallery->orderBy('created_at', 'desc')->paginate(10);
        return view('front.galleries-list', compact('galleries'));
    }
    public function gallerydetail($id)
    {
        $galleryDetail = $this->gallerydetail->where('gallery_id', $id)->get();
        return view('front.galleries', compact('galleryDetail'));
    }

    // public function careerDetail($id){
    //     $career = $this->career->findOrFail($id);
    //     $other_jobs = $this->career->orderBy('created_at','desc')->where('publish',1)->where('id','!=',$career->id)->take(7)->get();
    //     return view('front.careerDetail',compact('career','other_jobs'));
    // }
    public function contactUs()
    {
        return view('front.contact');
    }
    public function saveContact(Request $request, SettingRepository $setting)
    {
        $this->setting = $setting;
        $dashboard = $this->setting->first();
        $this->validate($request, ['email' => 'required|email', 'name' => 'required|string|max:200', 'message' => 'required', 'phone' => 'required', 'subject' => 'required']);
        $data = [
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ];

        $contact = Contact::insert($data);

        // Mail::send('mail.contact', $data, function ($message) use ($data,$request) {
        //     $message->to($data['receiving_email'])->from($data['email'],$data['name'])->replyTo($data['email']);
        //         $message->subject($data['subject']);   

        // });
        return redirect()->back()->with('message', 'Message Sent Successfully');
    }
    public function page($slug, PageRepository $page, ProductRepository $product)
    {

        $this->page = $page;
        $this->product = $product;
        $page = $this->page->where('slug', $slug)->first();
        if ($page) {
            if ($slug == 'about-us') {
                return view('front.about', compact('page'));
            }
            if ($slug == 'company-profile') {
                return view('front.about', compact('page'));
            }
            if ($slug == 'product') {
                $products = $this->product->orderBy('created_at', 'desc')->where('publish', 1)->get();
                return view('front.product', compact('products', 'page'));
            }
            if ($slug == 'services') {
                $services = $this->service->orderBy('created_at', 'desc')->where('publish', 1)->get();
                return view('front.service-list', compact('services', 'page'));
            }
            if ($slug == 'message') {

                return view('front.message', compact('page'));
            }
            abort(404);
        } else {
            abort(404);
        }
    }
    // public function productInner($slug,ProductRepository $product){
    //     $this->product = $product;
    //     $product = $this->product->where('slug',$slug)->first();
    //     if($product){
    //         $products = $this->product->OrderBy('created_at','desc')->where('publish',1)->where('id','!=',$product->id)->get();
    //         return view('front.productDetail',compact('product','products'));
    //     }else{
    //         abort(404);
    //     }
    // }
    public function serviceInner($slug)
    {
        $service = $this->service->where('slug', $slug)->first();
        if ($service) {
            $services = $this->service->orderBy('created_at', 'desc')->where('publish', 1)->get();
            return view('front.service-detail', compact('service', 'services'));
        } else {
            abort(404);
        }
    }
    public function newsInner($slug)
    {
        $news = $this->news->where('slug', $slug)->where('publish', 1)->first();
        if ($news) {
            $other_news = $this->news->orderBy('created_at', 'desc')->where('publish', 1)->where('id', '!=', $news->id)->take(5)->get();
            return view('front.news-details', compact('news', 'other_news'));
        } else {
            abort(404);
        }
    }
    // public function rates($slug){
    //     $category = RateCategory::where('slug',$slug)->with(['rates'=>function($query){
    //         $query->where('publish',1);
    //     }])->first();
    //     if($category){
    //         return view('front.rates',compact('category'));
    //     }else{
    //         abort(404);
    //     }
    // }
    public function allNotices()
    {
        $notices = $this->notice->orderBy('created_at', 'desc')->where('publish', 1)->paginate(12);
        return view('front.notices', compact('notices'));
    }
    public function noticeInner($slug)
    {
        $notice = $this->notice->where('slug', $slug)->first();
        if ($notice) {
            $other_notices = $this->notice->orderBy('created_at', 'desc')->where('publish', 1)->where('id', '!=', $notice->id)->take(5)->get();
            return view('front.notice-detail', compact('notice', 'other_notices'));
        } else {
            abort(404);
        }
    }
    // public function applyNow($id){
    //     return view('front.applyForm',compact('id'));
    // }


    public function accounts()
    {
        return view('front.galleries');
    }
    public function createAccount()
    {
        return view('front.create-account');
    }
    public function saveAccount(Request $request)
    {

        $this->validate($request, ['first_name' => 'required', 'last_name' => 'required', 'email' => 'required|email', 'g-recaptcha-response' => ['required', new ReCaptcha]]);
        $data = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'email' => $request->email
        ];
        Application::create($data);
        return redirect()->back()->with('message', 'Account create successfully');
    }
    public function shareHolder()
    {
        //dd("test");
        //$shareholders = $this->shareholders->orderBy('sort_order', 'asc')->get();
        $shareholders = $this->share_holder->get();
        // dd("test2");
        return view('front.shareholder', compact('shareholders'));
    }
    // public function emiCalculator(){
    //     return view('front.emiCalculator');
    // }

}
