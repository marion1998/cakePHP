<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TestbakeallTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TestbakeallTable Test Case
 */
class TestbakeallTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TestbakeallTable
     */
    public $Testbakeall;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.testbakeall'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Testbakeall') ? [] : ['className' => TestbakeallTable::class];
        $this->Testbakeall = TableRegistry::getTableLocator()->get('Testbakeall', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Testbakeall);

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
