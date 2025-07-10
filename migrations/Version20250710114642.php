<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250710114642 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE formation ADD soustheme_parent_id INT DEFAULT NULL, DROP id_soustheme_parent');
        $this->addSql('ALTER TABLE formation ADD CONSTRAINT FK_404021BF1DFAB4C6 FOREIGN KEY (soustheme_parent_id) REFERENCES sous_theme (id)');
        $this->addSql('CREATE INDEX IDX_404021BF1DFAB4C6 ON formation (soustheme_parent_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE formation DROP FOREIGN KEY FK_404021BF1DFAB4C6');
        $this->addSql('DROP INDEX IDX_404021BF1DFAB4C6 ON formation');
        $this->addSql('ALTER TABLE formation ADD id_soustheme_parent VARCHAR(255) NOT NULL, DROP soustheme_parent_id');
    }
}
