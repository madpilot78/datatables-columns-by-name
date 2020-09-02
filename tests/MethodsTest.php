<?php

namespace madpilot78\DataTablesColumnsByName\tests;

use madpilot78\DataTablesColumnsByName\Columns;

class MethodsTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var array
     */
    private $testData = [
        [
            'data'       => 'id',
            'name'       => 'id',
            'searchable' => 'true',
            'orderable'  => 'true',
            'search'     => [
                'value' => '',
                'regex' => 'false'
            ]
        ],
        [
            'data'       => 'name',
            'name'       => 'name',
            'searchable' => 'true',
            'orderable'  => 'true',
            'search'     => [
                'value' => 'foo',
                'regex' => 'false'
            ]
        ],
        [
            'data'       => 'table.data',
            'name'       => 'table.data',
            'searchable' => 'true',
            'orderable'  => 'true',
            'search'     => [
                'value' => '',
                'regex' => 'false'
            ]
        ],
        [
            'data'       => 'extra',
            'name'       => 'extra',
            'searchable' => 'true',
            'orderable'  => 'true',
            'search'     => [
                'value' => '.*bar',
                'regex' => 'true'
            ]
        ],
        [
            'data'      => 'nosearch',
            'name'      => 'nosearch'
        ],
        [
            'data'       => 'noregex',
            'name'       => 'noregex',
            'searchable' => 'true',
            'orderable'  => 'true',
            'search'     => [
                'value' => '42'
            ]
        ],
        [
            'data'       => 'noval',
            'name'       => 'noval',
            'searchable' => 'true',
            'orderable'  => 'true',
            'search'     => [
                'regex' => 'false'
            ]
        ],
        [
        ]
    ];

    /**
     * @var \madpilot78\DataTablesColumnsByName\Columns
     */
    private $columns;

    /**
     * Create required user.
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->columns = new Columns($this->testData);
    }

    /**
     * Test getting column number by name.
     *
     * @return void
     */
    public function testGetNumberByName()
    {
        $this->assertEquals(2, $this->columns->getNumberByName('table.data'));
        $this->assertEquals(3, $this->columns->getNumberByName('extra'));
        $this->assertFalse($this->columns->getNumberByName('missing'));
    }

    /**
     * Test getting column search value by name.
     *
     * @return void
     */
    public function testGetSearchValueByName()
    {
        $this->assertEquals('foo', $this->columns->getSearchValueByName('name'));
        $this->assertEquals('.*bar', $this->columns->getSearchValueByName('extra'));
        $this->assertEquals('', $this->columns->getSearchValueByName('noval'));
        $this->assertFalse($this->columns->getSearchValueByName('missing'));
    }

    /**
     * Test getting search regex bool by name.
     *
     * @return void
     */
    public function testGetRegexByName()
    {
        $this->assertEquals('false', $this->columns->getSearchRegexByName('id'));
        $this->assertEquals('true', $this->columns->getSearchRegexByName('extra'));
        $this->assertEquals('', $this->columns->getSearchRegexByName('noregex'));
        $this->assertFalse($this->columns->getSearchRegexByName('missing'));
    }
}
