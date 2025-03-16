<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250316163109 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_IDENTIFIER_USERNAME (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE formation ADD CONSTRAINT FK_404021BF6BBD148 FOREIGN KEY (playlist_id) REFERENCES playlist (id)');
        $this->addSql('ALTER TABLE formation_categorie ADD CONSTRAINT FK_830086E95200282E FOREIGN KEY (formation_id) REFERENCES formation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE formation_categorie ADD CONSTRAINT FK_830086E9BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE user');
        $this->addSql('ALTER TABLE formation DROP FOREIGN KEY FK_404021BF6BBD148');
        $this->addSql('ALTER TABLE formation_categorie DROP FOREIGN KEY FK_830086E95200282E');
        $this->addSql('ALTER TABLE formation_categorie DROP FOREIGN KEY FK_830086E9BCF5E72D');
    }
}
