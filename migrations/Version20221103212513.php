<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221103212513 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F52993989A530CA8');
        $this->addSql('DROP TABLE invoice');
        $this->addSql('ALTER TABLE address CHANGE postalcode postalcode VARCHAR(10) NOT NULL');
        $this->addSql('ALTER TABLE book ADD unitpriceht DOUBLE PRECISION NOT NULL, ADD soldnumber INT DEFAULT NULL, CHANGE visitnumber visitnumber INT DEFAULT NULL, CHANGE unitprice unitpricettc DOUBLE PRECISION NOT NULL');
        $this->addSql('ALTER TABLE book RENAME INDEX idx_cbe5a331c487e043 TO IDX_CBE5A331D629F605');
        $this->addSql('ALTER TABLE book RENAME INDEX idx_cbe5a3317b3bba0a TO IDX_CBE5A3316995AC4C');
        $this->addSql('DROP INDEX UNIQ_F52993989A530CA8 ON `order`');
        $this->addSql('ALTER TABLE `order` ADD deliveryaddress VARCHAR(255) NOT NULL, ADD billingaddress VARCHAR(255) NOT NULL, DROP invoice_id');
        $this->addSql('ALTER TABLE `order` RENAME INDEX idx_f529939851147ade TO IDX_F5299398A76ED395');
        $this->addSql('ALTER TABLE user CHANGE email email VARCHAR(255) DEFAULT NULL, CHANGE password password VARCHAR(255) DEFAULT NULL, CHANGE roles roles JSON NOT NULL');
        $this->addSql('ALTER TABLE user RENAME INDEX uniq_8d93d649550872c TO UNIQ_8D93D649E7927C74');
        $this->addSql('ALTER TABLE user RENAME INDEX idx_8d93d649d594261f TO IDX_8D93D64979D0C0E4');
        $this->addSql('ALTER TABLE user RENAME INDEX idx_8d93d649c1315723 TO IDX_8D93D649EBF23851');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE invoice (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE address CHANGE postalcode postalcode INT NOT NULL');
        $this->addSql('ALTER TABLE book ADD unitprice DOUBLE PRECISION NOT NULL, DROP unitpricettc, DROP unitpriceht, DROP soldnumber, CHANGE visitnumber visitnumber INT NOT NULL');
        $this->addSql('ALTER TABLE book RENAME INDEX idx_cbe5a3316995ac4c TO IDX_CBE5A3317B3BBA0A');
        $this->addSql('ALTER TABLE book RENAME INDEX idx_cbe5a331d629f605 TO IDX_CBE5A331C487E043');
        $this->addSql('ALTER TABLE `order` ADD invoice_id INT DEFAULT NULL, DROP deliveryaddress, DROP billingaddress');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F52993989A530CA8 FOREIGN KEY (invoice_id) REFERENCES invoice (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F52993989A530CA8 ON `order` (invoice_id)');
        $this->addSql('ALTER TABLE `order` RENAME INDEX idx_f5299398a76ed395 TO IDX_F529939851147ADE');
        $this->addSql('ALTER TABLE `user` CHANGE email email VARCHAR(180) NOT NULL, CHANGE password password VARCHAR(255) NOT NULL, CHANGE roles roles LONGTEXT NOT NULL COLLATE `utf8mb4_bin`');
        $this->addSql('ALTER TABLE `user` RENAME INDEX uniq_8d93d649e7927c74 TO UNIQ_8D93D649550872C');
        $this->addSql('ALTER TABLE `user` RENAME INDEX idx_8d93d64979d0c0e4 TO IDX_8D93D649D594261F');
        $this->addSql('ALTER TABLE `user` RENAME INDEX idx_8d93d649ebf23851 TO IDX_8D93D649C1315723');
    }
}
