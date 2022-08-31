
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Club Employé</title>
</head>
<body>
<?php 

class Message {
    

    function displayAllMessage() {
        // get & decode json data
        $json = json_decode(file_get_contents('assets/data.json'), true);

        // array id message
        $arr = array('12', '14', '23', '35', '48');
        $users = array('tenantId', 'ownerId');

        $arrayMessage = 'messages';
        $userMessage = 'message';

        echo '<h1>Display all messages</h1>';
        echo '<ul>';
        foreach ($arr as $key) {
            if ($json[$arrayMessage][$key]['tenantId'] == true) {
                echo '<h4>from : ' . $json[$arrayMessage][$key]['tenantId'] . '</h4>';
            } elseif ($json[$arrayMessage][$key]['ownerId'] == true) {
                echo '<h4>from : ' . $json[$arrayMessage][$key]['ownerId'] . '</h4>';
            } 
            echo '<li>' . $json[$arrayMessage][$key][$userMessage] . '</li>';
        }
        echo '</ul>'; 

        $arr2 = array('12' => 0, '14' => 1, '23' => 2, '35' => 3, '48' => 4);

        echo '<h1>Select and display one messages</h1>';
        foreach ($arr2 as $key) {
            echo '<li>' . $json[$arrayMessage][array_rand($arr2)][$userMessage] . '</li>';
            die();
        }

        echo '<h1> Count message from each user</h1>';
        foreach ($arr as $key) {
            foreach ($users as $user)
                if ($user == 'tenantId') {
                    echo 'pipi';
                } elseif ($user == 'ownerId') {
                    echo 'caca';
                }
            }
        echo '</ul>'; 
    }

    function displayOneMessage() {
        $json = json_decode(file_get_contents('assets/data.json'), true);

        echo '<h1>Display all messages</h1>';
        echo '<ul><li>' . $json['messages'][12]['message'] . '</li></ul>';

        
    }

}

$message = new Message();
$displayAllMessage = $message->displayAllMessage();
$displayOneMessage = $message->displayOneMessage();

?>

</body>
</html>

<?php

// Silence is golden