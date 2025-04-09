<?php
namespace App\DataFixtures;

use App\Entity\TennisBrand;
use App\Entity\TennisRacketModel;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TennisRacketModelFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $brandRepository = $manager->getRepository(TennisBrand::class);
        $babolat = $brandRepository->findOneBy(['name' => 'Babolat']);

        if (!$babolat) {
            $babolat = new TennisBrand();
            $babolat
                ->setName('Babolat')
                ->setLogoUrl('/img/babolat.svg')
                ->setCountryCode('FRA');
            $manager->persist($babolat);
        }

        $modelNames = ['Pure Aero', 'Pure Drive', 'Pure Strike'];

        foreach ($modelNames as $modelName) {
            $model = new TennisRacketModel();
            $model
                ->setName($modelName)
                ->setBrand($babolat);

            $manager->persist($model);
        }

        $manager->flush();
    }
}
