<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProductPricesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProductPricesTable Test Case
 */
class ProductPricesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProductPricesTable
     */
    public $ProductPrices;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.product_prices',
        'app.products',
        'app.sub_catagories',
        'app.products_catagories',
        'app.product_details',
        'app.colors',
        'app.sizes',
        'app.transactions',
        'app.transaction_types',
        'app.users',
        'app.usergroups',
        'app.users_detail',
        'app.product_price'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ProductPrices') ? [] : ['className' => ProductPricesTable::class];
        $this->ProductPrices = TableRegistry::get('ProductPrices', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProductPrices);

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
