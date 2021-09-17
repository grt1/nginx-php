<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Libraries\Helpers;

use App\Models\MstDistributionProcessing;

class MstDistributionProcessingController extends Controller
{
    public function getAll() {
        return response()->json(MstDistributionProcessing::all());
    }

    public function getOne($id) {
        return response()->json(MstDistributionProcessing::find($id));
    }

    public function create(Request $request) {
        $this->validate($request, [
            'process_div' => 'required|integer|max:3',
            'code' => 'required|integer',
            'distribution_item' => 'required',
            'dist_status' => 'required|integer|min:0|max:1',
            'created_by' => 'required'
        ]);
        $db = MstDistributionProcessing::create($request->all());
        return response()->json($db, 201);
    }

    public function update($id, Request $request) {
        $this->validate($request, [
            'dist_status' => 'required|integer|min:0|max:1'
        ]);
        $db = MstDistributionProcessing::findOrFail($id);
        $db->update(['dist_status' => $request->dist_status]);
        return response()->json($db, 200);
    }

    public function delete($id) {
        MstDistributionProcessing::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }
}
