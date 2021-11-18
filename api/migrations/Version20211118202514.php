<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211118202514 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE greeting_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE friendship_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE friendship (id INT NOT NULL, "userId" INT NOT NULL, "friendId" INT NOT NULL, "initiatorId" INT NOT NULL, "status" VARCHAR(10) NOT NULL, "createdAt" TIMESTAMP(0) WITH TIME ZONE NOT NULL, "updatedAt" TIMESTAMP(0) WITH TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN friendship."createdAt" IS \'(DC2Type:datetimetz_immutable)\'');
        $this->addSql('COMMENT ON COLUMN friendship."updatedAt" IS \'(DC2Type:datetimetz_immutable)\'');
        $this->addSql('CREATE TABLE posts (id INT NOT NULL, "userId" INT NOT NULL, title VARCHAR(255) NOT NULL, body TEXT NOT NULL, "createdAt" TIMESTAMP(0) WITH TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN posts."createdAt" IS \'(DC2Type:datetimetz_immutable)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE friendship_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE greeting_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('DROP TABLE friendship');
        $this->addSql('DROP TABLE posts');
    }
}
