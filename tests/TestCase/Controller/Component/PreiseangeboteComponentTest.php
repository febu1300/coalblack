<?php
namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\PreiseangeboteComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\PreiseangeboteComponent Test Case
 */
class PreiseangeboteComponentTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Controller\Component\PreiseangeboteComponent
     */
    public $Preiseangebote;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->Preiseangebote = new PreiseangeboteComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Preiseangebote);

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
