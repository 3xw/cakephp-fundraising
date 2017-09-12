<?php
namespace Trois\Fundraising\Test\TestCase\View\Helper;

use Cake\TestSuite\TestCase;
use Cake\View\View;
use Trois\Fundraising\View\Helper\StripePaymentFormHelper;

/**
 * Trois\Fundraising\View\Helper\StripePaymentFormHelper Test Case
 */
class StripePaymentFormHelperTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Trois\Fundraising\View\Helper\StripePaymentFormHelper
     */
    public $StripePaymentForm;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $view = new View();
        $this->StripePaymentForm = new StripePaymentFormHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->StripePaymentForm);

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
