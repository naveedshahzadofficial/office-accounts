<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\AdviceRequest;
use App\Http\Resources\AdviceResource;
use App\Models\Advice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AdviceController extends ApiController
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
        $query = Advice::with('user');
        if(!empty($serach)){
            $serach = str_replace(',', '', $serach);
            $status= Str::is('ac*', $serach)?1:(Str::is('in*', $serach)?0:$serach);
            $query->where('advice_issued', 'LIKE', $serach . '%')
                ->orWhere('advice_pending_3_to_10', 'LIKE', $serach . '%')
                ->orWhere('advice_pending_more_than_10', 'LIKE', $serach . '%')
                ->orWhere(DB::raw('DATE_FORMAT(created_at, "%d-%m-%Y")'), 'LIKE', $serach . '%')
                ->orWhere('advice_status', $status);
        }

        $advices =  $query->latest()->paginate($limit);

        return $this->respond($advices);

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
      if($advice){
          return $this->sendSuccessReponse('Advice has been saved successfully.',$advice);
      }else{
          return $this->sendFailResponse('Fail to saved the record.');
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Advice $advice)
    {
        return $this->respond(['advice' => new AdviceResource($advice)]);
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
