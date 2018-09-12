<?php
	function curl($url,$phone,$data=null,$timeout=5)
	{
		$useragent  = 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:35.0) Gecko/20100101 Firefox/35.0';
        $referer    = 'http://www.baidu.com/';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_USERAGENT,$useragent);
        curl_setopt($ch, CURLOPT_REFERER,$referer);
        curl_setopt($ch, CURLOPT_COOKIE,$cookie);
        
        // get方式
        if( empty($data) )
        {
            // 将结果返回 不自动输出
            curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
            // 超时秒数
            curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
        }
        // post方式
        if( is_array($data) )
        {
            curl_setopt($ch, CURLOPT_POST,true);
            curl_setopt($ch, CURLOPT_POSTFIELDS,$data);
        }
        // 获得返回的数据
        $result = curl_exec($ch);
        curl_close($ch);

		echo "留言成功{$phone}";
	}