<?php
namespace App\Repositories\FinancialInformation;
use App\Repositories\Crud\CrudRepository;
use App\Models\FinancialInformation;
class FinancialInformationRepository extends CrudRepository implements FinancialInformationInterface{
	public function __construct(FinancialInformation $information){
		$this->model = $information;
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