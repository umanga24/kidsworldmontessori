<?php
namespace App\Repositories\TeamCategory;
use App\Repositories\Crud\CrudRepository;
use App\Models\TeamCategory;
class TeamCategoryRepository extends CrudRepository implements TeamCategoryInterface{
	public function __construct(TeamCategory $team_category){
		$this->model = $team_category;
	}
	public function create($data){
		$value=$data;
		// $value['slug']=!empty($input['slug'])? Str::slug($input['slug']) : Str::slug($input['name']);
		$this->model->create($value);
	}
	public function update($data,$id){
		// $team_category=$this->model->find($id);
		$value=$data;
		// if($value['slug']!==$team_category['slug']){
		// 	$value['slug']=Str::slug($data['slug']);
		// }
		$this->model->find($id)->update($value);
	}
}