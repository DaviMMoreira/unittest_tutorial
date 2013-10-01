<?php
class WrongAttendeesTest extends PHPUnit_Framework_TestCase
{
    /**
     * This won't work
     */
    public function testGetAttendeesAtConference()
    {
        $this->markTestSkipped();
        $attendeesModel = new Hv_Model_Attendees();
        $dbdemoAttendees = $attendeesModel->getAttendeesAtConference('dbdemo13');
        $this->assertCount(3, $dbdemoAttendees, 'We expect 3 attendees at DBDEMO13');
    }
}