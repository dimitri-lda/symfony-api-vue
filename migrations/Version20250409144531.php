<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250409144531 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tennis_racket_models ADD brand_id INT NOT NULL');
        $this->addSql('ALTER TABLE tennis_racket_models ADD CONSTRAINT FK_A256B0AF44F5D008 FOREIGN KEY (brand_id) REFERENCES tennis_brands (id)');
        $this->addSql('CREATE INDEX IDX_A256B0AF44F5D008 ON tennis_racket_models (brand_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tennis_racket_models DROP FOREIGN KEY FK_A256B0AF44F5D008');
        $this->addSql('DROP INDEX IDX_A256B0AF44F5D008 ON tennis_racket_models');
        $this->addSql('ALTER TABLE tennis_racket_models DROP brand_id');
    }
}
