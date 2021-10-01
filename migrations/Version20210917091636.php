<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210917091636 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE detail_voiture DROP INDEX UNIQ_8E2D01DA4827B9B2, ADD INDEX IDX_8E2D01DA4827B9B2 (marque_id)');
        $this->addSql('ALTER TABLE detail_voiture CHANGE marque_id marque_id INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE detail_voiture DROP INDEX IDX_8E2D01DA4827B9B2, ADD UNIQUE INDEX UNIQ_8E2D01DA4827B9B2 (marque_id)');
        $this->addSql('ALTER TABLE detail_voiture CHANGE marque_id marque_id INT DEFAULT NULL');
    }
}
