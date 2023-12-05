<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231205140833 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE adresse (id INT AUTO_INCREMENT NOT NULL, latitude DOUBLE PRECISION NOT NULL, longitude DOUBLE PRECISION NOT NULL, voie VARCHAR(255) NOT NULL, code_postal VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, region VARCHAR(255) NOT NULL, departement VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE disponibilites (id INT AUTO_INCREMENT NOT NULL, jours VARCHAR(255) NOT NULL, heure_debut TIME NOT NULL, heure_fin TIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE equipement (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, tarif DOUBLE PRECISION DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gite (id INT AUTO_INCREMENT NOT NULL, proprietaire_id INT NOT NULL, adresse_id INT NOT NULL, nom VARCHAR(255) NOT NULL, surface_hab INT NOT NULL, chambre INT NOT NULL, couchage INT NOT NULL, animauxacceptes TINYINT(1) NOT NULL, tarif_animaux DOUBLE PRECISION DEFAULT NULL, INDEX IDX_B638C92C76C50E4A (proprietaire_id), UNIQUE INDEX UNIQ_B638C92C4DE7DC5C (adresse_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gite_tarif_gite (gite_id INT NOT NULL, tarif_gite_id INT NOT NULL, INDEX IDX_BAEE902C652CAE9B (gite_id), INDEX IDX_BAEE902C164DDCDE (tarif_gite_id), PRIMARY KEY(gite_id, tarif_gite_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gite_equipement (gite_id INT NOT NULL, equipement_id INT NOT NULL, INDEX IDX_56A3B31A652CAE9B (gite_id), INDEX IDX_56A3B31A806F0F5C (equipement_id), PRIMARY KEY(gite_id, equipement_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gite_service (gite_id INT NOT NULL, service_id INT NOT NULL, INDEX IDX_1527AE9A652CAE9B (gite_id), INDEX IDX_1527AE9AED5CA9E6 (service_id), PRIMARY KEY(gite_id, service_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE periode (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, date_debut DATE NOT NULL, date_fin DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE periode_tarif_gite (periode_id INT NOT NULL, tarif_gite_id INT NOT NULL, INDEX IDX_BD75102FF384C1CF (periode_id), INDEX IDX_BD75102F164DDCDE (tarif_gite_id), PRIMARY KEY(periode_id, tarif_gite_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE proprietaire (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, telephone INT NOT NULL, email VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE proprietaire_disponibilites (proprietaire_id INT NOT NULL, disponibilites_id INT NOT NULL, INDEX IDX_63513CB876C50E4A (proprietaire_id), INDEX IDX_63513CB88E5CE2BF (disponibilites_id), PRIMARY KEY(proprietaire_id, disponibilites_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE service (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, tarif DOUBLE PRECISION DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tarif_gite (id INT AUTO_INCREMENT NOT NULL, tarif_hebdo DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE gite ADD CONSTRAINT FK_B638C92C76C50E4A FOREIGN KEY (proprietaire_id) REFERENCES proprietaire (id)');
        $this->addSql('ALTER TABLE gite ADD CONSTRAINT FK_B638C92C4DE7DC5C FOREIGN KEY (adresse_id) REFERENCES adresse (id)');
        $this->addSql('ALTER TABLE gite_tarif_gite ADD CONSTRAINT FK_BAEE902C652CAE9B FOREIGN KEY (gite_id) REFERENCES gite (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE gite_tarif_gite ADD CONSTRAINT FK_BAEE902C164DDCDE FOREIGN KEY (tarif_gite_id) REFERENCES tarif_gite (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE gite_equipement ADD CONSTRAINT FK_56A3B31A652CAE9B FOREIGN KEY (gite_id) REFERENCES gite (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE gite_equipement ADD CONSTRAINT FK_56A3B31A806F0F5C FOREIGN KEY (equipement_id) REFERENCES equipement (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE gite_service ADD CONSTRAINT FK_1527AE9A652CAE9B FOREIGN KEY (gite_id) REFERENCES gite (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE gite_service ADD CONSTRAINT FK_1527AE9AED5CA9E6 FOREIGN KEY (service_id) REFERENCES service (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE periode_tarif_gite ADD CONSTRAINT FK_BD75102FF384C1CF FOREIGN KEY (periode_id) REFERENCES periode (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE periode_tarif_gite ADD CONSTRAINT FK_BD75102F164DDCDE FOREIGN KEY (tarif_gite_id) REFERENCES tarif_gite (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE proprietaire_disponibilites ADD CONSTRAINT FK_63513CB876C50E4A FOREIGN KEY (proprietaire_id) REFERENCES proprietaire (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE proprietaire_disponibilites ADD CONSTRAINT FK_63513CB88E5CE2BF FOREIGN KEY (disponibilites_id) REFERENCES disponibilites (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE gite DROP FOREIGN KEY FK_B638C92C76C50E4A');
        $this->addSql('ALTER TABLE gite DROP FOREIGN KEY FK_B638C92C4DE7DC5C');
        $this->addSql('ALTER TABLE gite_tarif_gite DROP FOREIGN KEY FK_BAEE902C652CAE9B');
        $this->addSql('ALTER TABLE gite_tarif_gite DROP FOREIGN KEY FK_BAEE902C164DDCDE');
        $this->addSql('ALTER TABLE gite_equipement DROP FOREIGN KEY FK_56A3B31A652CAE9B');
        $this->addSql('ALTER TABLE gite_equipement DROP FOREIGN KEY FK_56A3B31A806F0F5C');
        $this->addSql('ALTER TABLE gite_service DROP FOREIGN KEY FK_1527AE9A652CAE9B');
        $this->addSql('ALTER TABLE gite_service DROP FOREIGN KEY FK_1527AE9AED5CA9E6');
        $this->addSql('ALTER TABLE periode_tarif_gite DROP FOREIGN KEY FK_BD75102FF384C1CF');
        $this->addSql('ALTER TABLE periode_tarif_gite DROP FOREIGN KEY FK_BD75102F164DDCDE');
        $this->addSql('ALTER TABLE proprietaire_disponibilites DROP FOREIGN KEY FK_63513CB876C50E4A');
        $this->addSql('ALTER TABLE proprietaire_disponibilites DROP FOREIGN KEY FK_63513CB88E5CE2BF');
        $this->addSql('DROP TABLE adresse');
        $this->addSql('DROP TABLE disponibilites');
        $this->addSql('DROP TABLE equipement');
        $this->addSql('DROP TABLE gite');
        $this->addSql('DROP TABLE gite_tarif_gite');
        $this->addSql('DROP TABLE gite_equipement');
        $this->addSql('DROP TABLE gite_service');
        $this->addSql('DROP TABLE periode');
        $this->addSql('DROP TABLE periode_tarif_gite');
        $this->addSql('DROP TABLE proprietaire');
        $this->addSql('DROP TABLE proprietaire_disponibilites');
        $this->addSql('DROP TABLE service');
        $this->addSql('DROP TABLE tarif_gite');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
