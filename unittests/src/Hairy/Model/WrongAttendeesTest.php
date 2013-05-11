<?php
class WrongAttendeesTest extends PHPUnit_Framework_TestCase
{
    /**
     * This won't work
     */
    public function testGetAttendeesAtConference()
    {
        $this->markTestSkipped();
        $attendeesModel = new \Hairy\Model\Attendees();
        $tekAttendees = $attendeesModel->getAttendeesAtConference('tek13');
        $this->assertCount(3, $tekAttendees, 'We expect 3 attendees at TEK13');
    }
}