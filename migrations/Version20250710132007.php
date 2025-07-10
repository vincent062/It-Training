<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250710132007 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE formation CHANGE duree duree INT NOT NULL, CHANGE prix prix INT NOT NULL');
        $this->addSql('ALTER TABLE sous_theme ADD theme_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE sous_theme ADD CONSTRAINT FK_E891E7ED59027487 FOREIGN KEY (theme_id) REFERENCES theme (id)');
        $this->addSql('CREATE INDEX IDX_E891E7ED59027487 ON sous_theme (theme_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE formation CHANGE duree duree DATETIME NOT NULL, CHANGE prix prix VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE sous_theme DROP FOREIGN KEY FK_E891E7ED59027487');
        $this->addSql('DROP INDEX IDX_E891E7ED59027487 ON sous_theme');
        $this->addSql('ALTER TABLE sous_theme DROP theme_id');
    }
}
