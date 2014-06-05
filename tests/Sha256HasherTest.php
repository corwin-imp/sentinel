<?php namespace Cartalyst\Sentinel\Tests;
/**
 * Part of the Sentinel package.
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the Cartalyst PSL License.
 *
 * This source file is subject to the Cartalyst PSL License that is
 * bundled with this package in the license.txt file.
 *
 * @package    Sentinel
 * @version    1.0.0
 * @author     Cartalyst LLC
 * @license    Cartalyst PSL
 * @copyright  (c) 2011-2014, Cartalyst LLC
 * @link       http://cartalyst.com
 */

use Cartalyst\Sentinel\Hashing\Sha256Hasher;
use Mockery as m;
use PHPUnit_Framework_TestCase;

class Sha256HasherTest extends PHPUnit_Framework_TestCase {

	/**
	 * Close mockery.
	 *
	 * @return void
	 */
	public function tearDown()
	{
		m::close();
	}

	public function testHashing()
	{
		$hasher = new Sha256Hasher;
		$hashedValue = $hasher->hash('password');
		$this->assertTrue($hashedValue !== 'password');
		$this->assertTrue($hasher->check('password', $hashedValue));
		$this->assertFalse($hasher->check('fail', $hashedValue));
	}

}