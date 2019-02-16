<?php

namespace webelightdev\EagerJoin\Relations;

use webelightdev\EagerJoin\Traits\JoinRelationTrait;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BelongsToJoin extends BelongsTo
{
    use JoinRelationTrait;
}
