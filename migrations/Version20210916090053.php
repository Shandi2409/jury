<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210916090053 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE detail_voiture (id INT AUTO_INCREMENT NOT NULL, marque_id INT DEFAULT NULL, couleur VARCHAR(255) NOT NULL, modeles VARCHAR(255) NOT NULL, nombre_portes VARCHAR(255) NOT NULL, type_carburant VARCHAR(255) NOT NULL, boite_vitesse VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8E2D01DA4827B9B2 (marque_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE marque_de_voiture (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, creation VARCHAR(255) NOT NULL, fondateurs VARCHAR(255) NOT NULL, filiales VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE detail_voiture ADD CONSTRAINT FK_8E2D01DA4827B9B2 FOREIGN KEY (marque_id) REFERENCES marque_de_voiture (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE detail_voiture DROP FOREIGN KEY FK_8E2D01DA4827B9B2');
        $this->addSql('DROP TABLE detail_voiture');
        $this->addSql('DROP TABLE marque_de_voiture');
        $this->addSql('DROP TABLE `user`');
    }
}
