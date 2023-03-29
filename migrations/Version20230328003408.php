<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230328003408 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE shoes ADD image_name VARCHAR(255) DEFAULT NULL, CHANGE shoe_size shoe_size DOUBLE PRECISION NOT NULL');
    
        $this->addSql('ALTER TABLE shoes CHANGE shoe_size shoe_size JSON DEFAULT NULL');

    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE shoes DROP image_name, CHANGE shoe_size shoe_size JSON DEFAULT NULL');
    
        $this->addSql('ALTER TABLE shoes CHANGE shoe_size shoe_size FLOAT DEFAULT NULL');
    }
}
