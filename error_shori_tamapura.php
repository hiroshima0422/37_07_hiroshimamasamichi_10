<?php


// メール宛て先
$mailTo  = 'hiroshima0422@gmail.com';


// メールのタイトル
$subject = 'エラーが発生しています';
// Return-Pathに指定するメールアドレス


# クリックジャッキング対策☆レシピ290☆（クリックジャッキングとは？）をします。
header('X-FRAME-OPTIONS: SAMEORIGIN');



#現在の時間を取得

$today = getdate();

$today_year = $today['year'];
$today_mon = $today['mon'];
$today_mday = $today['mday'];
$today_hours = $today['hours'];
$today_minutes = $today['minutes'];
$today_seconds = $today['seconds'];


# エラーを示します。
/*  		show_error_details($e);*/
  /*echo '<p>';
  echo 'エラーコード： '       . $e->getCode()    . '<br>';
  echo 'エラーメッセージ： '   . $e->getMessage() . '<br>';
  echo 'エラー発生ファイル： ' . $e->getFile()    . '<br>';
  echo 'エラー発生行： '       . $e->getLine()    . '<br>';
  echo '</p>';*/
  $error_Code = $e->getCode();//エラーコード
  $error_Message = $e->getMessage();//エラーメッセージ
  $error_File = $e->getFile();//エラー発生ファイル
  $error_Line = $e->getLine();//エラー発生行
  $error = $e;//エラー全文
  	
/*$error_Code = isset($error_Code) ? $error_Code : "エラーコード無し";
$error_Message = isset($error_Message) ? $error_Message : "エラーメッセージ無し";
$error_File = isset($error_File) ? $error_File : "エラーファイル無し";
$error_Line = isset($error_Line) ? $error_Line : "エラーファイル無し";
$error = isset($error) ?$error : "エラー無し"; 
*/

#********************
#
#  データベースにエラーを記録
#
#********************
 /* var_dump($error_Code);
var_dump($error_Message);
var_dump($error_File);
var_dump($error_Line);*/
//var_dump($error);
//2. DB接続します(エラー処理追加)
//2. DB接続します(エラー処理追加)
include("functions.php");
$pdo = db_conn();

//３．データ登録SQL作成
$stmt = $pdo->prepare('INSERT INTO error_data (code, date,error_Code,error_Message,error_File,error_Line,error) VALUES (null,sysdate(),:error_Code,:error_Message,:error_File,:error_Line,:error)');
 $prepare->bindValue(':error_Code', $error_Code, PDO::PARAM_STR);
  $prepare->bindValue(':error_Message', $error_Message, PDO::PARAM_STR);
  $prepare->bindValue(':error_File', $error_File, PDO::PARAM_STR);
  $prepare->bindValue(':error_Line', $error_Line, PDO::PARAM_STR);
  $prepare->bindValue(':error', $error, PDO::PARAM_STR);
  
  
$status = $stmt->execute();



#********************
#
#  エラーを携帯パソコンに送信記録
#
#********************
 # 送信文の作成を行ないます。
 	$honbun="\n";
	$honbun.="エラーが発生しています。:\n";
	$honbun.=$today_year."年".$today_mon."月".$today_mday."日\n";
	$honbun.=$today_hours."時".$today_minutes."分".$today_seconds."秒\n";
	$honbun.="-------------\n";	
	$honbun.="エラーコード:\n";
	$honbun.=$error_Code."\n";
	$honbun.="-------------\n";
	$honbun.="エラーメッセージ:\n";
	$honbun.=$error_Message."\n";
	$honbun.="-------------\n";
	$honbun.="エラー発生ファイル:\n";
	$honbun.=$error_File."\n";
	$honbun.="-------------\n";
	$honbun.="エラー発生行:\n";
	$honbun.=$error_Line."\n";
	$honbun.="-------------\n";
	$honbun.="お客様の画面には\n";
	$honbun.="正常に送信されましたという意味で\n";
	$honbun.='"再度お願いします。"';
	$honbun.="\nが表示されています。\n";
	$honbun.="-------------\n";	

# mbstringの日本語設定を行ないます。
mb_language('ja');
mb_internal_encoding('UTF-8');

# 送信結果をお知らせする変数を初期化します。
$message = '';

$name = "";

$email = "";

//var_dump($result);
#パソコン用
	$honbun.="エラー全文:\n";
	$honbun.=$error."\n";
	$honbun.="-------------\n";
/*	$honbun.='$_SESSION:';
	$honbun.=$session."\n";
	$honbun.="-------------\n";
	$honbun.='$_POST:';
	$honbun.=$post."\n";
	$honbun.="-------------\n";	*/


	
# メールの送信と結果の判定をします。

$result = mb_send_mail($mailTo, $subject, $honbun);

if ($result) {
  $message =  'エラーが発生しています。再度お願いします。';
# セッション変数を破棄☆レシピ230☆（セッション変数を破棄したい）します。
 if(isset($_SESSION)==false)
	{	
		$_SESSION = array();
		  session_destroy();
	}
  $error_Code = "";
$error_Message = "";
$error_File = "";
$error_Line =  "";
$error = "";                
} else {
  $message = 'エラーが発生しています。';
 if(isset($_SESSION)==false)
	{	
		$_SESSION = array();
		  session_destroy();
	}
    $error_Code = "";
$error_Message = "";
$error_File = "";
$error_Line =  "";
$error = ""; 
 
 
}	
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">

  <title>エラー処理たまぷらねっと</title>
  <meta name="robots" content="NOINDEX, NOFOLLOW" />
  <meta name="description" content="" />
  <meta name="keywords" content="" />
  <meta property="og:title" content="" />
  <meta property="og:description" content="" />
  <meta property="og:url" content="" />
  <meta property="og:image" content="" />
  <meta property="og:type" content="website" />
  <meta property="og:site_name" content="" />

  <meta property="fb:app_id" content="" />
  <meta name="twitter:card" content="summary" />
  <meta name="twitter:site" content="" />
  <meta name="twitter:image" content="" />
  <meta name="copyright" content="Copyright (C) tamapuranet All rights reserved.">

  <link rel="canonical" href="" />

  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <link href="bootstrap/css/bootstrap.min.css" media="all" rel="stylesheet" type="text/css" />
  <link href="common/css/style.css" media="all" rel="stylesheet" type="text/css" />

  </head>



<body>
<main>
<div class="errer">

  <h1>エラー発生</h1><br /><br />
  <p><?php 
  echo $message;
  ?></p>
<?php

print'<p><strong><a class = "mojiiro" href="http://hiroshima.whitesnow.jp/tamapura/index.php">再度トップ画面へ</a></strong></p><br/>';
        print'<p>ただいま障害により大変ご迷惑をお掛けしております。</p></br>';
		echo '<p>       ご不明な点がございましたら下記までご連絡ください。</p>';
echo '<p>       </p>';
echo '<p>       □□□□□□□□□□□□□□□□□□</p>';
echo '<p>      　在宅ケアセンターたまぷらねっと</p>';
echo '<p>       東京都国立市中1丁目14番30号   1号室</p>';
echo '<p>       電話 042-505-5441 </p>';
echo '<p>       FAX  042-505-5442</p>';
echo '<p>      メール <a href="mailto:hiroshima0422@gmail.com">hiroshima0422@gmail.com</a></p>';
echo '<p>       □□□□□□□□□□□□□□□□□□</p>';   
?>        
</main>
  <!-- フッター要素　ここから　-->
<?php
	require_once 'footer.html'; 
?>
  <!-- フッター要素　ここまで　--> 
</div>  

	</body>
</html>




