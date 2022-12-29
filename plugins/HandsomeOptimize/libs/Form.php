<?php

use Typecho\Widget\Helper\Form\Element\Text;
use Typecho\Widget\Helper\Form\Element\Radio;

class HandsomeOptimize_Plugin_Form
{
    static array $YES_NO = [0 => '关闭', 1 => '开启'];

    // 网站灰白模式
    static function WebSiteBlackWhite(): Radio
    {
        return new Radio(HandsomeOptimize_Plugin_Constant::WebSiteBlackWhite[0], self::$YES_NO, 0, _t('网站灰白模式'), '');
    }

    // 网站加载动画
    static function PageLoading(): Radio
    {
        return new Radio(HandsomeOptimize_Plugin_Constant::PageLoading[0], self::$YES_NO, 0, _t('网站加载动画'), '');
    }

    // Logo扫光
    static function LogoScan(): Radio
    {
        return new Radio(HandsomeOptimize_Plugin_Constant::LogoScan[0], self::$YES_NO, 0, _t('Logo扫光'), '');
    }

    // 顶部进度条，显示当前页面查看进度
    static function TopProgress(): Radio
    {
        return new Radio(HandsomeOptimize_Plugin_Constant::TopProgress[0], self::$YES_NO, 0, _t('顶部进度条，显示当前页面查看进度'), '');
    }

    // 左侧头像hover旋转放大
    static function AvatarHover(): Radio
    {
        return new Radio(HandsomeOptimize_Plugin_Constant::AvatarHover[0], self::$YES_NO, 0, _t('左侧头像hover旋转放大'), '');
    }

    // 文章列表区块hover上浮发光
    static function PostListHover(): Radio
    {
        return new Radio(HandsomeOptimize_Plugin_Constant::PostListHover[0], self::$YES_NO, 0, _t('文章列表区块hover上浮发光'), '');
    }

    // 文章详情头图hover放大
    static function ContentHeaderImgHover(): Radio
    {
        return new Radio(HandsomeOptimize_Plugin_Constant::ContentHeaderImgHover[0], self::$YES_NO, 0, _t('文章详情头图hover放大'), '');
    }

    // 文章评论增加边框
    static function CommentsBorder(): Radio
    {
        return new Radio(HandsomeOptimize_Plugin_Constant::CommentsBorder[0], self::$YES_NO, 0, _t('文章评论增加边框'), '');
    }

    // 文章复制，末尾追加版权说明
    static function CopyrightInfo(): Radio
    {
        //return new Radio(HandsomeOptimize_Plugin_Constant::CopyrightInfo[0], self::$YES_NO, 0, _t('文章复制，末尾追加版权说明（开启后请填写下方字符数限制）'), '');
        return new Radio(HandsomeOptimize_Plugin_Constant::CopyrightInfo[0], self::$YES_NO, 0, _t('文章复制，超过100字符末尾追加版权说明'), '');
    }

    // 复制超过多少字符追加版权说明
    static function CharSize(): Text
    {
        return new Text('charSize', null, '100', _t('复制超过多少字符追加版权说明（填写阿拉伯数字，默认值：100）'));
    }

    // 右侧热门/评论/随机内容头像hover旋转
    static function RightListImgHover(): Radio
    {
        return new Radio(HandsomeOptimize_Plugin_Constant::RightListImgHover[0], self::$YES_NO, 0, _t('右侧热门/评论/随机内容头像hover旋转'), '');
    }

    // 右下方增加可爱的躲猫猫-切换主题自动变色
    static function CatSvg(): Radio
    {
        return new Radio(HandsomeOptimize_Plugin_Constant::CatSvg[0], self::$YES_NO, 0, _t('右下方增加可爱的躲猫猫-切换主题自动变色'), '');
    }

    // 响应耗时和访客总数
    static function WebSiteInfo(): Radio
    {
        return new Radio('siteInfo', self::$YES_NO, 0, _t('响应耗时和访客总数'), '');
    }

    // 顶部导航栏天气
    static function Weather(): Radio
    {
        return new Radio('weather', self::$YES_NO, 0, _t('顶部导航栏天气'), _t('登录<a href="https://www.seniverse.com">心知天气官网</a>注册申请免费API 密钥'));
    }

    // 天气uid
    static function WeatherUID(): Text
    {
        return new Text('weatherUID', null, '', _t('心知天气公钥'));
    }

    // 天气HASH
    static function WeatherHASH(): Text
    {
        return new Text('weatherHash', null, '', _t('心知天气私钥'));
    }

    // 彩色目录图标
    static function ColorToc(): Radio
    {
        return new Radio('colorToc', self::$YES_NO, 0, _t('彩色目录图标'), '');
    }

    // 彩色标签云
    static function ColorTag(): Radio
    {
        return new Radio('colorTag', self::$YES_NO, 0, _t('彩色标签'), '');
    }

    // 鼠标点击特效
    static function ClickWord(): Radio
    {
        return new Radio('clickWord', self::$YES_NO, 0, _t('鼠标点击特效'), '');
    }

    // 文章标题居中
    static function TitleCenter(): Radio
    {
        return new Radio('titleCenter', self::$YES_NO, 0, _t('文章标题居中'), '');
    }

    // 复制成功提示
    static function CopyTip(): Radio
    {
        return new Radio('copyTip', self::$YES_NO, 0, _t('复制成功提示'), '');
    }

    // H1/H2标题背景颜色
    static function HTitlebg(): Text
    {
        return new Text('htitlebg', null, '0,191,255', _t('H1/H2标题背景颜色'), _t('RGB颜色代码'));
    }

    // 打赏按钮跳动
    static function ZanBump(): Radio
    {
        return new Radio('zanBump', self::$YES_NO, 0, _t('打赏按钮跳动'), '');
    }

    // 移动端禁止显示标签云和博客信息
    static function MobileHideInfo(): Radio
    {
        return new Radio('mobileHideInfo', self::$YES_NO, 0, _t('移动端禁止显示标签云和博客信息'), '');
    }

    // 文章end标识
    static function PostEndMark(): Radio
    {
        return new Radio('postEndMark', self::$YES_NO, 0, _t('文章end标识'), '');
    }

    // 文章二维码
    static function PostQRCode(): Radio
    {
        return new Radio('postQRcode', self::$YES_NO, 0, _t('文章二维码'), '');
    }

    // 百度手动提交按钮
    static function BaiduPushBtn(): Radio
    {
        return new Radio('baiduPush', self::$YES_NO, 0, _t('百度手动提交'), _t('在文章底部修改日期旁边增加手动提交百度按钮'));
    }

    // 文章版权提示
    static function PostCopyrightTip(): Radio
    {
        return new Radio('postCopyrightTip', self::$YES_NO, 0, _t('文章版权提示'), _t('位于文章底部'));
    }

    // 首页轮播图优化
    static function IndexSwiperPicStyle(): Radio
    {
        return new Radio('indexSwiperPicStyle', self::$YES_NO, 0, _t('首页轮播图优化'), _t('降低背景图片亮度等'));
    }

    // 评论头像呼吸效果
    static function CommentAvatarBreath(): Radio
    {
        return new Radio('commentAvatarBreath', self::$YES_NO, 0, _t('显示评论头像呼吸效果'), _t('<br />***问题和反馈请到&nbsp;<a href="https://blog.icolak.com/program/472.html" rel="nofollow">插件发布页</a>，新功能不定时更新，请多多关注！***'));
    }

}