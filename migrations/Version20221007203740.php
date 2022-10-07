<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221007203740 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user CHANGE user_email user_email VARCHAR(180) NOT NULL, CHANGE user_password user_password VARCHAR(255) NOT NULL, CHANGE user_roles user_roles JSON NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649550872C ON user (user_email)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX UNIQ_8D93D649550872C ON `user`');
        $this->addSql('ALTER TABLE `user` CHANGE user_email user_email VARCHAR(255) DEFAULT NULL, CHANGE user_roles user_roles JSON DEFAULT NULL, CHANGE user_password user_password VARCHAR(255) DEFAULT NULL');
    }
}
