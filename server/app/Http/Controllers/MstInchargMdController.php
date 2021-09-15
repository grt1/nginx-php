<?php

namespace App\Http\Controllers;

use App\Models\MstInchargMd;
use Illuminate\Http\Request;
use App\Libraries\Helpers;

class MstInchargMdController extends Controller
{
    public function getAll() {
        return response()->json(MstInchargMd::all());
    }

    public function getOne($id) {
        return response()->json(MstInchargMd::find($id));
    }

    public function create(Request $request) {
        $this->validate($request, [
            'incharg_name' => 'required',
            'incharg_dept' => 'required',
            'incharg_status' => 'required|integer|min:0|max:1',
            'created_by' => 'required'
        ]);
        $db = MstInchargMd::create($request->all());
        return response()->json($db, 201);
    }

    public function update($id, Request $request) {
        $this->validate($request, [
            'incharg_status' => 'required|integer|min:0|max:1'
        ]);
        $db = MstInchargMd::findOrFail($id);
        $db->update(['incharg_status' => $request->incharg_status]);
        return response()->json($db, 200);
    }

    public function delete($id) {
        MstInchargMd::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }
}
