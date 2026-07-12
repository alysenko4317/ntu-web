<?php

namespace Controller\Api;

use Repository\BookRepository;

/**
 * REST API контролер для книг.
 *
 * GET    /api/books       — список усіх книг (з авторами)
 * GET    /api/books/{id}  — одна книга за ID
 * POST   /api/books       — створити книгу
 * PUT    /api/books/{id}  — оновити книгу
 * DELETE /api/books/{id}  — видалити книгу
 */
class BookApiController extends ApiController {

    private $repository;

    public function __construct() {
        $this->repository = new BookRepository();
    }

    /**
     * GET /api/books
     */
    public function index(): void {
        $books = $this->repository->getAll();
        $this->json($books);
    }

    /**
     * GET /api/books/{id}
     */
    public function show($id): void {
        $book = $this->repository->getByIdWithAuthors((int) $id);

        if (!$book) {
            $this->notFound("Book with id=$id not found");
            return;
        }

        $this->json($book);
    }

    /**
     * POST /api/books
     *
     * Очікує JSON: { "code": "...", "name": "...", "release_date": "..." }
     */
    public function store(): void {
        $data = $this->getJsonInput();

        if (empty($data['code']) || empty($data['name'])) {
            $this->badRequest('Fields "code" and "name" are required');
            return;
        }

        $id = $this->repository->create($data);
        $book = $this->repository->getByIdWithAuthors($id);

        $this->json($book, 201);
    }

    /**
     * PUT /api/books/{id}
     *
     * Очікує JSON: { "code": "...", "name": "...", "release_date": "..." }
     */
    public function update($id): void {
        $book = $this->repository->getById((int) $id);

        if (!$book) {
            $this->notFound("Book with id=$id not found");
            return;
        }

        $data = $this->getJsonInput();

        if (empty($data['code']) && empty($data['name'])) {
            $this->badRequest('At least "code" or "name" must be provided');
            return;
        }

        $this->repository->updateBook((int) $id, $data);
        $updated = $this->repository->getByIdWithAuthors((int) $id);

        $this->json($updated);
    }

    /**
     * DELETE /api/books/{id}
     */
    public function destroy($id): void {
        $book = $this->repository->getById((int) $id);

        if (!$book) {
            $this->notFound("Book with id=$id not found");
            return;
        }

        $this->repository->deleteBook((int) $id);
        $this->noContent();
    }
}
