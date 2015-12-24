/**
  ************************************************************************
  WFPHP订单系统版权归WENFEI所有，凡是破解此系统者都会死全家，非常灵验。
  ************************************************************************
  WFPHP订单系统官方网站：http://www.wforder.com/   （盗版盗卖者死全家）
  WFPHP订单系统官方店铺：http://889889.taobao.com/ （破解系统者死全家）
  ************************************************************************
  郑重警告：凡是破解此系统者出门就被车撞死，盗卖此系统者三日内必死全家。
  ************************************************************************ 
  盗版模仿本页面样式者必死全家（包括但不限于CSS代码、JS代码、html代码）。
  ************************************************************************
 */
wfFocus.extend({wffahuo:function(par,F){var box=F.$(par.id),wffhlist=F.$c('wffhlist',box),n=F.$$_('li',wffhlist).length;eval(F.switchMF(function(){var last=F.$$_('li',wffhlist)[n-1],lastH=last.offsetHeight;F.slide(wffhlist,{marginTop:lastH},800,'easeOut',function(){wffhlist.insertBefore(last,wffhlist.firstChild);F.setOpa(last,0);wffhlist.style.marginTop=0+'px';F.fadeIn(last);});}));}});
//////////////////////////// WFORDERJSEND ////////////////////////////