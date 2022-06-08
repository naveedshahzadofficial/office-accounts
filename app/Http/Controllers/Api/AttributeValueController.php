<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreAttributeValueRequest;
use App\Http\Requests\UpdateAttributeValueRequest;
use App\Http\Resources\AttributeValueResource;
use App\Models\Attribute;
use App\Models\AttributeValue;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AttributeValueController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function index(Attribute $attribute)
    {
        $length = request()->get('length', 30);
        $search = request()->get('search', '');
        $column = request()->get('column', 'created_at');
        $dir = request()->get('dir', 'desc');
        $query = AttributeValue::where('attribute_id', $attribute->id);
        if(!empty($search)) {
            $search = str_replace(',', '', $search);
            $status = Str::is('ac*', strtolower($search)) ? 1 : (Str::is('in*', strtolower($search)) ? 0 : null);
            $query->where('value', 'LIKE', $search . '%')
                ->orWhere(DB::raw('DATE_FORMAT(created_at, "%d-%m-%Y")'), 'LIKE', $search . '%')
                ->orWhere('status', $status);
        }

        $data =  $query->orderBy($column, $dir)->paginate($length);
        return AttributeValueResource::collection($data)->additional(['attribute'=>$attribute]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreAttributeValueRequest $request
     * @param \App\Models\Attribute $attribute
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAttributeValueRequest $request, Attribute $attribute)
    {
        $attribute = $attribute->attributes_values()->create($request->all());
        return $this->sendSuccessReponse('Attribute value has been saved successfully.',$attribute);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attribute  $attribute
     * @param  \App\Models\AttributeValue  $attributeValue
     * @return \Illuminate\Http\Response
     */
    public function show(Attribute $attribute, AttributeValue $attributeValue)
    {
        return $this->respond(['row' => new AttributeValueResource($attributeValue)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateAttributeValueRequest $request
     * @param \App\Models\Attribute $attribute
     * @param \App\Models\AttributeValue $attributeValue
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAttributeValueRequest $request, Attribute $attribute, AttributeValue $attributeValue)
    {
        $attributeValue->update($request->all());
        return $this->setStatusCode(201)->sendSuccessReponse('Attribute value has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attribute  $attribute
     * @param  \App\Models\AttributeValue  $attributeValue
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attribute $attribute, AttributeValue $attributeValue)
    {
        $attributeValue->delete();
        return $this->sendSuccessReponse('Attribute value has been deleted successfully.');
    }
}
