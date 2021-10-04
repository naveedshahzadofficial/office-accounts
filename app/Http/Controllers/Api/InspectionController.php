<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\InspectionRequest;
use App\Http\Resources\InspectionResource;
use App\Models\Inspection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class InspectionController extends ApiController
{
    public function index()
    {
        $length = request()->get('length', 30);
        $search = request()->get('search', '');
        $column = request()->get('column', 'created_at');
        $dir = request()->get('dir', 'desc');

        $query = Inspection::with('user');
        if(!empty($search)){
            $search = str_replace(',', '', $search);
            $status= Str::is('ac*', $search)?1:(Str::is('in*', $search)?0:$search);
            $query->where('inspection_internal_conducted', 'LIKE', $search . '%')
                ->orWhere('inspection_verification_entries', 'LIKE', $search . '%')
                ->orWhere('inspection_pending_3_to_7', 'LIKE', $search . '%')
                ->orWhere('inspection_pending_more_than_7', 'LIKE', $search . '%')
                ->orWhere('inspection_miscellaneous_disposed_off', 'LIKE', $search . '%')
                ->orWhere(DB::raw('DATE_FORMAT(created_at, "%d-%m-%Y")'), 'LIKE', $search . '%')
                ->orWhere('inspection_status',$status);
        }

        $data =  $query->orderBy($column, $dir)->paginate($length);
        return InspectionResource::collection($data);
    }


    public function store(InspectionRequest $request)
    {
        $row = Inspection::create($request->all());
        return $this->sendSuccessReponse('Inspection has been saved successfully.',$row);
    }


    public function show(Inspection $inspection)
    {
        return $this->respond(['row' => new InspectionResource($inspection)]);
    }

    public function update(InspectionRequest $request, Inspection $inspection)
    {
        $inspection->update($request->all());
        return $this->setStatusCode(201)->sendSuccessReponse('Inspection has been updated successfully.');
    }

    public function destroy(Inspection $inspection)
    {
        $inspection->delete();
        return $this->sendSuccessReponse('Inspection has been deleted successfully.');
    }
}
