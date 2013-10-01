<?php
class Hv_Model_Attendees
{
    /**
     * Counts the attendees in the database for a given conference
     *
     * Write a test for this method that uses database fixtures
     *
     * @param string $conference the name of the conference
     * @return Array the attendees fetched from the database
     */
    public function getAttendeesAtConference($conference)
    {
        $db = new Hv_Lib_Dbadapter();

        $query = <<<sql
            SELECT
                a.*
            FROM
                attendees a
            JOIN
                conference_attendee ca ON (ca.attendee_id = a.id)
            JOIN
                conference c ON (ca.conference_id = c.id)
            WHERE
                c.name LIKE :conference
sql;

        $results = $db->getRows(
            $query,
            array('conference' => $conference)
        );
        return $results;
    }
}