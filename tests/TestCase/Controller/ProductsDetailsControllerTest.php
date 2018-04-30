<?php
namespace App\Test\TestCase\Controller;

use App\Controller\ProductsDetailsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\ProductsDetailsController Test Case
 */
class ProductsDetailsControllerTest extends IntegrationTestCase
{

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
