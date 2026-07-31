<?php

namespace app\components;
use yii\base\BootstrapInterface;

class LanguageSelector implements BootstrapInterface
{
    public $supportedLanguages = [];
    
    public function bootstrap($app)
    {
      if(empty($app->request->cookies['language'])){
        $languageCookie = new \yii\web\Cookie([
          'name' => 'language',
          'value' => 'ID',
          'expire' => time() + 60 * 60 * 24 * 30, // 30 days
        ]);
        $app->response->cookies->add($languageCookie);
      }
    }
}