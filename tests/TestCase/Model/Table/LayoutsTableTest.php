<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LayoutsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LayoutsTable Test Case
 */
class LayoutsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\LayoutsTable
     */
    public $Layouts;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.layouts',
        'app.sections'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Layouts') ? [] : ['className' => LayoutsTable::class];
        $this->Layouts = TableRegistry::get('Layouts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Layouts);

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
