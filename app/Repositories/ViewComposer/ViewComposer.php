<?php
namespace App\Repositories\ViewComposer;
use App\Models\Dashboard;
use Illuminate\View\View;
use App\Repositories\ProductCategory\ProductCategoryRepository;
use App\Repositories\Service\ServiceRepository;
use App\Repositories\FinancialCategory\FinancialCategoryRepository;
use App\Repositories\News\NewsRepository;
use App\Repositories\Setting\SettingRepository;
use App\Repositories\NepaliCalendar\nepali_date;
use App\Models\RateCategory;
use Session;

class ViewComposer {
	
	public function __construct(ProductCategoryRepository $product_category,ServiceRepository $service,FinancialCategoryRepository $financial_category,NewsRepository $news,SettingRepository $setting,nepali_date $calendar){
		$this->product_category = $product_category;
		$this->service = $service;
		$this->financial_category = $financial_category;
		$this->news = $news;
		$this->setting = $setting;
		$this->calendar = $calendar;
	}
	
	
	public function compose(View $view) {
		
		$nepali_date=$this->calendar->get_nepali_date(date('Y'),date('m'),date('d'));
		
		$newNepaliDate=$nepali_date['y'].'/'.((strlen($nepali_date['m']) == 2) ? $nepali_date['m'] : "0".$nepali_date['m']).'/'.((strlen($nepali_date['d']) == 2) ? $nepali_date['d'] : "0".$nepali_date['d']);

		
		$product_category = $this->product_category->orderBy('created_at','desc')->get();
		$services = $this->service->orderBy('created_at','desc')->where('publish',1)->get();
		$news = $this->news->orderBy('created_at','desc')->where('publish',1)->take(5)->get();
		$settings = $this->setting->first();
		$rate_categories = RateCategory::orderBy('created_at','desc')->get();
		
		$view->with(['dash_product_categories'=>$product_category,'dash_services'=>$services,'dash_news'=>$news,'dash_setting'=>$settings,'dash_rateCategory'=>$rate_categories,'dashboard_nepali_date'=>$newNepaliDate]);
	}
	
}
