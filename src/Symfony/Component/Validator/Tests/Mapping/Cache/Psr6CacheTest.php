<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Validator\Tests\Mapping\Cache;

use Symfony\Component\Cache\Adapter\ArrayAdapter;
use Symfony\Component\Validator\Mapping\Cache\Psr6Cache;
use Symfony\Component\Validator\Mapping\ClassMetadata;

/**
 * @author Kévin Dunglas <dunglas@gmail.com>
 *
 * @group legacy
 */
class Psr6CacheTest extends AbstractCacheTest
{
    protected function setUp(): void
    {
        $this->cache = new Psr6Cache(new ArrayAdapter());
    }

    public function testNameCollision()
    {
        $metadata = new ClassMetadata('Foo\\Bar');

        $this->cache->write($metadata);
        $this->assertFalse($this->cache->has('Foo_Bar'));
    }

    public function testNameWithInvalidChars()
    {
        $metadata = new ClassMetadata('class@anonymous/path/file');

        $this->cache->write($metadata);
        $this->assertTrue($this->cache->has('class@anonymous/path/file'));
    }
}
