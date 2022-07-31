<?php

namespace App\Models;

use App\Services\TransactionServiceProvider;
use App\Services\WalletServiceProvider;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReferralEarning extends Model
{
    use HasFactory;

    public function __construct(){
        $this->wallet = new WalletServiceProvider();
        $this->transaction = new TransactionServiceProvider();
    }


    public function addReferralEarning($user_id, $amount, $ref)
    {
        $user = User::where('id', $user_id)->first();
        if ($user) {
            $walletData = [
                'balance' => 'current_balance',
                'amount' => $amount
            ];
            $transactionResponse = $this->wallet->add($user_id, $walletData);
            if ($transactionResponse) {
                $transactionData = [
                    'amount' => $amount,
                    'status' => 'COMPLETED',
                    'type' => 'CREDIT',
                    'action' => 'REFERRAL_EARNING',
                    'reference' =>  $ref,
                    'description' => 'You earned a referral commission on a transaction'
                ];
                $addTransaction = $this->transaction->add($user_id, $transactionData);
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

}
