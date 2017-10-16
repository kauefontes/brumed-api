<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OccurrencesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OccurrencesTable Test Case
 */
class OccurrencesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\OccurrencesTable
     */
    public $Occurrences;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.occurrences',
        'app.regulations',
        'app.inspections',
        'app.companies'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Occurrences') ? [] : ['className' => OccurrencesTable::class];
        $this->Occurrences = TableRegistry::get('Occurrences', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Occurrences);

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
