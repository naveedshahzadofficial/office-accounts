<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\DocumentsUploadingRequest;
use App\Http\Resources\DocumentsUploadingResource;
use App\Models\DocumentsUploading;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DocumentUploadingController extends ApiController
{
    public function index()
    {
        $length = request()->get('length', 30);
        $search = request()->get('search', '');
        $column = request()->get('column', 'created_at');
        $dir = request()->get('dir', 'desc');

        $query = DocumentsUploading::with('user');
        if(!empty($search)){
            $search = str_replace(',', '', $search);
            $status= Str::is('ac*', $search)?1:(Str::is('in*', $search)?0:$search);
            $query->where('uploading_documents', 'LIKE', $search . '%')
                ->orWhere(DB::raw('DATE_FORMAT(created_at, "%d-%m-%Y")'), 'LIKE', $search . '%')
                ->orWhere('uploading_status',$status);
        }

        $data =  $query->orderBy($column, $dir)->paginate($length);
        return DocumentsUploadingResource::collection($data);
    }


    public function store(DocumentsUploadingRequest $request)
    {
        $row = DocumentsUploading::create($request->all());
        return $this->sendSuccessReponse('Document Uploading has been saved successfully.',$row);
    }


    public function show(DocumentsUploading $documentsUploading)
    {
        return $this->respond(['row' => new DocumentsUploadingResource($documentsUploading)]);
    }

    public function update(DocumentsUploadingRequest $request, DocumentsUploading $documentUploading)
    {
        $documentUploading->update($request->all());
        return $this->setStatusCode(201)->sendSuccessReponse('Document Uploading has been updated successfully.');
    }

    public function destroy(DocumentsUploading $documentsUploading)
    {
        $documentsUploading->delete();
        return $this->sendSuccessReponse('Document Uploading has been deleted successfully.');
    }
}
