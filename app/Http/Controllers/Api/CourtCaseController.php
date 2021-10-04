<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\CourtCaseRequest;
use App\Http\Resources\CourtCaseResource;
use App\Models\CourtCase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CourtCaseController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $length = request()->get('length', 30);
        $search = request()->get('search', '');
        $column = request()->get('column', 'created_at');
        $dir = request()->get('dir', 'desc');

        $query = CourtCase::with('user');
        if(!empty($search)){
            $search = str_replace(',', '', $search);
            $status= Str::is('ac*', $search)?1:(Str::is('in*', $search)?0:$search);
            $query->where('cases_initiated', 'LIKE', $search . '%')
                ->orWhere('cases_disposed_off', 'LIKE', $search . '%')
                ->orWhere(DB::raw('DATE_FORMAT(created_at, "%d-%m-%Y")'), 'LIKE', $search . '%')
                ->orWhere('cases_status',$status);
        }

        $data =  $query->orderBy($column, $dir)->paginate($length);
        return CourtCaseResource::collection($data);
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
        return $this->respond(['row' => new CourtCaseResource($courtCase)]);
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
