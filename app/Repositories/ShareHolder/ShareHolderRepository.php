<?php

namespace App\Repositories\ShareHolder;

use App\Repositories\Crud\CrudRepository;
use App\Models\ShareHolder;

class ShareHolderRepository extends CrudRepository implements ShareHolderInterface
{
    public function __construct(ShareHolder $shareHolder)
    {
        $this->model = $shareHolder;
    }
    public function create($data)
    {
        $value = $data;

        $this->model->create($value);
    }
    public function update($data, $id)
    {

        $value = $data;

        $this->model->find($id)->update($value);
    }
}
