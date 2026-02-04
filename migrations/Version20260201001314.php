<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260201001314 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE projects (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, content LONGTEXT NOT NULL, feature_image VARCHAR(255) NOT NULL, link VARCHAR(255) NOT NULL, screenshot JSON NOT NULL, status LONGTEXT NOT NULL, tech_stack JSON NOT NULL, git_hub_link VARCHAR(255) NOT NULL, live_url VARCHAR(255) NOT NULL, demo_url VARCHAR(255) NOT NULL, start_date DATE NOT NULL, completed_date DATE NOT NULL, created_date DATETIME NOT NULL, updated_at DATETIME NOT NULL, featured TINYINT NOT NULL, display_order INT NOT NULL, category_id INT DEFAULT NULL, INDEX IDX_5C93B3A412469DE2 (category_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE projects ADD CONSTRAINT FK_5C93B3A412469DE2 FOREIGN KEY (category_id) REFERENCES categories (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE projects DROP FOREIGN KEY FK_5C93B3A412469DE2');
        $this->addSql('DROP TABLE projects');
    }
}
