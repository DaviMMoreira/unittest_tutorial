<?php
class UserTest extends PHPUnit_Framework_TestCase
{
    public function testSendMessageReceivedMail()
    {
        $mockMailer = $this->getMock('Hairy\Lib\Mailer', array('send'));
        $mockMailer->expects($this->once())
                   ->method('send')
                   ->will($this->returnValue(true));
        
        $userModel = new Hairy\Model\User('John', 'Doe', 'johndoe@mydomain');
        $userModel->setMailer($mockMailer);
        
        $result = $userModel->sendMessageReceivedMail('This is my message');
        $this->assertTrue(
            $result, 
            'In normal situations sendMessageReceivedMail() should return boolean true'
        );
    }
}