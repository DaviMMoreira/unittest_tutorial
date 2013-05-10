<?php
namespace Hairy\Lib
{
    class Mailer
    {
        /**
         * Sends out an e-mail
         * @param string $recipientEmail  the recipient e-mail address
         * @param string $recipientName   the recipient name
         * @param string $subject         the e-mail subject
         * @param string $body            the e-mail body
         * @return boolean true if successfull, false if not
         */
        public function send($recipientEmail, $recipientName, $subject, $body)
        {
            $recipient = sprintf('%s <%s>', $recipientName, $recipientEmail);
            $success = mail($recipient, $subject, $body);
            return $success;
        }
    }
}