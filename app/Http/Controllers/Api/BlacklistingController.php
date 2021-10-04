<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\BlacklistingRequest;
use App\Http\Resources\BlacklistingResource;
use App\Models\Blacklisting;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BlacklistingController extends ApiController
{
    public function index()
    {
        $length = request()->get('length', 30);
        $search = request()->get('search', '');
        $column = request()->get('column', 'created_at');
        $dir = request()->get('dir', 'desc');

        $query = Blacklisting::with('user');
        if(!empty($search)){
            $search = str_replace(',', '', $search);
            $status= Str::is('ac*', $search)?1:(Str::is('in*', $search)?0:$search);
            $query->where('blacklist_order', 'LIKE', $search . '%')
                ->orWhere('blacklisting_case_disposed_off', 'LIKE', $search . '%')
                ->orWhere('blacklisting_pending_15_to_30', 'LIKE', $search . '%')
                ->orWhere('blacklisting_pending_more_than_30', 'LIKE', $search . '%')
                ->orWhere(DB::raw('DATE_FORMAT(created_at, "%d-%m-%Y")'), 'LIKE', $search . '%')
                ->orWhere('blacklisting_status',$status);
        }

        $data =  $query->orderBy($column, $dir)->paginate($length);
        return BlacklistingResource::collection($data);
    }


    public function store(BlacklistingRequest $request)
    {
        $row = Blacklisting::create($request->all());
        return $this->sendSuccessReponse('Blacklisting has been saved successfully.',$row);
    }


    public function show(Blacklisting $blacklisting)
    {
        return $this->respond(['row' => new BlacklistingResource($blacklisting)]);
    }

    public function update(BlacklistingRequest $request, Blacklisting $blacklisting)
    {
        $blacklisting->update($request->all());
        return $this->setStatusCode(201)->sendSuccessReponse('Blacklisting has been updated successfully.');
    }

    public function destroy(Blacklisting $blacklisting)
    {
        $blacklisting->delete();
        return $this->sendSuccessReponse('Blacklisting has been deleted successfully.');
    }
}
