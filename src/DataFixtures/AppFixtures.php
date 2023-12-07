<?php

namespace App\DataFixtures;

use DateTime;
use App\Entity\Gite;
use App\Entity\Adresse;
use App\Entity\Periode;
use App\Entity\Service;
use App\Entity\TarifGite;
use App\Entity\Equipement;
use App\Entity\Proprietaire;
use App\Entity\Disponibilites;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // création de propriétaires
        $proprietaires = [];
        for ($i = 0; $i < 5; $i++) {
            $proprietaire = new Proprietaire();
            $proprietaire->setNom("Danton");
            $proprietaire->setPrenom("Frédéric");
            $proprietaire->setTelephone("0126456789");
            $proprietaire->setEmail("example@example.com");
            $manager->persist($proprietaire);
            $proprietaires[] = $proprietaire;
        }
        // je flush les propriétaires avant de les associer avec les gîtes
        $manager->flush();

        foreach ($proprietaires as $proprietaire) {
            for ($i = 0; $i < 2; $i++) {
                $gite = new Gite();
                // les attributs des gîtes
                $gite->setNom("Sagoa");
                $gite->setChambre(2);
                $gite->setCouchage(4);
                $gite->setSurfaceHab(90);
                $gite->setAnimauxacceptes(0);
                $gite->setTarifAnimaux(0.0);
                
                // associer le gîte au propriétaire
                $gite->setProprietaire($proprietaire);

                // j'ajoute des équipements dans la boucle pour qu'ils soient associés aux gîtes
                $equipement = new Equipement();
                $equipement->setNom("Lave-linge");
                $equipement->setDescription("7 kg");
                $equipement->setTarif(0.0);

                $manager->persist($equipement);
                $gite->addEquipement($equipement);

                // j'ajoute des services
                $service = new Service();
                $service->setNom("Ménage de fin de séjour");
                $service->setDescription("Poussière, aspirateur, sanitaires, poubelles");
                $service->setTarif(35);
                $manager->persist($service);
                $gite->addService($service);

                // j'ajoute les adresses
                $adresse = new Adresse();
                $adresse->setVoie("Rue du Pays");
                $adresse->setCodePostal("35500");
                $adresse->setVille("Vitré");
                $adresse->setDepartement("Ille et Vilaine");
                $adresse->setRegion("Bretagne");
                $adresse->setLatitude(48.133);
                $adresse->setLongitude(-1.2);
                $manager->persist($adresse);
                $gite->setAdresse($adresse);

                // j'ajoute les tarifs
                // $tarif = new TarifGite();
                // $tarif->setTarifHebdo(550);
                // $manager->persist($tarif);
                // $gite->addTarifGite($tarif);

                $manager->persist($gite);  
                // j'ajoute les disponibilités et les associe aux propriétaires
                $dispo = new Disponibilites();
                $dispo->setJours("Du lundi au vendredi");

                // Création d'un objet DateTime pour heureDebut
                $heureDebut = DateTime::createFromFormat('H:i', '09:00');
                // j'utilise l'objet $heureDebut 
                $dispo->setHeureDebut($heureDebut);

                // Création d'un objet DateTime pour heureFin
                $heureFin = DateTime::createFromFormat('H:i', '18:00');
                // j'utilise l'objet $heureFin 
                $dispo->setHeureFin($heureFin);
                $proprietaire->addDisponibilite($dispo);
                $manager->persist($dispo);

            }
        }

        // j'ajoute les périodes et les associe aux tarifs de gîtes
        // $periode = new Periode();
        // $periode->setNom("Haute saison");

        // Création objets DateTime pour dateDebut et dateFin
        // $dateDebut = DateTime::createFromFormat('Y-m-d', '2024-06-15');
        // $periode->setDateDebut($dateDebut);

        // $dateFin = DateTime::createFromFormat('Y-m-d', '2024-09-30');
        // $periode->setDateFin($dateFin);
        // $tarif->addPeriode($periode);
        // $manager->persist($periode);
        
        // Après avoir tout ajouté, je flush les données dans la bdd
        $manager->flush();
    }
}
