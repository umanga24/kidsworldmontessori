<?php
namespace App\Repositories\Blog;
use App\Repositories\Crud\CrudRepository;
use App\Models\Blog;
class BlogRepository extends CrudRepository implements BlogInterface{
	public function __construct(Blog $blog){
		$this->model = $blog;
	}
	public function create($data){
		$value=$data;
		// $value['slug']=!empty($input['slug'])? Str::slug($input['slug']) : Str::slug($input['name']);
		$this->model->create($value);
	}
	public function update($data,$id){
		$value=$data;
		$this->model->find($id)->update($value);
	}
}