<?php

namespace webelightdev\EagerJoin\Tests\Models;

use webelightdev\EagerJoin\Traits\EloquentJoinTrait;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    use EloquentJoinTrait;
}
