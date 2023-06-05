<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230605161758 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64982E2CF35');
        $this->addSql('ALTER TABLE atelier DROP FOREIGN KEY FK_E1BB182387A94332');
        $this->addSql('DROP TABLE atelier');
        $this->addSql('DROP INDEX IDX_8D93D64982E2CF35 ON user');
        $this->addSql('ALTER TABLE user DROP atelier_id');
        $this->addSql('ALTER TABLE vin ADD fiche_degustation_id INT DEFAULT NULL, ADD arome LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', DROP aromes, DROP acidite, CHANGE couleur couleur VARCHAR(255) DEFAULT NULL, CHANGE intensite intensite INT NOT NULL, CHANGE douceur douceur INT NOT NULL, CHANGE alcool alcool INT NOT NULL');
        $this->addSql('ALTER TABLE vin ADD CONSTRAINT FK_B108514187A94332 FOREIGN KEY (fiche_degustation_id) REFERENCES fiche_degustation (id)');
        $this->addSql('CREATE INDEX IDX_B108514187A94332 ON vin (fiche_degustation_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE atelier (id INT AUTO_INCREMENT NOT NULL, fiche_degustation_id INT DEFAULT NULL, place LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, date DATE DEFAULT NULL, note LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_E1BB182387A94332 (fiche_degustation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE atelier ADD CONSTRAINT FK_E1BB182387A94332 FOREIGN KEY (fiche_degustation_id) REFERENCES fiche_degustation (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE vin DROP FOREIGN KEY FK_B108514187A94332');
        $this->addSql('DROP INDEX IDX_B108514187A94332 ON vin');
        $this->addSql('ALTER TABLE vin ADD aromes VARCHAR(255) NOT NULL, ADD acidite VARCHAR(255) NOT NULL, DROP fiche_degustation_id, DROP arome, CHANGE couleur couleur VARCHAR(255) NOT NULL, CHANGE intensite intensite VARCHAR(255) NOT NULL, CHANGE douceur douceur VARCHAR(255) NOT NULL, CHANGE alcool alcool VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE user ADD atelier_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64982E2CF35 FOREIGN KEY (atelier_id) REFERENCES atelier (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_8D93D64982E2CF35 ON user (atelier_id)');
    }
}
