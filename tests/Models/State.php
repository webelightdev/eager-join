<?php

namespace webelightdev\EagerJoin\Tests\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class State extends BaseModel
{
    use SoftDeletes;

    protected $table = 'states';

    protected $fillable = ['name'];
}
