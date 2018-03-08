<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SubCatagoriesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SubCatagoriesTable Test Case
 */
class SubCatagoriesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SubCatagoriesTable
     */
    public $SubCatagories;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.sub_catagories',
        'app.products_catagories',
        'app.products',
        'app.product_details',
        'app.colors',
        'app.sizes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('SubCatagories') ? [] : ['className' => SubCatagoriesTable::class];
        $this->SubCatagories = TableRegistry::get('SubCatagories', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SubCatagories);

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
