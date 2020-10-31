<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\BookRepository;

class BookController extends AbstractController
{
    private $bookRepository;

    public function __construct(BookRepository $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    /**
     * @Route("/admin/book", name="admin_book")
     */
    public function index(): Response
    {
        return $this->render('admin/book/index.html.twig', [
            'books' => $this->bookRepository->findAll(),
        ]);
    }

    /**
     * @Route("/admin/book/edit/{id}", name="admin_book_edit")
     */
    public function edit($id): Response
    {
        $book = $this->bookRepository->find($id);

        return $this->render('admin/book/edit.html.twig', [
            'book' => $book,
        ]);
    }
}
