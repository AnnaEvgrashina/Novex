<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240402084831 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE users ADD email VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE users ADD name VARCHAR(100) NOT NULL');
        $this->addSql('ALTER TABLE users ADD age INT NOT NULL');
        $this->addSql('ALTER TABLE users ADD sex VARCHAR(100) NOT NULL');
        $this->addSql('ALTER TABLE users ADD birthday DATE NOT NULL');
        $this->addSql('ALTER TABLE users ADD phone VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE users ADD created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL');
        $this->addSql('ALTER TABLE users ADD updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL');
        $this->addSql('COMMENT ON COLUMN users.created_at IS \'(DC2Type:datetime)\'');
        $this->addSql('COMMENT ON COLUMN users.updated_at IS \'(DC2Type:datetime)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE users DROP email');
        $this->addSql('ALTER TABLE users DROP name');
        $this->addSql('ALTER TABLE users DROP age');
        $this->addSql('ALTER TABLE users DROP sex');
        $this->addSql('ALTER TABLE users DROP birthday');
        $this->addSql('ALTER TABLE users DROP phone');
        $this->addSql('ALTER TABLE users DROP created_at');
        $this->addSql('ALTER TABLE users DROP updated_at');
    }
}
