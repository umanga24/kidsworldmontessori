<?php
namespace App\Repositories\Report;
use App\Repositories\Crud\CrudInterface;

interface ReportInterface extends CrudInterface{
	public function create($data);
	public function update($data,$id);
}