<?php

namespace App\DataFixtures;

use App\Entity\Cours;
use App\Entity\Niveau;
use App\Entity\Professeur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Créer des professeurs
        $professeurs = [];
        for ($i = 1; $i <= 10; $i++) {
            $professeur = new Professeur();
            $professeur->setNom("NomProfesseur" . $i);
            $professeur->setPrenom("PrenomProfesseur" . $i);

            $manager->persist($professeur);
            $professeurs[] = $professeur;
        }

        // Créer des niveaux
        $niveaux = [];
        for ($i = 1; $i <= 5; $i++) {
            $niveau = new Niveau();
            $niveau->setNom("Niveau " . $i);

            $manager->persist($niveau);
            $niveaux[] = $niveau;
        }

        // Créer des cours et les associer aux niveaux et aux professeurs
        for ($i = 1; $i <= 20; $i++) {
            $cours = new Cours();
            $cours->setModule("Module " . $i); // Exemple : "Module 1", "Module 2", etc.
            $cours->setNiveau($niveaux[$i % count($niveaux)]); // Répartit les cours sur les niveaux
            $cours->setProfesseur($professeurs[$i % count($professeurs)]); // Répartit les cours sur les professeurs

            $manager->persist($cours);
        }

        $manager->flush();
    }
}
