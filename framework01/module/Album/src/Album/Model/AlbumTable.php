<?php
namespace Album\Model;

use Zend\Db\TableGateway\TableGateway;

class AlbumTable
{

    protected $albumTable;

    public function __construct(TableGateway $tableGateway)
    {
        $this->albumTable = $tableGateway;
    }

    public function fetchAll()
    {
        $resultSet = $this->albumTable->select();
        return $resultSet;
    }

    public function getAlbum($id)
    {
        $id = (int) $id;
        $rowset = $this->albumTable->select(array(
            'id' => $id
        ));
        $row = $rowset->current();
        if (! $row) {
            throw new \Exception("Could not find row $id");
        }
        return $row;
    }

    public function saveAlbum(Album $album)
    {
        $data = array(
            'artist' => $album->artist,
            'title' => $album->title
        );
        
        $id = (int) $album->id;
        if ($id == 0) {
            $this->albumTable->insert($data);
        } else {
            if ($this->getAlbum($id)) {
                $this->albumTable->update($data, array(
                    'id' => $id
                ));
            } else {
                throw new \Exception('Album id does not exist');
            }
        }
    }

    public function deleteAlbum($id)
    {
        $this->albumTable->delete(array(
            'id' => (int) $id
        ));
    }
}

?>