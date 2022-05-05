<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    #[Route('/articles', name: 'articles')]
    public function listeArticles(ArticleRepository $articleRepository): Response
    {
        $lesArticles = $articleRepository->getArticles();
        return $this->render('article/index.html.twig', [
            'controller_name' => 'ArticleController',
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
}
