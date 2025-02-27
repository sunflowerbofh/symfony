<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Workflow\Tests\SupportStrategy;

use PHPUnit\Framework\TestCase;
use Symfony\Component\Workflow\SupportStrategy\ClassInstanceSupportStrategy;
use Symfony\Component\Workflow\Workflow;

/**
 * @group legacy
 */
class ClassInstanceSupportStrategyTest extends TestCase
{
    /**
     * @expectedDeprecation "Symfony\Component\Workflow\SupportStrategy\ClassInstanceSupportStrategy" is deprecated since Symfony 4.1. Use "Symfony\Component\Workflow\SupportStrategy\InstanceOfSupportStrategy" instead.
     */
    public function testSupportsIfClassInstance()
    {
        $strategy = new ClassInstanceSupportStrategy('Symfony\Component\Workflow\Tests\SupportStrategy\Subject1');

        $this->assertTrue($strategy->supports($this->createWorkflow(), new Subject1()));
    }

    public function testSupportsIfNotClassInstance()
    {
        $strategy = new ClassInstanceSupportStrategy('Symfony\Component\Workflow\Tests\SupportStrategy\Subject2');

        $this->assertFalse($strategy->supports($this->createWorkflow(), new Subject1()));
    }

    private function createWorkflow()
    {
        return $this->createMock(Workflow::class);
    }
}
