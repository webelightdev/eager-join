<?php

namespace webelightdev\EagerJoin\Tests\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class City extends BaseModel
{
    use SoftDeletes;

    protected $table = 'cities';

    protected $fillable = ['name'];

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function zipCodePrimary()
    {
        return $this->hasOne(ZipCode::class)
            ->where('is_primary', '=', 1);
    }
}
