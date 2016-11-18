<?php

namespace Hubsine\Framework\Mailer;

/**
 * Mailer
 *
 * @author Hubsine
 */
class Mailer extends \Swift_Mailer{
    
    public function __construct() {
        parent::__construct(new \Swift_MailTransport());
    }
}
