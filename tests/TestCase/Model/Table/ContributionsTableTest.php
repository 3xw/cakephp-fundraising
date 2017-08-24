<?php
namespace Trois\Fundraising\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Trois\Fundraising\Model\Table\ContributionsTable;

/**
 * Trois\Fundraising\Model\Table\ContributionsTable Test Case
 */
class ContributionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Trois\Fundraising\Model\Table\ContributionsTable
     */
    public $Contributions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.trois/fundraising.contributions',
        'plugin.trois/fundraising.donations'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Contributions') ? [] : ['className' => ContributionsTable::class];
        $this->Contributions = TableRegistry::get('Contributions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Contributions);

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
