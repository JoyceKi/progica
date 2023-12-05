<?php

namespace App\DataFixtures;

use App\Entity\Gite;
use App\Entity\Adresse;
use App\Entity\Service;
use App\Entity\Equipement;
use App\Entity\Proprietaire;
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
            $proprietaire->setNom("Kim");
            $proprietaire->setPrenom("Joyce");
            $proprietaire->setTelephone("0123456789");
            $proprietaire->setEmail("exemple@exemple.com");
            $manager->persist($proprietaire);
            $proprietaires[] = $proprietaire;
        }
        // je flush les propriétaires avant de les associer avec les gîtes
        $manager->flush();

        foreach ($proprietaires as $proprietaire) {
            for ($i = 0; $i < 2; $i++) {
                $gite = new Gite();
                // les attributs des gîtes
                $gite->setNom("Nuage");
                $gite->setChambre(3);
                $gite->setCouchage(5);
                $gite->setSurfaceHab(70);
                $gite->setAnimauxacceptes(1);
                $gite->setTarifAnimaux(25);
                
                // associer le gîte au propriétaire
                $gite->setProprietaire($proprietaire);

                // j'ajoute des équipements dans la boucle pour qu'ils soient associés aux gîtes
                $equipement = new Equipement();
                $equipement->setNom("Lave-vaisselle");
                $equipement->setDescription("8 couverts");
                $equipement->setTarif(0.0);

                $manager->persist($equipement);
                $gite->addEquipement($equipement);

                // j'ajoute des services
                $service = new Service();
                $service->setNom("Location de linge");
                $service->setDescription("Draps, serviettes de bain, serviettes de toilette");
                $service->setTarif(15);
                $manager->persist($service);
                $gite->addService($service);

                $adresse = new Adresse();
                $adresse->setVoie("Lieu-dit Le Layon");
                $adresse->setCodePostal("49750");
                $adresse->setVille("Val du Layon");
                $adresse->setDepartement("Maine et Loire");
                $adresse->setRegion("Pays de la Loire");
                $adresse->setLatitude(455);
                $adresse->setLongitude(460);
                $manager->persist($adresse);
                $gite->setAdresse($adresse);

                $manager->persist($gite);              
            }
        }
        // Après avoir tout ajouté, je flush les données dans la bdd
        $manager->flush();
    }
}
