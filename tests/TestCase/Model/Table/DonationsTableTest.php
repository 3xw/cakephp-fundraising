<?php
namespace Trois\Fundraising\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Trois\Fundraising\Model\Table\DonationsTable;

/**
 * Trois\Fundraising\Model\Table\DonationsTable Test Case
 */
class DonationsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Trois\Fundraising\Model\Table\DonationsTable
     */
    public $Donations;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.trois/fundraising.donations',
        'plugin.trois/fundraising.contributions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Donations') ? [] : ['className' => DonationsTable::class];
        $this->Donations = TableRegistry::get('Donations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Donations);

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
