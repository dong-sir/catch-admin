<?php

declare(strict_types=1);

namespace Modules\Permissions\Http\Controllers;

use Catch\Base\CatchController as Controller;
use Modules\Permissions\Enums\MenuType;
use Modules\Permissions\Models\PermissionsModel;
use Illuminate\Http\Request;

class PermissionsController extends Controller
{
    public function __construct(
        protected readonly PermissionsModel $model
    ) {
    }

    /**
     * @return mixed
     */
    public function index(): mixed
    {
        return $this->model->setBeforeGetList(function ($query){
            return $query->with('actions')->whereIn('type', [MenuType::Top->value(), MenuType::Menu->value]);
        })->getList();
    }

    public function store(Request $request)
    {
        return $this->model->storeBy($request->all());
    }

    public function show($id)
    {
        return $this->model->firstBy($id);
    }

    public function update($id, Request $request)
    {
        return $this->model->updateBy($id, $request->all());
    }

    public function destroy($id)
    {
        return $this->model->deleteBy($id);
    }

    /**
     * enable
     *
     * @param $id
     * @return bool
     */
    public function enable($id)
    {
        return $this->model->toggleBy($id, 'hidden');
    }
}