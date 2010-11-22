{*<!--
/*********************************************************************************
  ** The contents of this file are subject to the vtiger CRM Public License Version 1.0
   * ("License"); You may not use this file except in compliance with the License
   * The Original Code is:  vtiger CRM Open Source
   * The Initial Developer of the Original Code is vtiger.
   * Portions created by vtiger are Copyright (C) vtiger.
   * All Rights Reserved.
  *
 ********************************************************************************/
-->*}

{if $WORLD_CLOCK_DISPLAY eq 'true'}

<div id="wclock" style="z-index:10000001;" class="layerPopup">
	<table class="mailClientBg" align="center" border="0" cellpadding="5" cellspacing="0" width="100%">
	<tr style="cursor:move;" >
		<td style="text-align:left;" id="Handle"><b>{$APP.LBL_WORLD_CLOCK}</b></td>
		<td align="right">
			<a href="javascript:;">
				<img src="{'close.gif'|@vtiger_imageurl:$THEME}" border="0"  onClick="fninvsh('wclock')" hspace="5" align="absmiddle">
			</a>
		</td>
	</tr>
	</table>
	<table class="hdrNameBg" align="center" border="0" cellpadding="2" cellspacing="0" width="100%">
	<tr>
	<td nowrap="nowrap" colspan="2">
	<div style="background-image: url({$IMAGEPATH}clock_bg.gif); background-repeat: no-repeat; background-position: 24px 38px;" id="theClockLayer">
<div id="theCities" class="citystyle">
<form action="" name="frmtimezone">
<input name="PHPSESSID" value="162c0ab587f6c555aaaa30d681b61f7c" type="hidden">
<select name="clockcity" size="1" class="importBox small"   id="clockcity" style="width:160px;"  onchange="lcl(this.selectedIndex,this.options[0].selected)">
<option value="0" selected="selected">Местное время</option>
<option value="4.30">Афганистан</option>
<option value="1">Алжир</option>
<option value="-3">Аргентина</option>
<option value="9.30">Австралия - Аделаида</option>
<option value="8">Австралия - Перт</option>
<option value="10">Австралия - Сидней</option>
<option value="1">Австрия</option>
<option value="3">Бахрейн</option>
<option value="6">Бангладеш</option>
<option value="1">Бельгия</option>
<option value="-4">Боливия</option>
<option value="-5">Бразилия - Анд</option>
<option value="-3">Бразилия - Восток</option>
<option value="-4">Бразилия - Запад</option>
<option value="2">Болгария</option>
<option value="6.30">Бирма (Мьянма)</option>
<option value="-5">Чили</option>
<option value="-7">Канада - Калгари</option>
<option value="-3.30">Канада - Ньюфаундленд</option>
<option value="-4">Канада - Новая Шотландия</option>
<option value="-5">Канада - Торонто</option>
<option value="-8">Канада - Ванкувер</option>
<option value="-6">Канада - Виннипег</option>
<option value="8">Китай - материк</option>
<option value="8">Китай - Тайвань</option>
<option value="-5">Колумбия</option>
<option value="-5">Куба</option>
<option value="1">Дания</option>
<option value="-5">Эквадор</option>
<option value="2">Египет</option>
<option value="12">Фиджи</option>
<option value="2">Финляндия</option>
<option value="1">Франция</option>
<option value="1">Германия</option>
<option value="0">Гана</option>
<option value="2">Греция</option>
<option value="-3">Гренландия</option>
<option value="1">Венгрия</option>
<option value="5.30">Индия</option>
<option value="8">Индонезия - Бали, Борнео</option>
<option value="9">Индонезия - Ириан-Джая</option>
<option value="7">Индонезии - Суматра, Ява</option>
<option value="3.30">Иран</option>
<option value="3">Ирак</option>
<option value="2">Израиль</option>
<option value="1">Италия</option>
<option value="-5">Ямайка</option>
<option value="9">Япония</option>
<option value="3">Кения</option>
<option value="9">Корея (Северная и Южная)</option>
<option value="3">Кувейт</option>
<option value="1">Ливия</option>
<option value="8">Малайзия</option>
<option value="5">Мальдивы</option>
<option value="1">Мали</option>
<option value="4">Маврикий</option>
<option value="-6">Мексика</option>
<option value="0">Марокко</option>
<option value="5.45">Непал</option>
<option value="1">Нидерланды</option>
<option value="12">Новая Зеландия</option>
<option value="1">Нигерия</option>
<option value="1">Норвегия</option>
<option value="4">Оман</option>
<option value="5">Пакистан</option>
<option value="-5">Перу</option>
<option value="8">Филиппины</option>
<option value="1">Польша</option>
<option value="1">Португалия</option>
<option value="3">Катар</option>
<option value="2">Румыния</option>
<option value="11">России - Камчатка</option>
<option value="3">Россия - Москва</option>
<option value="9">Россия - Владивосток</option>
<option value="4">Сейшельские острова</option>
<option value="3">Саудовская Аравия</option>
<option value="8">Сингапур</option>
<option value="2">Южная Африка</option>
<option value="1">Испания</option>
<option value="3">Сирия</option>
<option value="5.30">Шри-Ланка</option>
<option value="1">Швеция</option>
<option value="1">Швейцария</option>
<option value="7">Таиланд</option>
<option value="12">Тонга</option>
<option value="2">Турция</option>
<option value="2">Украина</option>
<option value="5">Узбекистан</option>
<option value="7">Вьетнам</option>
<option value="4">ОАЭ</option>
<option value="0">Великобритания</option>
<option value="-9">США - Аляска</option>
<option value="-9">США - Аризона</option>
<option value="-6">США - Центральная</option>
<option value="-5">США - Восточная</option>
<option value="-10">США - Гавайи</option>
<option value="-5">США - Индиана Восток</option>
<option value="-7">США - Mountain</option>
<option value="-8">США - Pacific</option>
<option value="3">Йемен</option>
<option value="1">Югославия</option>
<option value="2">Замбия</option>
<option value="2">Зимбабве</option>
</select>
</form>
</div>
<script type="text/javascript">
        var theme = "{$THEME}";
</script>
<script type="text/javascript" src="include/js/clock.js"></script>

<div id="theFace0" class="facestyle" style="color: rgb(0, 0, 0); top: 81px; left: 116px;">3</div>
<div id="theFace1" class="facestyle" style="color: rgb(0, 0, 0); top: 102px; left: 110.3731px;">4</div>
<div id="theFace2" class="facestyle" style="color: rgb(0, 0, 0); top: 117.373px; left: 95px;">5</div>
<div id="theFace3" class="facestyle" style="color: rgb(0, 0, 0); top: 123px; left: 74px;">6</div>
<div id="theFace4" class="facestyle" style="color: rgb(0, 0, 0); top: 117.373px; left: 53px;">7</div>
<div id="theFace5" class="facestyle" style="color: rgb(0, 0, 0); top: 102px; left: 37.6269px;">8</div>
<div id="theFace6" class="facestyle" style="color: rgb(0, 0, 0); top: 81px; left: 32px;">9</div>
<div id="theFace7" class="facestyle" style="color: rgb(0, 0, 0); top: 60px; left: 37.6269px;">10</div>
<div id="theFace8" class="facestyle" style="color: rgb(0, 0, 0); top: 44.6269px; left: 53px;">11</div>
<div id="theFace9" class="facestyle" style="color: rgb(0, 0, 0); top: 39px; left: 74px;">12</div>
<div id="theFace10" class="facestyle" style="color: rgb(0, 0, 0); top: 44.6269px; left: 95px;">1</div>
<div id="theFace11" class="facestyle" style="color: rgb(0, 0, 0); top: 60px; left: 110.3731px;">2</div>
</div></td>
</tr>
</tbody>
</table>
</div>
<script>
	var theHandle = document.getElementById("Handle");
	var theRoot   = document.getElementById("wclock");
	Drag.init(theHandle, theRoot);
</script>

{/if}
