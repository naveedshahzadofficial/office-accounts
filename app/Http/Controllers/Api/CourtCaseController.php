<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\CourtCaseRequest;
use App\Http\Resources\CourtCaseResource;
use App\Models\CourtCase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CourtCaseController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $limit = isset($request->limit) && !empty($request->limit)?$request->limit:30;
        $serach = isset($request->search) && !empty($request->search)?$request->search:'';
        $query = CourtCase::with('user');
        if(!empty($serach)){
            $serach = str_replace(',', '', $serach);
            $status= Str::is('ac*', $serach)?1:(Str::is('in*', $serach)?0:$serach);
            $query->where('cases_initiated', 'LIKE', $serach . '%')
                ->orWhere('cases_disposed_off', 'LIKE', $serach . '%')
                ->orWhere(DB::raw('DATE_FORMAT(created_at, "%d-%m-%Y")'), 'LIKE', $serach . '%')
                ->orWhere('cases_status',$status);
        }

        $courtCases =  $query->latest()->paginate($limit);

        return $this->respond($courtCases);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourtCaseRequest $request)
    {
        $courtCase = CourtCase::create($request->all());
        return $this->sendSuccessReponse('Court Case has been saved successfully.',$courtCase);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CourtCase  $courtCase
     * @return \Illuminate\Http\Response
     */
    public function show(CourtCase $courtCase)
    {
        return $this->respond(['court_case' => new CourtCaseResource($courtCase)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CourtCase  $courtCase
     * @return \Illuminate\Http\Response
     */
    public function update(CourtCaseRequest $request, CourtCase $courtCase)
    {
        $courtCase->update($request->all());
        return $this->setStatusCode(201)->sendSuccessReponse('Court Case has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CourtCase  $courtCase
     * @return \Illuminate\Http\Response
     */
    public function destroy(CourtCase $courtCase)
    {
        $courtCase->delete();
        return $this->sendSuccessReponse('Court Case has been deleted successfully.');
    }
}
