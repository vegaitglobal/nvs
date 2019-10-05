<?php

class Mailer {
    private $_twig;
    private $_swiftMailer;

    public function __construct(Twig\Environment $twig)
    {
        $this->_twig = $twig;

        $swiftSmtpTransport = (new Swift_SmtpTransport(
            config('mailer_host'),
            config('mailer_port'),
            config('mailer_encryption')
        ))->setUsername(config('mailer_user'))
        ->setPassword(config('mailer_pass'));

        $this->_swiftMailer = new Swift_Mailer($swiftSmtpTransport);
    }

    public function sendEmail(
        string $to,
        string $subject,
        array $contentParagraphs,
        string $from = 'office@nvs.rs'
    ) {
        $content = $this->_twig->render('mail.html.twig', [
            'paragraphs' => $contentParagraphs,
            // for dynamically created image urls
            'app_url' => config('app_url')
        ]);

        $swiftMessage = new Swift_Message($subject, $content, 'text/html', 'utf8');
        $swiftMessage->setFrom($from)->setTo($to);
    }
}
