<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230604170513 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user ADD email VARCHAR(180) NOT NULL, ADD roles JSON NOT NULL, ADD name VARCHAR(255) NOT NULL, ADD firstname VARCHAR(255) NOT NULL, ADD street VARCHAR(255) NOT NULL, ADD streetnumber INT NOT NULL, ADD postalcode INT NOT NULL, ADD city VARCHAR(255) NOT NULL, ADD birthdate DATE NOT NULL, ADD phone VARCHAR(255) NOT NULL, ADD degustation TINYINT(1) DEFAULT NULL, DROP nom, DROP prenom');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E7927C74 ON user (email)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX UNIQ_8D93D649E7927C74 ON user');
        $this->addSql('ALTER TABLE user ADD nom VARCHAR(255) NOT NULL, ADD prenom VARCHAR(255) NOT NULL, DROP email, DROP roles, DROP name, DROP firstname, DROP street, DROP streetnumber, DROP postalcode, DROP city, DROP birthdate, DROP phone, DROP degustation');
    }
}
