<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\TrainingRequest;
use App\Http\Resources\TrainingResource;
use App\Models\Training;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TrainingController extends ApiController
{
    public function index()
    {
        $length = request()->get('length', 30);
        $search = request()->get('search', '');
        $column = request()->get('column', 'created_at');
        $dir = request()->get('dir', 'desc');

        $query = Training::with('user');
        if(!empty($search)){
            $search = str_replace(',', '', $search);
            $status= Str::is('ac*', $search)?1:(Str::is('in*', $search)?0:$search);
            $query->where('training_persons_imparted', 'LIKE', $search . '%')
                ->orWhere(DB::raw('DATE_FORMAT(created_at, "%d-%m-%Y")'), 'LIKE', $search . '%')
                ->orWhere('training_status',$status);
        }

        $data =  $query->orderBy($column, $dir)->paginate($length);
        return TrainingResource::collection($data);
    }


    public function store(TrainingRequest $request)
    {
        $row = Training::create($request->all());
        return $this->sendSuccessReponse('Training has been saved successfully.',$row);
    }


    public function show(Training $training)
    {
        return $this->respond(['row' => new TrainingResource($training)]);
    }

    public function update(TrainingRequest $request, Training $training)
    {
        $training->update($request->all());
        return $this->setStatusCode(201)->sendSuccessReponse('Training has been updated successfully.');
    }

    public function destroy(Training $training)
    {
        $training->delete();
        return $this->sendSuccessReponse('Training has been deleted successfully.');
    }
}
