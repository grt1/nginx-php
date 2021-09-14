<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use App\Libraries\Helpers;

class FromdbController extends Controller
{
    public function getAll($table) {
        $model = $this->modelCheck($table);
        $res = $model::all();
        return response()->json($res);
    }

    public function getOne($table, $id) {
        $model = $this->modelCheck($table);
        $res = $model::find($id);
        return response()->json(Author::find($id));
    }

    function modelCheck($table) {
        $table = ucfirst($table);
        $model = "\App\\".$table;
        if (!class_exists($model)) {
            throw new \Exception("モデル（{$model}）が見つかりませんでした。");
        }
        return $model;
    }
}
