<?php
namespace App\Repositories\FinancialInformation;
use App\Repositories\Crud\CrudInterface;

interface FinancialInformationInterface extends CrudInterface{
	public function create($data);
	public function update($data,$id);
}