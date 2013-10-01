<?php
class UserTest extends PHPUnit_Framework_TestCase
{
    public function testSendMessageReceivedMail()
    {
        $mockMailer = $this->getMock('Hv_Lib_Mailer', array('send'));
        $mockMailer->expects($this->once())
                   ->method('send')
                   ->with(
                       $this->equalTo('johndoe@mydomain'),
                       $this->equalTo('John Doe'),
                       $this->isType('string'),
                       $this->stringContains('This is my message')
                   )
                   ->will($this->returnValue(true));
        
        $userModel = new Hv_Model_User('John', 'Doe', 'johndoe@mydomain');
        $userModel->setMailer($mockMailer);
        
        $result = $userModel->sendMessageReceivedMail('This is my message');
        $this->assertTrue(
            $result, 
            'In normal situations sendMessageReceivedMail() should return boolean true'
        );
    }

    public function testGetNumberOfInboxMessages()
    {
        $mockDb = $this->getMock(
            'Hv_Lib_Dbadapter',  // class we're mocking
            array('getRows'),       // methods we want to replace
            array(),                // constructor arguments
            '',                     // classname for mock
            false                   // call original constructor?
        );

        $dbResult = array(array('count' => 24));
        $mockDb->expects($this->once())
               ->method('getRows')
               ->will($this->returnValue($dbResult));

        $mockUser = $this->getMock(
            'Hv_Model_User',
            array('getDatabaseAdapter'),
            array('test', 'user', 'testuser@somedomain.com')
        );
        $mockUser->expects($this->once())
            ->method('getDatabaseAdapter')
            ->will($this->returnValue($mockDb));

        $numberOfMessages = $mockUser->getNumberOfInboxMessages();
        $this->assertEquals(24, $numberOfMessages, 'Number of inbox messages should be 24');
    }
}