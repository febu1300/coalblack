<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TransactionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TransactionsTable Test Case
 */
class TransactionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TransactionsTable
     */
    public $Transactions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.transactions',
        'app.transaction_types',
        'app.products',
        'app.sub_catagories',
        'app.products_catagories',
        'app.product_details',
        'app.colors',
        'app.sizes',
        'app.users',
        'app.usergroups',
        'app.users_detail'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Transactions') ? [] : ['className' => TransactionsTable::class];
        $this->Transactions = TableRegistry::get('Transactions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Transactions);

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
