<?php

namespace App\Actions;


use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

abstract class Action Implements ActionContract
{
    public function execute(Model $model, Request $request)
    {
        return $this->storeModel($model, $request);
    }

    abstract public function storeModel(Model $model, Request $data): Model;
}
