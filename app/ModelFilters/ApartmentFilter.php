<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;
use Illuminate\Support\Str;

class ApartmentFilter extends ModelFilter
{
    /**
    * Related Models that have ModelFilters as well as the method on the ModelFilter
    * As [relationMethod => [input_key1, input_key2]].
    *
    * @var array
    */
    public $relations = [];

    public function name($name)
    {
        return $this->where(function($q) use ($name)
        {
            return $q->where('name', 'LIKE', "%$name%");
        });
    }

    public function minPrice($value)
    {
        return $this->where('price', '>=', $value);
    }

    public function maxPrice($value)
    {
        return $this->where('price', '<=', $value);
    }

    public function bedrooms($value)
    {
        return $this->where('bedrooms', $value);
    }

    public function bathrooms($value)
    {
        return $this->where('bathrooms', $value);
    }

    public function storeys($value)
    {
        return $this->where('storeys', $value);
    }

    public function garages($value)
    {
        return $this->where('garages', $value);
    }

    public function sort($value)
    {
        $direction = Str::startsWith($value, '-') ? 'desc' : 'asc';
        $field = Str::replaceFirst('-', '', $value);

        return $this->orderBy($field, $direction);
    }
}
