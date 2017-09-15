<?php
namespace Trois\Fundraising\Test\TestCase\Controller\Component;

use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;
use Trois\Fundraising\Controller\Component\InvoiceComponent;

/**
 * Trois\Fundraising\Controller\Component\InvoiceComponent Test Case
 */
class InvoiceComponentTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Trois\Fundraising\Controller\Component\InvoiceComponent
     */
    public $Invoice;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->Invoice = new InvoiceComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Invoice);

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
