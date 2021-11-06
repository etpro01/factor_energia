<?php

namespace app\components;


use linslin\yii2\curl\Curl;
use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;

/**
 * Class StackApp
 * @package app\components
 *
 * commponent for connect with stackexchange
 */
class StackApp extends Component
{

    /**
     * Default url. It is not possible to change it
     * @var string
     */
    private $url = 'https://api.stackexchange.com';
    /***
     * Defaul version
     * @var string
     */
    private $version = '2.3';

    /**
     * Section in stackexchange example 'questions'
     * @var string
     */
    private $section = '';

    /**
     * Default params
     * @var array
     */
    private $params = [
        'order' => 'desc',
        'sort' => 'activity',
        'filter' => 'default',
        'site' => 'stackoverflow'
    ];

    /**
     * Format types
     * @var array
     */
    private $formats = [
        'todate' => 'timestamp',
        'fromdate' => 'timestamp',
        'max' => 'timestamp',
        'min' => 'timestamp',
    ];

    /**
     * @return static
     */
    public static function app(){
        return new static();
    }

    /**
     * @return string
     */
    public function getVersion(){
        return $this->version;
    }

    /**
     * @param $version
     * @return $this
     */
    public function setVersion($version){
        $this->version = $version;
        return $this;
    }

    /**
     * @return string
     */
    public function getSection(){
        return $this->section;
    }

    /**
     * @param $section
     * @return $this
     */
    public function setSection($section){
        $this->section = $section;
        return $this;
    }

    /**
     * @return string
     */
    public function getUrl(){
        return $this->url.'/'.$this->version.'/'.$this->section;
    }

    /**
     * @return array
     */
    public function getParams(){
        foreach(Yii::$app->request->get() as $key => $value){
            $this->params[$key] = $this->evalParamFormat($key, $value);
        }

        return $this->params;
    }

    public function evalParamFormat($key, $value){
        $type = isset($this->formated[$key]) ? $this->formated[$key] : null;
        $method = 'type'.ucfirst($type);
        return ($type and method_exists($this, $method)) ? $method($type) : $value;
    }

    public function typeTimestamp($value){
        return strtotime($value);
    }

    public function getData(){

        $curl = new Curl();
        $curl->setOption(CURLOPT_SSL_VERIFYPEER,false);
        $curl->setOption(CURLOPT_ENCODING,'gzip');
        $curl->setGetParams($this->getParams());
        $response = $curl->get($this->getUrl());

        if ($curl->errorCode === null) {
            return json_decode($response, true);

        } else {
            return [
                'code' => $curl->errorCode,
                'error' => $curl->errorText,
                'url' => $curl->getUrl()
            ];
        }
    }



}