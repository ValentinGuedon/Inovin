<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230606075047 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vin ADD fiche_degustation_id INT DEFAULT NULL, ADD atelier_id INT DEFAULT NULL, DROP acidite, CHANGE couleur couleur VARCHAR(255) DEFAULT NULL, CHANGE brillance brillance INT NOT NULL, CHANGE aromes aromes LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', CHANGE intensite intensite INT NOT NULL, CHANGE douceur douceur INT NOT NULL, CHANGE alcool alcool INT NOT NULL');
        $this->addSql('ALTER TABLE vin ADD CONSTRAINT FK_B108514187A94332 FOREIGN KEY (fiche_degustation_id) REFERENCES fiche_degustation (id)');
        $this->addSql('ALTER TABLE vin ADD CONSTRAINT FK_B108514182E2CF35 FOREIGN KEY (atelier_id) REFERENCES atelier (id)');
        $this->addSql('CREATE INDEX IDX_B108514187A94332 ON vin (fiche_degustation_id)');
        $this->addSql('CREATE INDEX IDX_B108514182E2CF35 ON vin (atelier_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vin DROP FOREIGN KEY FK_B108514187A94332');
        $this->addSql('ALTER TABLE vin DROP FOREIGN KEY FK_B108514182E2CF35');
        $this->addSql('DROP INDEX IDX_B108514187A94332 ON vin');
        $this->addSql('DROP INDEX IDX_B108514182E2CF35 ON vin');
        $this->addSql('ALTER TABLE vin ADD acidite VARCHAR(255) NOT NULL, DROP fiche_degustation_id, DROP atelier_id, CHANGE couleur couleur VARCHAR(255) NOT NULL, CHANGE brillance brillance VARCHAR(255) NOT NULL, CHANGE aromes aromes VARCHAR(255) NOT NULL, CHANGE intensite intensite VARCHAR(255) NOT NULL, CHANGE douceur douceur VARCHAR(255) NOT NULL, CHANGE alcool alcool VARCHAR(255) NOT NULL');
    }
}