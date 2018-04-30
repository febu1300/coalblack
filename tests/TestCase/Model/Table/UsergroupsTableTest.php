<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UsergroupsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UsergroupsTable Test Case
 */
class UsergroupsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UsergroupsTable
     */
    public $Usergroups;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.usergroups'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Usergroups') ? [] : ['className' => UsergroupsTable::class];
        $this->Usergroups = TableRegistry::get('Usergroups', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Usergroups);

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
