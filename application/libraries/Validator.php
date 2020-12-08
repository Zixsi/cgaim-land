<?php

namespace App\libraries;

class Validator extends \Valitron\Validator
{
    /**
     * @return void
     */
    public function __construct()
    {
        parent::__construct([], [], 'ru');
    }
    
    /**
     * @param array $data
     */
    public function setData($data)
    {
        $this->_fields = $data;
        $this->_errors = [];
    }

    /**
     * @param ?string $prefix
     * @param ?string $sufix
     * @return string
     */
    public function getStringErrors($prefix = null, $sufix = null)
    {
        $result = [];
        $errors = $this->errors();
        foreach ($errors as $row) {
            $result[] = $prefix . current($row) . $sufix;
        }

        return implode("\n", $result);
    }

    /**
     * @return ?string
     */
    public function getError()
    {
        $errors = $this->errors();
        
        foreach ($errors as $row) {
            return current($row);
        }

        return null;
    }
    
    /**
     * @param string $lang
     * @throws \InvalidArgumentException
     */
    public function setLang($lang)
    {
        $lang = $lang ?: static::lang();
        $langDir = $langDir ?: static::langDir();
        $langFile = rtrim($langDir, '/') . '/' . $lang . '.php';
        
        if (stream_resolve_include_path($langFile)) {
            $langMessages = include $langFile;
            static::$_ruleMessages = array_merge(static::$_ruleMessages, $langMessages);
        } else {
            throw new \InvalidArgumentException("Fail to load language file '" . $langFile . "'");
        }
    }
}
