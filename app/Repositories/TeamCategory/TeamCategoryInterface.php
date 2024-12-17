<?php
namespace App\Repositories\TeamCategory;
use App\Repositories\Crud\CrudInterface;

interface TeamCategoryInterface extends CrudInterface{
	public function create($data);
	public function update($data,$id);
}