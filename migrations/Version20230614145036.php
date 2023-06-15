<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230614145036 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_atelier DROP FOREIGN KEY FK_B9B6062982E2CF35');
        $this->addSql('ALTER TABLE user_atelier DROP FOREIGN KEY FK_B9B60629A76ED395');
        $this->addSql('DROP TABLE user_atelier');
        $this->addSql('ALTER TABLE fiche_degustation ADD persistance VARCHAR(255) DEFAULT NULL, ADD matiere VARCHAR(255) DEFAULT NULL, ADD structure VARCHAR(255) DEFAULT NULL, ADD emotion VARCHAR(255) DEFAULT NULL, ADD douceur INT DEFAULT NULL, ADD acidite INT DEFAULT NULL, ADD brillance INT DEFAULT NULL, DROP equilibre, DROP corps, DROP fin_debouche, CHANGE limpidite limpidite VARCHAR(255) NOT NULL, CHANGE arome arome JSON NOT NULL, CHANGE tanins fluidite VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user_atelier (user_id INT NOT NULL, atelier_id INT NOT NULL, INDEX IDX_B9B60629A76ED395 (user_id), INDEX IDX_B9B6062982E2CF35 (atelier_id), PRIMARY KEY(user_id, atelier_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE user_atelier ADD CONSTRAINT FK_B9B6062982E2CF35 FOREIGN KEY (atelier_id) REFERENCES atelier (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_atelier ADD CONSTRAINT FK_B9B60629A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE fiche_degustation ADD equilibre INT NOT NULL, ADD corps INT NOT NULL, ADD fin_debouche INT NOT NULL, DROP persistance, DROP matiere, DROP structure, DROP emotion, DROP douceur, DROP acidite, DROP brillance, CHANGE limpidite limpidite INT NOT NULL, CHANGE arome arome VARCHAR(255) NOT NULL, CHANGE fluidite tanins VARCHAR(255) NOT NULL');
    }
}
