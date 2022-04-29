<?php
class AboutModel extends model
{
    public $title = 'About MIU SE305 Blog';
    public $data = 'Test Data';

    public function Load()
    {

        $this->dbh->query("SELECT *  FROM `aboutUs` WHERE  1");

        $result = $this->dbh->resultSet();

        return $result;
    }
    public function Load2($result)
    {
        $ORS = '';

        foreach ($result as $row) {
            $ORS .= '`ID`= ' . $row->UserID . " OR ";
        }
        $ORS .= "`ID`=  0 ";
        $ALL = "SELECT *  FROM `user` WHERE   " . $ORS;
        $this->dbh->query($ALL);

        $result2 = $this->dbh->resultSet();
        return $result2;
    }
}
