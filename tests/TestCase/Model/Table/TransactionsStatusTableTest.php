<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TransactionsStatusTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TransactionsStatusTable Test Case
 */
class TransactionsStatusTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TransactionsStatusTable
     */
    public $TransactionsStatus;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.transactions_status',
        'app.transactions',
        'app.transaction_types',
        'app.products',
        'app.sub_catagories',
        'app.products_catagories',
        'app.discounts_types',
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
        $config = TableRegistry::exists('TransactionsStatus') ? [] : ['className' => TransactionsStatusTable::class];
        $this->TransactionsStatus = TableRegistry::get('TransactionsStatus', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TransactionsStatus);

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
