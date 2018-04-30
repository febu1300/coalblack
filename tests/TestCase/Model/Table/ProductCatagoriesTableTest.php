<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProductCatagoriesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProductCatagoriesTable Test Case
 */
class ProductCatagoriesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProductCatagoriesTable
     */
    public $ProductCatagories;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.product_catagories'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ProductCatagories') ? [] : ['className' => ProductCatagoriesTable::class];
        $this->ProductCatagories = TableRegistry::get('ProductCatagories', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProductCatagories);

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
