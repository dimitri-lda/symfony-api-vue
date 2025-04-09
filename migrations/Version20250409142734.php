<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250409142734 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE tennis_racket_models (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tennis_racket_variants (id INT AUTO_INCREMENT NOT NULL, model_id INT NOT NULL, article_number VARCHAR(20) NOT NULL, color VARCHAR(50) NOT NULL, weight INT NOT NULL, head_size INT NOT NULL, balance INT NOT NULL, string_pattern VARCHAR(10) NOT NULL, stiffness INT NOT NULL, length INT NOT NULL, frame_profile VARCHAR(20) NOT NULL, UNIQUE INDEX UNIQ_A67D8D2EFC5788D4 (article_number), INDEX IDX_A67D8D2E7975B7E7 (model_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE tennis_racket_variants ADD CONSTRAINT FK_A67D8D2E7975B7E7 FOREIGN KEY (model_id) REFERENCES tennis_racket_models (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tennis_racket_variants DROP FOREIGN KEY FK_A67D8D2E7975B7E7');
        $this->addSql('DROP TABLE tennis_racket_models');
        $this->addSql('DROP TABLE tennis_racket_variants');
    }
}
