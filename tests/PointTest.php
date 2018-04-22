<?php

namespace labs7in0\frechet\Tests;

use labs7in0\frechet\Point;
use PHPUnit\Framework\TestCase;

class PointTest extends TestCase
{
    public function testNewPoint()
    {
        $point = new Point(1, 1);

        $this->assertInstanceOf(Point::class, $point);

        return $point;
    }

    /**
     * @depends testNewPoint
     */
    public function testGetProperties($point)
    {
        $this->assertEquals(1, $point->getX());
        $this->assertEquals(1, $point->getY());
    }

    /**
     * @depends testNewPoint
     */
    public function testEuclideanDistance($point1)
    {
        $point2 = new Point(4, 5);

        $this->assertEquals(5, $point1->euclideanDistance($point2));
    }
}
