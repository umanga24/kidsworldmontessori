<?php
namespace App\Repositories\Page;
use App\Repositories\Crud\CrudInterface;

interface PageInterface extends CrudInterface{
	public function create($data);
	public function update($data,$id);
}