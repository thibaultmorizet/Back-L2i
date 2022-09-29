<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220929182313 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE book (id INT AUTO_INCREMENT NOT NULL, book_format_id INT NOT NULL, book_editor_id INT NOT NULL, book_title VARCHAR(255) NOT NULL, book_summary VARCHAR(10000) DEFAULT NULL, book_unit_price DOUBLE PRECISION NOT NULL, book_stock INT NOT NULL, book_isbn VARCHAR(255) DEFAULT NULL, book_image VARCHAR(255) DEFAULT NULL, book_year VARCHAR(255) DEFAULT NULL, book_visit_number INT NOT NULL, INDEX IDX_CBE5A331C487E043 (book_format_id), INDEX IDX_CBE5A3317B3BBA0A (book_editor_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE book_author (book_id INT NOT NULL, author_id INT NOT NULL, INDEX IDX_9478D34516A2B381 (book_id), INDEX IDX_9478D345F675F31B (author_id), PRIMARY KEY(book_id, author_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE book_type (book_id INT NOT NULL, type_id INT NOT NULL, INDEX IDX_95431C2116A2B381 (book_id), INDEX IDX_95431C21C54C8C93 (type_id), PRIMARY KEY(book_id, type_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE book ADD CONSTRAINT FK_CBE5A331C487E043 FOREIGN KEY (book_format_id) REFERENCES format (id)');
        $this->addSql('ALTER TABLE book ADD CONSTRAINT FK_CBE5A3317B3BBA0A FOREIGN KEY (book_editor_id) REFERENCES editor (id)');
        $this->addSql('ALTER TABLE book_author ADD CONSTRAINT FK_9478D34516A2B381 FOREIGN KEY (book_id) REFERENCES book (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE book_author ADD CONSTRAINT FK_9478D345F675F31B FOREIGN KEY (author_id) REFERENCES author (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE book_type ADD CONSTRAINT FK_95431C2116A2B381 FOREIGN KEY (book_id) REFERENCES book (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE book_type ADD CONSTRAINT FK_95431C21C54C8C93 FOREIGN KEY (type_id) REFERENCES type (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E6662BC6CCB');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66DD003682');
        $this->addSql('ALTER TABLE article_author DROP FOREIGN KEY FK_D7684F48F675F31B');
        $this->addSql('ALTER TABLE article_author DROP FOREIGN KEY FK_D7684F487294869C');
        $this->addSql('ALTER TABLE article_type DROP FOREIGN KEY FK_3C9CD0287294869C');
        $this->addSql('ALTER TABLE article_type DROP FOREIGN KEY FK_3C9CD028C54C8C93');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE article_author');
        $this->addSql('DROP TABLE article_type');
        $this->addSql('ALTER TABLE `order` CHANGE order_article_list order_book_list LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, article_book_format_id INT NOT NULL, article_book_editor_id INT NOT NULL, article_title VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, article_summary VARCHAR(10000) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, article_unit_price DOUBLE PRECISION NOT NULL, article_stock INT NOT NULL, article_book_isbn VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, article_book_image VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, article_book_year VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, article_visit_number INT NOT NULL, INDEX IDX_23A0E6662BC6CCB (article_book_format_id), INDEX IDX_23A0E66DD003682 (article_book_editor_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE article_author (article_id INT NOT NULL, author_id INT NOT NULL, INDEX IDX_D7684F487294869C (article_id), INDEX IDX_D7684F48F675F31B (author_id), PRIMARY KEY(article_id, author_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE article_type (article_id INT NOT NULL, type_id INT NOT NULL, INDEX IDX_3C9CD0287294869C (article_id), INDEX IDX_3C9CD028C54C8C93 (type_id), PRIMARY KEY(article_id, type_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E6662BC6CCB FOREIGN KEY (article_book_format_id) REFERENCES format (id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66DD003682 FOREIGN KEY (article_book_editor_id) REFERENCES editor (id)');
        $this->addSql('ALTER TABLE article_author ADD CONSTRAINT FK_D7684F48F675F31B FOREIGN KEY (author_id) REFERENCES author (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article_author ADD CONSTRAINT FK_D7684F487294869C FOREIGN KEY (article_id) REFERENCES article (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article_type ADD CONSTRAINT FK_3C9CD0287294869C FOREIGN KEY (article_id) REFERENCES article (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article_type ADD CONSTRAINT FK_3C9CD028C54C8C93 FOREIGN KEY (type_id) REFERENCES type (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE book DROP FOREIGN KEY FK_CBE5A331C487E043');
        $this->addSql('ALTER TABLE book DROP FOREIGN KEY FK_CBE5A3317B3BBA0A');
        $this->addSql('ALTER TABLE book_author DROP FOREIGN KEY FK_9478D34516A2B381');
        $this->addSql('ALTER TABLE book_author DROP FOREIGN KEY FK_9478D345F675F31B');
        $this->addSql('ALTER TABLE book_type DROP FOREIGN KEY FK_95431C2116A2B381');
        $this->addSql('ALTER TABLE book_type DROP FOREIGN KEY FK_95431C21C54C8C93');
        $this->addSql('DROP TABLE book');
        $this->addSql('DROP TABLE book_author');
        $this->addSql('DROP TABLE book_type');
        $this->addSql('ALTER TABLE `order` CHANGE order_book_list order_article_list LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\'');
    }
}
