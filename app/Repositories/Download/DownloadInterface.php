<?php
namespace App\Repositories\Download;
use App\Repositories\Crud\CrudInterface;

interface DownloadInterface extends CrudInterface{
	public function create($data);
	public function update($data,$id);
}