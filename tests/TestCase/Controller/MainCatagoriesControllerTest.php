<?php
namespace App\Test\TestCase\Controller;

use App\Controller\MainCatagoriesController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\MainCatagoriesController Test Case
 */
class MainCatagoriesControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.main_catagories',
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
