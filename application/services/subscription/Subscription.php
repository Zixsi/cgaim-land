<?php

namespace App\services\subscription;

use App\services\subscription\entity\SubscriptionEntity;
use App\services\subscription\models\SubscriptionModel;
use App\services\subscription\repository\SubscriptionRepository;
use App\services\subscription\validators\SubscriptionValidator;
use CI_Controller;
use Exception;

class Subscription
{
    /**
     * @var CI_Controller
     */
    private $ci;
    
    /**
     * @var string
     */
    private $lastError;
    
    /**
     *
     * @var SubscriptionRepository
     */
    private $repository;
    
    /**
     * Subscription
     */
    protected static $instance;

    /**
     * @return void
     */
    private function __construct()
    {
        $this->ci = &get_instance();
        $this->repository = SubscriptionRepository::get();
    }

    /**
     * @return void
     */
    private function __clone() {}

    /**
     * @return self
     */
    public static function get()
    {
        if (self::$instance === null) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    /**
     * @return boolean
     */
    public function save(SubscriptionEntity $item)
    {
        try {
            $validator = new SubscriptionValidator();
           
            if ($validator->run($item->toArray()) === false) {
                throw new Exception($validator->getError());
            }
            
            $this->repository->save($item);
            
            return true;
        } catch (Exception $e) {
            $this->lastError = $e->getMessage();
        }

        return false;
    }
    
    /**
     * @return SubscriptionRepository
     */
    public function getRepository()
    {
        return $this->repository;
    }
    
    /**
     * @return SubscriptionModel
     */
    public function getModel()
    {
        return $this->repository->getModel();
    }

    /**
     * @return ?string
     */
    public function getLastError()
    {
        return $this->lastError;
    }
}
