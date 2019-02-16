<?php

namespace webelightdev\EagerJoin\Relations;

use webelightdev\EagerJoin\Traits\JoinRelationTrait;
use Illuminate\Database\Eloquent\Relations\HasOne;

class HasOneJoin extends HasOne
{
    use JoinRelationTrait;
}
