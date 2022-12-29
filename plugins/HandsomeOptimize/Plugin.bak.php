<?php

use Typecho\Plugin;
use Typecho\Plugin\Exception;
use Typecho\Plugin\PluginInterface;
use Typecho\Widget;
use Typecho\Widget\Helper\Form;
use Typecho\Widget\Helper\Form\Element\Hidden;
use Typecho\Widget\Helper\Form\Element\Radio;
use Typecho\Widget\Helper\Form\Element\Select;
use Typecho\Widget\Helper\Layout;

use Utils\Helper;

/**
 * 基于Handsome主题美化/交互效果，具体优化项可查看设置详情
 * @package HandsomeOptimize
 * @author ducky
 * @version 1.0.0
 * @link https://ducky.vip
 */
class HandsomeOptimize_Plugin implements PluginInterface
{

    const STATIC_DIR = '/usr/plugins/HandsomeOptimize/static';

    const CSS_SOURCE_FILE = __TYPECHO_ROOT_DIR__ . self::STATIC_DIR . "/css/optimize.css";

    const JS_SOURCE_FILE = __TYPECHO_ROOT_DIR__ . self::STATIC_DIR . "/js/optimize.js";

    //灰白模式
    const HTML_GRAYSCALE = 'html{-webkit-filter: grayscale(100%);}';

    //页面Loading动画CSS
    const PAGE_LOADING_CSS = '#PageLoading{background-color: #fff;height: 100%;width: 100%;position: fixed;z-index: 1;margin-top: 0px;top: 0px;}#PageLoading-center {width: 100%;height: 100%;position: relative;}#PageLoading-center-absolute {position: absolute;left: 50%;top: 50%;height: 200px;width: 200px;margin-top: -100px;margin-left: -100px;}.object2 {-moz-border-radius: 50% 50% 50% 50%;-webkit-border-radius: 50% 50% 50% 50%;border-radius: 50% 50% 50% 50%;position: absolute;border-left: 5px solid #FFB6C1;border-right: 5px solid #b6def7;border-top: 5px solid transparent;border-bottom: 5px solid transparent;-webkit-animation: animate 2s infinite;animation: animate 2s infinite;}#object_one {left: 75px;top: 75px;width: 50px;height: 50px;}#object_two {left: 65px;top: 65px;width: 70px;height: 70px;-webkit-animation-delay: 0.1s;animation-delay: 0.1s;}#object_three {left: 55px;top: 55px;width: 90px;height: 90px;-webkit-animation-delay: 0.2s;animation-delay: 0.2s;}#object_four {left: 45px;top: 45px;width: 110px;height: 110px;-webkit-animation-delay: 0.3s;animation-delay: 0.3s;}@-webkit-keyframes animate {50% {-ms-transform: rotate(180deg);-webkit-transform: rotate(180deg);transform: rotate(180deg);}100% {-ms-transform: rotate(0deg);-webkit-transform: rotate(0deg);transform: rotate(0deg);}}@keyframes animate {50% {-ms-transform: rotate(180deg);-webkit-transform: rotate(180deg);transform: rotate(180deg);}100% {-ms-transform: rotate(0deg);-webkit-transform: rotate(0deg);transform: rotate(0deg);}}';

    //LOGO扫光
    const LOGO_FLICKER = '.navbar-brand{position:relative;overflow:hidden;margin: 0px 0 0 0px;}.navbar-brand:before{content:""; position: absolute; left: -665px; top: -460px; width: 200px; height: 15px; background-color: rgba(255,255,255,.5); -webkit-transform: rotate(-45deg); -moz-transform: rotate(-45deg); -ms-transform: rotate(-45deg); -o-transform: rotate(-45deg); transform: rotate(-45deg); -webkit-animation: searchLights 6s ease-in 0s infinite; -o-animation: searchLights 6s ease-in 0s infinite; animation: searchLights 6s ease-in 0s infinite;}@-moz-keyframes searchLights{50%{left: -100px; top: 0;} 65%{left: 120px; top: 100px;}}@keyframes searchLights{40%{left: -100px; top: 0;} 60%{left: 120px; top: 100px;} 80%{left: -100px; top: 0px;}}';

    //左侧头像hover旋转放大
    const AVATAR_HOVER = '.img-circle {border-radius: 50%;animation: light 4s ease-in-out infinite;transition: all 0.5s;}.img-circle:hover {transform: scale(1.15) rotate(720deg);}@keyframes light {0% {box-shadow: 0 0 4px #f00;}25% {box-shadow: 0 0 16px #0f0;}50% {box-shadow: 0 0 4px #00f;}75% {box-shadow: 0 0 16px #0f0;}100% {box-shadow: 0 0 4px #f00;}}';

    //文章评论信息增加边框
    const COMMENT_ADD_FRAME = '.comment-parent{margin: 1%;padding: 2%;border-radius: 25px;border: 1px solid rgba(255,255,255,.3);}';

    //首页文章列表hover上浮
    const POST_LIST_HOVER = '.post-list .panel:not(article){transition: all 0.3s;}.post-list .panel:not(article):hover {transform: translateY(-10px);box-shadow: 0 8px 10px rgba(73, 90, 47, 0.47);}';

    //文章详情头图hover放大并隐藏超出
    const CONTENT_HEADER_IMAGE_HOVER = '.entry-thumbnail{overflow: hidden;}.entry-thumbnail .item-thumb {transition: all 0.4s;}.entry-thumbnail .item-thumb:hover {transform: scale(1.04);}';

    //右侧热门文章图片hover转动
    const RIGHT_IMG_SQUARE_HOVER = '.list-group-item .img-square{transition: all 0.3s;}.list-group-item .img-square:hover {transform: rotate(360deg);}';

    public static array $cssMap
        = [
            self::HTML_GRAYSCALE => 'HTML_GRAYSCALE',
            self::PAGE_LOADING_CSS => 'PAGE_LOADING',
            self::LOGO_FLICKER => 'LOGO_FLICKER',
            self::AVATAR_HOVER => 'AVATAR_HOVER',
            self::COMMENT_ADD_FRAME => 'COMMENT_ADD_FRAME',
            self::POST_LIST_HOVER => 'POST_LIST_HOVER',
            self::CONTENT_HEADER_IMAGE_HOVER => 'CONTENT_HEADER_IMAGE_HOVER',
            self::RIGHT_IMG_SQUARE_HOVER => 'RIGHT_IMG_SQUARE_HOVER',
        ];

    //页面Loading动画JS
    const PAGE_LOADING_JS = '$(function(){$("#PageLoading").fadeOut(400);$("#body").css(\'overflow\',\'\');});';

    //文章复制超过100个字符，尾部增加版权说明
    const COPYRIGHT_DESC = "document.body.addEventListener('copy', function (e) {if (window.getSelection().toString() && window.getSelection().toString().length > 100) {setClipboardText(e);}}); function setClipboardText(event) {var clipboardData = event.clipboardData || window.clipboardData; var author = document.getElementsByClassName('meta-author')[0].lastChild.innerText;if (clipboardData) {event.preventDefault();var htmlData = window.getSelection().toString() + '<br><br>作者：' + author + '<br>链接：' + window.location.href + '<br>若无注明，本文著作权归作者所有。<br>商业转载请联系作者获得授权，非商业转载请注明出处，谢谢！<br>本站转载文章版权及解释权归原作者所有，博主只是勤劳的搬运工！';var textData = window.getSelection().toString() + '\\n\\n作者：' + author + '\\n链接：' + window.location.href + '\\n若无注明，本文著作权归作者所有。\\n商业转载请联系作者获得授权，非商业转载请注明出处，谢谢！\\n本站转载文章版权及解释权归原作者所有，博主只是勤劳的搬运工！';clipboardData.setData('text/html', htmlData);clipboardData.setData('text/plain', textData);}}";

    public static array $jsMap
        = [
            self::PAGE_LOADING_JS => 'PAGE_LOADING',
            self::COPYRIGHT_DESC => 'COPYRIGHT_DESC',
        ];

    /**
     * 激活插件方法,如果激活失败,直接抛出异常
     *
     * @access public
     * @return void
     */
    public static function activate()
    {
        Plugin::factory('Widget_Archive')->header = array('HandsomeOptimize_Plugin', 'cache');
        Plugin::factory('Widget_Archive')->header = array('HandsomeOptimize_Plugin', 'header');
        Plugin::factory('Widget_Archive')->footer = array('HandsomeOptimize_Plugin', 'footer');
    }

    /**
     * 禁用插件方法,如果禁用失败,直接抛出异常
     *
     * @static
     * @access public
     * @return void
     */
    public static function deactivate()
    {
    }

    /**
     * 获取插件配置面板
     *
     * @access public
     * @param Form $form 配置面板
     * @return void
     */
    public static function config(Form $form)
    {

        $layout = new Layout();
        $layout->html(_t('<h2>帮助文档</h2>'));
        $form->addItem($layout);

        $about = new Select("about", array(
            1 => "插件帮助文档，可点击下方链接访问并查看",
        ), "1", "", "<strong style='color: red'>HandsomeOptimize插件相关帮助、美化/交互效果可查看：</strong><a target='_blank' href='https://ducky.vip'>帮助文档</a>");
        $form->addInput($about);

        $hr = new Layout();
        $hr->html(_t('<hr>'));
        $form->addItem($hr);

        $HTML_GRAYSCALE = new Radio('HTML_GRAYSCALE', ['0' => _t('不开启'), '1' => _t('开启')], '0', _t('网站灰白模式'), _t(''));
        $form->addInput($HTML_GRAYSCALE);

        $PAGE_LOADING = new Radio('PAGE_LOADING', ['0' => _t('不开启'), '1' => _t('开启')], '0', _t('页面Loading动画'), _t(''));
        $form->addInput($PAGE_LOADING);

        $LOGO_FLICKER = new Radio('LOGO_FLICKER', ['0' => _t('不开启'), '1' => _t('开启')], '0', _t('左上角Logo扫光'), _t(''));
        $form->addInput($LOGO_FLICKER);

        $AVATAR_HOVER = new Radio('AVATAR_HOVER', ['0' => _t('不开启'), '1' => _t('开启')], '0', _t('左侧头像hover旋转放大'), _t(''));
        $form->addInput($AVATAR_HOVER);

        $COMMENT_ADD_FRAME = new Radio('COMMENT_ADD_FRAME', ['0' => _t('不开启'), '1' => _t('开启')], '0', _t('文章评论信息增加边框'), _t(''));
        $form->addInput($COMMENT_ADD_FRAME);

        $POST_LIST_HOVER = new Radio('POST_LIST_HOVER', ['0' => _t('不开启'), '1' => _t('开启')], '0', _t('首页文章列表hover上浮'), _t(''));
        $form->addInput($POST_LIST_HOVER);

        $CONTENT_HEADER_IMAGE_HOVER = new Radio('CONTENT_HEADER_IMAGE_HOVER', ['0' => _t('不开启'), '1' => _t('开启')], '0', _t('文章详情头图hover放大'), _t(''));
        $form->addInput($CONTENT_HEADER_IMAGE_HOVER);

        $RIGHT_IMG_SQUARE_HOVER = new Radio('RIGHT_IMG_SQUARE_HOVER', ['0' => _t('不开启'), '1' => _t('开启')], '0', _t('右侧热门文章图片hover转动'), _t(''));
        $form->addInput($RIGHT_IMG_SQUARE_HOVER);

        $COPYRIGHT_DESC = new Radio('COPYRIGHT_DESC', ['0' => _t('不开启'), '1' => _t('开启')], '0', _t('文章复制超过100个字符，尾部增加版权说明'), _t(''));
        $form->addInput($COPYRIGHT_DESC);

        //将是否修改字段标记为true
        $isUpdated = new Hidden('is_updated');
        $isUpdated->value(true);
        $form->addInput($isUpdated);

    }

    /**
     * 个人用户的配置面板
     *
     * @access public
     * @param Form $form
     * @return void
     */
    public static function personalConfig(Form $form)
    {
    }

    public static function updatePlugin()
    {
        $result = [];
        $result['is_updated'] = false;
        Helper::configPlugin('HandsomeOptimize', $result, false);
    }

    /**
     * 配置相关信息缓存
     *
     * @throws Exception
     */
    public static function cache()
    {
        echo "<script>console.log('%c  欢迎使用Handsome主题优化插件 HandsomeOptimize By ducky https://ducky.vip    ', 'color:#fff;background: linear-gradient(to right , #7A88FF, #d27aff);padding:5px;border-radius: 10px;');</script>";

        $HandsomeOptimize = Helper::options()->plugin('HandsomeOptimize');
        //echo "<script>console.log('" . $HandsomeOptimize . "');</script>";

        $isUpdated = $HandsomeOptimize->is_updated;
        if (!$isUpdated || $isUpdated == false) {
            echo "<script>console.log('HandsomeOptimize插件缓存命中，载入已缓存css样式');</script>";
            return;
        }

        $optimizeCss = '';
        $optimizeJs = '';
        echo "<script>console.log('检测到HandsomeOptimize插件已编辑，重新载入css样式');</script>";
        foreach ($HandsomeOptimize as $key => $value) {
            if ($value && $value == true) {
                $optimizeCss .= strval(array_keys(self::$cssMap, $key, true)[0]);
                $optimizeJs .= strval(array_keys(self::$jsMap, $key, true)[0]);
                //echo "<script>console.log('" .$optimizeCss . "');</script>";
                //echo "<script>console.log('" . $key . "——" . $value . "');</script><br/>";
            }
        }

        //将文件的缓存内容修改
        if (file_put_contents(self::CSS_SOURCE_FILE, $optimizeCss) && file_put_contents(self::JS_SOURCE_FILE, $optimizeJs)) {
            Widget::widget('Widget_Notice')->set(_t("更新本地离线缓存成功"), 'success');
        } else {
            Widget::widget('Widget_Notice')->set(_t("更新本地离线缓存失败", 'error'), 'error');
        }

        //更新插件缓存值
        self::updatePlugin();
    }

    /**
     * 页头输出相关代码
     */
    public static function header()
    {
        $optimizeCss = '<style type="text/css">' . file_get_contents(self::CSS_SOURCE_FILE) . '</style>';
        echo $optimizeCss;
    }

    /**
     * 为footer添加js文件
     */
    public static function footer()
    {
        $optimizeJs = '<script>' . file_get_contents(self::JS_SOURCE_FILE) . '</script>';
        echo $optimizeJs;
    }
}
