<?php
# 無名関数☆レシピ040☆（無名関数って何ですか？）を使ってエラーハンドラを設定します。
set_error_handler(
  function ($errno, $errstr, $errfile, $errline) {
    throw new ErrorException($errstr, $errno, 0, $errfile, $errline);
  }
);


?>
