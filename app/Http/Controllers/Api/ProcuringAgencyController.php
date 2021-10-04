<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\ProcuringAgencieRequest;
use App\Http\Resources\ProcuringAgencieResource;
use App\Models\ProcuringAgencie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProcuringAgencyController extends ApiController
{
    public function index()
    {
        $length = request()->get('length', 30);
        $search = request()->get('search', '');
        $column = request()->get('column', 'created_at');
        $dir = request()->get('dir', 'desc');

        $query = ProcuringAgencie::with('user');
        if(!empty($search)){
            $search = str_replace(',', '', $search);
            $status= Str::is('ac*', $search)?1:(Str::is('in*', $search)?0:$search);
            $query->where('agency_procuring_registered', 'LIKE', $search . '%')
                ->orWhere(DB::raw('DATE_FORMAT(created_at, "%d-%m-%Y")'), 'LIKE', $search . '%')
                ->orWhere('agency_status',$status);
        }

        $data =  $query->orderBy($column, $dir)->paginate($length);
        return ProcuringAgencieResource::collection($data);
    }


    public function store(ProcuringAgencieRequest $request)
    {
        $row = ProcuringAgencie::create($request->all());
        return $this->sendSuccessReponse('Procuring Agency has been saved successfully.',$row);
    }


    public function show(ProcuringAgencie $procuringAgency)
    {
        return $this->respond(['row' => new ProcuringAgencieResource($procuringAgency)]);
    }

    public function update(ProcuringAgencieRequest $request, ProcuringAgencie $procuringAgency)
    {
        $procuringAgency->update($request->all());
        return $this->setStatusCode(201)->sendSuccessReponse('Procuring Agency has been updated successfully.');
    }

    public function destroy(ProcuringAgencie $procuringAgency)
    {
        $procuringAgency->delete();
        return $this->sendSuccessReponse('Procuring Agency has been deleted successfully.');
    }
}
