{include file="documentHeader"}
<head>
	<title>{lang}cms.index.title{/lang}</title>
	{include file='headInclude' sandbox=false}
</head>
<body{if $templateName|isset} id="tpl{$templateName|ucfirst}"{/if}>
{include file='header' sandbox=false}

<div id="main">
	Hello World!
</div>

{include file='footer' sandbox=false}
</body>
</html>