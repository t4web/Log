<?php

namespace T4web\Log;

use T4webDomainInterface\Infrastructure\RepositoryInterface;
use T4web\Log\Domain\Log\Log;

class Logger
{
    /**
     * @var RepositoryInterface
     */
    private $repository;

    /**
     * @var array
     */
    private $scopes;

    /**
     * Logger constructor.
     * @param RepositoryInterface $repository
     * @param array $scopes
     */
    public function __construct(
        RepositoryInterface $repository,
        array $scopes
    )
    {
        $this->repository = $repository;
        $this->scopes = $scopes;
    }

    /**
     * @param string $scope
     * @param $message
     * @param int $priority
     * @param array $extras
     */
    public function log($scope, $message, $priority = Log::PRIORITY_INFO, $extras = [])
    {
        $scopeId = array_search($scope, $this->scopes);

        if ($scopeId === false) {
            $scopeId = 1;
        }

        $this->repository->add(new Log([
            'message' => substr($message, 0, 300),
            'scope' => $scopeId,
            'priority' => $priority,
            'extras' => $extras,
        ]));
    }
}