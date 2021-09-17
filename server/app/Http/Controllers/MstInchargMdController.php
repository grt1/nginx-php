<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Libraries\Helpers;

use App\Models\MstInchargMd;

class MstInchargMdController extends Controller
{
    public function getAll(): JsonResponse
    {
        $res = MstInchargMd::all();
        return JsonResponse::success($res);
    }

    public function getOne($id): JsonResponse
    {
        $res = MstInchargMd::find($id);
        return JsonResponse::success($res);
    }

    public function create(Request $request): JsonResponse 
    {
        $this->validate($request, [
            'incharg_name' => 'required',
            'incharg_dept' => 'required',
            'incharg_status' => 'required|integer|min:0|max:1',
            'created_by' => 'required'
        ]);
        $res = MstInchargMd::create($request->all());
        return JsonResponse::success($res);
        // return response()->json($db, 201);
    }

    public function update($id, Request $request): JsonResponse 
    {
        $this->validate($request, [
            'incharg_status' => 'required|integer|min:0|max:1'
        ]);
        $res = MstInchargMd::findOrFail($id);
        $res->update(['incharg_status' => $request->incharg_status]);
        return JsonResponse::success($res);
    }

    public function delete($id): JsonResponse 
    {
        $res = MstInchargMd::findOrFail($id)->delete();
        return JsonResponse::success($res);
        // return response('Deleted Successfully', 200);
    }
}
