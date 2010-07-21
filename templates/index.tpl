{if $this->session->userAgent|stripos:'MSIE' === false}<?xml version="1.0" encoding="{@CHARSET}"?>
{/if}<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="{lang}wcf.global.pageDirection{/lang}" xml:lang="{@LANGUAGE_CODE}">
<head>
	<title>{lang}cms.index.title{/lang}</title>
</head>
<body{if $templateName|isset} id="tpl{$templateName|ucfirst}"{/if}>

<div id="main">
	Hello World!
</div>

</body>
</html>