<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220925172134 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6494B340C8D');
        $this->addSql('DROP TABLE userstatus');
        $this->addSql('DROP INDEX IDX_8D93D6494B340C8D ON user');
        $this->addSql('ALTER TABLE user ADD user_roles JSON NOT NULL, DROP user_userstatus_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE userstatus (id INT AUTO_INCREMENT NOT NULL, userstatus_name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE `user` ADD user_userstatus_id INT NOT NULL, DROP user_roles');
        $this->addSql('ALTER TABLE `user` ADD CONSTRAINT FK_8D93D6494B340C8D FOREIGN KEY (user_userstatus_id) REFERENCES userstatus (id)');
        $this->addSql('CREATE INDEX IDX_8D93D6494B340C8D ON `user` (user_userstatus_id)');
    }
}
