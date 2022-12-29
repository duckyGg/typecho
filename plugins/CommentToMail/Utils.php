<?php

//解析表情
function parseBiaoQing($content) {
	$emopath=$_SERVER['REQUEST_SCHEME'].":". DIRECTORY_SEPARATOR . DIRECTORY_SEPARATOR . $_SERVER['HTTP_HOST'];
	$emo = false;
	global $emo;
	if(!$emo) {
		$emo = json_decode(file_get_contents(dirname(dirname(dirname(__FILE__))).'/themes/handsome/usr/OwO.json'), true);
	}
	foreach ($emo as $v) {
		if($v['type'] == 'image') {
			foreach ($v['container'] as $vv) {
				$emoaa=" ::".$v['name'].":".$vv['icon'].":: ";
				$content = str_replace($emoaa, '  <img style="max-height:40px;vertical-align:middle;" src="'.$emopath.'/usr/themes/handsome/assets/img/emotion/'.$v['name'].'/'.$vv['icon'] .'.png"  alt="'.$vv['text'] .'">  ', $content);
			}
		}
	}
	return $content;
}
//解析头像
function getAuthorImg($email) {
	$a='gravatar.helingqi.com/wavatar';
	//gravatar头像源
	$b=str_replace('@qq.com','',$email);
	if(stristr($email,'@qq.com')&&is_numeric($b)&&strlen($b)<11&&strlen($b)>4) {
		$nk = 'https://s.p.qq.com/pub/get_face?img_type=3&uin='.$b;
		$c = get_headers($nk, true);
		$d = $c['Location'];
		$q = json_encode($d);
		$k = explode("&k=",$q)[1];
		$imgurl='https://q.qlogo.cn/g?b=qq&k='.$k.'&s=100';
		return $imgurl;
	} else {
		$email= md5($email);
		$imgurl= 'https://'.$a.'/'.$email.'?';
		return $imgurl;
	}
}
?>