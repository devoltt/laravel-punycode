<?php

namespace Fomvasss\Punycode\Tests;

use Fomvasss\Punycode\Punycode;
use PHPUnit\Framework\TestCase;

class PunyCodeTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     */
    public function testDecode(array $data)
    {
        $punyCode = new Punycode();

        $this->assertEquals($data['utf8'], $punyCode->decode($data['idn']));
    }

    /**
     * @dataProvider dataProvider
     */
    public function testEncode(array $data)
    {
        $punyCode = new Punycode();

        $this->assertEquals($data['idn'], $punyCode->encode($data['utf8']));
    }

    private function dataProvider(): array
    {
        return [
            [[
                'utf8' => 'www.аррӏе.com',
                'idn' =>  'www.xn--80ak6aa92e.com',
            ]],
            [[
                'utf8' => 'täst.de',
                'idn' =>  'xn--tst-qla.de',
            ]],
        ];
    }
}