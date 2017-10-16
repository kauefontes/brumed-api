<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RegulationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RegulationsTable Test Case
 */
class RegulationsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RegulationsTable
     */
    public $Regulations;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.regulations',
        'app.occurrences',
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
        $config = TableRegistry::exists('Regulations') ? [] : ['className' => RegulationsTable::class];
        $this->Regulations = TableRegistry::get('Regulations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Regulations);

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
