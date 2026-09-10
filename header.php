<?php
$tag = "Demiro";

if (empty($title)){
  $title = $tag;
}else{
  $title = "$title | $tag";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title   ?></title>
  <link rel="icon" href="icon/icon.png" />
  <link rel="stylesheet" href="style/entrance.css">
  <link rel="stylesheet" href="style/commonStyles.css">
  <link rel="stylesheet" href="style/users.css" />
  <link rel="stylesheet" href="./style/chat.css" />
  <style>



  </style>
</head>