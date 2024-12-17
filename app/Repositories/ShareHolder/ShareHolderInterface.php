<?php

namespace App\Repositories\ShareHolder;

use App\Repositories\Crud\CrudInterface;

interface ShareHolderInterface extends CrudInterface
{
    public function create($data);
    public function update($data, $id);
}
