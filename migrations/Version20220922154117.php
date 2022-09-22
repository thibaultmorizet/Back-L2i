<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220922154117 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE article_author (article_id INT NOT NULL, author_id INT NOT NULL, INDEX IDX_D7684F487294869C (article_id), INDEX IDX_D7684F48F675F31B (author_id), PRIMARY KEY(article_id, author_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE article_author ADD CONSTRAINT FK_D7684F487294869C FOREIGN KEY (article_id) REFERENCES article (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article_author ADD CONSTRAINT FK_D7684F48F675F31B FOREIGN KEY (author_id) REFERENCES author (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article ADD article_book_format_id INT NOT NULL, ADD article_book_editor_id INT NOT NULL');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E6662BC6CCB FOREIGN KEY (article_book_format_id) REFERENCES format (id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66DD003682 FOREIGN KEY (article_book_editor_id) REFERENCES editor (id)');
        $this->addSql('CREATE INDEX IDX_23A0E6662BC6CCB ON article (article_book_format_id)');
        $this->addSql('CREATE INDEX IDX_23A0E66DD003682 ON article (article_book_editor_id)');
        $this->addSql('ALTER TABLE author DROP FOREIGN KEY FK_BDAFD8C87294869C');
        $this->addSql('DROP INDEX IDX_BDAFD8C87294869C ON author');
        $this->addSql('ALTER TABLE author DROP article_id');
        $this->addSql('ALTER TABLE editor DROP FOREIGN KEY FK_CCF1F1BA7294869C');
        $this->addSql('DROP INDEX IDX_CCF1F1BA7294869C ON editor');
        $this->addSql('ALTER TABLE editor DROP article_id');
        $this->addSql('ALTER TABLE format DROP FOREIGN KEY FK_DEBA72DF7294869C');
        $this->addSql('DROP INDEX IDX_DEBA72DF7294869C ON format');
        $this->addSql('ALTER TABLE format DROP article_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article_author DROP FOREIGN KEY FK_D7684F487294869C');
        $this->addSql('ALTER TABLE article_author DROP FOREIGN KEY FK_D7684F48F675F31B');
        $this->addSql('DROP TABLE article_author');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E6662BC6CCB');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66DD003682');
        $this->addSql('DROP INDEX IDX_23A0E6662BC6CCB ON article');
        $this->addSql('DROP INDEX IDX_23A0E66DD003682 ON article');
        $this->addSql('ALTER TABLE article DROP article_book_format_id, DROP article_book_editor_id');
        $this->addSql('ALTER TABLE author ADD article_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE author ADD CONSTRAINT FK_BDAFD8C87294869C FOREIGN KEY (article_id) REFERENCES article (id)');
        $this->addSql('CREATE INDEX IDX_BDAFD8C87294869C ON author (article_id)');
        $this->addSql('ALTER TABLE editor ADD article_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE editor ADD CONSTRAINT FK_CCF1F1BA7294869C FOREIGN KEY (article_id) REFERENCES article (id)');
        $this->addSql('CREATE INDEX IDX_CCF1F1BA7294869C ON editor (article_id)');
        $this->addSql('ALTER TABLE format ADD article_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE format ADD CONSTRAINT FK_DEBA72DF7294869C FOREIGN KEY (article_id) REFERENCES article (id)');
        $this->addSql('CREATE INDEX IDX_DEBA72DF7294869C ON format (article_id)');
    }
}
