<?php
    session_start();//登录系统开启一个session内容
    $text1=htmlspecialchars($_REQUEST["text1"]);//获取html中的用户名（通过post请求）
    $key='welcometowebctf';
    if($text1!=$key)
    {
        ?>
        <script type="text/javascript">
					window.location.href="index.html";
		</script>
        <?php
    }
    else
    {
        echo "flag=leectf{follow_me_to_exploit}";
    }
?>