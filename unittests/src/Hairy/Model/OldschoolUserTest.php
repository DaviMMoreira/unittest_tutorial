<?php
class OldschoolUserTest extends PHPUnit_Framework_TestCase
{
    public function testSendMessageReceivedMail()
    {
        $mockMailer = new MockMailer();
           
        $userModel = new Hairy\Model\User('John', 'Doe', 'johndoe@mydomain');
        $userModel->setMailer($mockMailer);
        
        $result = $userModel->sendMessageReceivedMail('This is my message');
        $this->assertTrue(
            $result, 
            'In normal situations sendMessageReceivedMail() should return boolean true'
        );
    }
}

class MockMailer extends \Hairy\Lib\Mailer
{
    public function send($recipientEmail, $recipientName, $subject, $body)
    {
        return true;
    }
}