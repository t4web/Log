<?php

namespace T4web\Log\Domain\Log;

use T4webDomain\Entity;

class Log extends Entity
{
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
    
    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @return int
     */
    public function getScope()
    {
        return $this->scope;
    }

    /**
     * @return int
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * @return string
     */
    public function getCreatedDt()
    {
        return $this->createdDt;
    }
}
