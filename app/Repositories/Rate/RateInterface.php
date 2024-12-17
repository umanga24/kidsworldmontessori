<?php
namespace App\Repositories\Rate;
use App\Repositories\Crud\CrudInterface;

interface RateInterface extends CrudInterface{
	public function create($data);
	public function update($data,$id);
}