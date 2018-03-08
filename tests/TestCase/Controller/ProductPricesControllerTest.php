<?php
namespace App\Test\TestCase\Controller;

use App\Controller\ProductPricesController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\ProductPricesController Test Case
 */
class ProductPricesControllerTest extends IntegrationTestCase
{

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
