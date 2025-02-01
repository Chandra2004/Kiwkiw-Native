<?php
    namespace Punyachandra\Main\App;

    use Punyachandra\Main\App\Config;
    use Exception;

    class CacheManager {
        public static function remember($key, $ttl, $callback) {
            try {
                $redis = Config::redis();
                $cached = $redis->get($key);
                
                if ($cached) {
                    return json_decode($cached, true);
                }
                
                $data = $callback();
                $redis->setex($key, $ttl, json_encode($data));
                return $data;
                
            } catch (Exception $e) {
                // Fallback ke database jika Redis down
                return $callback();
            }
        }
    }
?>