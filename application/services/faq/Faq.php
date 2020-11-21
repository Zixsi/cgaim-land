<?php

namespace App\services\faq;

use App\services\faq\entity\FaqEntity;
use App\services\faq\models\FaqModel;
use App\services\faq\repository\FaqRepository;
use App\services\faq\validators\FaqValidator;
use CI_Controller;
use Exception;

class Faq
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
     * @var FaqRepository
     */
    private $repository;
    
    /**
     * Faq
     */
    protected static $instance;

    /**
     * @return void
     */
    private function __construct()
    {
        $this->ci = &get_instance();
        $this->repository = FaqRepository::get();
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
    public function save(FaqEntity $item)
    {
        try {
            $validator = new FaqValidator();
           
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
     * @return FaqRepository
     */
    public function getRepository()
    {
        return $this->repository;
    }
    
    /**
     * @return FaqModel
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
