<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230626100114 extends AbstractMigration
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
        $this->addSql('DROP TABLE Aromes');
        $this->addSql('DROP TABLE user_atelier');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE Aromes (id INT AUTO_INCREMENT NOT NULL, Type TEXT CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE user_atelier (user_id INT NOT NULL, atelier_id INT NOT NULL, INDEX IDX_B9B6062982E2CF35 (atelier_id), INDEX IDX_B9B60629A76ED395 (user_id), PRIMARY KEY(user_id, atelier_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE user_atelier ADD CONSTRAINT FK_B9B6062982E2CF35 FOREIGN KEY (atelier_id) REFERENCES atelier (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_atelier ADD CONSTRAINT FK_B9B60629A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
    }
}
