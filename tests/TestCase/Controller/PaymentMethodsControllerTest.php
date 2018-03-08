<?php
namespace App\Test\TestCase\Controller;

use App\Controller\PaymentMethodsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\PaymentMethodsController Test Case
 */
class PaymentMethodsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.payment_methods',
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
        'app.users_detail',
        'app.transactions_status'
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
