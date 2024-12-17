<?php
namespace App\Repositories\Page;
use App\Models\Page;
use App\Repositories\Crud\CrudRepository;
use Illuminate\Support\Str;

class PageRepository extends CrudRepository implements PageInterface{
	public function __construct(Page $page){
		$this->model = $page;
	}
	public function create($data){
		$value=$data;
		
		$this->model->create($value);
	}
	public function update($data,$id){
		$team_category=$this->model->find($id);
		$value=$data;
		// if($value['slug']!==$team_category['slug']){
		// 	$value['slug']=Str::slug($data['slug']);
		// }
		$this->model->find($id)->update($value);
	}

}