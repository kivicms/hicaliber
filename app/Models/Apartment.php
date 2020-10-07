<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    use HasFactory;
    use Filterable;

    public function modelFilter()
    {
        return $this->provideFilter(\App\ModelFilters\ApartmentFilter::class);
    }
}
