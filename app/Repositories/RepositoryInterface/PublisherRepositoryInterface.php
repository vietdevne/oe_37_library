<?php

namespace App\Repositories\RepositoryInterface;

interface PublisherRepositoryInterface
{
    public function getWithKey($key);
    public function getRandomPublisher();
    public function getBook($pubId);
}
