/* 加载动画 */
$(function() {
    $("#PageLoading").fadeOut(400);
    $("#body").css('overflow','');
});

/* 复制文章自动带版权开始 */ 
document.body.addEventListener('copy', function (e) {
    if (window.getSelection().toString() && window.getSelection().toString().length > 20) {
        setClipboardText(e);
    	notie({
		  type: 'info',
		  text: '商业转载请联系作者获得授权，非商业转载请注明出处，谢谢。', 
		  autoHide: true
		})
    }
}); 
function setClipboardText(event) {
    var clipboardData = event.clipboardData || window.clipboardData;
    if (clipboardData) {
        event.preventDefault();
 
        var htmlData = ''
            + window.getSelection().toString() + '<br><br>'
            + '著作权归作者所有。<br>'
            + '商业转载请联系作者获得授权，非商业转载请注明出处！<br>'
            + '本博转载文章版权及解释权归原作者所有，博主只是勤劳的搬运工！<br>'
            + '作者：ducky<br>'
            + '链接：' + window.location.href + '<br>'
            + '来源：https://ducky.vip/';
        var textData = ''
            + window.getSelection().toString() + '\n\n'
            + '著作权归作者所有。\n'
            + '商业转载请联系作者获得授权，非商业转载请注明出处！\n'
            + '本博转载文章版权及解释权归原作者所有，博主只是勤劳的搬运工！\n'
            + '作者：ducky\n'
            + '链接：' + window.location.href + '\n'
            + '来源：https://ducky.vip/';
 
        clipboardData.setData('text/html', htmlData);
        clipboardData.setData('text/plain', textData);
    }
}
/* 复制文章自动带版权结束 */
