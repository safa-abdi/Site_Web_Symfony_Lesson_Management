<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210605224910 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE instrument (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, image VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cour (id INT AUTO_INCREMENT NOT NULL, date DATE NOT NULL, heure TIME NOT NULL, duree INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE instrument (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, image VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE enseignant ADD instrument_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE enseignant ADD CONSTRAINT FK_81A72FA1CF11D9C FOREIGN KEY (instrument_id) REFERENCES instrument (id)');
        $this->addSql('CREATE INDEX IDX_81A72FA1CF11D9C ON enseignant (instrument_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE instrument');
        $this->addSql('ALTER TABLE enseignant DROP FOREIGN KEY FK_81A72FA1CF11D9C');
        $this->addSql('DROP TABLE cour');
        $this->addSql('DROP TABLE instrument');
        $this->addSql('DROP INDEX IDX_81A72FA1CF11D9C ON enseignant');
        $this->addSql('ALTER TABLE enseignant DROP instrument_id');
    }
}
