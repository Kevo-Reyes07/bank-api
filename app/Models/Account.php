<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'user_id',
    ];

    public function user()
    {
        return $this->belogstTo(User::class);
    }

    public function originTransactions()
    {
        return $this->hasMany(Transactions::class, 'account_id_origin');
    }

    public function destinationTransactions()
    {
        return $this->hasMany(Transaction::class, 'account_id_destination');
    }
}
