<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoaCategory extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_category';

    protected $fillable = ['name'];

    public function Coa()
    {
        return $this->hasMany(ChartOfAccount::class);
    }

}
