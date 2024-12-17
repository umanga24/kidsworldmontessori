<?php
namespace App\Repositories\ProductCategory;
use App\Repositories\Crud\CrudInterface;

interface ProductCategoryInterface extends CrudInterface{
	public function create($data);
	public function update($data,$id);
}