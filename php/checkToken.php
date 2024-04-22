<?php
function checkToken(&$response) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['token'])) {
            $token = $_POST['token'];
            if ($token === 'photoreserved') {
                return true;
            } else {
                $response['status'] = false;
                $response['message'] = "Invalid Token";
                return false;
            }
        } else {
            $response['status'] = false;
            $response['message'] = "Unauthorized: Token missing";
            return false;
        }
    } else {
        $response['status'] = false;
        $response['message'] = "Unauthorized: Request method not allowed";
        return false;
    }
}


?>
