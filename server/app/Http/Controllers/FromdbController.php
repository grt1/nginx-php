<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Libraries\Helpers;

use App\Models\Author;
use App\Models\MstInchargMd;
use App\Models\MstDistributionProcessing;

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
