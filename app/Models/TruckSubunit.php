<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TruckSubunit extends Model
{
    protected $fillable = [
        'main_truck_id', 'subunit_id', 'start_date', 'end_date'
    ];

    public function mainTruck()
    {
        return $this->belongsTo(Truck::class, 'main_truck_id');
    }

    public function subunit()
    {
        return $this->belongsTo(Truck::class, 'subunit_id');
    }

    public function validateDates()
    {
        $overlappingSubunit = self::where('main_truck_id', $this->main_truck_id)
            ->where('id', '!=', $this->id)
            ->where(function ($query) {
                $query->where(function ($query) {
                    $query->where('start_date', '<=', $this->start_date)
                        ->where('end_date', '>=', $this->start_date);
                })->orWhere(function ($query) {
                    $query->where('start_date', '>=', $this->start_date)
                        ->where('start_date', '<=', $this->end_date);
                });
            })
            ->first();
    
        return !$overlappingSubunit;
    }
    
}
