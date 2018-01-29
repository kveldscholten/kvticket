<?php
/**
 * @copyright Kevin Veldscholten
 * @package ilch
 */

namespace Modules\Kvticket\Config;

class Config extends \Ilch\Config\Install
{
    public $config = [
        'key' => 'kvticket',
        'version' => '1.0',
        'icon_small' => 'fa-ticket',
        'author' => 'Veldscholten, Kevin',
        'languages' => [
            'de_DE' => [
                'name' => 'Tickets',
                'description' => 'Mit diesem Module können deine Nutzer Tickets/Bugs im Frontend melden und du kannst diese im Backend bearbeiten.',
            ],
            'en_EN' => [
                'name' => 'Tickets',
                'description' => 'With this module, your users can report tickets / bugs in the frontend and you can edit them in the backend.',
            ],
        ],
        'ilchCore' => '2.0.0',
        'phpVersion' => '5.6'
    ];

    public function install()
    {
        $this->db()->queryMulti($this->getInstallSql());
    }

    public function uninstall()
    {
        $this->db()->queryMulti('DROP TABLE `[prefix]_kvticket`');
    }

    public function getInstallSql()
    {
        return 'CREATE TABLE IF NOT EXISTS `[prefix]_kvticket` (
                `id` INT(11) NOT NULL AUTO_INCREMENT,
                `title` VARCHAR(255) NOT NULL,
                `text` VARCHAR(255) NOT NULL,
                `datetime` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
                `status` INT(11) NOT NULL DEFAULT 0,
                PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;

            INSERT INTO `[prefix]_kvticket` (`title`, `text`, `status`) VALUES
            ("Hintergrund bewegt sich nicht", "Hallo Team,<br />könnte man nicht noch ermöglichen das der Hintergrund des Spiels sich noch bewegt um somit mehr Effekt zu erziehlen?<br /><br />MFG<br />Hans", 0),
            ("Spiel stürzt ab", "Das Spiel stürzt bei mir auf den Mac manchmal ab", 1),
            ("Spiel nicht Downloadbar", "Hallo,<br />Ich habe eben versucht das Spiel herunterzuladen jedoch kommt dabei nur eine Fehlermeldung", 0),
            ("Lorem ipsum dolor sit amet", "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.<br />Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.<br /><br />Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. ", 2)';
    }

    public function getUpdate($installedVersion)
    {
        
    }
}
