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

$host = "pautinabeta.online";
$username = "u142184143_234234";
$password = "A0971279812a";
$dbname = "u142184143_2342";
$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if(isset($_POST['submit'])){
$rating1 = $_POST['rating1'];
$rating2 = $_POST['rating2'];
$rating3 = $_POST['rating3'];
$rating4 = $_POST['rating4'];
$rating5 = $_POST['rating5'];
$rating6 = $_POST['rating6'];
$rating7 = $_POST['rating7'];
$sql = "INSERT INTO `Stats` (`rating1`, `rating2`, `rating3`, `rating4`, `rating5`, `rating6`, `rating7`) VALUES ('$rating1', '$rating2', '$rating3', '$rating4', '$rating5', '$rating6', '$rating7')";
}
if ($conn->query($sql) === TRUE) {
    echo "";
} else {
    echo " " . $sql . "<br>" . $conn->error;
}
$conn->close();
header("Location: Feedback/feedback.html");
  exit();
?>
