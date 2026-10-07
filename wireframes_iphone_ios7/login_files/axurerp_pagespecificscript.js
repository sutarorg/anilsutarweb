for(var i = 0; i < 19; i++) { var scriptId = 'u' + i; window[scriptId] = document.getElementById(scriptId); }

$axure.eventManager.pageLoad(
function (e) {

});
gv_vAlignTable['u18'] = 'top';gv_vAlignTable['u17'] = 'center';u15.tabIndex = 0;

u15.style.cursor = 'pointer';
$axure.eventManager.click('u15', function(e) {

if (true) {

    self.location.href="resources/reload.html#" + encodeURI($axure.globalVariableProvider.getLinkUrl($axure.pageData.url));

}
});
u11.tabIndex = 0;

u11.style.cursor = 'pointer';
$axure.eventManager.click('u11', function(e) {

if (((GetWidgetText('u9')) == ('john@a2omobile.com')) && ((GetWidgetText('u10')) == ('a2omobile'))) {

	self.location.href=$axure.globalVariableProvider.getLinkUrl('RestUI.html');

}
else
if (true) {

	SetPanelVisibility('u12','','none',500);

}
});
gv_vAlignTable['u14'] = 'center';gv_vAlignTable['u1'] = 'center';gv_vAlignTable['u4'] = 'center';u5.tabIndex = 0;

u5.style.cursor = 'pointer';
$axure.eventManager.click('u5', function(e) {

if (true) {

	SetPanelState('u2', 'pd0u2','swing','right',500,'swing','right',500);

}
});
gv_vAlignTable['u7'] = 'center';u8.tabIndex = 0;

u8.style.cursor = 'pointer';
$axure.eventManager.click('u8', function(e) {

if (true) {

	SetPanelState('u2', 'pd1u2','swing','left',500,'swing','left',500);

}
});
