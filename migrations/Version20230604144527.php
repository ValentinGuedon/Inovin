<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230604144527 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE caracteristique (id INT AUTO_INCREMENT NOT NULL, vin_id INT DEFAULT NULL, user_id INT DEFAULT NULL, fruite INT NOT NULL, puissance INT NOT NULL, souplesse INT NOT NULL, boise INT NOT NULL, mineralite INT NOT NULL, moelleux INT NOT NULL, floral INT NOT NULL, epice INT NOT NULL, couleur INT NOT NULL, INDEX IDX_D14FBE8BBA62C651 (vin_id), INDEX IDX_D14FBE8BA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cepage (id INT AUTO_INCREMENT NOT NULL, vin_id INT DEFAULT NULL, caracteristiques_id INT DEFAULT NULL, type VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, INDEX IDX_5B3E4D56BA62C651 (vin_id), INDEX IDX_5B3E4D56B2639FE4 (caracteristiques_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE favoris (id INT AUTO_INCREMENT NOT NULL, vin_id INT DEFAULT NULL, user_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, INDEX IDX_8933C432BA62C651 (vin_id), INDEX IDX_8933C432A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fiche_degustation (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, limpidite INT NOT NULL, couleur VARCHAR(255) NOT NULL, arome VARCHAR(255) NOT NULL, tanins VARCHAR(255) NOT NULL, alcool INT NOT NULL, equilibre INT NOT NULL, corps INT NOT NULL, fin_debouche INT NOT NULL, note INT NOT NULL, INDEX IDX_41D4FE8FA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE jeux (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, titre VARCHAR(255) NOT NULL, question VARCHAR(255) NOT NULL, INDEX IDX_3755B50DA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recette (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, vin_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, quantite INT NOT NULL, INDEX IDX_49BB6390A76ED395 (user_id), INDEX IDX_49BB6390BA62C651 (vin_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE caracteristique ADD CONSTRAINT FK_D14FBE8BBA62C651 FOREIGN KEY (vin_id) REFERENCES vin (id)');
        $this->addSql('ALTER TABLE caracteristique ADD CONSTRAINT FK_D14FBE8BA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE cepage ADD CONSTRAINT FK_5B3E4D56BA62C651 FOREIGN KEY (vin_id) REFERENCES vin (id)');
        $this->addSql('ALTER TABLE cepage ADD CONSTRAINT FK_5B3E4D56B2639FE4 FOREIGN KEY (caracteristiques_id) REFERENCES caracteristique (id)');
        $this->addSql('ALTER TABLE favoris ADD CONSTRAINT FK_8933C432BA62C651 FOREIGN KEY (vin_id) REFERENCES vin (id)');
        $this->addSql('ALTER TABLE favoris ADD CONSTRAINT FK_8933C432A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE fiche_degustation ADD CONSTRAINT FK_41D4FE8FA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE jeux ADD CONSTRAINT FK_3755B50DA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE recette ADD CONSTRAINT FK_49BB6390A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE recette ADD CONSTRAINT FK_49BB6390BA62C651 FOREIGN KEY (vin_id) REFERENCES vin (id)');
        $this->addSql('ALTER TABLE user ADD email VARCHAR(180) NOT NULL, ADD roles JSON NOT NULL, DROP login, DROP nom, DROP prenom');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E7927C74 ON user (email)');
        $this->addSql('ALTER TABLE vin ADD fiche_degustation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE vin ADD CONSTRAINT FK_B108514187A94332 FOREIGN KEY (fiche_degustation_id) REFERENCES fiche_degustation (id)');
        $this->addSql('CREATE INDEX IDX_B108514187A94332 ON vin (fiche_degustation_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vin DROP FOREIGN KEY FK_B108514187A94332');
        $this->addSql('ALTER TABLE caracteristique DROP FOREIGN KEY FK_D14FBE8BBA62C651');
        $this->addSql('ALTER TABLE caracteristique DROP FOREIGN KEY FK_D14FBE8BA76ED395');
        $this->addSql('ALTER TABLE cepage DROP FOREIGN KEY FK_5B3E4D56BA62C651');
        $this->addSql('ALTER TABLE cepage DROP FOREIGN KEY FK_5B3E4D56B2639FE4');
        $this->addSql('ALTER TABLE favoris DROP FOREIGN KEY FK_8933C432BA62C651');
        $this->addSql('ALTER TABLE favoris DROP FOREIGN KEY FK_8933C432A76ED395');
        $this->addSql('ALTER TABLE fiche_degustation DROP FOREIGN KEY FK_41D4FE8FA76ED395');
        $this->addSql('ALTER TABLE jeux DROP FOREIGN KEY FK_3755B50DA76ED395');
        $this->addSql('ALTER TABLE recette DROP FOREIGN KEY FK_49BB6390A76ED395');
        $this->addSql('ALTER TABLE recette DROP FOREIGN KEY FK_49BB6390BA62C651');
        $this->addSql('DROP TABLE caracteristique');
        $this->addSql('DROP TABLE cepage');
        $this->addSql('DROP TABLE favoris');
        $this->addSql('DROP TABLE fiche_degustation');
        $this->addSql('DROP TABLE jeux');
        $this->addSql('DROP TABLE recette');
        $this->addSql('DROP INDEX UNIQ_8D93D649E7927C74 ON user');
        $this->addSql('ALTER TABLE user ADD login VARCHAR(255) NOT NULL, ADD nom VARCHAR(255) NOT NULL, ADD prenom VARCHAR(255) NOT NULL, DROP email, DROP roles');
        $this->addSql('DROP INDEX IDX_B108514187A94332 ON vin');
        $this->addSql('ALTER TABLE vin DROP fiche_degustation_id');
    }
}
