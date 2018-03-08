<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DiscountsTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DiscountsTypesTable Test Case
 */
class DiscountsTypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DiscountsTypesTable
     */
    public $DiscountsTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.discounts_types'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('DiscountsTypes') ? [] : ['className' => DiscountsTypesTable::class];
        $this->DiscountsTypes = TableRegistry::get('DiscountsTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DiscountsTypes);

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
