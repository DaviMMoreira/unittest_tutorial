<?php
class Hv_Model_User
{
    protected $firstname;
    protected $lastname;
    protected $email;

    /**
     * The mailer object we're using to send out e-mails
     * @var Hv_Lib_Mailer
     */
    protected $mailer;

    public function __construct($firstname, $lastname, $email)
    {
        $this->setFirstname($firstname);
        $this->setLastname($lastname);
        $this->setEmail($email);
    }

    /**
     * Sends out an e-mail to inform the user he received a new message.
     *
     * Write a test for this method without actually calling the 'send'
     * method. Insteads, mock the 'send' method to see if get gets the right
     * input (and to see if the method deals with the response the right
     * way).
     *
     * @param string $message the message the user received
     * @return boolean true when successfull, false if failed
     */
    public function sendMessageReceivedMail($message)
    {
        $mailer = $this->getMailer();

        $name = $this->firstname . ' ' . $this->lastname;
        $subject = 'You received a new message';
        $mailbody = 'You have received a new message. The message is: ' . $message;

        return $mailer->send(
            $this->email, 
            $name, 
            $subject, 
            $mailbody
        );
    }

    /**
     * Returns the Mailer object
     * @return Hv_Lib_Mailer
     */
    public function setMailer(Hv_Lib_Mailer $mailer)
    {
        $this->mailer = $mailer;
    }        

    /**
     * Returns the Mailer object
     * @return Hv_Lib_Mailer
     */
    protected function getMailer()
    {
        if (!isset($this->mailer))
        {
            $this->setMailer(new Hv_Lib_Mailer());
        }
        return $this->mailer;
    }

    /**
     * Returns the number of inbox messages for this user.
     *
     * Write a test for this method by having the getDatabaseAdapter object
     * returning a mock-object.
     *
     * @return int the number of messages in the inbox
     */
    public function getNumberOfInboxMessages()
    {
        $db = $this->getDatabaseAdapter();
        $query = '
            SELECT
                COUNT(*) as count
            FROM
                inboxmessages
            WHERE
                email = :email
        ';
        $result = $db->getRows($query, array('email' => $this->email));
        $firstRow = array_shift($result);
        return $firstRow['count'];
    }

    /**
     * Returns the database adapter we can use for communicating with the
     * database.
     */
    protected function getDatabaseAdapter()
    {
        return new Hv_Lib_Dbadapter();
    }

    public function setFirstname($firstname)
    {
        $this->firstname = (string)$firstname;
    }

    public function setLastname($lastname)
    {
        $this->lastname = (string)$lastname;
    }

    public function setEmail($email)
    {
        $this->email = (string)$email;
    }
}