<?php
    if ($_POST['submit'] == "OK") {
        if (isset($_POST['login']) && isset($_POST['passwd'])) {
            $file = get_login_array();
            if (!login_exists($file, $_POST['login'])) {
                $file[] = array(
                    "login" => $_POST['login'],
                    "passwd" => hash("whirlpool", $_POST['login'] . $_POST['passwd'])
                );
                file_put_contents("/private/passwd", serialize($file));
                echo "OK\n";
            } else
                echo "ERROR\n";
        } else
            echo "ERROR\n";
    } else
        echo "ERROR\n";

    function get_login_array() {
        if (!file_exists("/private/passwd")) {
            mkdir("/private");
            file_put_contents("/private/passwd", serialize(array()));
        }

        $file = file_get_contents("/private/passwd");
        return unserialize($file);
    }

    function login_exists($file, $login) {
        foreach ($file as $var) {
            if ($var['login'] == $login)
                return true;
        }
        return false;
    }
?>