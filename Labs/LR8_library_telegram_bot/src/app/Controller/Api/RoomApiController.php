<?php

namespace Controller\Api;

use Repository\RoomRepository;

/**
 * REST API контролер для залів бібліотеки.
 *
 * GET /api/rooms — список усіх залів
 */
class RoomApiController extends ApiController {

    private $repository;

    public function __construct() {
        $this->repository = new RoomRepository();
    }

    /**
     * GET /api/rooms
     */
    public function index(): void {
        $rooms = $this->repository->getAll();
        $this->json($rooms);
    }
}
