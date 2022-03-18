<?php
class Cookie {

    public function delete() {
        if (isset($_COOKIE)) {
            foreach($_COOKIE as $name => $value) {
                    setcookie($name, '', 1);  //1-1-1970
                    setcookie($name, '', 1, '/');
            }
        }
    }

    public function exists($key) {
        return(isset($_COOKIE[$key]));
    }

    public function get($key) {
        return($_COOKIE[$key]);
    }

    public function put($key, $value, $expiry) {
        return(setcookie($key, $value, time() + $expiry, "/"));
    }

}