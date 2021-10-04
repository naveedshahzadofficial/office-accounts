<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\AdviceRequest;
use App\Http\Resources\AdviceResource;
use App\Models\Advice;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AdviceController extends ApiController
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

        $query = Advice::with('user');
        if(!empty($search)){
            $search = str_replace(',', '', $search);
            $status= Str::is('ac*', $search)?1:(Str::is('in*', $search)?0:$search);
            $query->where('advice_issued', 'LIKE', $search . '%')
                ->orWhere('advice_pending_3_to_10', 'LIKE', $search . '%')
                ->orWhere('advice_pending_more_than_10', 'LIKE', $search . '%')
                ->orWhere(DB::raw('DATE_FORMAT(created_at, "%d-%m-%Y")'), 'LIKE', $search . '%')
                ->orWhere('advice_status', $status);
        }

       $data = $query->orderBy($column, $dir)->paginate($length);
       return AdviceResource::collection($data);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdviceRequest $request)
    {
      $advice = Advice::create($request->all());
      return $this->sendSuccessReponse('Advice has been saved successfully.',$advice);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Advice $advice)
    {
        return $this->respond(['row' => new AdviceResource($advice)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdviceRequest $request, Advice $advice)
    {
        $advice->update($request->all());
        return $this->setStatusCode(201)->sendSuccessReponse('Advice has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Advice $advice)
    {
        $advice->delete();
        return $this->sendSuccessReponse('Advice has been deleted successfully.');
    }
}
