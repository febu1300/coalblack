<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UsersDetailsTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UsersDetailsTypesTable Test Case
 */
class UsersDetailsTypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UsersDetailsTypesTable
     */
    public $UsersDetailsTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.users_details_types'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('UsersDetailsTypes') ? [] : ['className' => UsersDetailsTypesTable::class];
        $this->UsersDetailsTypes = TableRegistry::get('UsersDetailsTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UsersDetailsTypes);

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
