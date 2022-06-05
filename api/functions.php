<?php
    function error_response($code, $message) {
        $response = array();
        $response['code'] = $code;
        $response['message'] = $message;
        die(json_encode($response));
    }

    function success_response($data, $message) {
        $response = array();
        $response['code'] = 0;
        $response['message'] = $message;
        $response['data'] = $data;

        die(json_encode($response));
    }
?>