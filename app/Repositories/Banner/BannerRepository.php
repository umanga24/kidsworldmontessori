<?php
namespace App\Repositories\Banner;
use App\Repositories\Crud\CrudRepository;
use App\Models\Banner;
class BannerRepository extends CrudRepository implements BannerInterface{
	public function __construct(Banner $banner){
		$this->model = $banner;
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


    /**
     * Select specific columns.
     *
     * @param array $columns
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function select($columns = ['*']) {
        return $this->model->select($columns);
    }
}