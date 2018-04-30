<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProductPriceTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProductPriceTable Test Case
 */
class ProductPriceTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProductPriceTable
     */
    public $ProductPrice;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.product_price',
        'app.products',
        'app.sub_catagories',
        'app.products_catagories',
        'app.product_details',
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
        $config = TableRegistry::exists('ProductPrice') ? [] : ['className' => ProductPriceTable::class];
        $this->ProductPrice = TableRegistry::get('ProductPrice', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProductPrice);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
