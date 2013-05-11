<?php
class AttendeesTest extends PHPUnit_Extensions_Database_TestCase
{
    /**
     * @return PHPUnit_Extensions_Database_DB_IDatabaseConnection
     */
    public function getConnection()
    {
        $database = 'tek_test';
        $dsn = 'mysql:host=localhost;dbname=' . $database;
        $user = 'tek';
        $password = 'tek';
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
        
        $attendeesModel = new \Hairy\Model\Attendees();
        $tekAttendees = $attendeesModel->getAttendeesAtConference('tek13');
        $this->assertCount(2, $tekAttendees, 'We expect 3 attendees at TEK13');
    }
}