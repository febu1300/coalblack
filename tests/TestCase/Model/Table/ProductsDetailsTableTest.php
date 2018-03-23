<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProductsDetailsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProductsDetailsTable Test Case
 */
class ProductsDetailsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProductsDetailsTable
     */
    public $ProductsDetails;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.products_details',
        'app.products',
        'app.sub_catagories',
        'app.products_catagories',
        'app.discounts_types',
        'app.colors',
        'app.sizes',
        'app.product_details',
        'app.transactions',
        'app.transaction_types',
        'app.users',
        'app.usergroups',
        'app.users_detail',
        'app.transactions_status'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ProductsDetails') ? [] : ['className' => ProductsDetailsTable::class];
        $this->ProductsDetails = TableRegistry::get('ProductsDetails', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProductsDetails);

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
