<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RowsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RowsTable Test Case
 */
class RowsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RowsTable
     */
    public $Rows;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.rows',
        'app.sections',
        'app.layouts',
        'app.columns'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Rows') ? [] : ['className' => RowsTable::class];
        $this->Rows = TableRegistry::get('Rows', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Rows);

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
