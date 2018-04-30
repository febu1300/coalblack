<?php
namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\CheckoutComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\CheckoutComponent Test Case
 */
class CheckoutComponentTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Controller\Component\CheckoutComponent
     */
    public $Checkout;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->Checkout = new CheckoutComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Checkout);

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
