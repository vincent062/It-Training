<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250711123148 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE formation DROP id_formation');
        $this->addSql('ALTER TABLE sous_theme DROP id_soustheme, DROP id_theme_parent');
        $this->addSql('ALTER TABLE theme DROP id_theme');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE formation ADD id_formation VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE sous_theme ADD id_soustheme VARCHAR(255) NOT NULL, ADD id_theme_parent VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE theme ADD id_theme VARCHAR(255) NOT NULL');
    }
}
