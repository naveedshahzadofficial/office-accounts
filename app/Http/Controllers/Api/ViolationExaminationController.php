<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\ViolationExaminationRequest;
use App\Http\Resources\ViolationExaminationResource;
use App\Models\ViolationExamination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ViolationExaminationController extends ApiController
{
    public function index()
    {
        $length = request()->get('length', 30);
        $search = request()->get('search', '');
        $column = request()->get('column', 'created_at');
        $dir = request()->get('dir', 'desc');

        $query = ViolationExamination::with('user');
        if(!empty($search)){
            $search = str_replace(',', '', $search);
            $status= Str::is('ac*', $search)?1:(Str::is('in*', $search)?0:$search);
            $query->where('violation_website', 'LIKE', $search . '%')
                ->orWhere('violation_newspaper', 'LIKE', $search . '%')
                ->orWhere('violation_identified', 'LIKE', $search . '%')
                ->orWhere('violation_removed', 'LIKE', $search . '%')
                ->orWhere('violation_pending', 'LIKE', $search . '%')
                ->orWhere(DB::raw('DATE_FORMAT(created_at, "%d-%m-%Y")'), 'LIKE', $search . '%')
                ->orWhere('violation_status',$status);
        }

        $data =  $query->orderBy($column, $dir)->paginate($length);
        return ViolationExaminationResource::collection($data);
    }


    public function store(ViolationExaminationRequest $request)
    {
        $row = ViolationExamination::create($request->all());
        return $this->sendSuccessReponse('Violation Examination has been saved successfully.',$row);
    }


    public function show(ViolationExamination $violationExamination)
    {
        return $this->respond(['row' => new ViolationExaminationResource($violationExamination)]);
    }

    public function update(ViolationExaminationRequest $request, ViolationExamination $violationExamination)
    {
        $violationExamination->update($request->all());
        return $this->setStatusCode(201)->sendSuccessReponse('Violation Examination has been updated successfully.');
    }

    public function destroy(ViolationExamination $violationExamination)
    {
        $violationExamination->delete();
        return $this->sendSuccessReponse('Violation Examination has been deleted successfully.');
    }
}
