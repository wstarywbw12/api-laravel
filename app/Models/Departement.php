<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Departement extends Model
{
    use SoftDeletes;

    protected $table = 'departements';

    protected $fillable = [
        'name'
    ];

    /**
     * Tanggal yang harus dianggap sebagai "soft delete".
     */
    protected $dates = ['deleted_at'];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
