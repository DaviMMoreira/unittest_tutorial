<?php
class OldschoolUserTest extends PHPUnit_Framework_TestCase
{
    public function testSendMessageReceivedMail()
    {
        $mockMailer = new MockMailer();
           
        $userModel = new Hv_Model_User('John', 'Doe', 'johndoe@mydomain');
        $userModel->setMailer($mockMailer);
        
        $result = $userModel->sendMessageReceivedMail('This is my message');
        $this->assertTrue(
            $result, 
            'In normal situations sendMessageReceivedMail() should return boolean true'
        );
    }
}

class MockMailer extends Hv_Lib_Mailer
{
    public function send($recipientEmail, $recipientName, $subject, $body)
    {
        return true;
    }
}