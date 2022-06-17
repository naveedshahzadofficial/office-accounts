<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreAttributeRequest;
use App\Http\Requests\UpdateAttributeRequest;
use App\Http\Resources\AttributeResource;
use App\Models\Attribute;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AttributeController extends ApiController
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
        $query = Attribute::query();
        if(!empty($search)) {
            $search = str_replace(',', '', $search);
            $status = Str::is('ac*', strtolower($search)) ? 1 : (Str::is('in*', strtolower($search)) ? 0 : null);
            $query->where('name', 'LIKE', $search . '%')
                ->orWhere(DB::raw('DATE_FORMAT(created_at, "%d-%m-%Y")'), 'LIKE', $search . '%')
                ->orWhere('status', $status);
        }

        $data =  $query->orderBy($column, $dir)->paginate($length);
        return AttributeResource::collection($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreAttributeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAttributeRequest $request)
    {
        $attribute = Attribute::create($request->all());
        return $this->sendSuccessReponse('Attribute has been saved successfully.',$attribute);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function show(Attribute $attribute)
    {
        return $this->respond(['row' => new AttributeResource($attribute)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateAttributeRequest $request
     * @param \App\Models\Attribute $attribute
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAttributeRequest $request, Attribute $attribute)
    {
        $attribute->update($request->all());
        return $this->setStatusCode(201)->sendSuccessReponse('Attribute has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attribute $attribute)
    {
        $attribute->delete();
        return $this->sendSuccessReponse('Attribute has been deleted successfully.');
    }

    public function attributes()
    {
        return AttributeResource::collection(Attribute::with('attributes_values')->where('status',1)->get());

    }
}
