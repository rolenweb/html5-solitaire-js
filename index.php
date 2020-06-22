﻿<?php
$language = isset($_REQUEST['l']) ? $_REQUEST['l'] : 'en';

$message = [
    'en' => [
        'title' => 'Free Solitaire Klondike',
        'options' => 'Options',
        'sound' => 'Sound',
        'restart' => 'Restart',
        'undo' => 'Undo',
        'redo' => 'Redo',
        'game' => 'Game',
        'score' => 'Score',
        'enter_your_name' => 'Enter your name',
        'points' => 'Points',
        'skip_ads' => 'Skip Ads',
        'sec' => 'sec',
        'ad' => 'Ad',
    ],
    'ru' => [
        'title' => 'Пасьянс косынка играть',
        'options' => 'Настройки',
        'sound' => 'Звук',
        'restart' => 'Рестарт',
        'undo' => 'Отменить',
        'redo' => 'Вернуться',
        'game' => 'Игра',
        'score' => 'Счет',
        'enter_your_name' => 'Ваше имя',
        'points' => 'Очков',
        'skip_ads' => 'Пропустить рекламу',
        'sec' => 'сек',
        'ad' => 'Реклама',
    ]
];
if (!isset($message[$language])) {
    $language = 'en';
}

$ads = [
    'ru' => [
        'video' => [
            [
                'target' => 'https://totalbattle.com/',
                'src' => 'video_1.mp4',
                'type' => 'video/mp4'
            ],
            [
                'target' => 'https://totalbattle.com/',
                'src' => 'video_2.mp4',
                'type' => 'video/mp4'
            ],
            [
                'target' => 'https://www.warframe.com/',
                'src' => 'WF_Hildryn_EvergreenAd_1920x1080_60fps_h264_FNL.mp4',
                'type' => 'video/mp4'
            ],

            [
                'target' => 'https://plarium.com/landings/ru/desktop/raid/icegolem_f036_a_rdoapp',
                'src' => 'RAD_Luda_Dragon_1920x1080_EN_v01_no-OS_20sec_3822_IMG=1KGB.mp4',
                'type' => 'video/mp4'
            ]


        ]
    ],
    'en' => [
        'video' => [
            [
                'target' => 'https://totalbattle.com/',
                'src' => 'video_1.mp4',
                'type' => 'video/mp4'
            ],
            [
                'target' => 'https://totalbattle.com/',
                'src' => 'video_2.mp4',
                'type' => 'video/mp4'
            ],
            [
                'target' => 'https://www.warframe.com/',
                'src' => 'WF_Hildryn_EvergreenAd_1920x1080_60fps_h264_FNL.mp4',
                'type' => 'video/mp4'
            ],

            [
                'target' => 'https://plarium.com/landings/ru/desktop/raid/icegolem_f036_a_rdoapp',
                'src' => 'RAD_Luda_Dragon_1920x1080_EN_v01_no-OS_20sec_3822_IMG=1KGB.mp4',
                'type' => 'video/mp4'
            ]
        ]
    ],
];

$messageLang = $message[$language];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset=utf-8 />
	<!--<meta name="viewport" content="width=1024,height=768" />-->
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />

	<link href="/favicon.ico" rel="shortcut icon" type="image/x-icon" /> 
	
	<title><?php echo $messageLang['title'] ?></title>
	
	<link rel="stylesheet" href="css/main.css" type="text/css" />
	<link rel="stylesheet" href="css/jquery.gritter.css" type="text/css" />
	<link rel="stylesheet" href="css/transitions.css" type="text/css" />

	<script src="https://code.jquery.com/pep/0.3.0/pep.js"></script>
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.6.2.min.js"></script>
	<script type="text/javascript" src="js/jquery.gritter.min.js"></script>
	<script type="text/javascript" src="js/Lawnchair.js"></script>
	<script type="text/javascript" src="js/adaptors/LawnchairAdaptorHelpers.js"></script>
	<script type="text/javascript" src="js/adaptors/DOMStorageAdaptor.js"></script>

	<script type="text/javascript" src="js/Console.js"></script>
	<script type="text/javascript" src="js/ConfigurationManager.js"></script>
	
	<!-- DB stuff -->
	<script type="text/javascript" src="js/DBManager.js"></script>
	<!-- /DB stuff -->

	<script type="text/javascript" src="js/SoundManager.js"></script>
	<script type="text/javascript" src="js/TimerManager.js"></script>
	<script type="text/javascript" src="js/EventsManager.js"></script>
	<script type="text/javascript" src="js/Card.js"></script>
	<script type="text/javascript" src="js/Deck.js"></script>
	<script type="text/javascript" src="js/Misc.js"></script>
	<script type="text/javascript" src="js/Particles.js"></script>
	<script type="text/javascript" src="js/game.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <script type="text/javascript" src="js/ads/ads.js"></script>
	<script type="text/javascript">
		$(function() {
			WarpKlondikeMain.init();
            new Ads(true, document.getElementById('ads'), messageLang, <?php echo json_encode($ads[$language]) ?>);
		});
        const messageLang = <?php echo json_encode($message[$language]) ?>;
        localStorage.setItem('messageLang', JSON.stringify(messageLang));
	</script>
	<link href='http://fonts.googleapis.com/css?family=La+Belle+Aurore&v1' rel='stylesheet' type='text/css'>
</head>
<body class="hd" touch-action="none">
	<div id="pause">
		<p>Pause</p>
	</div>

	<div id="playground" class="light">
		<!-- overlay Pause element -->
	</div>

	<form id="options" class="dialog">
		<fieldset>
            <!--<div class="check" id="sound"><?php /*echo $messageLang['sound'] */?></div>-->
			<div class="check" id="autoFlip">autoFlip</div>
			<div class="check" id="autoPlay">autoPlay</div>
			<ul id="themeList">
				<li>
					<a href="#" class="themeSelect"><img src="css/themes/fantasy/preview.png" alt="fantasy" /></a><br />
					Fantasy
				</li>


			</ul>
		<div class="ok"></div>
		</fieldset>
	</form>

	<div id="scores" class="dialog">
		<ul></ul>
		<div class="ok"></div>
	</div>

	<div id="youWon" class="dialog">
		<div class="contents">
			<strong><?php echo $messageLang['score'] ?>: </strong><span class="score">328</span>
			<p><u><?php echo $messageLang['enter_your_name'] ?></u></p>
			<input type="text" name="userName" id="userName" width="20" />
			<br />
			<div class="check checked" id="tweetScore">Tweet score</div>
			<div style="margin-top:15px;" class="ok"></div>
		</div>
	</div>

	<div id="statusPanel">
		<div class="score">0 <?php echo $messageLang['points'] ?></div><div class="time">00 : 00</div><div class="startAgain"><?php echo $messageLang['restart'] ?></div><div class="undo"><?php echo $messageLang['undo'] ?></div>
	</div>

	<div id="optionsPanel">
		<!-- <button class="icon home" id="gotoHome">Home</button> -->
		<button class="icon options" id="menuToggle"><?php echo $messageLang['options'] ?></button>
		<button class="icon scores" id="showScores"><?php echo $messageLang['score'] ?></button>
		<div style="position:absolute;width:214px;height:21px;z-index:2;right:0;top:4px;">
			<a href="http://twitter.com/share" class="twitter-share-button" data-text="I enjoyed playing SolitaireHD, nice #HTML5 game by @warpdesign_ :) → " data-count="horizontal">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
			<iframe src="http://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.warpdesign.fr%2Fsolitairehd&amp;layout=button_count&amp;show_faces=true&amp;width=90&amp;action=like&amp;font=arial&amp;colorscheme=dark&amp;height=21" scrolling="no" frameborder="0" style="display:inline-block; border:none; overflow:hidden; width:90px; height:21px;"></iframe>
		</div>
	</div>

	<div id="shadow"></div>
	<div id="splash"><div class="content"></div></div>
    <div id="ads" style="position: absolute; background-color: black;width: 100%;height: 100%;z-index: 1000;top: 0;left: 0; overflow: hidden">
</body>
</html>