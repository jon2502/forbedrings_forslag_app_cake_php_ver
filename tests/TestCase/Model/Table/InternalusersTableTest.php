<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InternalusersTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InternalusersTable Test Case
 */
class InternalusersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\InternalusersTable
     */
    protected $Internalusers;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.Internalusers',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Internalusers') ? [] : ['className' => InternalusersTable::class];
        $this->Internalusers = $this->getTableLocator()->get('Internalusers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Internalusers);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\InternalusersTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\InternalusersTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
