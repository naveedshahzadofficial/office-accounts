<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\DocumentVettingRequest;
use App\Http\Resources\DocumentVettingResource;
use App\Models\DocumentVetting;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DocumentVettigController extends ApiController
{

    public function index()
    {
        $length = request()->get('length', 30);
        $search = request()->get('search', '');
        $column = request()->get('column', 'created_at');
        $dir = request()->get('dir', 'desc');

        $query = DocumentVetting::with('user');
        if(!empty($search)){
            $search = str_replace(',', '', $search);
            $status= Str::is('ac*', $search)?1:(Str::is('in*', $search)?0:$search);
            $query->where('vetting_documents', 'LIKE', $search . '%')
                ->orWhere(DB::raw('DATE_FORMAT(created_at, "%d-%m-%Y")'), 'LIKE', $search . '%')
                ->orWhere('vetting_status',$status);
        }

        $data =  $query->orderBy($column, $dir)->paginate($length);
        return DocumentVettingResource::collection($data);
    }


    public function store(DocumentVettingRequest $request)
    {
        $row = DocumentVetting::create($request->all());
        return $this->sendSuccessReponse('Document Vetting has been saved successfully.',$row);
    }


    public function show(DocumentVetting $documentVetting)
    {
        return $this->respond(['row' => new DocumentVettingResource($documentVetting)]);
    }

    public function update(DocumentVettingRequest $request, DocumentVetting $documentVetting)
    {
        $documentVetting->update($request->all());
        return $this->setStatusCode(201)->sendSuccessReponse('Document Vetting has been updated successfully.');
    }

    public function destroy(DocumentVetting $documentVetting)
    {
        $documentVetting->delete();
        return $this->sendSuccessReponse('Document Vetting has been deleted successfully.');
    }
}
