<?php
namespace App\Repositories\FinancialCategory;
use App\Repositories\Crud\CrudInterface;

interface FinancialCategoryInterface extends CrudInterface{
	public function create($data);
	public function update($data,$id);
}