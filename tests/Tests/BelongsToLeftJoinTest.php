<?php

namespace webelightdev\EagerJoin\Tests\Tests;

use webelightdev\EagerJoin\Tests\Models\City;
use webelightdev\EagerJoin\Tests\Models\Seller;
use webelightdev\EagerJoin\Tests\TestCase;

class BelongsToLeftJoinTest extends TestCase
{
    public function testLeftJoinEmpty()
    {
        Seller::where('id', '>', 0)->forceDelete();
        City::where('id', '>', 0)->forceDelete();

        $items = Seller::orderByJoin('city.name')->get();
        $this->assertEquals(0, $items->count());

        $seller = Seller::create(['title' => 'test']);

        $items = Seller::orderByJoin('city.name')->get();
        $this->assertEquals(1, $items->count());
        $this->assertEquals(1, Seller::count());
    }
}
