<?php

namespace Controller\Api;

use Repository\ReaderRepository;

/**
 * REST API контролер для читачів (readers).
 *
 * GET /api/readers       — список усіх читачів
 * GET /api/readers/{id}  — один читач за ID
 */
class ReaderApiController extends ApiController {

    private $repository;

    public function __construct() {
        $this->repository = new ReaderRepository();
    }

    /**
     * GET /api/readers
     */
    public function index(): void {
        $readers = $this->repository->getAll();
        $this->json($readers);
    }

    /**
     * GET /api/readers/{id}
     */
    public function show($id): void {
        $reader = $this->repository->getById((int) $id);

        if (!$reader) {
            $this->notFound("Reader with id=$id not found");
            return;
        }

        $this->json($reader);
    }
}
