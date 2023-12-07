<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231206124843 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE tarif_periode (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, dates VARCHAR(255) NOT NULL, tarif DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tarif_periode_gite (tarif_periode_id INT NOT NULL, gite_id INT NOT NULL, INDEX IDX_63762195A269C42D (tarif_periode_id), INDEX IDX_63762195652CAE9B (gite_id), PRIMARY KEY(tarif_periode_id, gite_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE tarif_periode_gite ADD CONSTRAINT FK_63762195A269C42D FOREIGN KEY (tarif_periode_id) REFERENCES tarif_periode (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tarif_periode_gite ADD CONSTRAINT FK_63762195652CAE9B FOREIGN KEY (gite_id) REFERENCES gite (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE gite_tarif_gite DROP FOREIGN KEY FK_BAEE902C164DDCDE');
        $this->addSql('ALTER TABLE gite_tarif_gite DROP FOREIGN KEY FK_BAEE902C652CAE9B');
        $this->addSql('ALTER TABLE periode_tarif_gite DROP FOREIGN KEY FK_BD75102FF384C1CF');
        $this->addSql('ALTER TABLE periode_tarif_gite DROP FOREIGN KEY FK_BD75102F164DDCDE');
        $this->addSql('DROP TABLE gite_tarif_gite');
        $this->addSql('DROP TABLE periode');
        $this->addSql('DROP TABLE periode_tarif_gite');
        $this->addSql('DROP TABLE tarif_gite');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE gite_tarif_gite (gite_id INT NOT NULL, tarif_gite_id INT NOT NULL, INDEX IDX_BAEE902C652CAE9B (gite_id), INDEX IDX_BAEE902C164DDCDE (tarif_gite_id), PRIMARY KEY(gite_id, tarif_gite_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE periode (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, date_debut DATE NOT NULL, date_fin DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE periode_tarif_gite (periode_id INT NOT NULL, tarif_gite_id INT NOT NULL, INDEX IDX_BD75102FF384C1CF (periode_id), INDEX IDX_BD75102F164DDCDE (tarif_gite_id), PRIMARY KEY(periode_id, tarif_gite_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE tarif_gite (id INT AUTO_INCREMENT NOT NULL, tarif_hebdo DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE gite_tarif_gite ADD CONSTRAINT FK_BAEE902C164DDCDE FOREIGN KEY (tarif_gite_id) REFERENCES tarif_gite (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE gite_tarif_gite ADD CONSTRAINT FK_BAEE902C652CAE9B FOREIGN KEY (gite_id) REFERENCES gite (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE periode_tarif_gite ADD CONSTRAINT FK_BD75102FF384C1CF FOREIGN KEY (periode_id) REFERENCES periode (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE periode_tarif_gite ADD CONSTRAINT FK_BD75102F164DDCDE FOREIGN KEY (tarif_gite_id) REFERENCES tarif_gite (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tarif_periode_gite DROP FOREIGN KEY FK_63762195A269C42D');
        $this->addSql('ALTER TABLE tarif_periode_gite DROP FOREIGN KEY FK_63762195652CAE9B');
        $this->addSql('DROP TABLE tarif_periode');
        $this->addSql('DROP TABLE tarif_periode_gite');
    }
}
