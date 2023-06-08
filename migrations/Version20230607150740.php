<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230607150740 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE animations (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, price INT NOT NULL, resume VARCHAR(2000) NOT NULL, description VARCHAR(2000) NOT NULL, image VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE atelier (id INT AUTO_INCREMENT NOT NULL, place LONGTEXT NOT NULL, date DATE DEFAULT NULL, commentaire LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE atelier_vin (atelier_id INT NOT NULL, vin_id INT NOT NULL, INDEX IDX_8CED1F3E82E2CF35 (atelier_id), INDEX IDX_8CED1F3EBA62C651 (vin_id), PRIMARY KEY(atelier_id, vin_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE caracteristique (id INT AUTO_INCREMENT NOT NULL, vin_id INT DEFAULT NULL, user_id INT DEFAULT NULL, fruite INT NOT NULL, puissance INT NOT NULL, souplesse INT NOT NULL, boise INT NOT NULL, mineralite INT NOT NULL, moelleux INT NOT NULL, floral INT NOT NULL, epice INT NOT NULL, couleur INT NOT NULL, INDEX IDX_D14FBE8BBA62C651 (vin_id), INDEX IDX_D14FBE8BA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cepage (id INT AUTO_INCREMENT NOT NULL, vin_id INT DEFAULT NULL, caracteristiques_id INT DEFAULT NULL, type VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, INDEX IDX_5B3E4D56BA62C651 (vin_id), INDEX IDX_5B3E4D56B2639FE4 (caracteristiques_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE favoris (id INT AUTO_INCREMENT NOT NULL, vin_id INT DEFAULT NULL, user_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, INDEX IDX_8933C432BA62C651 (vin_id), INDEX IDX_8933C432A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fiche_degustation (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, limpidite INT NOT NULL, couleur VARCHAR(255) NOT NULL, arome VARCHAR(255) NOT NULL, tanins VARCHAR(255) NOT NULL, alcool INT NOT NULL, equilibre INT NOT NULL, corps INT NOT NULL, fin_debouche INT NOT NULL, note INT NOT NULL, INDEX IDX_41D4FE8FA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE jeux (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, titre VARCHAR(255) NOT NULL, question VARCHAR(255) NOT NULL, INDEX IDX_3755B50DA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE panier (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, date DATETIME DEFAULT NULL, prix DOUBLE PRECISION DEFAULT NULL, UNIQUE INDEX UNIQ_24CC0DF2A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recette (id INT AUTO_INCREMENT NOT NULL, vin_id INT DEFAULT NULL, user_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, quantite INT NOT NULL, INDEX IDX_49BB6390BA62C651 (vin_id), INDEX IDX_49BB6390A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, street VARCHAR(255) NOT NULL, postalcode INT NOT NULL, city VARCHAR(255) NOT NULL, birthdate DATE NOT NULL, phone VARCHAR(255) NOT NULL, participant TINYINT(1) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_atelier (user_id INT NOT NULL, atelier_id INT NOT NULL, INDEX IDX_B9B60629A76ED395 (user_id), INDEX IDX_B9B6062982E2CF35 (atelier_id), PRIMARY KEY(user_id, atelier_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vin (id INT AUTO_INCREMENT NOT NULL, fiche_degustation_id INT DEFAULT NULL, panier_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, region VARCHAR(255) NOT NULL, millesime INT NOT NULL, degre_alcool DOUBLE PRECISION NOT NULL, prix DOUBLE PRECISION NOT NULL, image VARCHAR(255) DEFAULT NULL, updated_at DATETIME DEFAULT NULL, couleur VARCHAR(255) DEFAULT NULL, limpidite VARCHAR(255) NOT NULL, fluidite VARCHAR(255) NOT NULL, brillance INT NOT NULL, arome LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', intensite INT NOT NULL, douceur INT NOT NULL, alcool INT NOT NULL, persistance VARCHAR(255) NOT NULL, structure VARCHAR(255) NOT NULL, matiere VARCHAR(255) NOT NULL, INDEX IDX_B108514187A94332 (fiche_degustation_id), INDEX IDX_B1085141F77D927C (panier_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE atelier_vin ADD CONSTRAINT FK_8CED1F3E82E2CF35 FOREIGN KEY (atelier_id) REFERENCES atelier (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE atelier_vin ADD CONSTRAINT FK_8CED1F3EBA62C651 FOREIGN KEY (vin_id) REFERENCES vin (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE caracteristique ADD CONSTRAINT FK_D14FBE8BBA62C651 FOREIGN KEY (vin_id) REFERENCES vin (id)');
        $this->addSql('ALTER TABLE caracteristique ADD CONSTRAINT FK_D14FBE8BA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE cepage ADD CONSTRAINT FK_5B3E4D56BA62C651 FOREIGN KEY (vin_id) REFERENCES vin (id)');
        $this->addSql('ALTER TABLE cepage ADD CONSTRAINT FK_5B3E4D56B2639FE4 FOREIGN KEY (caracteristiques_id) REFERENCES caracteristique (id)');
        $this->addSql('ALTER TABLE favoris ADD CONSTRAINT FK_8933C432BA62C651 FOREIGN KEY (vin_id) REFERENCES vin (id)');
        $this->addSql('ALTER TABLE favoris ADD CONSTRAINT FK_8933C432A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE fiche_degustation ADD CONSTRAINT FK_41D4FE8FA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE jeux ADD CONSTRAINT FK_3755B50DA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE panier ADD CONSTRAINT FK_24CC0DF2A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE recette ADD CONSTRAINT FK_49BB6390BA62C651 FOREIGN KEY (vin_id) REFERENCES vin (id)');
        $this->addSql('ALTER TABLE recette ADD CONSTRAINT FK_49BB6390A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user_atelier ADD CONSTRAINT FK_B9B60629A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_atelier ADD CONSTRAINT FK_B9B6062982E2CF35 FOREIGN KEY (atelier_id) REFERENCES atelier (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE vin ADD CONSTRAINT FK_B108514187A94332 FOREIGN KEY (fiche_degustation_id) REFERENCES fiche_degustation (id)');
        $this->addSql('ALTER TABLE vin ADD CONSTRAINT FK_B1085141F77D927C FOREIGN KEY (panier_id) REFERENCES panier (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE atelier_vin DROP FOREIGN KEY FK_8CED1F3E82E2CF35');
        $this->addSql('ALTER TABLE atelier_vin DROP FOREIGN KEY FK_8CED1F3EBA62C651');
        $this->addSql('ALTER TABLE caracteristique DROP FOREIGN KEY FK_D14FBE8BBA62C651');
        $this->addSql('ALTER TABLE caracteristique DROP FOREIGN KEY FK_D14FBE8BA76ED395');
        $this->addSql('ALTER TABLE cepage DROP FOREIGN KEY FK_5B3E4D56BA62C651');
        $this->addSql('ALTER TABLE cepage DROP FOREIGN KEY FK_5B3E4D56B2639FE4');
        $this->addSql('ALTER TABLE favoris DROP FOREIGN KEY FK_8933C432BA62C651');
        $this->addSql('ALTER TABLE favoris DROP FOREIGN KEY FK_8933C432A76ED395');
        $this->addSql('ALTER TABLE fiche_degustation DROP FOREIGN KEY FK_41D4FE8FA76ED395');
        $this->addSql('ALTER TABLE jeux DROP FOREIGN KEY FK_3755B50DA76ED395');
        $this->addSql('ALTER TABLE panier DROP FOREIGN KEY FK_24CC0DF2A76ED395');
        $this->addSql('ALTER TABLE recette DROP FOREIGN KEY FK_49BB6390BA62C651');
        $this->addSql('ALTER TABLE recette DROP FOREIGN KEY FK_49BB6390A76ED395');
        $this->addSql('ALTER TABLE user_atelier DROP FOREIGN KEY FK_B9B60629A76ED395');
        $this->addSql('ALTER TABLE user_atelier DROP FOREIGN KEY FK_B9B6062982E2CF35');
        $this->addSql('ALTER TABLE vin DROP FOREIGN KEY FK_B108514187A94332');
        $this->addSql('ALTER TABLE vin DROP FOREIGN KEY FK_B1085141F77D927C');
        $this->addSql('DROP TABLE animations');
        $this->addSql('DROP TABLE atelier');
        $this->addSql('DROP TABLE atelier_vin');
        $this->addSql('DROP TABLE caracteristique');
        $this->addSql('DROP TABLE cepage');
        $this->addSql('DROP TABLE favoris');
        $this->addSql('DROP TABLE fiche_degustation');
        $this->addSql('DROP TABLE jeux');
        $this->addSql('DROP TABLE panier');
        $this->addSql('DROP TABLE recette');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_atelier');
        $this->addSql('DROP TABLE vin');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
