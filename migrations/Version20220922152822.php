<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220922152822 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE address (id INT AUTO_INCREMENT NOT NULL, address_street VARCHAR(255) NOT NULL, address_postalcode INT NOT NULL, address_city VARCHAR(255) NOT NULL, address_country VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, article_title VARCHAR(255) NOT NULL, article_summary VARCHAR(255) DEFAULT NULL, article_unit_price DOUBLE PRECISION NOT NULL, article_stock INT NOT NULL, article_book_isbn INT DEFAULT NULL, article_book_image VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article_type (article_id INT NOT NULL, type_id INT NOT NULL, INDEX IDX_3C9CD0287294869C (article_id), INDEX IDX_3C9CD028C54C8C93 (type_id), PRIMARY KEY(article_id, type_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE author (id INT AUTO_INCREMENT NOT NULL, article_id INT DEFAULT NULL, author_firstname VARCHAR(255) DEFAULT NULL, author_lastname VARCHAR(255) DEFAULT NULL, author_language VARCHAR(255) DEFAULT NULL, INDEX IDX_BDAFD8C87294869C (article_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE editor (id INT AUTO_INCREMENT NOT NULL, article_id INT DEFAULT NULL, editor_name VARCHAR(255) DEFAULT NULL, INDEX IDX_CCF1F1BA7294869C (article_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE format (id INT AUTO_INCREMENT NOT NULL, article_id INT DEFAULT NULL, format_name VARCHAR(255) DEFAULT NULL, INDEX IDX_DEBA72DF7294869C (article_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE invoice (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `order` (id INT AUTO_INCREMENT NOT NULL, order_invoice_id INT DEFAULT NULL, order_user_id INT NOT NULL, order_date DATETIME NOT NULL, order_total_price DOUBLE PRECISION NOT NULL, order_article_list LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', UNIQUE INDEX UNIQ_F52993989A530CA8 (order_invoice_id), INDEX IDX_F529939851147ADE (order_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type (id INT AUTO_INCREMENT NOT NULL, type_name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, user_userstatus_id INT NOT NULL, user_billing_address_id INT NOT NULL, user_delivery_address_id INT NOT NULL, user_lastname VARCHAR(255) NOT NULL, user_firstname VARCHAR(255) NOT NULL, user_email VARCHAR(255) NOT NULL, user_password VARCHAR(255) NOT NULL, INDEX IDX_8D93D649D89E7196 (user_userstatus_id), INDEX IDX_8D93D649D594261F (user_billing_address_id), INDEX IDX_8D93D649C1315723 (user_delivery_address_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE userstatus (id INT AUTO_INCREMENT NOT NULL, userstatus_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE article_type ADD CONSTRAINT FK_3C9CD0287294869C FOREIGN KEY (article_id) REFERENCES article (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article_type ADD CONSTRAINT FK_3C9CD028C54C8C93 FOREIGN KEY (type_id) REFERENCES type (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE author ADD CONSTRAINT FK_BDAFD8C87294869C FOREIGN KEY (article_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE editor ADD CONSTRAINT FK_CCF1F1BA7294869C FOREIGN KEY (article_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE format ADD CONSTRAINT FK_DEBA72DF7294869C FOREIGN KEY (article_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F52993989A530CA8 FOREIGN KEY (order_invoice_id) REFERENCES invoice (id)');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F529939851147ADE FOREIGN KEY (order_user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE `user` ADD CONSTRAINT FK_8D93D649D89E7196 FOREIGN KEY (user_userstatus_id) REFERENCES userstatus (id)');
        $this->addSql('ALTER TABLE `user` ADD CONSTRAINT FK_8D93D649D594261F FOREIGN KEY (user_billing_address_id) REFERENCES address (id)');
        $this->addSql('ALTER TABLE `user` ADD CONSTRAINT FK_8D93D649C1315723 FOREIGN KEY (user_delivery_address_id) REFERENCES address (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article_type DROP FOREIGN KEY FK_3C9CD0287294869C');
        $this->addSql('ALTER TABLE article_type DROP FOREIGN KEY FK_3C9CD028C54C8C93');
        $this->addSql('ALTER TABLE author DROP FOREIGN KEY FK_BDAFD8C87294869C');
        $this->addSql('ALTER TABLE editor DROP FOREIGN KEY FK_CCF1F1BA7294869C');
        $this->addSql('ALTER TABLE format DROP FOREIGN KEY FK_DEBA72DF7294869C');
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F52993989A530CA8');
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F529939851147ADE');
        $this->addSql('ALTER TABLE `user` DROP FOREIGN KEY FK_8D93D649D89E7196');
        $this->addSql('ALTER TABLE `user` DROP FOREIGN KEY FK_8D93D649D594261F');
        $this->addSql('ALTER TABLE `user` DROP FOREIGN KEY FK_8D93D649C1315723');
        $this->addSql('DROP TABLE address');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE article_type');
        $this->addSql('DROP TABLE author');
        $this->addSql('DROP TABLE editor');
        $this->addSql('DROP TABLE format');
        $this->addSql('DROP TABLE invoice');
        $this->addSql('DROP TABLE `order`');
        $this->addSql('DROP TABLE type');
        $this->addSql('DROP TABLE `user`');
        $this->addSql('DROP TABLE userstatus');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
