<?php

namespace App\Repositories\Banner;

use App\Repositories\Crud\CrudInterface;

interface BannerInterface extends CrudInterface
{
    public function create($data);
    public function update($data, $id);
}
