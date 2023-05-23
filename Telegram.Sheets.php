<?php
$token = "6290432096:AAF0RpNYQ59AwXXy-95Ww-0UzathbvNbxN0";
$chat_id = "-804385545";
$rating1 = $_POST["rating1"];
$rating2 = $_POST["rating2"];
$rating3 = $_POST["rating3"];
$rating6 = $_POST["rating6"];
$rating7 = $_POST["rating7"];
$message = "Як Ваш настрій?😊 - " . $rating1 . "\n";
$message .= "Чи сподобалось Вам обслуговування інженерів?🌐 - " . $rating2 . "\n";
$message .= "Як Ви оцінюєте якість послуги Інтернету? - " . $rating3 . "\n";
$message .= "Ваш відгук про роботу спеціалістів з підключення - " . $rating6 . "\n";
$message .= "Вкажіть, будь ласка, Ваш номер телефону чи договору для ідентифікації. - " . $rating7;
$url = "https://api.telegram.org/bot" . $token . "/sendMessage";
$data = [
    'chat_id' => $chat_id,
    'text' => $message,
];
$options = [
    'http' => [
        'method'  => 'POST',
        'header'  => 'Content-type: application/x-www-form-urlencoded',
        'content' => http_build_query($data),
    ],
];
$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);
if ($result === false) {
    echo "";
} else {
    echo "";
}

require_once __DIR__ . '/vendor/autoload.php';

use Google\Client;
use Google\Service\Sheets;

$spreadsheetId = '1Q7_RSeXvtb3jcPVfbMxkZ37KOipRUksZZk-O-fs_o0I';
$keyFilePath = './api.json';

$client = new Google\Client();
$client->setApplicationName('Your Application Name');
$client->setAuthConfig($keyFilePath);
$client->addScope(Google_Service_Sheets::SPREADSHEETS);

$service = new Google_Service_Sheets($client);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $values = [
        [
            $rating1 = $_POST['rating1'],
            $rating2 = $_POST['rating2'],
            $rating3 = $_POST['rating3'],
            $rating6 = $_POST['rating6'],
            $rating7 = $_POST['rating7']
           
            
        ]
    ];

    $body = new Google_Service_Sheets_ValueRange([
        'values' => $values
    ]);
    $params = [
        'valueInputOption' => 'RAW'
    ];
    $result = $service->spreadsheets_values->append(
        $spreadsheetId,
        'Лист 1!A:G',
        $body,
        $params
    );

    printf("%d rows added to the spreadsheet", $result->getUpdates()->getUpdatedRows());
}

header("Location: Feedback/feedback.html");
  exit();

?>