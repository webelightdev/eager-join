<?php

namespace webelightdev\EagerJoin\Tests\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class Location extends BaseModel
{
    use SoftDeletes;

    protected $table = 'locations';

    protected $fillable = ['address', 'seller_id', 'is_primary', 'is_secondary'];

    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function locationAddressPrimary()
    {
        return $this->hasOne(LocationAddress::class)
            ->where('is_primary', '=', 1);
    }
}
