<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UsersDetailTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UsersDetailTable Test Case
 */
class UsersDetailTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UsersDetailTable
     */
    public $UsersDetail;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.users_detail',
        'app.users',
        'app.usergroups',
        'app.transactions',
        'app.transaction_types'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('UsersDetail') ? [] : ['className' => UsersDetailTable::class];
        $this->UsersDetail = TableRegistry::get('UsersDetail', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UsersDetail);

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
