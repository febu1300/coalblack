<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ColorsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ColorsTable Test Case
 */
class ColorsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ColorsTable
     */
    public $Colors;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.colors',
        'app.product_details',
        'app.products',
        'app.sub_catagories',
        'app.products_catagories',
        'app.discounts_types',
        'app.sizes',
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
        $config = TableRegistry::exists('Colors') ? [] : ['className' => ColorsTable::class];
        $this->Colors = TableRegistry::get('Colors', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Colors);

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
