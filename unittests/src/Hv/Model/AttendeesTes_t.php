<?php
class AttendeesTest extends PHPUnit_Extensions_Database_TestCase
{
    /**
     * @return PHPUnit_Extensions_Database_DB_IDatabaseConnection
     */
    public function getConnection()
    {
        $database = 'dbdemo_test';
        $dsn = 'mysql:host=localhost;dbname=' . $database;
        $user = 'dbdemo';
        $password = 'dbdemo';
        $pdo = new PDO($dsn, $user, $password);
        return $this->createDefaultDBConnection($pdo);
    }

    public function getDataSet()
    {
        return $this->createFlatXmlDataSet('fixtures/attendeestest_dataset.xml');
    }

    public function testGetAttendeesAtConference()
    {
        $dataSet = $this->getConnection()->createDataSet();
        
        $attendeesModel = new Hv_Model_Attendees();
        $dbdemoAttendees = $attendeesModel->getAttendeesAtConference('dbdemo13');
        $this->assertCount(2, $dbdemoAttendees, 'We expect 3 attendees at dbdemo13');
    }
}