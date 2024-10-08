<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240927163231 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        //$this->addSql('ALTER TABLE comment ADD created_at DATETIME NOT NULL, CHANGE pseudonym pseudonym VARCHAR(50) NOT NULL, CHANGE comment comment TINYTEXT NOT NULL, CHANGE status status VARCHAR(50) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // Suppression de 'created_at' si elle existe
        $this->addSql('ALTER TABLE comment DROP created_at');

         // Laissez les autres colonnes si nécessaire
         $this->addSql('CHANGE pseudonym pseudonym VARCHAR(255) NOT NULL, CHANGE comment comment LONGTEXT NOT NULL, CHANGE status status VARCHAR(255) NOT NULL');

        // this down() migration is auto-generated, please modify it to your needs
        //$this->addSql('ALTER TABLE comment DROP created_at, CHANGE pseudonym pseudonym VARCHAR(255) NOT NULL, CHANGE comment comment LONGTEXT NOT NULL, CHANGE status status VARCHAR(255) NOT NULL');
    }
}
