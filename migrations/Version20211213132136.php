<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211213132136 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE formulaire (id INT AUTO_INCREMENT NOT NULL, users_id INT DEFAULT NULL, voiture_id INT DEFAULT NULL, start DATE NOT NULL, end DATE NOT NULL, number_of_day INT NOT NULL, prix INT NOT NULL, INDEX IDX_5BDD01A867B3B43D (users_id), INDEX IDX_5BDD01A8181A8BA (voiture_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE formulaire ADD CONSTRAINT FK_5BDD01A867B3B43D FOREIGN KEY (users_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE formulaire ADD CONSTRAINT FK_5BDD01A8181A8BA FOREIGN KEY (voiture_id) REFERENCES detail_voiture (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE formulaire');
    }
}
