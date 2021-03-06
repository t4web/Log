<?php

namespace T4web\Log;

use T4webDomainInterface\Infrastructure\RepositoryInterface;
use T4web\Log\Domain\Log\Log;

class Logger
{
    const PRIORITY_EMERG = 1;
    const PRIORITY_ALERT = 2;
    const PRIORITY_CRIT = 3;
    const PRIORITY_ERR = 4;
    const PRIORITY_WARN = 5;
    const PRIORITY_NOTICE = 6;
    const PRIORITY_INFO = 7;
    const PRIORITY_DEBUG = 8;

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
    public function log($scope, $message, $priority = self::PRIORITY_INFO, $extras = [])
    {
        $scope = strtolower($scope);
        $scopeId = 1;

        if (isset($this->scopes[$scope])) {
            $scopeId = $this->scopes[$scope];
        }

        $this->repository->add(new Log([
            'message' => substr($message, 0, 300),
            'scope' => $scopeId,
            'priority' => $priority,
            'extras' => $extras,
        ]));
    }
}