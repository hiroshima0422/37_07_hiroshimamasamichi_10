<?php
    try
    { 


require_once './error_fun.php';
# クリックジャッキング対策☆レシピ290☆（クリックジャッキングとは？）をします。
header('X-FRAME-OPTIONS: SAMEORIGIN');

# セッションを開始します。
session_start();
header('Expires:'); 
header('Cache-Control:');
header('Pragma:');
		# strlen()関数に配列を渡し、Warningエラーを発生させます。
  	strlen(array());    
//var_dump($_SESSION); 

?>


<?php
	require_once 'header.html'; 
?>


<body>
    <header>
        <div class="header-logo">
            <img src="common/img/tamapura.jpg" alt="ロゴ"><span>aaa</span>
        </div>
        <nav>
            <ul class="main-nav">
                <li><a href="#">トップ</a></li>
                <li><a href="#">事業</a></li>
                <li><a href="#">サービス</a></li>
                <li><a href="#">アクセス</a></li>
                <li><a href="#">概要</a></li>
            </ul>
        </nav>
    </header>
    <main>
    <!--news-->
    <!--　content_top　ここから　-->    
            <article class="news-wrap">
                <header class="content-headding">
                    <h2 class="border-headding">News</h2>
                </header>
                <div class="news-inner">
                    

                    
                
<?php
 # データベース設定☆レシピ260☆（データベースに接続したい）を読み込みます☆レシピ041☆（他のファイルを取り込んで利用したい）。
require_once __DIR__ . '../../conf/database_conf.php';
							
							  
							# MySQLデータベースに接続します。
							  $db = new PDO($dsn, $dbUser, $dbPass);

//***************************
		//お気に入りデータを呼び出し
		
			
		$sql='SELECT * FROM tamapura_news';
			$prepare = $db->prepare($sql);
			$result = $prepare->execute();					  
							  
							  
							  
		
			
			//$prepare = null;
		
		
		//３．データ表示
		$view="";
		if($result==false) {
			//execute（SQL実行時にエラーがある場合）
		  $error = $prepare->errorInfo();
		  exit("ErrorQuery:".$error[2]); //配列index[2]にエラーコメントあり 
		
		}else{
		?>
		
		
		
		
		<?php	
			
			
		  //Selectデータの数だけ自動でループしてくれる
		  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
		  /*SELECT `code`, `koushinbi`, `title`, `title2`, `gazou`, `kiji`, `kiji2`, `kaishibi`, `shuuryoubi`, `news_url`, `yobi1` FROM `tamapura_news` WHERE 1*/
		  while( $result = $prepare->fetch(PDO::FETCH_ASSOC)){ 
			$view  .= '<p>';           
			$view  .= $result["title"] ."：". $result["title2"] ;           
			$view .= '</p>'; 
			//var_dump($result);
			
			$news_code[] = $result['code'];
			$news_koushinbi[] = $result['koushinbi'];
			$news_title[] = $result['title'];
			if($result['gazou']=='')
			{
				$news_gazou[] = '';
			}
			else
			{
				$news_gazou[]= $result['gazou'];
			}
			$news_kiji[] = $result['kiji'];
			$news_kiji2[] = $result['kiji2'];
			$news_kaishibi[] = $result['kaishibi'];
			$news_shuuryoubi[] = $result['shuuryoubi'];
			if($result['news_url']=='')
			{
				$news_url[] = '';
			}
			else
			{
				$news_url[]= $result['news_url'];
			}
			
		?>	
			
		
		
		<?php
	  }
	//var_dump($view);
	
	
	
	}			

 
                
  $sql = 'SELECT * FROM tamapura_news';
  $prepare = $db->prepare($sql);
  $prepare->execute(); 	
		
for($i=1;$i<6;$i++)
	{
# クエリ結果を連想配列で取得します。
  $rec = $prepare->fetch(PDO::FETCH_ASSOC); 
		if($rec==false)
		{
			break;
		}
			$news_code[] = $rec['code'];
			$news_koushinbi[] = $rec['koushinbi'];
			$news_title[] = $rec['title'];
			if($rec['gazou']=='')
			{
				$news_gazou[] = '';
			}
			else
			{
				$news_gazou[]= $rec['gazou'];
			}
			$news_kiji[] = $rec['kiji'];
			$news_kiji2[] = $rec['kiji2'];
			$news_kaishibi[] = $rec['kaishibi'];
			$news_shuuryoubi[] = $rec['shuuryoubi'];
			if($rec['news_url']=='')
			{
				$news_url[] = '';
			}
			else
			{
				$news_url[]= $rec['news_url'];
			}			
			#現在をタイムスタンプに変換
/**
 * ----------------------------------------------------------
 * getCurrentDate()
 * 現在の年月日を取得する
 * ----------------------------------------------------------
 */
/*function getCurrentDate() {
  $dt = new DateTime();
  $dt->setTimeZone(new DateTimeZone('Asia/Tokyo'));
 
  return $dt->format('Y-m-d');
}*/


// 今日の日付を取得
//$dt = new DateTime();
//$dt->setTimeZone(new DateTimeZone('Asia/Tokyo'));
//$today = $dt->format('Y-m-d');
			$dateObj = new DateTime();
			$timeStamp_today = $dateObj->getTimestamp();
 
/*// 比較する日付を設定
$target_day = '2013-05-21';
 
// 日付を比較
if (strtotime($target_day) > strtotime($today)) {
    $echo '指定した日付は未来です。';
}
elseif(strtotime($target_day) < strtotime($today)) {
    $echo '指定した日付は過去です。';
}
else {
    $echo '指定した日付は今日です。';
}*/

#タイムスタンプに変換
/*$time = '2014-1-1';
$dateObj = new DateTime($time);
$timeStamp = $dateObj->getTimestamp();
*/	
			$kaishibi = $rec['kaishibi'];	
			$time1 = $kaishibi;
			$dateObj1 = new DateTime($time1);
			$timeStamp_kaishibi = $dateObj->getTimestamp();
			
			$shuuryoubi = $rec['shuuryoubi'];
			$time2 = $shuuryoubi;
			$dateObj2 = new DateTime($time2);
			$timeStamp_shuuryoubi = $dateObj2->getTimestamp();
			
/*
$time = '2014-1-1';
$dateObj = new DateTime($time);
$timeStamp = $dateObj->getTimestamp();
$date = $dateObj->format('Y-m-d H:i:s');
echo sprintf($outputFormat, $time, $timeStamp, $date);
*/
if($timeStamp_kaishibi <= $timeStamp_today && $timeStamp_today <= $timeStamp_shuuryoubi)
		{

?>  
<!--topicsと同じく、よりセマンティックにするために定義タグを使っている。-->
                    <!--1つ目のニュース-->
                    <dl>
                        <dt><?php echo nl2br(h($news_koushinbi[$i])); ?></dt>
                        <dd><?php echo h($news_kiji[$i]); ?></dd>
                    </dl> 
 

  <?php
		}
	}
?>	                


            </div>
         </article>
<!--　content_top　ここまで　-->
            
	<!-- jigyousyo -->
	<div id="jigyousyo">
		<!-- pagebody -->
		<div id="pagebody">
			
			


			


			<!-- maincol -->
			<div id="maincol">
				
				

     <div class="card">
					<h3 class="resultTheme">在宅ケアセンターたまぷらねっと</h3>
					<div class="koushin">
						更新日 2018年_月_日&nbsp;<br />
						
					</div>
					<h4 class="resultTitle">１ 基本情報</h4>
					<table width="99%" border="0" cellspacing="0" cellpadding="2" class="resultTable">
					<tr>
						<th>事業所名</th>
						<td>在宅ケアセンターたまぷらねっと</td>
					</tr>
					<tr>
						<th width="16%">フリガナ</th>
						<td width="84%">ザイタクケアセンタータマプラネット&nbsp;</td>
					</tr>
					<tr>
						<th>設立</th>
						<td>

							2009年11月1日設立

							&nbsp;
						</td>
					</tr>
					<tr>
						<th>サービス種別</th>
						<td>
							居宅介護支援事業者&nbsp;

							<div class="next2"><input type="button" style="font-size:medium;width: 200px;height: 25px;" value="区市町村関連ホームページ" onClick="showDvsHp('http://www.city.kunitachi.tokyo.jp/support2/seido/index.html');" /></div>

						</td>
					</tr>
					<tr>
						<th>他の実施サービス種別</th>
						<td>&nbsp;

							

						</td>
					</tr>
					<tr>
						<th>所在地</th>
						<td>

							186-0004<br>

							東京都国立市中1丁目14番30号

							&nbsp;&nbsp;1号室

						</td>
					</tr>

					<tr>
						<th>地図</th>
						<td><input type="button" style="font-size:medium;width: 100px;height: 25px;" value="地図を表示" onClick="showMap('35/41/37.924', '139/26/43.170');" /></td>
					</tr>

					<tr>
						<th>交通手段</th>
						<td>JR中央線国立駅より徒歩5分<BR>または、国立駅北口より東京コミュニティバスくにっこ国立市役所行きに乗り、中一丁目バス停下車、徒歩2分<BR>または、国立駅南口より立川バス立川駅南口行き（国15-1系統）、または東京コミュニティバス国立駅北口行き、または国立市役所行き等に乗り、国立公民館バス停下車、徒歩3分&nbsp;</td>
					</tr>
<!-- 2017.02.21 add S -->
					<tr>
						<th>最寄り駅</th>
						<td>

							JR中央線国立駅、&nbsp;

							JR南武線矢川駅、&nbsp;

							JR南武線西国立駅&nbsp;

						</td>
					</tr>
<!-- 2017.02.21 add E -->
					<tr>
						<th>事業所電話番号</th>
						<td>

							042-505-5441

							&nbsp;
						</td>
					</tr>
					<tr>
						<th>事業所FAX番号</th>
						<td>

							042-505-5442

							&nbsp;
						</td>
					</tr>
					<tr>
						<th>ホームページ</th>
<!-- 2016.11.30 mod S -->
<!-- 						<td> -->
						<td style="word-break: break-all;">
<!-- 2016.11.30 mod E -->

							<div class="parm1"><a href="http://www1a.biglobe.ne.jp/tamapula/">http://www1a.biglobe.ne.jp/tamapula/</a></div>

							&nbsp;
						</td>
					</tr>
					<tr>
						<th>メールアドレス</th>
						<td>tamapula@ksf.biglobe.ne.jp&nbsp;</td>
					</tr>
					<tr>
						<th>経営法人</th>
						<td><a href="controller?cmd=sbrhjn_dt&actionID=jgyhjn&HJN_CD=900004032&SVCSBR_CD=016">一般社団法人たまぷらねっと</a>&nbsp;</td>
					</tr>
					<tr>
						<th>設置者</th>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<th>提供サービス</th>
						<td>居宅介護支援（ケアプランの作成）&nbsp;</td>
					</tr>
					<tr>
						<th>指定番号(介護)</th>
						<td>
							<table width="100%" border="0" cellspacing="0" cellpadding="0" class="resultTable3">
							<tr>
								<td width="20%">事業所番号</td>
								<td width="30%">1373400835&nbsp;</td>
								<td width="20%">指定年月日</td>
								<td width="30%">

									2009年11月1日

									&nbsp;
								</td>
							</tr>
							</table>
						</td>
					</tr>
					<tr>
						<th>指定番号(予防)</th>
						<td>
							<table width="100%" border="0" cellspacing="0" cellpadding="0" class="resultTable3">
							<tr>
								<td width="20%">事業所番号</td>
								<td width="30%">&nbsp;</td>
								<td width="20%">指定年月日</td>
								<td width="30%">&nbsp;

									
								</td>
							</tr>
							</table>
						</td>
					</tr>

					<tr>
						<th>介護サービス情報の公表（介護）</th>

						<td>
							<table width="100%" border="0" cellspacing="0" cellpadding="0" class="resultTable3">
							<tr>
								<td width="67%">有り（公表のシステムへ移動します。このページに戻るにはブラウザの戻るボタンをご利用ください。）</td>
								<td width="33%"><input type="button" style="font-size:medium;width: 120px;height: 25px;" value="公表情報詳細" onClick="showKouhyou('http://www.kaigokensaku.mhlw.go.jp/13/index.php?action_kouhyou_detail_2017_023_kani=true&JigyosyoCd=1373400835-00&PrefCd=13&VersionCd=023');">&nbsp;</td>
							</tr>
							</table>
						</td>

					</tr>

					<tr>
						<th>評価情報</th>

						<td>
							<table width="100%" border="0" cellspacing="0" cellpadding="0" class="resultTable3">
							<tr>
								<td width="67%">

								</td>

							</tr>
							</table>
						</td>
					</tr>
					<tr>
						<th>事業所関連情報<br /><span class="fsize90">※別画面でPDFファイルを表示します</span></th>
						<td>&nbsp;

							
						</td>
					</tr>

					<tr>
						<th>外観</th>
						<td class="imagebox2">
							<img src="controller?cmd=image&actionID=common&JGY_CD=1321500222&SVCSBR_CD=016&KNR_NO=1" alt="事務所外観" border="0"><br />事務所外観
						</td>
					</tr>

					<tr>
						<th>備考</th>
						<td>&nbsp;</td>
					</tr>
					</table>
					<div class="pagetop"><a href="#top">page top△</a></div>

					<h4 class="resultTitle">２ サービス内容</h4>
					<table width="99%" cellspacing="0" cellpadding="2" class="resultTable">

					<tr>
						<th width="16%">対象地域</th>
						<td width="84%">国立市とその周辺地域&nbsp;</td>
					</tr>

					<tr>
						<th width="16%">利用日</th>
						<td width="84%">月曜日から金曜日&nbsp;</td>
					</tr>
					<tr>
						<th width="16%">利用時間</th>
						<td width="84%">9時00分から17時00分&nbsp;</td>
					</tr>
					<tr>
						<th width="16%">休日</th>
						<td width="84%">土曜日、日曜日、祝日、夏季休暇8月25日から8月30日、年末年始12月29日から1月3日&nbsp;</td>
					</tr>

					<tr>
						<th width="16%">利用料金・実費負担等</th>
						<td width="84%">&nbsp;</td>
					</tr>

					</table>

					<h4 class="resultTitle">３ サービス提供のための職員（スタッフ）体制</h4>
					<table width="99%" cellspacing="0" cellpadding="2" class="resultTable">
					<tr>
						<th width="16%">職員数</th>
						<td width="84%">
							<table width="100%" border="0" cellspacing="0" cellpadding="0" class="resultTable2">
							<tr>
								<td width="20%">常勤職員</td>
								<td width="12%">1&nbsp;</td>
								<td width="24%">
									非常勤、その他

									（3）

								</td>
								<td width="12%">&nbsp;</td>
								<td width="20%">合計</td>
								<td width="12%">4&nbsp;</td>
							</tr>
							</table>
						</td>
					</tr>
					<tr>
						<th>上記のうち専門職員の人数</th>
						<td>
							<table width="100%" border="0" cellspacing="0" cellpadding="0" class="resultTable2">
							<tr>
								<td width="20%">医師</td>
								<td width="12%">&nbsp;</td>
								<td width="24%">介護福祉士</td>
								<td width="12%">&nbsp;</td>
<!-- 2017.09.06 mod S -->

								<td width="20%">介護職員初任者<br/>研修課程修了者</td>
<!-- 2017.09.06 mod E -->
								<td width="12%">&nbsp;</td>
							</tr>
							<tr>
								<td>看護師</td>
								<td>&nbsp;</td>
								<td>理学療法士</td>
								<td>&nbsp;</td>
								<td>作業療法士</td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td>保育士</td>
								<td>&nbsp;</td>
								<td>保健師</td>
								<td>&nbsp;</td>
								<td>栄養士</td>
								<td>1&nbsp;</td>
							</tr>
							<tr>
								<td>調理師</td>
								<td>&nbsp;</td>
								<td>介護支援専門員</td>
								<td>3&nbsp;</td>
								<td>社会福祉士</td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td>専門職員その他人数</td>
								<td>&nbsp;</td>
								<td>専門職員その他</td>
								<td colspan="3">&nbsp;</td>
							</tr>
							</table>
						</td>
					</tr>
					</table>
					<div class="pagetop"><a href="#top">page top△</a></div>

					<h4 class="resultTitle">４　サービス利用のために</h4>
					<table width="99%" cellspacing="0" cellpadding="2" class="resultTable">
					<tr>
						<th>利用申込方法</th>
						<td width="84%">電話または直接事業所に&nbsp;</td>
					</tr>
					<tr>
						<th>申請窓口開設時間</th>
						<td>9時00分から17時00分&nbsp;</td>
					</tr>
					<tr>
						<th>申請時注意事項</th>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<th>サービス決定までの時間</th>
						<td>迅速に対応いたします&nbsp;</td>
					</tr>
					<tr>
						<th>サービス提供マニュアル</th>
						<td>

							あり&nbsp;

							業務マニュアル等&nbsp;
						</td>
					</tr>

					<tr>
						<th>苦情対応</th>
						<td>
							<table width="100%" border="0" cellspacing="0" cellpadding="0" class="resultTable2">
							<tr>
								<td width="35%">窓口設置</td>
								<td width="75%">

									あり

								</td>
							</tr>
							<tr>
								<td>第三者委員会の設置</td>
								<td>

									－

								</td>
							</tr>
							</table>
						</td>
					</tr>
					</table>
					<div class="pagetop"><a href="#top">page top△</a></div>

					<h4 class="resultTitle">５　事業所から利用（希望）者のみなさまへ</h4>
					<table width="99%" cellspacing="0" cellpadding="2" class="resultTable">
					<tr>
						<th width="16%">サービス方針</th>
						<td width="84%">住み慣れた地域での暮らしが健やかに過ごせるための方法を、ケアマネージャーがご一緒に考えて計画します。&nbsp;</td>
					</tr>
					<tr>
						<th>特徴</th>
						<td>特に精神科領域での経験をベースに、各自治体の精神障害者相談事業所や精神科訪問看護事業所との連携をもちます。<BR>また当事業所では、必要に応じてケアマネージャーの他に支援員による訪問も行うことができます。&nbsp;</td>
					</tr>
					<tr>
						<th>利用者へのPR</th>
						<td>要介護の高齢者の方のご自宅での暮らしが健やかに過ごせるための方法を、ケアマネージャーがご一緒に考えて計画します。<BR>特に精神科領域での経験をベースに、各自治体の精神障害者相談事業所や精神科訪問看護事業所との連携をもちます。<BR>また当事業所では、必要に応じてケアマネージャーの他に支援員による訪問も行うことができます。&nbsp;</td>
					</tr>
					</table>
					<div class="pagetop"><a href="#top">page top△</a></div>




					<h4 class="resultTitle">６　事業所提供資料</h4>

					<table width="99%" cellspacing="0" cellpadding="2" class="resultTable">
					<tr>
						<td colspan="3">

							<br>
						</td>
					</tr>

					<tr>
						<td width="33%" class="imagebox"><img src="common/img/tamapura_pic_1.jpg" alt="事務所風景" border="0"></td>

						<td width="33%" class="imagebox"><img src="common/img/tamapura_pic_2.jpg" alt="相談室" border="0"></td>

						<td width="33%" class="imagebox"><img src="common/img/tamapura.jpg" alt="事務所無人" border="0"></td>

					</tr>
					<tr>

						<td class="imagebox">事務所風景</td>

						<td class="imagebox">相談室</td>

						<td class="imagebox">事務所無人</td>

					</tr>

					</table>
					<div class="pagetop"><a href="#top">page top△</a></div>

					<a name="name_job" id="name_job"></a>

					<h4 class="resultTitle">７　求人情報</h4>

					
					<table width="99%" cellspacing="0" cellpadding="2" class="resultTable">

					<tr>
						<td solspan="2">登録なし&nbsp;</td>
					</tr>

					</table>
					<div class="pagetop"><a href="#top">page top△</a></div>


				</div><!-- end card -->  
 			</div><!-- end maincol -->
		</div><!-- end pagebody -->
		<!-- right -->
		<div id="sideRight"> </div><!-- end #sideRight -->
		<br class="clearfloat" />
	</div><!-- end jigyousyo -->
</main>   

<?php
	require_once 'footer.html'; 
?>
</body>

</html>
<?php

    }
    catch(Exception $e)
    {

		# エラーを示します。
		require_once 'error_shori_tamapura.php';
        exit();
    }
    ?>
