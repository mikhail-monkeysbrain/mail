<?php
$mail_to = 'exemple@yandex.ru';//Вставить email менеджера
$sitename = "название сайта";//Вставить название сайта


$picture = "";

if (!empty($_FILES['mail_file']['tmp_name'])) {

    // Закачиваем файл 

    $path = $_FILES['mail_file']['name'];
    if (copy($_FILES['mail_file']['tmp_name'], $path)) $picture = $path;
}
$mail_touser = trim($_POST["email"]);
$fio = trim($_POST["fio"]);
$name = trim($_POST["name"]);
$adres = trim($_POST["adres"]);
$phone = trim($_POST["phone"]);
$emailLite = trim($_POST["emailLite"]);
$number = trim($_POST["number"]);
$fioclient = trim($_POST["fioclient"]);
$phoneclient = trim($_POST["phoneclient"]);
$phoneclientlite = trim($_POST["phoneclientlite"]);
$adressclient = trim($_POST["adressclient"]);
$noteclient = trim($_POST["noteclient"]);
$date = trim($_POST["date"]);
$place = trim($_POST["place"]);


$message = "Заказчик: $name \nАдрес организации: $adres \nКонтактное лицо: $fio \nТелефон: $phone \nE-mail: $email $emailLite \nОбъект замера \nНомер договора: $number \nФИО Клиента: $fioclient \nТелефон Клиента: $phoneclient $phoneclientlite \nАдресс Клиента:  $adressclient \nПримечание: $noteclient \nОплата: $place \nУдобное время: $date";

$thm = "Заявка с сайта $sitename";



if (empty($picture)) mail($mail_to, $thm, $message);

else send_mail($mail_to, $thm, $message, $picture);

mail($mail_touser, $thm, $message, $mail_to);


function send_mail($to, $thm, $html, $path)

{

    $fp = fopen($path, "r");

    if (!$fp) {

        print "Файл $path не может быть прочитан";

        exit();

    }

    $file = fread($fp, filesize($path));

    fclose($fp);


    $boundary = "--" . md5(uniqid(time())); // генерируем разделитель

    $headers = "MIME-Version: 1.0\n";

    $headers .= "Content-Type: multipart/mixed; boundary=\"$boundary\"\n";

    $multipart = "--$boundary\n";

    $kod = 'utf-8'; // или $kod = 'windows-1251'; 

    $multipart .= "Content-Type: text/html; charset=$kod\n";

    $multipart .= "Content-Transfer-Encoding: Quot-Printed\n\n";

    $multipart .= "$html\n\n";


    $message_part = "--$boundary\n";

    $message_part .= "Content-Type: application/octet-stream\n";

    $message_part .= "Content-Transfer-Encoding: base64\n";

    $message_part .= "Content-Disposition: attachment; filename = \"" . $path . "\"\n\n";

    $message_part .= chunk_split(base64_encode($file)) . "\n";

    $multipart .= $message_part . "--$boundary--\n";


    if (!mail($to, $thm, $multipart, $headers)) {

        echo "К сожалению, письмо не отправлено";

        exit();

    }

}
