<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_transaction';

    protected $fillable = ['transaction_date','coa_id','desc','debit','credit'];

    protected $dates = [
        'transaction_date' => 'datetime',
    ];

    // protected $casts = [
    //     'transaction_date' => 'datetime',
    // ];

    public function Coa()
    {
        return $this->belongsTo(ChartOfAccount::class,'coa_id','id_coa');
    }
}
