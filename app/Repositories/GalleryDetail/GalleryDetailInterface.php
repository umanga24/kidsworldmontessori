<?php
namespace App\Repositories\GalleryDetail;
use App\Repositories\Crud\CrudInterface;

interface GalleryDetailInterface extends CrudInterface{
	public function create($data);
	public function update($data,$id);
}