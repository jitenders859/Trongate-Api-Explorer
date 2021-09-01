<?php

class Members extends Trongate
{
    function greeting($user_id)
    {
        api_auth();
        $post = file_get_contents('php://input');
        $decoded = json_decode($post, true);


        $name = $decoded['name'];


        $query_data = $this->model->get_one_where("id", $user_id);

        if ($query_data == false) {
            http_response_code(403);
            echo "get away you are not registered";
        } else {
            $name = $query_data->first_name . " " . $query_data->last_name;
            echo "Hello $name";
        }

        // if ($name == "jit") {
        //     echo "hello $name";
        //     echo $user_id;
        // } else {
        //     http_response_code(403);
        //     echo "get away you are not registered";
        // }
    }
}