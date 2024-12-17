<?php
namespace App\Repositories\Product;
use App\Repositories\Crud\CrudInterface;

interface ProductInterface extends CrudInterface{
	public function create($data);
	public function update($data,$id);
}