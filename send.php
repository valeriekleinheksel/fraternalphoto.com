<?php
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
  exit;
}

$name = strip_tags(trim($_POST["name"]));
$email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
$message = trim($_POST["message"]);

if (empty($name) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
  echo "Invalid submission.";
  exit;
}

$to = "vkleinheksel@gmail.com";
$subject = "New website form submission";
$headers = "From: $name <$email>\r\nReply-To: $email";

$body = "Name: $name\nEmail: $email\n\nMessage:\n$message";

mail($to, $subject, $body, $headers);

header("Location: index.html");
exit;
?>
