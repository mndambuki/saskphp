<?php
/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.1 on 2014-03-05 at 19:56:33.
 * @author Stefanie Janine Stoelting<mail.stefanie-stoelting.de>
 * @link http://saskphp.com/ Sask website
 * @license http://opensource.org/licenses/MIT MIT
 * @package Sask
 * @subpackage UnitTests
 */
class AutoLoaderTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var AutoLoader
     */
    protected $object;

    /**
     * @var string
     */
    protected $cacheFile;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->chacheFile = TESTFOLDER .  '/classCache.cache';

    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
        if (file_exists($this->chacheFile)) {
            unset($this->chacheFile);
        }
    }

    /**
     * @covers AutoLoader::registerDirectory
     */
    public function testRegisterDirectory()
    {
        AutoLoader::registerDirectory(__DIR__);

    }

    /**
     * @covers AutoLoader::registerCache
     */
    public function testRegisterCache()
    {
        AutoLoader::registerCache($this->chacheFile);

        $this->assertEquals($this->chacheFile, AutoLoader::getCacheFileName());
    }

    /**
     * @covers AutoLoader::loadFromCache
     * @todo   Implement testLoadFromCache().
     */
    public function testLoadFromCache()
    {
        AutoLoader::registerCache($this->chacheFile);

        AutoLoader::updateCacheFile(__DIR__);
        $this->assertEquals($this->chacheFile, AutoLoader::getCacheFileName());
        $this->assertTrue(AutoLoader::saveToCache());
        $this->assertFileExists($this->chacheFile);

        $this->assertTrue(AutoLoader::loadFromCache());
    }

    /**
     * @covers AutoLoader::saveToCache
     */
    public function testSaveToCache()
    {
        AutoLoader::registerCache($this->chacheFile);

        $this->assertEquals($this->chacheFile, AutoLoader::getCacheFileName());
        $this->assertTrue(AutoLoader::saveToCache());
        $this->assertFileExists($this->chacheFile);
    }

    /**
     * @covers AutoLoader::registerClass
     */
    public function testRegisterClass()
    {
        $this->assertTrue(AutoLoader::registerClass('TestClassName', 'TestClassName.php'));
    }

    /**
     * @covers AutoLoader::loadClass
     */
    public function testLoadClass()
    {
        AutoLoader::registerCache($this->chacheFile);

        $this->assertEquals($this->chacheFile, AutoLoader::getCacheFileName());
        $this->assertTrue(AutoLoader::saveToCache());
        $this->assertFileExists($this->chacheFile);
    }

    /**
     * @covers AutoLoader::getCacheFileName
     */
    public function testGetCacheFileName()
    {
        $chacheFile = realpath(TESTFOLDER .  '/classCache.cache');

        AutoLoader::registerCache($chacheFile);

        $this->assertEquals($chacheFile, AutoLoader::getCacheFileName());
    }

    /**
     * @covers AutoLoader::updateCacheFile
     */
    public function testUpdateCacheFile()
    {
        AutoLoader::registerCache($this->chacheFile);

        AutoLoader::updateCacheFile(__DIR__);
        $this->assertEquals($this->chacheFile, AutoLoader::getCacheFileName());
        $this->assertTrue(AutoLoader::saveToCache());
        $this->assertFileExists($this->chacheFile);

        $this->assertTrue(AutoLoader::loadFromCache());
    }
}