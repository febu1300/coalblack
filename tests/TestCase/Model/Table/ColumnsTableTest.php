<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ColumnsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ColumnsTable Test Case
 */
class ColumnsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ColumnsTable
     */
    public $Columns;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.columns',
        'app.rows',
        'app.sections',
        'app.layouts',
        'app.contents'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Columns') ? [] : ['className' => ColumnsTable::class];
        $this->Columns = TableRegistry::get('Columns', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Columns);

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
