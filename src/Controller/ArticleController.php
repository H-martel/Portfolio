<?php

namespace App\Controller;
use App\Entity\Article;
use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;





class ArticleController extends AbstractController
{
    #[Route('/articles', name: 'articles')]
    public function listeArticles(ArticleRepository $articleRepository): Response
    {
        $lesArticles = $articleRepository->getArticles();
        return $this->render('article/index.html.twig', [
            'lesArticles' => $lesArticles
        ]);
    }

    #[Route('/article/{id}', name: 'vue_article')]
    public function vueArticle(ArticleRepository $articleRepository, int $id): Response
    {
        $article = $articleRepository->getArticleById($id);
        return $this->render('article/vue_article.html.twig', [
            'article' => $article,
        ]);
    }

    #[Route('/articles/nouveau', name: 'nouveau')]
    public function ajoutArticle(ArticleRepository $articleRepository): Response
    {
                // creates a task object and initializes some data for this example
                $article = new Article;        
                $form = $this->createFormBuilder($article)
                ->add('titre', TextType::class)
                ->add('contenu', TextareaType::class)
                ->add('lienImage', FileType::class, ['label' =>'Image'])
                ->add('nomPdf', FileType::class, ['label' => 'Pdf'])
                ->add('save', SubmitType::class, ['label' => 'Créer l\'article'])
                    ->getForm();

        return $this->render('article/ajouter_article.html.twig',[
            'form' => $form->createView(),
        ]);
    }

}

