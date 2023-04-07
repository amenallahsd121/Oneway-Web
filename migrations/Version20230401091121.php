<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230401091121 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE affectationopcolis DROP FOREIGN KEY fk_colisaff');
        $this->addSql('ALTER TABLE affectationopcolis DROP FOREIGN KEY fk_oppaff');
        $this->addSql('ALTER TABLE livraison DROP FOREIGN KEY livraison_ibfk_1');
        $this->addSql('ALTER TABLE livraison DROP FOREIGN KEY livraison_ibfk_2');
        $this->addSql('ALTER TABLE maintenance DROP FOREIGN KEY FK_maintenanceVehi');
        $this->addSql('ALTER TABLE participation DROP FOREIGN KEY fk_eventpart');
        $this->addSql('ALTER TABLE participation DROP FOREIGN KEY participation_ibfk_1');
        $this->addSql('ALTER TABLE reclamation DROP FOREIGN KEY reclamation_ibfk_1');
        $this->addSql('ALTER TABLE reponse DROP FOREIGN KEY reponse_ibfk_1');
        $this->addSql('ALTER TABLE vehicule DROP FOREIGN KEY FK_vehiculeCategorie');
        $this->addSql('DROP TABLE affectationopcolis');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE evenement');
        $this->addSql('DROP TABLE livraison');
        $this->addSql('DROP TABLE livreur');
        $this->addSql('DROP TABLE location');
        $this->addSql('DROP TABLE maintenance');
        $this->addSql('DROP TABLE opportinute');
        $this->addSql('DROP TABLE participation');
        $this->addSql('DROP TABLE reclamation');
        $this->addSql('DROP TABLE relais');
        $this->addSql('DROP TABLE reponse');
        $this->addSql('DROP TABLE vehicule');
        $this->addSql('ALTER TABLE colis RENAME INDEX id_client TO IDX_470BDFF9E173B1B8');
        $this->addSql('ALTER TABLE demande DROP FOREIGN KEY demande_ibfk_1');
        $this->addSql('ALTER TABLE demande DROP FOREIGN KEY demande_ibfk_2');
        $this->addSql('ALTER TABLE demande CHANGE DescriptionDemande descriptiondemande VARCHAR(225) NOT NULL, CHANGE IdOffre idoffre INT DEFAULT NULL, CHANGE IdColis idcolis INT DEFAULT NULL, CHANGE IdPersonne idpersonne INT DEFAULT NULL');
        $this->addSql('ALTER TABLE demande ADD CONSTRAINT FK_2694D7A5A51B81E2 FOREIGN KEY (idpersonne) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE demande ADD CONSTRAINT FK_2694D7A57983EA76 FOREIGN KEY (idoffre) REFERENCES offre (idoffre)');
        $this->addSql('ALTER TABLE demande ADD CONSTRAINT FK_2694D7A5910EB3E0 FOREIGN KEY (idcolis) REFERENCES colis (id_colis)');
        $this->addSql('ALTER TABLE demande RENAME INDEX demande_ibfk_3 TO IDX_2694D7A5A51B81E2');
        $this->addSql('ALTER TABLE demande RENAME INDEX idoffre TO IDX_2694D7A57983EA76');
        $this->addSql('ALTER TABLE demande RENAME INDEX idcolis TO IDX_2694D7A5910EB3E0');
        $this->addSql('ALTER TABLE offre CHANGE CatOffreId CatOffreId INT DEFAULT NULL, CHANGE IdTrajetOffre IdTrajetOffre INT DEFAULT NULL, CHANGE DescriptionOffre descriptionoffre VARCHAR(225) NOT NULL, CHANGE MaxRetard maxretard VARCHAR(158) NOT NULL, CHANGE DateOffre dateoffre VARCHAR(255) NOT NULL, CHANGE DateSortieOffre datesortieoffre VARCHAR(255) NOT NULL, CHANGE IdUser iduser INT DEFAULT NULL');
        $this->addSql('ALTER TABLE offre ADD CONSTRAINT FK_AF86866F6BD785B3 FOREIGN KEY (CatOffreId) REFERENCES Categorieoffre (idcatoffre)');
        $this->addSql('ALTER TABLE offre ADD CONSTRAINT FK_AF86866FCF882AC2 FOREIGN KEY (IdTrajetOffre) REFERENCES trajetoffre (idtrajetoffre)');
        $this->addSql('ALTER TABLE offre ADD CONSTRAINT FK_AF86866F5E5C27E9 FOREIGN KEY (iduser) REFERENCES utilisateur (id)');
        $this->addSql('CREATE INDEX IDX_AF86866F5E5C27E9 ON offre (iduser)');
        $this->addSql('ALTER TABLE offre RENAME INDEX categorieoffre TO IDX_AF86866F6BD785B3');
        $this->addSql('ALTER TABLE offre RENAME INDEX trajetoffre TO IDX_AF86866FCF882AC2');
        $this->addSql('DROP INDEX description ON trajetoffre');
        $this->addSql('DROP INDEX AddOffre ON trajetoffre');
        $this->addSql('ALTER TABLE trajetoffre CHANGE IdTrajetOffre idtrajetoffre INT AUTO_INCREMENT NOT NULL, CHANGE AddArriveOffre addarriveoffre VARCHAR(255) NOT NULL, CHANGE AddDepartOffre adddepartoffre VARCHAR(255) NOT NULL, CHANGE NbreEscaleOffre nbreescaleoffre INT NOT NULL, CHANGE nbreOffre nbreoffre INT NOT NULL, CHANGE description description VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE utilisateur CHANGE name name VARCHAR(50) NOT NULL, CHANGE lastname lastname VARCHAR(50) NOT NULL, CHANGE email email VARCHAR(50) NOT NULL, CHANGE adresse adresse VARCHAR(50) NOT NULL, CHANGE type type VARCHAR(50) NOT NULL, CHANGE password password VARCHAR(50) NOT NULL, CHANGE code code INT NOT NULL');
        $this->addSql('ALTER TABLE messenger_messages CHANGE delivered_at delivered_at DATETIME DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE affectationopcolis (id_aff INT AUTO_INCREMENT NOT NULL, id_opp INT NOT NULL, id_colis INT NOT NULL, INDEX fk_affOpp (id_opp), UNIQUE INDEX UK_colis (id_colis), PRIMARY KEY(id_aff)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE categorie (id_categorie INT AUTO_INCREMENT NOT NULL, type VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, PRIMARY KEY(id_categorie)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE evenement (id_event INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, description VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, date_debut_event VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, date_fin_event VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, awards VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, PRIMARY KEY(id_event)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE livraison (id_livraison INT AUTO_INCREMENT NOT NULL, id_colis INT NOT NULL, id_livreur INT NOT NULL, etat VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, INDEX livraison_ibfk_1 (id_colis), INDEX livraison_ibfk_2 (id_livreur), PRIMARY KEY(id_livraison)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE livreur (id_livreur INT AUTO_INCREMENT NOT NULL, cin_livreur VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, nom VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, prenom VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, vehicule VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, PRIMARY KEY(id_livreur)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE location (id INT AUTO_INCREMENT NOT NULL, adresse VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, Xaxe DOUBLE PRECISION NOT NULL, Yaxe DOUBLE PRECISION NOT NULL, id_relai INT NOT NULL, INDEX id_relai (id_relai), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE maintenance (id_maintenance INT AUTO_INCREMENT NOT NULL, id_vehicule INT NOT NULL, etat VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, nom_sos_rep VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, INDEX FK_maintenanceVehi (id_vehicule), PRIMARY KEY(id_maintenance)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE opportinute (id_opp INT AUTO_INCREMENT NOT NULL, date DATE NOT NULL, depart VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, heur_depart DOUBLE PRECISION NOT NULL, arrivee VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, heur_arrivee DOUBLE PRECISION NOT NULL, description VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, PRIMARY KEY(id_opp)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE participation (id_participation INT AUTO_INCREMENT NOT NULL, id_user INT NOT NULL, id_event INT NOT NULL, INDEX fk_participEvent (id_event), INDEX id_user (id_user), PRIMARY KEY(id_participation)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE reclamation (id_reclamation INT AUTO_INCREMENT NOT NULL, id_user INT NOT NULL, text_rec VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, sujet VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, INDEX id_user (id_user), PRIMARY KEY(id_reclamation)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE relais (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, lastname VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, email VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, adresse VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, city VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, number INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE reponse (id_reponse INT AUTO_INCREMENT NOT NULL, id_reclamation INT NOT NULL, text_rep VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, INDEX reponse_ibfk_1 (id_reclamation), PRIMARY KEY(id_reponse)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE vehicule (id_vehicule INT AUTO_INCREMENT NOT NULL, id_categorie INT NOT NULL, matricule VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, marque VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, INDEX FK_vehiculeCategorie (id_categorie), PRIMARY KEY(id_vehicule)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE affectationopcolis ADD CONSTRAINT fk_colisaff FOREIGN KEY (id_colis) REFERENCES colis (id_colis) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE affectationopcolis ADD CONSTRAINT fk_oppaff FOREIGN KEY (id_opp) REFERENCES opportinute (id_opp) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE livraison ADD CONSTRAINT livraison_ibfk_1 FOREIGN KEY (id_colis) REFERENCES colis (id_colis) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE livraison ADD CONSTRAINT livraison_ibfk_2 FOREIGN KEY (id_livreur) REFERENCES livreur (id_livreur) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE maintenance ADD CONSTRAINT FK_maintenanceVehi FOREIGN KEY (id_vehicule) REFERENCES vehicule (id_vehicule) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE participation ADD CONSTRAINT fk_eventpart FOREIGN KEY (id_event) REFERENCES evenement (id_event) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE participation ADD CONSTRAINT participation_ibfk_1 FOREIGN KEY (id_user) REFERENCES utilisateur (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reclamation ADD CONSTRAINT reclamation_ibfk_1 FOREIGN KEY (id_user) REFERENCES utilisateur (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reponse ADD CONSTRAINT reponse_ibfk_1 FOREIGN KEY (id_reclamation) REFERENCES reclamation (id_reclamation) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE vehicule ADD CONSTRAINT FK_vehiculeCategorie FOREIGN KEY (id_categorie) REFERENCES categorie (id_categorie) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE colis RENAME INDEX idx_470bdff9e173b1b8 TO id_client');
        $this->addSql('ALTER TABLE demande DROP FOREIGN KEY FK_2694D7A5A51B81E2');
        $this->addSql('ALTER TABLE demande DROP FOREIGN KEY FK_2694D7A57983EA76');
        $this->addSql('ALTER TABLE demande DROP FOREIGN KEY FK_2694D7A5910EB3E0');
        $this->addSql('ALTER TABLE demande CHANGE idpersonne IdPersonne INT DEFAULT 1 NOT NULL, CHANGE idoffre IdOffre INT NOT NULL, CHANGE idcolis IdColis INT NOT NULL, CHANGE descriptiondemande DescriptionDemande VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE demande ADD CONSTRAINT demande_ibfk_1 FOREIGN KEY (IdColis) REFERENCES colis (id_colis) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE demande ADD CONSTRAINT demande_ibfk_2 FOREIGN KEY (IdOffre) REFERENCES offre (IdOffre) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE demande RENAME INDEX idx_2694d7a5a51b81e2 TO demande_ibfk_3');
        $this->addSql('ALTER TABLE demande RENAME INDEX idx_2694d7a5910eb3e0 TO IdColis');
        $this->addSql('ALTER TABLE demande RENAME INDEX idx_2694d7a57983ea76 TO IdOffre');
        $this->addSql('ALTER TABLE messenger_messages CHANGE delivered_at delivered_at DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE offre DROP FOREIGN KEY FK_AF86866F6BD785B3');
        $this->addSql('ALTER TABLE offre DROP FOREIGN KEY FK_AF86866FCF882AC2');
        $this->addSql('ALTER TABLE offre DROP FOREIGN KEY FK_AF86866F5E5C27E9');
        $this->addSql('DROP INDEX IDX_AF86866F5E5C27E9 ON offre');
        $this->addSql('ALTER TABLE offre CHANGE iduser IdUser INT NOT NULL, CHANGE descriptionoffre DescriptionOffre VARCHAR(255) NOT NULL, CHANGE maxretard MaxRetard VARCHAR(255) NOT NULL, CHANGE dateoffre DateOffre VARCHAR(255) DEFAULT \'NULL\', CHANGE datesortieoffre DateSortieOffre VARCHAR(255) DEFAULT \'NULL\', CHANGE CatOffreId CatOffreId VARCHAR(255) NOT NULL, CHANGE IdTrajetOffre IdTrajetOffre VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE offre RENAME INDEX idx_af86866fcf882ac2 TO trajetOffre');
        $this->addSql('ALTER TABLE offre RENAME INDEX idx_af86866f6bd785b3 TO categorieOffre');
        $this->addSql('ALTER TABLE trajetoffre CHANGE idtrajetoffre IdTrajetOffre BIGINT AUTO_INCREMENT NOT NULL, CHANGE addarriveoffre AddArriveOffre VARCHAR(255) DEFAULT \'NULL\', CHANGE adddepartoffre AddDepartOffre VARCHAR(255) DEFAULT \'NULL\', CHANGE nbreescaleoffre NbreEscaleOffre INT DEFAULT NULL, CHANGE nbreoffre nbreOffre INT DEFAULT 0 NOT NULL, CHANGE description description VARCHAR(255) DEFAULT \'NULL\'');
        $this->addSql('CREATE UNIQUE INDEX description ON trajetoffre (description)');
        $this->addSql('CREATE UNIQUE INDEX AddOffre ON trajetoffre (AddArriveOffre, AddDepartOffre)');
        $this->addSql('ALTER TABLE utilisateur CHANGE name name VARCHAR(20) NOT NULL, CHANGE lastname lastname VARCHAR(20) NOT NULL, CHANGE email email VARCHAR(30) NOT NULL, CHANGE adresse adresse VARCHAR(30) NOT NULL, CHANGE type type VARCHAR(30) NOT NULL, CHANGE password password VARCHAR(20) NOT NULL, CHANGE code code INT DEFAULT NULL');
    }
}
