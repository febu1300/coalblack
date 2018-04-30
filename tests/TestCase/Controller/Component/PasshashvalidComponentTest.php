<?php
namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\PasshashvalidComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\PasshashvalidComponent Test Case
 */
class PasshashvalidComponentTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Controller\Component\PasshashvalidComponent
     */
    public $Passhashvalid;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->Passhashvalid = new PasshashvalidComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Passhashvalid);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
