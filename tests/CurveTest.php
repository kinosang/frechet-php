<?php

namespace labs7in0\frechet\Tests;

use labs7in0\frechet\Curve;
use labs7in0\frechet\Point;
use PHPUnit\Framework\TestCase;

class CurveTest extends TestCase
{
    public function testNewCurve()
    {
        $curve = new Curve();

        $curve->addPoint(new Point(0, 0));
        $curve->addPoint(new Point(1, 1));
        $curve->addPoint(new Point(2, 2));

        $this->assertInstanceOf('labs7in0\frechet\Curve', $curve);

        return $curve;
    }

    /**
     * @depends testNewCurve
     */
    public function testGetPoint($curve)
    {
        $point = $curve->getPoint(1);

        $this->assertEquals(1, $point->getX());
        $this->assertEquals(1, $point->getY());
    }

    /**
     * @depends testNewCurve
     */
    public function testCountPoints($curve)
    {
        $this->assertEquals(3, $curve->countPoints());
    }

    /**
     * @depends testNewCurve
     */
    public function testGetPoints($curve)
    {
        $this->assertInternalType('array', $curve->getPoints());
    }

    /**
     * @depends testNewCurve
     */
    public function testGetReverse($curve)
    {
        $reversed = $curve->getReverse();

        $this->assertInstanceOf('labs7in0\frechet\Curve', $reversed);
        $this->assertEquals($curve->getPoints(), array_reverse($reversed->getPoints()));
    }

    /**
     * @depends testNewCurve
     */
    public function testFrechetDistance($curve1)
    {
        $curve2 = new Curve();

        $curve2->addPoint(new Point(0, 1));
        $curve2->addPoint(new Point(1, 2));
        $curve2->addPoint(new Point(2, 3));

        $this->assertEquals(1.0, $curve1->frechetDistance($curve2));
    }
}
