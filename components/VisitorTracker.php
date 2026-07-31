<?php
// components/VisitorTracker.php
namespace app\components;

use Yii;
use yii\base\Component;
use app\models\SiteVisitor;

class VisitorTracker extends Component
{
    // public function init()
    // {
    //     parent::init();
    //     $this->trackVisit();
    // }
    
    // private function trackVisit()
    // {
    //     $ip_address = Yii::$app->request->userIP;
    //     $user_agent = Yii::$app->request->userAgent;
    //     $page_url = Yii::$app->request->url;
    //     $session_id = Yii::$app->session->id;
        
    //     // Jangan track untuk bot atau IP internal
    //     if (!$this->isBot($user_agent) && $ip_address) {
    //         SiteVisitor::recordVisit($ip_address, $user_agent, $page_url, $session_id);
    //     }
    // }
    
    // private function isBot($user_agent)
    // {
    //     $bots = ['bot', 'crawler', 'spider', 'google', 'bing', 'yahoo'];
    //     $user_agent = strtolower($user_agent);
        
    //     foreach ($bots as $bot) {
    //         if (strpos($user_agent, $bot) !== false) {
    //             return true;
    //         }
    //     }
        
    //     return false;
    // }
}
?>