<?php
namespace App\Repositories\Slider;
use App\Repositories\Crud\CrudInterface;

interface SliderInterface extends CrudInterface{
	public function create($data);
	public function update($data,$id);
}