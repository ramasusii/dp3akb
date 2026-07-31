<?php
namespace app\components;
use Yii;
use yii\base\Component;

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Messaging\CloudMessage;
// use Kreait\Firebase\Messaging\TopicManagement;
use Kreait\Firebase\Messaging\TopicManagementClient;

class FirebaseMessaging extends Component
{

    public function sendMessage()
    {
      try {
      $deviceToken = 'dMlKDYEoQ7WFfIAwHzN8YX:APA91bGVF0xcLtLQFDaoZrKANs1gmFzvriqRDvi3zb8t5ly79cGp228CMAjoY8EsHF6NSgWv6GwH55YSrWaARSk8RCmbVOGqMtEwCBUSmY_RRZK4goa3GjS2YYVg_tV_mhuZptpxVZJH';
        
      $factory = (new Factory)->withServiceAccount('gho-coach-firebase-adminsdk.json');
        // ->withDatabaseUri('https://my-project-default-rtdb.firebaseio.com');
        $topic = 'a-topic';
        
        $messaging = $factory->createMessaging();

        $message = CloudMessage::withTarget('token', $deviceToken)
        // $message = CloudMessage::withTarget('topic', $topic)
            // ->withNotification($notification); // optional
            ->withNotification(['title' => 'My title', 'body' => 'My Body']); // optional
            // ->withData($data) // optional

        $messaging->send($message);

      } catch (\Throwable $e) {
        return ['Error creating topic: ' . $e->getMessage()];
      }
    }

    /* public function createTopic()
    {
      // $firebase = (new Factory)->withServiceAccount('gho-coach-firebase-adminsdk.json');
      $factory  = (new Factory)->withServiceAccount('gho-coach-firebase-adminsdk.json');

      // $firebase = $factory->create();
      $topicName = 'gho-coach-public';
      // $messaging = $firebase->getMessaging();
      // $messaging = $firebase->createMessaging();
      // $topicManagement = $messaging->getTopicManagement();
      // $topicManagement = $firebase->getTopicManagement();
      
      try {
        // $messaging->createTopic($topicName);
        // $topicManagement->createTopic($topicName);
        // $firebase->createTopic($topicName);

        // $topicManagementClient = $factory->createTopicManagement();
        // $topicManagementClient->createTopic($topicName);

        $topicManagementClient = $factory->createTopicManagement();
        $topicManagementClient->subscribeToTopic($registrationToken, $topicName);

        return ["Topic created successfully: $topicName"];
      } catch (\Throwable $e) {
        return ['Error creating topic: ' . $e->getMessage()];
      }

    }  */
    public function createTopic()
    {

      $serviceAccountKey = 'MIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQDG12SkrKnGvQ68+U1N+40tjtmOalMeSvxtVLLN0CYZtLdVmd3hQ259dWcudVG44yamoZ4ZwFP83eqTPPSLsDG3sT1u8Karj1V8q1dXewi4QoHt5YZRIbD8uHGLZtBBkZVmSoDL4Tav6WyAbeOxFhTS2QRnPQ0EUIwzYurX/wXdT8c7zKzEACFEeoVIBhdTLQdU3mp3LzuZ7acIF8f3iJiTpGAqXI8rqfO8K1q2e18FxS44WR6vfOAvIqeWty+diCFpqvZjxhwJlIQMkxJRXEOCi7p3nka0H6hEYgpOFdZN0FSfQAZC+KjnSAQLpvLNH6I8K2aOquxoc5DcAx6lrvfXAgMBAAECggEAG5PtI//EjklTXXdQNvQgGQT6fIuXmph42SsJn4zyc9dCJC+ye9cv4Fujo2hnHLb4edzpghXQMD6RFbm7CxK1Wo5NAHGFFD9NcnyLIRlx1Kh4v8d5MRB0rSBhsx1f3fA0odrMcTp7rLs5rrhO/5UZ70JlH3Jytzn6r/fUrX9zz0VOPUa9i7NzmtJEJMorjT9JhmuWDErWaGg190FiysNZWrfgv300DyuoBWsnE2o8j1TMiVSMD9WWZxj3L6d3Sq3ZIfV08e0k1tGqNLiFFkh0IUr+gpMSFclEr+3y2m+EzafLbhf1Z61Yj3u3/O682jf48Pjp32H+EgmD+di0/bwjQQKBgQDjKADbkY29tCROBd7OvcoTQZK+l409gvxsFXdijSMKQd1hufmL25mQbEmx8uPaGnF/u/5Jx5SgPtHIkb0TSw5UGSeDdC8k0UQTVQo+0mqhWtusDMhG1rjlid0nrexWk6w81RSpXsB+38jYkRSrxXnQlNHnh/r2h8PX1XvgNr9FFwKBgQDgFvqzp399poF6MH/oPE6jpWxbZbZkWPhm1CvEJGsZ258LL+fkHDUUqTMqxNKCm5yTHtUqp9fZ9uVftpAoZo2UJXKYZdXVzdMbsSKCq3FDP42ziwaJSGbm+HZ4od6hnjaYMbgEB3IpeIbNneWxOY9W289P5hdEx4FLHjH+svMbQQKBgEkwjnYwg7bn3/qzsYJzbDSgICQAuKVlGufIUtsSFoQrjKT8QwdpDiWWfngzhm6zrnY1oE0tXRn0o6s4Ke+Zc1htcmnMeZQnSQPhlpd/PJQYrkbVJ4KLlK+AqB0s0MVkd05yaWHZAbTfbds5g6uEyScHjEpJafcc72EPjAZGHYKpAoGAZ5c33cUYkqVeRXYWKu12DQBzzux+HHVkn2SFtu5+9D0qkKlcsX64qwxssuC5z9bP0tL2B/n/NquD7XMfwQ1ndYy6JOkuqN+1L5/7LBzFByliABXMt7nYl/1UBwANQvk4k7KoNnSaucEV0AemHv9U2/pRI8ZiC1GO24Lh6bQf3gECgYEAunMb60Oxmrnq/N9o2B25LuiYFC+dRbfqgJlJj4tGauF+pASqs9stfsuFY8s3VCZAO6VJ/TS2hFM+FIymCO7PpTtslsMj4l0+nKu+yLKoJcHIH+OtgGlK516cqc0vrLJWcBPP6dbscA9CV7aJdPuLrpoWj1Pry7vp4xsbyFr6Y2U=';
      $projectId = 'gho-coach';
      $registrationToken = 'dMlKDYEoQ7WFfIAwHzN8YX:APA91bGVF0xcLtLQFDaoZrKANs1gmFzvriqRDvi3zb8t5ly79cGp228CMAjoY8EsHF6NSgWv6GwH55YSrWaARSk8RCmbVOGqMtEwCBUSmY_RRZK4goa3GjS2YYVg_tV_mhuZptpxVZJH';
      $topicName = 'gho-coach-public';

      $baseUri = "https://iid.googleapis.com";
      $endpoint = "/iid/v1:batchAdd";

      $url = $baseUri . $endpoint;

      $headers = [
          'Authorization: Bearer ' . $serviceAccountKey,
          'Content-Type: application/json',
          'Accept: application/json',
      ];

      $data = [
          'to' => '/topics/' . $topicName,
          'registration_tokens' => [$registrationToken],
      ];

      $ch = curl_init($url);

      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

      $response = curl_exec($ch);

      if ($response === false) {
          echo 'Error subscribing to topic: ' . curl_error($ch);
      } else {
          $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
          if ($httpCode === 200) {
              echo "Successfully subscribed $registrationToken to $topicName";
          } else {
              echo 'Error subscribing to topic. HTTP status code: ' . $httpCode . ', Response: ' . $response;
          }
      }

      curl_close($ch);

    }
    public function sendToTopic($topic = 'public_topic', $notification)
    {
      try {
        $factory  = (new Factory)->withServiceAccount('gho-coach-firebase-adminsdk.json');
        // $result = $messaging->subscribeToTopic($topic, $registrationTokenOrTokens);
        // $topic = 'a-topic';
        $messaging = $factory->createMessaging();

        // $message = CloudMessage::withTarget('token', $deviceToken)
        $message = CloudMessage::withTarget('topic', $topic)
            // ->withNotification(['title' => 'My title', 'body' => 'My Body']); // optional
            ->withNotification($notification); // optional
            // ->withData($data) // optional

        $messaging->send($message);

      // return $result;
      } catch (\Throwable $e) {
        return ['Error creating topic: ' . $e->getMessage()];
      }
    }

    public function subscribeToTopic($topic = 'public_topic', $deviceToken)
    {
      // $deviceToken = 'dMlKDYEoQ7WFfIAwHzN8YX:APA91bGVF0xcLtLQFDaoZrKANs1gmFzvriqRDvi3zb8t5ly79cGp228CMAjoY8EsHF6NSgWv6GwH55YSrWaARSk8RCmbVOGqMtEwCBUSmY_RRZK4goa3GjS2YYVg_tV_mhuZptpxVZJH';
      // $topic = 'a-topic';
      $factory  = (new Factory)->withServiceAccount('gho-coach-firebase-adminsdk.json');
      $messaging = $factory->createMessaging();
      // $result = $messaging->subscribeToTopic($topic, $registrationTokenOrTokens);
      $result = $messaging->subscribeToTopic($topic, $deviceToken);

      return $result;
    }

    public function unsubscribeToTopic($topic = 'public_topic', $deviceToken)
    {
      $factory  = (new Factory)->withServiceAccount('gho-coach-firebase-adminsdk.json');
      $messaging = $factory->createMessaging();
      $result = $messaging->unsubscribeFromTopic($topic, $deviceToken);

      return $result;
    }
}
