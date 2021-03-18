<?php

/**
 * This file is part of the Phalcon Framework.
 *
 * (c) Phalcon Team <team@phalcon.io>
 *
 * For the full copyright and license information, please view the LICENSE.txt
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Phalcon\Incubator\Cache\Tests\Functional\Database;

use Phalcon\Incubator\Cache\Database;
use Phalcon\Storage\SerializerFactory;
use Phalcon\Incubator\Cache\Test\Fixtures\Traits\Cache\DatabaseTrait;
use FunctionalTester;

use function getOptionsSqlite;

class HasCest
{
    use DatabaseTrait;

    /**
     * Tests Phalcon\Incubator\Cache\Database :: get()
     *
     * @author Phalcon Team <team@phalcon.io>
     * @since  2019-03-31
     */
    public function cacheAdapterDatabaseGetSetHas(FunctionalTester $I)
    {
        $I->wantToTest('Cache\Adapter\Database - has()');

        $serializer = new SerializerFactory();

        $adapter = new Database(
            $serializer,
            $this->getOptions()
        );

        $key = uniqid();

        $actual = $adapter->has($key);
        $I->assertFalse($actual);

        $adapter->set($key, 'test');
        $actual = $adapter->has($key);
        $I->assertTrue($actual);
    }
}
