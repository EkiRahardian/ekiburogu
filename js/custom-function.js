var website = window.location.host;
var protocol = window.location.protocol;
function redirect(php)
{
	var website = window.location.host;
	var protocol = window.location.protocol;
		window.location.assign(protocol + "//" + website +"/" + php);
}