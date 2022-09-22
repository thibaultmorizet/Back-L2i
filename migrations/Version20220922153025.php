<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220922153025 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649D89E7196');
        $this->addSql('DROP INDEX IDX_8D93D649D89E7196 ON user');
        $this->addSql('ALTER TABLE user CHANGE user_userstatus_fk_id user_userstatus_id INT NOT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6494B340C8D FOREIGN KEY (user_userstatus_id) REFERENCES userstatus (id)');
        $this->addSql('CREATE INDEX IDX_8D93D6494B340C8D ON user (user_userstatus_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `user` DROP FOREIGN KEY FK_8D93D6494B340C8D');
        $this->addSql('DROP INDEX IDX_8D93D6494B340C8D ON `user`');
        $this->addSql('ALTER TABLE `user` CHANGE user_userstatus_id user_userstatus_fk_id INT NOT NULL');
        $this->addSql('ALTER TABLE `user` ADD CONSTRAINT FK_8D93D649D89E7196 FOREIGN KEY (user_userstatus_fk_id) REFERENCES userstatus (id)');
        $this->addSql('CREATE INDEX IDX_8D93D649D89E7196 ON `user` (user_userstatus_fk_id)');
    }
}
