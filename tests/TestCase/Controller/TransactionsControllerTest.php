<?php
namespace App\Test\TestCase\Controller;

use App\Controller\TransactionsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\TransactionsController Test Case
 */
class TransactionsControllerTest extends IntegrationTestCase
{

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
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
