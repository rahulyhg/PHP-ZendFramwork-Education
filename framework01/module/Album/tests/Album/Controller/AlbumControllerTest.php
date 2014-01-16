<?php
use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

/**
 * AlbumController test case.
 */
class AlbumControllerTest extends AbstractHttpControllerTestCase
{

    protected $traceError = true;

    /**
     *
     * @var AlbumController
     */
    private $AlbumController;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        $this->setApplicationConfig(include '/Users/leeivan/Zend/workspaces/DefaultWorkspace10/framework01/config/application.config.php');
        parent::setUp();
        
        // TODO Auto-generated AlbumControllerTest::setUp()
        
        // $this->AlbumController = new AlbumController(/* parameters */);
    }

    public function testIndexActionCanBeAccessed()
    {
        $albumTableMock = $this->getMockBuilder('Album\Model\AlbumTable')
            ->disableOriginalConstructor()
            ->getMock();
        
        $albumTableMock->expects($this->once())
            ->method('fetchAll')
            ->will($this->returnValue(array()));
        
        $serviceManager = $this->getApplicationServiceLocator();
        $serviceManager->setAllowOverride(true);
        $serviceManager->setService('Album\Model\AlbumTable', $albumTableMock);
        $this->dispatch('/album');
        $this->assertResponseStatusCode(200);
        
        $this->assertModuleName('Album');
        $this->assertControllerName('Album\Controller\Album');
        $this->assertControllerClass('AlbumController');
        $this->assertMatchedRouteName('album');
    }
}

