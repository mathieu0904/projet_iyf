<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230426012307 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE entretien ADD fidele_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE entretien ADD CONSTRAINT FK_2B58D6DAE82E2050 FOREIGN KEY (fidele_id) REFERENCES fidele (id)');
        $this->addSql('CREATE INDEX IDX_2B58D6DAE82E2050 ON entretien (fidele_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE entretien DROP FOREIGN KEY FK_2B58D6DAE82E2050');
        $this->addSql('DROP INDEX IDX_2B58D6DAE82E2050 ON entretien');
        $this->addSql('ALTER TABLE entretien DROP fidele_id');
    }
}
