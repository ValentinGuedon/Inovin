<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230626102806 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE blog (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, date DATE NOT NULL, description VARCHAR(255) NOT NULL, text LONGTEXT NOT NULL, image VARCHAR(255) DEFAULT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profil (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, image VARCHAR(255) DEFAULT NULL, updated_at DATETIME DEFAULT NULL, slug VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reset_password_request (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, selector VARCHAR(20) NOT NULL, hashed_token VARCHAR(100) NOT NULL, requested_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', expires_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_7CE748AA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE reset_password_request ADD CONSTRAINT FK_7CE748AA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user_atelier DROP FOREIGN KEY FK_B9B6062982E2CF35');
        $this->addSql('ALTER TABLE user_atelier DROP FOREIGN KEY FK_B9B60629A76ED395');
        $this->addSql('DROP TABLE Aromes');
        $this->addSql('DROP TABLE user_atelier');
        $this->addSql('ALTER TABLE atelier ADD slug VARCHAR(255) DEFAULT NULL, DROP address, DROP horaire, DROP id_animations');
        $this->addSql('ALTER TABLE user ADD profil_id INT DEFAULT NULL, ADD slug VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649275ED078 FOREIGN KEY (profil_id) REFERENCES profil (id)');
        $this->addSql('CREATE INDEX IDX_8D93D649275ED078 ON user (profil_id)');
        $this->addSql('ALTER TABLE vin ADD profil_id INT DEFAULT NULL, ADD slug VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE vin ADD CONSTRAINT FK_B1085141275ED078 FOREIGN KEY (profil_id) REFERENCES profil (id)');
        $this->addSql('CREATE INDEX IDX_B1085141275ED078 ON vin (profil_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649275ED078');
        $this->addSql('ALTER TABLE vin DROP FOREIGN KEY FK_B1085141275ED078');
        $this->addSql('CREATE TABLE Aromes (id INT AUTO_INCREMENT NOT NULL, Type TEXT CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE user_atelier (user_id INT NOT NULL, atelier_id INT NOT NULL, INDEX IDX_B9B6062982E2CF35 (atelier_id), INDEX IDX_B9B60629A76ED395 (user_id), PRIMARY KEY(user_id, atelier_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE user_atelier ADD CONSTRAINT FK_B9B6062982E2CF35 FOREIGN KEY (atelier_id) REFERENCES atelier (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_atelier ADD CONSTRAINT FK_B9B60629A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reset_password_request DROP FOREIGN KEY FK_7CE748AA76ED395');
        $this->addSql('DROP TABLE blog');
        $this->addSql('DROP TABLE profil');
        $this->addSql('DROP TABLE reset_password_request');
        $this->addSql('ALTER TABLE atelier ADD address VARCHAR(255) NOT NULL, ADD horaire VARCHAR(255) NOT NULL, ADD id_animations INT NOT NULL, DROP slug');
        $this->addSql('DROP INDEX IDX_8D93D649275ED078 ON user');
        $this->addSql('ALTER TABLE user DROP profil_id, DROP slug');
        $this->addSql('DROP INDEX IDX_B1085141275ED078 ON vin');
        $this->addSql('ALTER TABLE vin DROP profil_id, DROP slug');
    }
}
