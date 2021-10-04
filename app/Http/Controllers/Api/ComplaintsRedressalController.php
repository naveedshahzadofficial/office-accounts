<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\ComplaintsRedressalRequest;
use App\Http\Resources\ComplaintsRedressalResource;
use App\Models\ComplaintsRedressal;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ComplaintsRedressalController extends ApiController
{
    public function index()
    {
        $length = request()->get('length', 30);
        $search = request()->get('search', '');
        $column = request()->get('column', 'created_at');
        $dir = request()->get('dir', 'desc');

        $query = ComplaintsRedressal::with('user');
        if(!empty($search)){
            $search = str_replace(',', '', $search);
            $status= Str::is('ac*', $search)?1:(Str::is('in*', $search)?0:$search);
            $query->where('vetting_documents', 'LIKE', $search . '%')
                ->orWhere(DB::raw('DATE_FORMAT(created_at, "%d-%m-%Y")'), 'LIKE', $search . '%')
                ->orWhere('vetting_status',$status);
        }

        $data =  $query->orderBy($column, $dir)->paginate($length);
        return ComplaintsRedressalResource::collection($data);
    }


    public function store(ComplaintsRedressalRequest $request)
    {
        $row = ComplaintsRedressal::create($request->all());
        return $this->sendSuccessReponse('Complaint Redressal has been saved successfully.',$row);
    }


    public function show(ComplaintsRedressal $complaintsRedressal)
    {
        return $this->respond(['row' => new ComplaintsRedressalResource($complaintsRedressal)]);
    }

    public function update(ComplaintsRedressalRequest $request, ComplaintsRedressal $complaintsRedressal)
    {
        $complaintsRedressal->update($request->all());
        return $this->setStatusCode(201)->sendSuccessReponse('Complaint Redressal has been updated successfully.');
    }

    public function destroy(ComplaintsRedressal $complaintsRedressal)
    {
        $complaintsRedressal->delete();
        return $this->sendSuccessReponse('Complaint Redressal has been deleted successfully.');
    }
}
