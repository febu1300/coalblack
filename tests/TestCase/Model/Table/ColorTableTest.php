<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ColorTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ColorTable Test Case
 */
class ColorTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ColorTable
     */
    public $Color;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.color',
        'app.product_details',
        'app.products',
        'app.sub_catagories',
        'app.products_catagories',
        'app.colors',
        'app.sizes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Color') ? [] : ['className' => ColorTable::class];
        $this->Color = TableRegistry::get('Color', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Color);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
