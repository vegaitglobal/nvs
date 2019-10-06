<?php

class Mailer {
    private $_twig;
    private $_swiftMailer;
    private $_error;

    public function __construct(Twig\Environment $twig)
    {
        $this->_twig = $twig;
        $this->_error = false;

        try {
            $swiftSmtpTransport = (new Swift_SmtpTransport(
                config('mailer_host'),
                config('mailer_port'),
                config('mailer_encryption')
            ))->setUsername(config('mailer_user'))
            ->setPassword(config('mailer_pass'));

            $this->_swiftMailer = new Swift_Mailer($swiftSmtpTransport);
        } catch (Exception $e) {
            $this->_error = true;
        }
    }

    public function sendEmail(
        string $to,
        string $subject,
        array $contentParagraphs,
        string $from = 'office@nvs.rs'
    ) {
        if (!$this->_error) {
            $content = $this->_twig->render('mail.html.twig', [
                'paragraphs' => $contentParagraphs,
                // for dynamically created image urls
                'app_url' => config('app_url')
            ]);

            $swiftMessage = new Swift_Message($subject, $content, 'text/html', 'utf8');
            $swiftMessage->setFrom($from)->setTo($to);

            $this->_swiftMailer->send($swiftMessage);
        }
    }
}
