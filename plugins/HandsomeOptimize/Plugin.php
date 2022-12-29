<?php

use Typecho\Plugin;
use Typecho\Plugin\Exception;
use Typecho\Plugin\PluginInterface;
use Typecho\Widget;
use Typecho\Widget\Helper\Form;
use Typecho\Widget\Helper\Form\Element\Select;
use Typecho\Widget\Helper\Layout;

use Utils\Helper;

include 'libs/Form.php';
include 'libs/Constant.php';

/**
 * 基于Handsome主题美化/交互效果，具体优化项可查看设置详情
 * @package HandsomeOptimize
 * @author ducky
 * @version 1.0.0
 * @link https://ducky.vip
 */
class HandsomeOptimize_Plugin implements PluginInterface
{

    /**
     * 激活插件方法,如果激活失败,直接抛出异常
     *
     * @access public
     * @return void
     */
    public static function activate()
    {
        Plugin::factory('Widget_Archive')->header = array('HandsomeOptimize_Plugin', 'init');
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

        $about = new Select("about", array(1 => "插件帮助文档，可点击下方链接访问并查看"), 1, "", "<strong style='color: red'>HandsomeOptimize插件相关帮助、美化/交互效果可查看：</strong><a target='_blank' href='https://ducky.vip'>帮助文档</a>");
        $form->addInput($about);

        $hr = new Layout();
        $hr->html(_t('<hr>'));
        $form->addItem($hr);

        $overall = new Layout();
        $overall->html(_t('<h2>全局美化</h2>'));
        $form->addItem($overall);
        // 网站灰白模式
        $form->addInput(HandsomeOptimize_Plugin_Form::WebSiteBlackWhite());
        // 网站加载动画
        $form->addInput(HandsomeOptimize_Plugin_Form::PageLoading());
        $form->addItem($hr);

        $top = new Layout();
        $top->html(_t('<h2>顶部栏美化</h2>'));
        $form->addItem($top);
        // Logo扫光
        $form->addInput(HandsomeOptimize_Plugin_Form::LogoScan());
        // 顶部进度条，显示当前页面查看进度
        $form->addInput(HandsomeOptimize_Plugin_Form::TopProgress());
        $form->addItem($hr);

        $left = new Layout();
        $left->html(_t('<h2>左侧栏美化</h2>'));
        $form->addItem($left);
        // 左侧头像hover旋转放大
        $form->addInput(HandsomeOptimize_Plugin_Form::AvatarHover());
        $form->addItem($hr);

        $panel = new Layout();
        $panel->html(_t('<h2>中间Panel美化</h2>'));
        $form->addItem($panel);
        // 文章列表区块hover上浮发光
        $form->addInput(HandsomeOptimize_Plugin_Form::PostListHover());
        // 文章详情头图hover放大
        $form->addInput(HandsomeOptimize_Plugin_Form::ContentHeaderImgHover());
        // 文章评论增加边框
        $form->addInput(HandsomeOptimize_Plugin_Form::CommentsBorder());
        // 文章复制，末尾追加版权说明
        $form->addInput(HandsomeOptimize_Plugin_Form::CopyrightInfo());
        // 复制超过多少字符追加版权说明
        $form->addInput(HandsomeOptimize_Plugin_Form::CharSize());
        $form->addItem($hr);

        $right = new Layout();
        $right->html(_t('<h2>右侧栏美化</h2>'));
        $form->addItem($right);
        // 右侧热门/评论/随机内容头像hover旋转
        $form->addInput(HandsomeOptimize_Plugin_Form::RightListImgHover());
        // 右下方增加可爱的躲猫猫-切换主题自动变色
        $form->addInput(HandsomeOptimize_Plugin_Form::CatSvg());
        // 响应耗时和访客总数
        $form->addInput(HandsomeOptimize_Plugin_Form::WebSiteInfo());
        $form->addItem($hr);

        $bottom = new Layout();
        $bottom->html(_t('<h2>底部栏美化</h2>'));
        $form->addItem($bottom);
        $form->addItem($hr);

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

    private static string $optimizeCss = '';
    private static string $optimizeJs = '';
    private static string $headerHtml = '';
    private static string $footerHtml = '';

    /**
     * 配置信息初始化，包含header和footer
     *
     * @throws Exception
     */
    public static function init()
    {
        echo "<script>console.log('%c  欢迎使用Handsome主题优化插件 HandsomeOptimize By ducky https://ducky.vip    ', 'color:#fff;background: linear-gradient(to right , #7A88FF, #d27aff);padding:5px;border-radius: 10px;');</script>";

        $HandsomeOptimize = Helper::options()->plugin('HandsomeOptimize');
        //echo "<script>console.log('" . $HandsomeOptimize . "');</script>";

        self::$optimizeCss = '';
        self::$optimizeJs = '';
        self::$headerHtml = '';
        self::$footerHtml = '';
        foreach ($HandsomeOptimize as $key => $value) {
            if ($value && $value == true) {
                self::$optimizeCss .= strval(array_keys(HandsomeOptimize_Plugin_Constant::cssArray, $key, true)[0]);
                self::$optimizeJs .= strval(array_keys(HandsomeOptimize_Plugin_Constant::jsArray, $key, true)[0]);
                self::$headerHtml .= strval(array_keys(HandsomeOptimize_Plugin_Constant::headerHtml, $key, true)[0]);
                self::$footerHtml .= strval(array_keys(HandsomeOptimize_Plugin_Constant::footerHtml, $key, true)[0]);
                //echo "<script>console.log('" . self::$optimizeCss . "');</script>";
                //echo "<script>console.log('" . $key . "——" . $value . "');</script><br/>";
            }
        }

        if (!empty(self::$optimizeCss) && !empty(self::$optimizeJs)) {
            Widget::widget('Widget_Notice')->set(_t("更新本地离线缓存成功"), 'success');
        } else {
            Widget::widget('Widget_Notice')->set(_t("更新本地离线缓存失败", 'error'), 'error');
        }

    }

    /**
     * 页头输出相关代码
     */
    public static function header()
    {
        echo self::$headerHtml;
        echo '<style type="text/css">' . self::$optimizeCss . '</style>';;
    }

    /**
     * 为footer添加js文件
     */
    public static function footer()
    {
        echo '<script id="https://ducky.vip">' . self::$optimizeJs . '</script>';
        echo self::$footerHtml;
    }
}
