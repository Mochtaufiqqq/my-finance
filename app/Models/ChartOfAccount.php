<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChartOfAccount extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_coa';

    protected $fillable = ['category_id','code','coa_name'];

    public function Category()
    {
        return $this->belongsTo(CoaCategory::class,'category_id');
    }

    public function Transaction()
    {
        return $this->hasMany(Transaction::class,'coa_id','id_coa');
    }
}
