<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\AccountRequest;
use App\Http\Resources\AccountResource;
use App\Models\Account;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AccountController extends ApiController
{
    public function index()
    {
        $length = request()->get('length', 30);
        $search = request()->get('search', '');
        $column = request()->get('column', 'created_at');
        $dir = request()->get('dir', 'desc');

        $query = Account::with('user');
        if(!empty($search)){
            $search = str_replace(',', '', $search);
            $status= Str::is('ac*', $search)?1:(Str::is('in*', $search)?0:$search);
            $query->where('account_issued', 'LIKE', $search . '%')
                ->orWhere('account_activated', 'LIKE', $search . '%')
                ->orWhere('account_deactivated', 'LIKE', $search . '%')
                ->orWhere('account_deactivated_file', 'LIKE', $search . '%')
                ->orWhere('account_blocked_till_date', 'LIKE', $search . '%')
                ->orWhere('account_status', 'LIKE', $search . '%')
                ->orWhere(DB::raw('DATE_FORMAT(created_at, "%d-%m-%Y")'), 'LIKE', $search . '%')
                ->orWhere('uploading_status',$status);
        }

        $data =  $query->orderBy($column, $dir)->paginate($length);
        return AccountResource::collection($data);
    }


    public function store(AccountRequest $request)
    {
        $row = Account::create($request->all());
        return $this->sendSuccessReponse('Account has been saved successfully.',$row);
    }


    public function show(Account $account)
    {
        return $this->respond(['row' => new AccountResource($account)]);
    }

    public function update(AccountRequest $request, Account $account)
    {
        $account->update($request->all());
        return $this->setStatusCode(201)->sendSuccessReponse('Account has been updated successfully.');
    }

    public function destroy(Account $account)
    {
        $account->delete();
        return $this->sendSuccessReponse('Account has been deleted successfully.');
    }
}
