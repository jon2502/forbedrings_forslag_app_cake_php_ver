<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InternalcommentsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InternalcommentsTable Test Case
 */
class InternalcommentsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\InternalcommentsTable
     */
    protected $Internalcomments;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.Internalcomments',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Internalcomments') ? [] : ['className' => InternalcommentsTable::class];
        $this->Internalcomments = $this->getTableLocator()->get('Internalcomments', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Internalcomments);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\InternalcommentsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
