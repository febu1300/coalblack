<?php
namespace App\Test\TestCase\View\Cell;

use App\View\Cell\ProduktinfoCell;
use Cake\TestSuite\TestCase;

/**
 * App\View\Cell\ProduktinfoCell Test Case
 */
class ProduktinfoCellTest extends TestCase
{

    /**
     * Request mock
     *
     * @var \Cake\Http\ServerRequest|\PHPUnit_Framework_MockObject_MockObject
     */
    public $request;

    /**
     * Response mock
     *
     * @var \Cake\Http\Response|\PHPUnit_Framework_MockObject_MockObject
     */
    public $response;

    /**
     * Test subject
     *
     * @var \App\View\Cell\ProduktinfoCell
     */
    public $Produktinfo;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->request = $this->getMockBuilder('Cake\Http\ServerRequest')->getMock();
        $this->response = $this->getMockBuilder('Cake\Http\Response')->getMock();
        $this->Produktinfo = new ProduktinfoCell($this->request, $this->response);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Produktinfo);

        parent::tearDown();
    }

    /**
     * Test display method
     *
     * @return void
     */
    public function testDisplay()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
