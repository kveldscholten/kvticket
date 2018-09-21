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
        'version' => '1.1',
        'icon_small' => 'fa-ticket',
        'author' => 'Veldscholten, Kevin',
        'languages' => [
            'de_DE' => [
                'name' => 'Tickets',
                'description' => 'Mit diesem Module können deine Nutzer Tickets/Bugs melden.',
            ],
            'en_EN' => [
                'name' => 'Tickets',
                'description' => 'With this module, your users can report tickets/bugs.',
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
                `title` VARCHAR(191) NOT NULL,
                `text` MEDIUMTEXT NOT NULL,
                `datetime` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
                `status` INT(11) NOT NULL DEFAULT 0,
                `editor` INT(11) NOT NULL DEFAULT 0,
                PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1;';
    }

    public function getUpdate($installedVersion)
    {
        switch ($installedVersion) {
            case "1.0":
                // Change VARCHAR length for new table character.
                $this->db()->query('ALTER TABLE `[prefix]_kvticket` MODIFY COLUMN `title` VARCHAR(191) NOT NULL;');
                // Change text to MEDIUMTEXT
                $this->db()->query('ALTER TABLE `[prefix]_kvticket` MODIFY COLUMN `text` MEDIUMTEXT NOT NULL;');
                // Add ticket editor
                $this->db()->query('ALTER TABLE `[prefix]_kvticket` ADD `editor` INT(11) NOT NULL DEFAULT 0 AFTER `status`;');
        }
    }
}
