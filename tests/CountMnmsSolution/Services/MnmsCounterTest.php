<?php

namespace CountMnmsSolution\Tests\CountMnmsSolution\Services;

use CountMnmsSolution\Exceptions\EmptyBagException;
use CountMnmsSolution\Services\MnmsCounter;
use PHPUnit\Framework\TestCase;

class MnmsCounterTest extends TestCase
{
    /** @var MnmsCounter */
    private $mnmsCounter;

    protected function setUp(): void
    {
        $this->mnmsCounter = new MnmsCounter();
    }

    /**
     * @dataProvider provideBags
     */
    public function testSortWithBag(array $expected, array $input)
    {
        $this->assertSame($expected, $this->mnmsCounter->sort($input));
    }

    /*
     * @expectedException EmptyBagException
     */
    public function testSortWithEmptyBag()
    {
        $this->expectException(EmptyBagException::class);
        $this->mnmsCounter->sort([]);
    }

    public function provideBags(): array
    {
        return [
            [
                [
                    'number of red M&M\'s' => 1,
                    'number of blue M&M\'s' => 1,
                    'number of yellow M&M\'s' => 4,
                    'number of green M&M\'s' => 2,
                ],
                ['yellow', 'green', 'blue', 'yellow', 'yellow', 'yellow', 'red', 'green']
            ],
            [
                [
                    'number of red M&M\'s' => 0,
                    'number of blue M&M\'s' => 0,
                    'number of yellow M&M\'s' => 1,
                    'number of green M&M\'s' => 1,
                ],
                ['yellow', 'green']
            ]
        ];
    }
}
