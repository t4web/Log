<?php

namespace T4web\Log\Domain\Log;

use T4webDomain\Entity;

class Log extends Entity
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
     * @var string
     */
    protected $message;

    /**
     * @var int
     */
    protected $scope;

    /**
     * @var int
     */
    protected $priority;

    /**
     * @var string
     */
    protected $extras;

    /**
     * @var string
     */
    protected $createdDt;

    public function populate(array $array = [])
    {
        if ($this->id === null && empty($array['id'])) {
            if (empty($array['createdDt'])) {
                $array['createdDt'] = date('Y-m-d H:i:s.u');
            }
        }

        if (isset($array['extras']) && is_array($array['extras'])) {
            $array['extras'] = json_encode($array['extras']);
        }

        return parent::populate($array);
    }
}