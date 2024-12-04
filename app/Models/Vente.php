<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vente extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_vente',
        'total',
    ];

    // Relation : Une vente peut avoir plusieurs détails
    public function detailsVentes()
    {
        return $this->hasMany(Detail_vente::class);
    }
}
