<?php

namespace App\Controller;

use App\Entity\Books;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\BooksRepository;
use Symfony\Component\HttpFoundation\Request;

class BooksController extends AbstractController
{
    /**
     * @Route("/books", name="books")
     */
    public function index(): Response
    {
        return $this->render('books/index.html.twig', [
            'controller_name' => 'BooksController',
        ]);
    }

    /**
     * @Route("/books/list/{category_id}", name="books_list")
     */
    public function list(Request $request, $category_id): JsonResponse
    {
        $list = [];
        $repository = $this->getDoctrine()->getRepository(Books::class);
        $books = $repository->findBy(['category_id' => $category_id]);
        foreach ($books as $bk) {
            $list[] = [
                'id' => $bk->getId(),
                'title' => $bk->getTitle(),
                'price' => $bk->getPrice(),
                'image' => "http://localhost/book_store/public/images/" . $bk->getImage(),
                'author' => $bk->getAuthor(),
                'description' => $bk->getDescription()
            ];
        }
        return new JsonResponse(
            ['data' => $list]
        );
    }
}
