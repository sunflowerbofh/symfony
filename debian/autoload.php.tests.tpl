<?php

require_once 'Symfony/autoload.php';
require_once 'Symfony/Bridge/PhpUnit/autoload.php';
require_once 'Symfony/Component/Mailer/Bridge/Amazon/autoload.php';
require_once 'Symfony/Component/Mailer/Bridge/Google/autoload.php';
require_once 'Symfony/Component/Mailer/Bridge/Mailchimp/autoload.php';
require_once 'Symfony/Component/Mailer/Bridge/Mailgun/autoload.php';
require_once 'Symfony/Component/Mailer/Bridge/Mailjet/autoload.php';
require_once 'Symfony/Component/Mailer/Bridge/OhMySmtp/autoload.php';
require_once 'Symfony/Component/Mailer/Bridge/Postmark/autoload.php';
require_once 'Symfony/Component/Mailer/Bridge/Sendgrid/autoload.php';
require_once 'Symfony/Component/Mailer/Bridge/Sendinblue/autoload.php';
require_once 'Symfony/Component/Messenger/Bridge/AmazonSqs/autoload.php';
require_once 'Symfony/Component/Messenger/Bridge/Amqp/autoload.php';
require_once 'Symfony/Component/Messenger/Bridge/Beanstalkd/autoload.php';
require_once 'Symfony/Component/Messenger/Bridge/Doctrine/autoload.php';
require_once 'Symfony/Component/Messenger/Bridge/Redis/autoload.php';
require_once 'Symfony/Component/Notifier/Bridge/AllMySms/autoload.php';
require_once 'Symfony/Component/Notifier/Bridge/AmazonSns/autoload.php';
require_once 'Symfony/Component/Notifier/Bridge/Clickatell/autoload.php';
require_once 'Symfony/Component/Notifier/Bridge/Discord/autoload.php';
require_once 'Symfony/Component/Notifier/Bridge/Esendex/autoload.php';
require_once 'Symfony/Component/Notifier/Bridge/Expo/autoload.php';
require_once 'Symfony/Component/Notifier/Bridge/FakeChat/autoload.php';
require_once 'Symfony/Component/Notifier/Bridge/FakeSms/autoload.php';
require_once 'Symfony/Component/Notifier/Bridge/Firebase/autoload.php';
require_once 'Symfony/Component/Notifier/Bridge/FreeMobile/autoload.php';
require_once 'Symfony/Component/Notifier/Bridge/GatewayApi/autoload.php';
require_once 'Symfony/Component/Notifier/Bridge/Gitter/autoload.php';
require_once 'Symfony/Component/Notifier/Bridge/GoogleChat/autoload.php';
require_once 'Symfony/Component/Notifier/Bridge/Infobip/autoload.php';
require_once 'Symfony/Component/Notifier/Bridge/Iqsms/autoload.php';
require_once 'Symfony/Component/Notifier/Bridge/LightSms/autoload.php';
require_once 'Symfony/Component/Notifier/Bridge/LinkedIn/autoload.php';
require_once 'Symfony/Component/Notifier/Bridge/Mailjet/autoload.php';
require_once 'Symfony/Component/Notifier/Bridge/Mercure/autoload.php';
require_once 'Symfony/Component/Notifier/Bridge/MessageBird/autoload.php';
require_once 'Symfony/Component/Notifier/Bridge/MessageMedia/autoload.php';
require_once 'Symfony/Component/Notifier/Bridge/MicrosoftTeams/autoload.php';
require_once 'Symfony/Component/Notifier/Bridge/Mattermost/autoload.php';
require_once 'Symfony/Component/Notifier/Bridge/Mobyt/autoload.php';
require_once 'Symfony/Component/Notifier/Bridge/Octopush/autoload.php';
require_once 'Symfony/Component/Notifier/Bridge/OneSignal/autoload.php';
require_once 'Symfony/Component/Notifier/Bridge/OvhCloud/autoload.php';
require_once 'Symfony/Component/Notifier/Bridge/RocketChat/autoload.php';
require_once 'Symfony/Component/Notifier/Bridge/Sendinblue/autoload.php';
require_once 'Symfony/Component/Notifier/Bridge/Sinch/autoload.php';
require_once 'Symfony/Component/Notifier/Bridge/Slack/autoload.php';
require_once 'Symfony/Component/Notifier/Bridge/SmsBiuras/autoload.php';
require_once 'Symfony/Component/Notifier/Bridge/Sms77/autoload.php';
require_once 'Symfony/Component/Notifier/Bridge/Smsapi/autoload.php';
require_once 'Symfony/Component/Notifier/Bridge/Smsc/autoload.php';
require_once 'Symfony/Component/Notifier/Bridge/SpotHit/autoload.php';
require_once 'Symfony/Component/Notifier/Bridge/Telegram/autoload.php';
require_once 'Symfony/Component/Notifier/Bridge/Telnyx/autoload.php';
require_once 'Symfony/Component/Notifier/Bridge/TurboSms/autoload.php';
require_once 'Symfony/Component/Notifier/Bridge/Twilio/autoload.php';
require_once 'Symfony/Component/Notifier/Bridge/Vonage/autoload.php';
require_once 'Symfony/Component/Notifier/Bridge/Yunpian/autoload.php';
require_once 'Symfony/Component/Notifier/Bridge/Zulip/autoload.php';
require_once 'Symfony/Component/Translation/Bridge/Crowdin/autoload.php';
require_once 'Symfony/Component/Translation/Bridge/Loco/autoload.php';
require_once 'Symfony/Component/Translation/Bridge/Lokalise/autoload.php';

require_once 'Composer/autoload.php';
require_once 'Amp/autoload.php';
require_once 'Amp/Http/Client/autoload.php';
require_once 'Amp/Http/autoload.php';
require_once 'Cache/IntegrationTests/autoload.php';
require_once 'Doctrine/Common/Annotations/autoload.php';
require_once 'GuzzleHttp/Promise/autoload.php';
require_once 'Http/Client/autoload.php';
require_once 'Laminas/Code/autoload.php';
require_once 'League/Uri/autoload.php';
require_once 'League/Uri/Interfaces/autoload.php';
require_once 'Masterminds/HTML5/autoload.php';
require_once 'Nyholm/Psr7/autoload.php';
require_once 'Predis/autoload.php';
require_once 'PHPStan/PhpDocParser/autoload.php';
require_once 'Psr/Http/Client/autoload.php';
require_once 'Psr/SimpleCache/autoload.php';
require_once 'Symfony/Component/Runtime/autoload.php';
require_once 'Twig/Extra/CssInliner/autoload.php';
require_once 'Twig/Extra/Inky/autoload.php';
require_once 'Twig/Extra/Markdown/autoload.php';

// @codingStandardsIgnoreFile
// @codeCoverageIgnoreStart
// this is an autogenerated file - do not edit
spl_autoload_register(
    function($class) {
        static $classes = null;
        if ($classes === null) {
            $classes = array(
                'symfony\\component\\routing\\tests\\fixtures\\attributesfixtures\\attributesclassparamaftercommacontroller' => '/../src/Symfony/Component/Routing/Tests/Fixtures/AttributesFixtures/AttributesClassParamAfterCommaController.php',
                'symfony\\component\\routing\\tests\\fixtures\\attributesfixtures\\attributesclassparamafterparenthesiscontroller' => '/../src/Symfony/Component/Routing/Tests/Fixtures/AttributesFixtures/AttributesClassParamAfterParenthesisController.php',
                'symfony\\component\\routing\\tests\\fixtures\\attributesfixtures\\attributesclassparaminlineaftercommacontroller' => '/../src/Symfony/Component/Routing/Tests/Fixtures/AttributesFixtures/AttributesClassParamInlineAfterCommaController.php',
                'symfony\\component\\routing\\tests\\fixtures\\attributesfixtures\\attributesclassparaminlineafterparenthesiscontroller' => '/../src/Symfony/Component/Routing/Tests/Fixtures/AttributesFixtures/AttributesClassParamInlineAfterParenthesisController.php',
                'symfony\\component\\routing\\tests\\fixtures\\attributesfixtures\\attributesclassparaminlinequotedaftercommacontroller' => '/../src/Symfony/Component/Routing/Tests/Fixtures/AttributesFixtures/AttributesClassParamInlineQuotedAfterCommaController.php',
                'symfony\\component\\routing\\tests\\fixtures\\attributesfixtures\\attributesclassparaminlinequotedafterparenthesiscontroller' => '/../src/Symfony/Component/Routing/Tests/Fixtures/AttributesFixtures/AttributesClassParamInlineQuotedAfterParenthesisController.php',
                'symfony\\component\\routing\\tests\\fixtures\\attributesfixtures\\attributesclassparamquotedaftercommacontroller' => '/../src/Symfony/Component/Routing/Tests/Fixtures/AttributesFixtures/AttributesClassParamQuotedAfterCommaController.php',
                'symfony\\component\\routing\\tests\\fixtures\\attributesfixtures\\attributesclassparamquotedafterparenthesiscontroller' => '/../src/Symfony/Component/Routing/Tests/Fixtures/AttributesFixtures/AttributesClassParamQuotedAfterParenthesisController.php',
                ___CLASSLIST___
            );
        }
        $cn = strtolower($class);
        if (isset($classes[$cn]) and file_exists(___BASEDIR___$classes[$cn])) {
            require ___BASEDIR___$classes[$cn];
        }
    },
    true,
    false
);
// @codeCoverageIgnoreEnd
