<?php

namespace App\Repositories\Gallery;

use App\Repositories\Crud\CrudInterface;

interface GalleryInterface extends CrudInterface
{
    public function create($data);
    public function update($data, $id);
}
