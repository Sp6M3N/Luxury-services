<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190711114018 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_1483A5E9E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE candidats CHANGE has_a_passport has_a_passport TINYINT(1) NOT NULL, CHANGE availability availability TINYINT(1) NOT NULL, CHANGE user_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE candidats ADD CONSTRAINT FK_3C663B15A76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE candidatures DROP created_date');
        $this->addSql('ALTER TABLE candidatures RENAME INDEX job_offer_id TO IDX_DE57CF663481D195');
        $this->addSql('ALTER TABLE job_offers CHANGE client_id client_id INT DEFAULT NULL, CHANGE job_category_id job_category_id INT DEFAULT NULL, CHANGE is_activated is_activated TINYINT(1) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE candidats DROP FOREIGN KEY FK_3C663B15A76ED395');
        $this->addSql('DROP TABLE users');
        $this->addSql('ALTER TABLE candidats CHANGE user_id user_id INT NOT NULL, CHANGE has_a_passport has_a_passport TINYINT(1) DEFAULT \'0\' NOT NULL, CHANGE availability availability TINYINT(1) DEFAULT \'0\' NOT NULL');
        $this->addSql('ALTER TABLE candidatures ADD created_date DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL');
        $this->addSql('ALTER TABLE candidatures RENAME INDEX idx_de57cf663481d195 TO job_offer_id');
        $this->addSql('ALTER TABLE job_offers CHANGE client_id client_id INT NOT NULL, CHANGE job_category_id job_category_id INT NOT NULL, CHANGE is_activated is_activated TINYINT(1) DEFAULT \'0\' NOT NULL');
    }
}
