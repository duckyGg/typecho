<?php	

class HandsomeOptimize_Plugin_Constant {

    // 网站灰白模式
    public const WebSiteBlackWhite = [
        'webSiteBlackWhite',
        'html{-webkit-filter: grayscale(100%);}'
    ];

    // 网站加载动画
    public const PageLoading = [
        'pageLoading',
        '#PageLoading{background-color: #fff;height: 100%;width: 100%;position: fixed;z-index: 1;margin-top: 0px;top: 0px;}#PageLoading-center {width: 100%;height: 100%;position: relative;}#PageLoading-center-absolute {position: absolute;left: 50%;top: 50%;height: 200px;width: 200px;margin-top: -100px;margin-left: -100px;}.object2 {-moz-border-radius: 50% 50% 50% 50%;-webkit-border-radius: 50% 50% 50% 50%;border-radius: 50% 50% 50% 50%;position: absolute;border-left: 5px solid #FFB6C1;border-right: 5px solid #b6def7;border-top: 5px solid transparent;border-bottom: 5px solid transparent;-webkit-animation: animate 2s infinite;animation: animate 2s infinite;}#object_one {left: 75px;top: 75px;width: 50px;height: 50px;}#object_two {left: 65px;top: 65px;width: 70px;height: 70px;-webkit-animation-delay: 0.1s;animation-delay: 0.1s;}#object_three {left: 55px;top: 55px;width: 90px;height: 90px;-webkit-animation-delay: 0.2s;animation-delay: 0.2s;}#object_four {left: 45px;top: 45px;width: 110px;height: 110px;-webkit-animation-delay: 0.3s;animation-delay: 0.3s;}@-webkit-keyframes animate {50% {-ms-transform: rotate(180deg);-webkit-transform: rotate(180deg);transform: rotate(180deg);}100% {-ms-transform: rotate(0deg);-webkit-transform: rotate(0deg);transform: rotate(0deg);}}@keyframes animate {50% {-ms-transform: rotate(180deg);-webkit-transform: rotate(180deg);transform: rotate(180deg);}100% {-ms-transform: rotate(0deg);-webkit-transform: rotate(0deg);transform: rotate(0deg);}}',
        '$(function(){$("#PageLoading").fadeOut(400);$("#body").css(\'overflow\',\'\');});',
        '<body id="body" class="fix-padding" style="overflow:hidden"><div id="PageLoading" style="z-index:99999999;"><div id="PageLoading-center"><div id="PageLoading-center-absolute"><div class="object2" id="object_four"></div><div class="object2" id="object_three"></div><div class="object2" id="object_two"></div><div class="object2" id="object_one"></div></div></div></div></body>',
    ];

    // Logo扫光
    public const LogoScan = [
        'logoScan',
        '.navbar-brand{position:relative;overflow:hidden;margin: 0px 0 0 0px;}.navbar-brand:before{content:""; position: absolute; left: -665px; top: -460px; width: 200px; height: 15px; background-color: rgba(255,255,255,.5); -webkit-transform: rotate(-45deg); -moz-transform: rotate(-45deg); -ms-transform: rotate(-45deg); -o-transform: rotate(-45deg); transform: rotate(-45deg); -webkit-animation: searchLights 6s ease-in 0s infinite; -o-animation: searchLights 6s ease-in 0s infinite; animation: searchLights 6s ease-in 0s infinite;}@-moz-keyframes searchLights{50%{left: -100px; top: 0;} 65%{left: 120px; top: 100px;}}@keyframes searchLights{40%{left: -100px; top: 0;} 60%{left: 120px; top: 100px;} 80%{left: -100px; top: 0px;}}',
    ];

    // 顶部进度条，显示当前页面查看进度
    public const TopProgress = [
        'topProgress',
        '',
        'window.onscroll = function(){let pageHeight = document.body.scrollHeight || document.documentElement.scrollHeight;let windowHeight = document.body.clientHeight || document.documentElement.clientHeight;let scrollAvail = pageHeight - windowHeight;let scrollTop = document.documentElement.scrollTop || document.body.scrollTop;document.getElementById(\'top-progress\').style.width = (scrollTop / scrollAvail) * 100 + \'%\';}',
        '<div id="top-progress" style="position: fixed; top: 0; height: 5px; background: rgba(78, 170, 233, 0.7); border-radius: 500px; z-index: 5200;"></div>',
    ];

    // 左侧头像hover旋转放大
    public const AvatarHover = [
        'avatarHover',
        '.img-circle {border-radius: 50%;animation: light 4s ease-in-out infinite;transition: all 0.5s;}.img-circle:hover {transform: scale(1.15) rotate(720deg);}@keyframes light {0% {box-shadow: 0 0 4px #f00;}25% {box-shadow: 0 0 16px #0f0;}50% {box-shadow: 0 0 4px #00f;}75% {box-shadow: 0 0 16px #0f0;}100% {box-shadow: 0 0 4px #f00;}}'
    ];

    // 文章列表区块hover上浮发光
    public const PostListHover = [
        'postListHover',
        '.post-list .panel:not(article){transition: all 0.3s;}.post-list .panel:not(article):hover {transform: translateY(-10px);box-shadow: 0 8px 10px rgba(73, 90, 47, 0.47);}'
    ];

    // 文章详情头图hover放大
    public const ContentHeaderImgHover = [
        'contentHeaderImgHover',
        '.entry-thumbnail{overflow: hidden;}.entry-thumbnail .item-thumb {transition: all 0.4s;}.entry-thumbnail .item-thumb:hover {transform: scale(1.04);}'
    ];

    // 文章评论增加边框
    public const CommentsBorder = [
        'commentsBorder',
        '#post-comment-list .comment-parent{margin: 1%;padding: 12px 12px 0px 12px;border-radius: 25px;border: 1px  solid rgba(0, 0, 0, .3);}.theme-dark #post-comment-list .comment-parent {border: 1px solid rgba(255, 255, 255, .3);}'
    ];

    // 文章复制，末尾追加版权说明
    public const CopyrightInfo = [
        'copyrightInfo',
        '',
        "document.body.addEventListener('copy', function (e) {if (window.getSelection().toString() && window.getSelection().toString().length > 100 && document.getElementsByClassName('meta-author').size > 0) {setClipboardText(e);}}); function setClipboardText(event) {var clipboardData = event.clipboardData || window.clipboardData; var author = document.getElementsByClassName('meta-author')[0].lastChild.innerText;if (clipboardData) {event.preventDefault();var htmlData = window.getSelection().toString() + '<br><br>作者：' + author + '<br>链接：' + window.location.href + '<br>若无注明，本文著作权归作者所有。<br>商业转载请联系作者获得授权，非商业转载请注明出处，谢谢！<br>本站转载文章版权及解释权归原作者所有，博主只是勤劳的搬运工！';var textData = window.getSelection().toString() + '\\n\\n作者：' + author + '\\n链接：' + window.location.href + '\\n若无注明，本文著作权归作者所有。\\n商业转载请联系作者获得授权，非商业转载请注明出处，谢谢！\\n本站转载文章版权及解释权归原作者所有，博主只是勤劳的搬运工！';clipboardData.setData('text/html', htmlData);clipboardData.setData('text/plain', textData);}}"
    ];

    // 右侧热门/评论/随机内容头像hover旋转
    public const RightListImgHover = [
        'rightListImgHover',
        '#tabs-4 .img-square{transition: all 0.3s;}#tabs-4 .img-square:hover{transform: rotate(360deg);}'
    ];

    // 网站响应耗时和访客总数
    public const WebSiteInfo = [
        'webSiteInfo',
        'html{-webkit-filter: grayscale(100%);}'
    ];

    // 右下方增加可爱的躲猫猫-切换主题自动变色
    public const CatSvg = [
        'catSvg',
        '@media screen and (min-width:960px){#cat-svg{position: fixed;bottom: 40px;right: -5px;width: 57px;height: 70px;background-image: url(/usr/plugins/HandsomeOptimize/static/image/cat-white.svg);background-position: center;background-size: cover;background-repeat: no-repeat;transition: background .3s;}.theme-dark #cat-svg {position: fixed;bottom: 40px;right: -5px;width: 57px;height: 70px;background-image: url(/usr/plugins/HandsomeOptimize/static/image/cat-black.svg);background-position: center;background-size: cover;background-repeat: no-repeat;transition: background .3s;}#cat-svg:hover{background-position: 60px 50%;}}',
        '',
        '',
        '<div id="cat-svg"></div>'
    ];

    public const cssArray
        = [
            self::WebSiteBlackWhite[1] => self::WebSiteBlackWhite[0],
            self::PageLoading[1] => self::PageLoading[0],
            self::LogoScan[1] => self::LogoScan[0],
            self::AvatarHover[1] => self::AvatarHover[0],
            self::PostListHover[1] => self::PostListHover[0],
            self::ContentHeaderImgHover[1] => self::ContentHeaderImgHover[0],
            self::CommentsBorder[1] => self::CommentsBorder[0],
            self::RightListImgHover[1] => self::RightListImgHover[0],
            self::WebSiteInfo[1] => self::WebSiteInfo[0],
            self::CatSvg[1] => self::CatSvg[0],
        ];

    public const jsArray
        = [
            self::TopProgress[2] => self::TopProgress[0],
            self::PageLoading[2] => self::PageLoading[0],
            self::CopyrightInfo[2] => self::CopyrightInfo[0],
        ];

    public const headerHtml
        = [
            self::TopProgress[3] => self::TopProgress[0],
            self::PageLoading[3] => self::PageLoading[0],
        ];

    public const footerHtml
        = [
            self::CatSvg[4] => self::CatSvg[0],
        ];

}
