<?php

namespace App\Http\Controllers;

use App\Models\MstDistributionProcessing;
use Illuminate\Http\Request;
use App\Libraries\Helpers;

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
            'dist_status' => 'required|integer|size:1',
            'created_by' => 'required'
        ]);
        $author = Author::create($request->all());
        return response()->json($author, 201);
    }

    public function update($id, Request $request) {
        $this->validate($request, [
            'dist_status' => 'required|integer|size:1'
        ]);
        $author = Author::findOrFail($id);
        $author->update(['dist_status' => $request->dist_status]);
        return response()->json($author, 200);
    }

    public function delete($id) {
        Author::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }
}
