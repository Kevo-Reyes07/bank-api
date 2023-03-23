<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function create(Request $request): JsonResponse
    {
        //dd('Llegue esta aquiii', $request->all());

        $transaction = Transaction::create([
            'type' => 'deposit',
            'amount' => $request->input('amount'),
            'account_id_origin' => $request->input('account_id_origin'),
            'account_id_destination' => $request->input('account_id_destination'),
        ]);
    
        Transaction::create([
            'type' => 'withdraw',
            'amount' => $request->input('amount'),
            'account_id_origin' => $request->input('account_id_destination'),
            'account_id_destination' => $request->input('account_id_origin'),
        ]);

        return response()->json($transaction);
    }

    public function history(int $accountId): JsonResponse
    {
        $account = Account::findOrFail($accountId);

        $transactions = Transaction::select(['id', 'amount', 'type'])
            ->where('account_id_destination', '=', $account->id)
            ->orWhere('account_id_origin', '=', $account->id)
            ->get();

        return response()->json($transactions);
    }
}
