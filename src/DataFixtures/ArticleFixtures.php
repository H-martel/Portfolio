<?php

namespace App\DataFixtures;

use App\Entity\Article;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ArticleFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        for ($i = 0; $i < 30; $i++) {

            $dateDebut = new DateTime("now");
            $dateDebut->modify('-2 years');
            $dateCreation = $dateDebut->modify('+ ' . $i * 15 . ' days');
            $article = new Article();
            $article->setTitre('Article n°' . $i);
            $article->setContenu('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse porta auctor mi, at finibus dui pulvinar eu. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vivamus vitae purus in arcu feugiat tempor. Mauris ac elementum eros. Aliquam vitae fringilla nibh, at fringilla ex. Ut ipsum quam, molestie nec est nec, suscipit molestie metus. Donec rutrum fermentum sapien. In nibh enim, pharetra eu interdum vel, feugiat ut eros. Nam volutpat egestas massa ac facilisis. Praesent nulla diam, feugiat id urna at, fringilla gravida diam. Nam nec eleifend sem.
            Morbi at lacus eu purus commodo cursus in nec ligula. Sed a risus laoreet, lacinia eros quis, finibus felis. Praesent sed est et felis feugiat cursus nec quis dolor. Interdum et malesuada fames ac ante ipsum primis in faucibus. Cras feugiat porttitor molestie. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nullam condimentum, sem ac viverra mattis, turpis nisl vulputate tellus, vel placerat orci lorem non enim. Proin a eros ut sem pulvinar consectetur eget vel nulla. In hac habitasse platea dictumst. Nam nunc tortor, posuere vel pulvinar porta, posuere nec sapien. In libero risus, varius non consectetur ac, blandit nec ante. Phasellus lacinia condimentum elit et dictum. Sed dictum justo non lectus lobortis accumsan. Etiam nec libero a arcu dapibus venenatis. Nam volutpat magna vitae tellus faucibus accumsan. Cras et quam vehicula, vehicula odio eu, placerat lectus.');
            $article->setPreviewContenu(substr($article->getContenu(), 0, 240) . '...');
            $article->setLienImage('https://picsum.photos/id/' . $i * 3 . '/300/200');
            $article->setDateCreation($dateCreation);
            $article->setNomPdf('devOps');
            $manager->persist($article);
        }
        $manager->flush();
    }
}
