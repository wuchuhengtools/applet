<?php
		$ch = curl_init();
		// 请求的网址
		$url    = "http://www.iekuang.com/msg/send.do";


		$cookie = 'JSESSIONID=81E1967828A7A262B26B63186BA5CA1B; UM_distinctid=15f1002eef423f-0b57108a4538e5-3a3e5e06-15f900-15f1002eef5286; CNZZDATA1262547018=574622081-1507797478-null%7C1507797478; CNZZDATA1260482203=384823170-1507797498-null%7C1507797498; Hm_lvt_4d1029ed5e4991dc6555e682947fcf25=1507802149,1507802167; Hm_lpvt_4d1029ed5e4991dc6555e682947fcf25=1507802167';


		$data   = 'p_code=15817127803';


		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_COOKIE, $cookie);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko)Chrome/60.0.3112.101 Safari/537.36');

		curl_setopt($ch, CURLOPT_REFERER, 'http://www.iekuang.com/doc/register/index.html');
		$resoult  = curl_exec($ch);
		var_dump($resoult);