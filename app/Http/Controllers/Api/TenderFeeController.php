<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\TenderFeeRequest;
use App\Http\Resources\TenderFeeResource;
use App\Models\TenderFee;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TenderFeeController extends ApiController
{
    public function index()
    {
        $length = request()->get('length', 30);
        $search = request()->get('search', '');
        $column = request()->get('column', 'created_at');
        $dir = request()->get('dir', 'desc');

        $query = TenderFee::with('user');
        if(!empty($search)){
            $search = str_replace(',', '', $search);
            $status= Str::is('ac*', $search)?1:(Str::is('in*', $search)?0:$search);
            $query->where('fee_document_examined', 'LIKE', $search . '%')
                ->orWhere('fee_violations_identified', 'LIKE', $search . '%')
                ->orWhere('fee_verification_deposit', 'LIKE', $search . '%')
                ->orWhere('fee_login_ids_activated', 'LIKE', $search . '%')
                ->orWhere('fee_login_ids_deactivated', 'LIKE', $search . '%')
                ->orWhere(DB::raw('DATE_FORMAT(created_at, "%d-%m-%Y")'), 'LIKE', $search . '%')
                ->orWhere('fee_status',$status);
        }

        $data =  $query->orderBy($column, $dir)->paginate($length);
        return TenderFeeResource::collection($data);
    }


    public function store(TenderFeeRequest $request)
    {
        $row = TenderFee::create($request->all());
        return $this->sendSuccessReponse('Tender Fee has been saved successfully.',$row);
    }


    public function show(TenderFee $tenderFee)
    {
        return $this->respond(['row' => new TenderFeeResource($tenderFee)]);
    }

    public function update(TenderFeeRequest $request, TenderFee $tenderFee)
    {
        $tenderFee->update($request->all());
        return $this->setStatusCode(201)->sendSuccessReponse('Tender Fee has been updated successfully.');
    }

    public function destroy(TenderFee $tenderFee)
    {
        $tenderFee->delete();
        return $this->sendSuccessReponse('Tender Fee has been deleted successfully.');
    }
}
