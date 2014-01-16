<?php
require_once 'module/Album/src/Album/Model/AlbumTable.php';

require_once 'PHPUnit/Framework/TestCase.php';
use Album\Model\AlbumTable;
use Zend\Db\ResultSet\ResultSet;

/**
 * AlbumTable test case.
 */
class AlbumTableTest extends PHPUnit_Framework_TestCase
{

    /**
     *
     * @var AlbumTable
     */
    private $AlbumTable;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();
        
        // TODO Auto-generated AlbumTableTest::setUp()
        $resultSet = new ResultSet();
        $mockTableGateway = $this->getMock(
        		'Zend\Db\TableGateway\TableGateway',
        		array('select'),
        		array(),
        		'',
        		false
        );
        $mockTableGateway->expects($this->once())
        ->method('select')
        ->with()
        ->will($this->returnValue($resultSet));
        
        $this->AlbumTable = new AlbumTable($mockTableGateway);
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        // TODO Auto-generated AlbumTableTest::tearDown()
        $this->AlbumTable = null;
        
        parent::tearDown();
    }

    /**
     * Constructs the test case.
     */
    public function __construct()
    {
        // TODO Auto-generated constructor
    }

    /**
     * Tests AlbumTable->__construct()
     */
    public function test__construct()
    {
        // TODO Auto-generated AlbumTableTest->test__construct()
        $this->markTestIncomplete("__construct test not implemented");
        
        $this->AlbumTable->__construct(/* parameters */);
    }

    /**
     * Tests AlbumTable->fetchAll()
     */
    public function testFetchAll()
    {
        // TODO Auto-generated AlbumTableTest->testFetchAll()
        $this->markTestIncomplete("fetchAll test not implemented");
        
        $this->AlbumTable->fetchAll(/* parameters */);
    }

    /**
     * Tests AlbumTable->getAlbum()
     */
    public function testGetAlbum()
    {
        // TODO Auto-generated AlbumTableTest->testGetAlbum()
        $this->markTestIncomplete("getAlbum test not implemented");
        
        $this->AlbumTable->getAlbum(/* parameters */);
    }

    /**
     * Tests AlbumTable->saveAlbum()
     */
    public function testSaveAlbum()
    {
        // TODO Auto-generated AlbumTableTest->testSaveAlbum()
        $this->markTestIncomplete("saveAlbum test not implemented");
        
        $this->AlbumTable->saveAlbum(/* parameters */);
    }

    /**
     * Tests AlbumTable->deleteAlbum()
     */
    public function testDeleteAlbum()
    {
        // TODO Auto-generated AlbumTableTest->testDeleteAlbum()
        $this->markTestIncomplete("deleteAlbum test not implemented");
        
        $this->AlbumTable->deleteAlbum(/* parameters */);
    }
}

