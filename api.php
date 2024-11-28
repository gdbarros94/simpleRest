<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

$data = json_decode(file_get_contents("data.json"), true);

if (isset($_GET['endpoint'])) {
    $endpoint = $_GET['endpoint'];

    switch ($endpoint) {
        case 'all':
            echo json_encode($data);
            break;

        case 'users':
            echo json_encode($data['users']);
            break;

        case 'products':
            echo json_encode($data['products']);
            break;

        default:
            http_response_code(404);
            echo json_encode(["error" => "Endpoint not found"]);
            break;
    }
} else {
    http_response_code(400);
    echo json_encode(["error" => "No endpoint specified"]);
}
?>
