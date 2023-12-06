<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ForslagTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ForslagTable Test Case
 */
class ForslagTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ForslagTable
     */
    protected $Forslag;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.Forslag',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Forslag') ? [] : ['className' => ForslagTable::class];
        $this->Forslag = $this->getTableLocator()->get('Forslag', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Forslag);

        parent::tearDown();
    }
}
