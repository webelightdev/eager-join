<?php

namespace webelightdev\EagerJoin\Tests\Tests;

use webelightdev\EagerJoin\Exceptions\EloquentJoinException;
use webelightdev\EagerJoin\Tests\Models\Seller;
use webelightdev\EagerJoin\Tests\TestCase;

class ExceptionTest extends TestCase
{
    public function testInvalidCondition()
    {
        try {
            Seller::whereJoin('locationPrimaryInvalid.name', '=', 'test')->get();
        } catch (EloquentJoinException $e) {
            $this->assertEquals('orderBy is not allowed on HasOneJoin and BelongsToJoin relations.', $e->getMessage());
            return;
        }
        $this->assertTrue(false);
    }

    public function testInvalidWhere()
    {
        try {
            Seller::whereJoin('locationPrimaryInvalid2.name', '=', 'test')->get();
        } catch (EloquentJoinException $e) {
            $this->assertContains("on HasOneJoin and BelongsToJoin relations", $e->getMessage());
            return;
        }
        $this->assertTrue(false);
    }

    public function testInvalidRelation()
    {
        try {
            Seller::whereJoin('locations.address', '=', 'test')->get();
        } catch (EloquentJoinException $e) {
            $this->assertEquals("Only allowed relations for whereJoin, orWhereJoin and orderByJoin are BelongsToJoin, HasOneJoin", $e->getMessage());
            return;
        }
        $this->assertTrue(false);
    }
}
