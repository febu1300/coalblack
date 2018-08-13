<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProductsCatagoriesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProductsCatagoriesTable Test Case
 */
class ProductsCatagoriesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProductsCatagoriesTable
     */
    public $ProductsCatagories;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.products_catagories',
        'app.sub_catagories',
        'app.products',
        'app.products_title_translation',
        'app.i18n',
        'app.discounts_types',
        'app.colors',
        'app.sizes',
        'app.products_details',
        'app.transactions',
        'app.transaction_types',
        'app.users',
        'app.users_detail',
        'app.users_details_types',
        'app.users_details',
        'app.transactions_status',
        'app.payment_methods',
        'app.pictures'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ProductsCatagories') ? [] : ['className' => ProductsCatagoriesTable::class];
        $this->ProductsCatagories = TableRegistry::get('ProductsCatagories', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProductsCatagories);

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
