//static.js
String.prototype.htmlEscape = function () {
	s = this;
	s = s.replace(/&/g, '&amp;');
	s = s.replace(/>/g, '&gt;');
	s = s.replace(/</g, '&lt;');
	return s;
}
String.prototype.encodeLatin = function () {
	var arr = [], hash;
	if (this.length == 0) return '';
	for (var i = 0, len = this.length; i < len; i++) {
		arr.push(this.charCodeAt(i));
	}
	hash = arr.join('@');
	return hash;
};

$(function () {
	$('#dropmenu').hover(
		function () {
			$('.dropdown').addClass('open');
		},
		function () {
			$('.dropdown').removeClass('open');
		}
	);
	$('ul.nav > li:first > a').prepend('<i class="icon-home icon-white"></i>');
	$('ul.nav > li:eq(1) > a').prepend('<i class="icon-share icon-white"></i>');
	$('ul.nav > li:eq(2) > a').prepend('<i class="icon-info-sign icon-white"></i>');
	$('li#link > a').prepend('<i class="icon-home"></i>');
	$('li#blog > a').prepend('<i class="icon-share"></i>');
	$('li#book > a').prepend('<i class="icon-star"></i>');
	$('li#info > a').prepend('<i class="icon-info-sign"></i>');
	$('ul#rank > li > a').prepend('<i class="icon-signal"></i>');

	$("div.pagination ul li:not(:has(a))").addClass('active').wrapInner("<a>");
	//bookmark setting
	$('#removeBook').click(function () {
		var flag = confirm('ブックマークを全て削除しますか？');
		if (flag) {
			$('.starOn').removeClass('starOn').addClass('starOff');
			var cMgr = new H_CookieManager();
			cMgr.setCookie("set[bookmark]", "", 3600 * 24 * 5000, '/');
		}
	});
	$('.starOff').click(function () {
		var limit = 1000;
		var id = this.id.replace(/bm_/, '');
		var cMgr = new H_CookieManager();
		var str = cMgr.getCookie('set[bookmark]');
		var arr;
		if (str) {
			arrlen = str.split('.').length;
			if (arrlen > limit) {
				$("#bmmsg").fadeIn("slow");
				setTimeout(function () { $("#bmmsg").fadeOut("slow"); }, 2500);
				return;
			}
			str = '.' + str + '.';
		}
		else {
			str = '.';
		}
		var reg = new RegExp('.' + id + '.');
		if (this.className == 'starOff') {
			$(this).removeClass('starOff').addClass('starOn');
			if (reg.test(str)) {
				return;
			}
			str = str + id + '.';
			str = str.slice(1, -1);
			cMgr.setCookie("set[bookmark]", str, 3600 * 24 * 5000, '/');
		}
		else if (this.className == 'starOn') {
			$(this).removeClass('starOn').addClass('starOff');
			if (reg.test(str)) {
				var reg = new RegExp('.' + id + '.');
				str = str.replace(reg, '.');
				str = str.slice(1, -1);
				cMgr.setCookie("set[bookmark]", str, 3600 * 24 * 5000, '/');
			}
		}
	});
	if ($('table').hasClass('bookmark')) {
		$('.starOff').removeClass('starOff').addClass('starOn');
	}


});

function xhr(xmlhttp) {
	var xmlhttp = false;
	if (typeof ActiveXObject != "undefined") { /* IE5, IE6 */
		try {
			xmlhttp = new ActiveXObject("Msxml2.XMLHTTP"); /* MSXML3 */
		}
		catch (e) {
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP"); /* MSXML2 */
		}
	}
	if (!xmlhttp && typeof XMLHttpRequest != "undefined") {
		xmlhttp = new XMLHttpRequest(); /* Firefox, Safari, IE7 */
		return xmlhttp;
	}

	if (!xmlhttp) {
		alert("XMLHttpRequest非対応ブラウザ");
		return false;
	}
}
function checkRss(xmlURL) {
	/* XMLHttpRequestオブジェクト作成 */
	var xmlhttp = false;
	xmlhttp = xhr(xmlhttp);
	/* レスポンスデータ処理 */
	xmlhttp.onreadystatechange = function () {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			/* ★レスポンスヘッダ取得 */
			var s = "";
			s += "Content-Type: " + xmlhttp.getResponseHeader('Content-Type');
			alert(s);
		}
	}
	/* HTTPリクエスト実行 */
	xmlhttp.open("GET", xmlURL, true);
	xmlhttp.send(null);

}

function getFile(url) {
	var req;
	if (window.XMLHttpRequest) {
		req = new XMLHttpRequest();
	} else if (window.ActiveXObject) {
		try {
			req = new ActiveXObject("MSXML2.XMLHTTP");
		}
		catch (e) {
			try {
				req = new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch (e2) {
				return false;
			}
		}
	}
	req.open('GET', url, false);
	req.send('');
	return;
}

function execAjax(url) {

	$.ajax({
		url: url,
		async: false,
		type: "POST",
		data: {
			history: str
		},
		dataType: "html",
		evalScript: true,
		error: function (jqXHR, textStatus, errorThrown) { },
		success: function (data, textStatus) {
			console.log(textStatus);
			if (textStatus == 'success') {

				$("div#history").html(data);
				return;
			}
			// このスコープで処理を行う必要があれば実装する

		}
	});
	// resultに格納された結果を元に何かしらの処理を実装する

}

function initCookie(name, value) {
	var cMgr = new H_CookieManager();
	if (!cMgr.getCookie(name)) {
		if (window.localStorage) {
			var str = localStorage.getItem(name);
			if (str) {
				cMgr.setCookie(name, str, 3600 * 24 * 5000, '/');
			}
			else {
				cMgr.setCookie(name, value, 3600 * 24 * 5000, '/');
			}
		}
		else {
			cMgr.setCookie(name, value, 3600 * 24 * 5000, '/');
		}
	}
}
function removeCookie(name) {
	var cMgr = new H_CookieManager();
	if (cMgr.getCookie(name)) cMgr.setCookie(name, '', 3600 * 24 * 5000, '/');
	if (window.localStorage) localStorage.removeItem(name);
}
function reloadPage() {
	alert('設定をリセットしました');
	location.reload();
}
//--initilise display show or hide
function initDisp(bool) {
	var cMgr = new H_CookieManager();
	var sidVal = cMgr.getCookie("set[filter]");
	if (sidVal) {
		var reArrVal = sidVal.split(':');
		if (bool) {
			for (var i = 0, len = reArrVal.length; i < len; i++) {
				if (reArrVal[i] == '') continue;
				$('tbody > tr.sid_' + reArrVal[i]).addClass('sdn');
			}
		}
		else {
			for (var i = 0, len = reArrVal.length; i < len; i++) {
				if (reArrVal[i] == '') continue;
				$('tr#sid_' + reArrVal[i] + ' td:eq(1) button').removeClass('btn-primary').addClass('btn-inverse').text('表示OFF');
			}
		}
	}
}

function pp(obj) {
	var properties = '';
	for (var prop in obj) {
		properties += prop + "=" + obj[prop] + "\n";
	}
	alert(properties);
}
//set checkSwitch function
function checkSwitch(content, cookie, selector, classOn, classOff) {
	sid = content.parentNode;
	cMgr = new H_CookieManager();
	sidVal = cMgr.getCookie(cookie);
	sidC = sid.id;
	limit = 50;

	if (!sidVal) {
		cMgr.setCookie(cookie, " ", 3600 * 24 * 5000, '/');
		sidVal = cMgr.getCookie(cookie);
	}
	sidVal = $.trim(sidVal.toString());
	if (selector == 'filter') {
		sid = sid.className.match(/^sid_[0-9]+/i);
		$("tr." + sid + " > td." + selector).toggleClass(classOn).toggleClass(classOff);
	}
	if (selector == 'siteFilter') {
		sid = sid.id.match(/^sid_[0-9]+/i);
	}

	sid.str = sid.toString().match(/[0-9]+/);
	re = new RegExp(":" + sid.str + ":");
	if (!re.test(sidVal)) {
		sidVal += ":" + sid.str + ":";
	} else {
		sidVal = sidVal.replace(re, "");
	}
	cMgr.setCookie(cookie, sidVal, 3600 * 24 * 5000, '/');
}
//function setDetails
function setDetails(cookie, max, id) {
	var cMgr = new H_CookieManager();
	var num = cMgr.getCookie(cookie);
	if (0 <= num && num <= max) $('#' + id + ' > option:eq(' + num + ')').attr('selected', 'selected');
}

$(function () {
	//initialize Cookie and WebStorage
	initCookie('set[filter]', '');
	initCookie('set[top]', '0');
	initCookie('set[last]', '1');
	initCookie('set[trand]', '1');
	initCookie('set[dispSiteTable]', '0');
	initCookie('set[bookmark]', '');
	initCookie('set[ocmenu]', '1');
	if ($('#sight').size() > 0) {
		initDisp(false);
	}
	else {
		initDisp(true);
	}

	function changeChTable(num, value) {
		var cMgr = new H_CookieManager();
		var str = cMgr.getCookie('set[chTable]');
		var arr = str.split('.');
		arr[num] = value;
		str = arr.join('.');
	}

	$('#ad').toggle(
		function () {
			$(this).removeClass('btn-inverse').addClass('btn-primary').text('表示フィルタOFF');
			$("tr.sdn > td.filter").addClass("checkOn").removeClass("checkOff");
			$('tr.sdn').removeClass('sdn');
			if ($('#thFilter').hasClass('hide')) {
				changeChTable(7, 1);
				switchFilter(true);
			}
		},
		function () {
			$(this).removeClass('btn-primary').addClass('btn-inverse').text('表示フィルタ ＯＮ');
			initDisp(true);
		}
	);
	$('#sight tbody tr td button.btn').click(function () {
		if ($(this).hasClass('btn-primary')) {
			$(this).removeClass('btn-primary').addClass('btn-inverse').text('表示OFF');
		} else if ($(this).hasClass('btn-inverse')) {
			$(this).removeClass('btn-inverse').addClass('btn-primary').text('表示 O N');
		}
	});
	//--set Cookie 'filter'
	$('td.filter').click
		(
			function () {
				checkSwitch(this, "set[filter]", 'filter', 'checkOn', 'checkOff');
			}
		);
	$('td.siteFilter').click
		(
			function () {
				checkSwitch(this, "set[filter]", 'siteFilter', 'checkOn', 'checkOff');
			}
		);

	//--set Cookie 'feeds'

	//remove Cookie setting
	$('#rmFilter').click(function () {
		var flag = confirm('フィルターの設定をリセットしますか？');
		if (flag) {
			removeCookie('set[filter]');
			reloadPage();
		}
	});
	$('#rmDetails').click(function () {
		var flag = confirm('詳細設定をリセットしますか？');
		if (flag) {
			removeCookie('set[top]');
			removeCookie('set[last]');
			removeCookie('set[trand]');
			reloadPage();
		}
	});
	$('#rmAll').click(function () {
		var flag = confirm('すべての設定をリセットしますか？');
		if (flag) {
			removeCookie('set[filter]');
			removeCookie('set[top]');
			removeCookie('set[last]');
			removeCookie('set[trand]');
			removeCookie('set[bookmark');
			removeCookie('set[ocmenu]');
			removeCookie('set[chTable]');
			reloadPage();
		}
	});

	//set DetailsSetting
	setDetails("set[top]", 2, 'top');
	setDetails("set[last]", 5, 'last');
	setDetails("set[trand]", 5, 'trand');

	$('#setDetail').click(function () {
		var top = $('#top > option:selected').attr('value');
		var last = $('#last > option:selected').attr('value');
		var trand = $('#trand > option:selected').attr('value');
		var cMgr = new H_CookieManager();
		cMgr.setCookie("set[top]", top, 3600 * 24 * 5000, '/');
		cMgr.setCookie("set[last]", last, 3600 * 24 * 5000, '/');
		cMgr.setCookie("set[trand]", trand, 3600 * 24 * 5000, '/');
	});

	//css_setting
	$('th:not([class*="nosort"])').hover(
		function () {
			$(this).css({ backgroundColor: '#BCF0EE' });
		},
		function () {
			$(this).css({ backgroundColor: 'white' });
		}
	);
	//--jquery powertip setting　& alert message--
	$("td.filter").attr("title", "チェックされたブログは<br>次回から表示されません").powerTip({ placement: 'nw' });
	$("thead > tr > th").not(".nosort").attr("title", "クリックすると各項目ごとに<br>並べ替えできます").powerTip({ placement: "n" });
	$("#setDetail").click(function () {
		alert('表示設定を保存しました');
	});
	//jquery datepicker setting
	window.prettyPrint && prettyPrint();
	$('#dp1').datepicker({
		format: 'yyyy/mm/dd'
	});
	//check cookie enable
	if (!navigator.cookieEnabled) {
		$('#myTab').after('<div class="alert alert-error">Cookieが無効になっています。<br>有効にしないとサイトの機能を保存できません</div>');
	}

	//Close Menu
	$('#ocmenu').click(function () {
		var cMgr = new H_CookieManager();
		var str = cMgr.getCookie('set[ocmenu]');
		if (str == 1) {
			$(this).html('<div class="icon-chevron-up"></div>').next('div').fadeOut('fast');
			cMgr.setCookie("set[ocmenu]", '0', 3600 * 24 * 5000, '/');
		} else if (str == 0) {
			$(this).html('<div class="icon-chevron-down"></div>').next('div').fadeIn('fast');
			cMgr.setCookie("set[ocmenu]", '1', 3600 * 24 * 5000, '/');
		}
	});
	//display Table setting
	$('#chTable').toggle(
		function () {
			$('#navTable').fadeIn();
			$(this).removeClass('btn-inverse').addClass('btn-primary');
		},
		function () {
			$('#navTable').fadeOut();
			$(this).removeClass('btn-primary').addClass('btn-inverse');
		});
	$('#liDate,#liCat,#liHit,#liBlog,#liOver,#liHitHead,#liBlogTail,#liFilter').live('click', function () {
		var cMgr = new H_CookieManager();
		var str = cMgr.getCookie('set[chTable]');
		var arr = str.split('.');
		if (this.id == 'liDate') {
			if (arr[0] == 1) {
				$(this).removeClass('btn-info').addClass('btn-inverse').text('日時を非表示');
				$('#thDate,.tdDate').addClass('hide');
				arr[0] = 0;
			} else if (arr[0] == 0) {
				$(this).removeClass('btn-inverse').addClass('btn-info').text('日時を表示');
				$('#thDate,.tdDate').removeClass('hide');
				arr[0] = 1;
			}
		}
		if (this.id == 'liCat') {
			if (arr[1] == 1) {
				$(this).removeClass('btn-info').addClass('btn-inverse').text('カテゴリを非表示');
				$('#thCat,.tdCat').addClass('hide');
				arr[1] = 0;
			} else if (arr[1] == 0) {
				$(this).removeClass('btn-inverse').addClass('btn-info').text('カテゴリを表示');
				$('#thCat,.tdCat').removeClass('hide');
				arr[1] = 1;
			}
		}
		if (this.id == 'liHit') {
			if (arr[2] == 1) {
				$(this).removeClass('btn-info').addClass('btn-inverse').text('HITバーを非表示');
				$('#thHit,.tdHit').addClass('hide');
				arr[2] = 0;
			} else if (arr[2] == 0) {
				$(this).removeClass('btn-inverse').addClass('btn-info').text('HITバーを表示');
				$('#thHit,.tdHit').removeClass('hide');
				arr[2] = 1;
			}
		}
		if (this.id == 'liBlog') {
			if (arr[3] == 1) {
				$(this).removeClass('btn-info').addClass('btn-inverse').text('ブログを非表示');
				$('#thBlog,.tdBlog').addClass('hide');
				arr[3] = 0;
			} else if (arr[3] == 0) {
				$(this).removeClass('btn-inverse').addClass('btn-info').text('ブログを表示');
				$('#thBlog,.tdBlog').removeClass('hide');
				arr[3] = 1;
			}
		}
		if (this.id == 'liOver') {
			if (arr[4] == 0) {
				$(this).removeClass('btn-inverse').addClass('btn-info').text('記事を折り返す');
				$('td.tdLink a').addClass('ofoff');
				arr[4] = 1;
			} else if (arr[4] == 1) {
				$(this).removeClass('btn-info').addClass('btn-inverse').text('記事を折り返さない');
				$('td.tdLink a').removeClass('ofoff');
				arr[4] = 0;
			}
		}
		if (this.id == 'liHitHead') {
			if (arr[5] == 0) {
				switchHit(1);
				arr[5] = 1;
			} else if (arr[5] >= 1) {
				switchHit(0);
				arr[5] = 0;
			}
		}
		if (this.id == 'liBlogTail') {
			if (arr[6] == 0) {
				switchBlog();
				arr[6] = 1;
			} else if (arr[6] == 1) {
				$(this).removeClass('btn-info').addClass('btn-inverse').text('記事末尾にブログ名を非表示');
				$('span.spBlog').remove();
				arr[6] = 0;
			}
		}
		if (this.id == 'liFilter') {
			if (arr[7] == 1) {
				arr[7] = 0; //非表示にする
				switchFilter(false);
			} else {
				arr[7] = 1; //表示する
				switchFilter(true);
			}
		}

		str = arr.join('.');
		cMgr.setCookie("set[chTable]", str, 3600 * 24 * 5000, '/');

	});

	function switchFilter(bool) {
		if (bool) {
			$('#liFilter').removeClass('btn-inverse').addClass('btn-info').text('フィルター列を表示');
			$('#thFilter, .filter').removeClass('hide');
		} else {
			$('#liFilter').removeClass('btn-info').addClass('btn-inverse').text('フィルター列を非表示');
			$('#thFilter, .filter').addClass('hide');
		}
	}

	$('#liSmart').click(function () {
		var cMgr = new H_CookieManager();
		cMgr.setCookie("set[chTable]", '0.0.0.0.1.1.1.1', 3600 * 24 * 5000, '/');
		$('#liDate').removeClass('btn-info').addClass('btn-inverse').text('日時を非表示');
		$('#thDate,.tdDate').addClass('hide');
		$('#liCat').removeClass('btn-info').addClass('btn-inverse').text('カテゴリを非表示');
		$('#thCat,.tdCat').addClass('hide');
		$('#liHit').removeClass('btn-info').addClass('btn-inverse').text('HITバーを非表示');
		$('#thHit,.tdHit').addClass('hide');
		$('#liBlog').removeClass('btn-info').addClass('btn-inverse').text('ブログを非表示');
		$('#thBlog,.tdBlog').addClass('hide');
		$('#liOver').removeClass('btn-inverse').addClass('btn-info').text('記事を折り返す');
		$('td.tdLink a').addClass('ofoff');
		$('span.spBlog').remove();
		$('div.divHitTail').remove();
		switchHit(1);
		switchBlog();
		switchFilter(true);
	});
	$('#liReset').click(function () {
		var cMgr = new H_CookieManager();
		cMgr.setCookie("set[chTable]", '1.1.1.1.1.1.1.1', 3600 * 24 * 5000, '/');
		$('#liDate').removeClass('btn-inverse').addClass('btn-info').text('日時を表示');
		$('#thDate,.tdDate').removeClass('hide');
		$('#liCat').removeClass('btn-inverse').addClass('btn-info').text('カテゴリを表示');
		$('#thCat,.tdCat').removeClass('hide');
		$('#liHit').removeClass('btn-inverse').addClass('btn-info').text('HITバーを表示');
		$('#thHit,.tdHit').removeClass('hide');
		$('#liBlog').removeClass('btn-inverse').addClass('btn-info').text('ブログを表示');
		$('#thBlog,.tdBlog').removeClass('hide');
		$('#liOver').removeClass('btn-inverse').addClass('btn-info').text('記事を折り返す');
		$('td.tdLink a').addClass('ofoff');
		$('div.divHitTail').remove();
		switchHit(1);
		$('span.spBlog').remove();
		switchBlog();
		switchFilter(true);
		//$('#liBlogTail').removeClass('btn-inverse').addClass('btn-info').text('記事末尾にブログ名を表示');
		//$('span.spBlog').remove();
	});

});
function switchHit(sw) {
	switch (sw) {
		case 0:
			$('#liHitHead').removeClass('btn-info').addClass('btn-inverse').text('記事にHIT数を非表示');
			$('div.divHitTail').remove();
			break;

		case 1:
			$('#liHitHead').removeClass('btn-inverse').addClass('btn-info').text('記事にHIT数を表示');
			$('table#latest tbody tr,table#people tbody tr,table#range tbody tr').each(function (n) {
				$('td.tdLink:eq(' + n + ') a').after("<div class='divHitTail' style='display:inline;'><span class='num'>" + $('td.hbar:eq(' + n + ')').text() + "</span><span class='hit'>HIT</span></div>");
			});
			break;
	}
}
function switchBlog() {
	$('#liBlogTail').removeClass('btn-inverse').addClass('btn-info').text('記事末尾にブログ名を表示');
	$('table#latest tbody tr,table#people tbody tr,table#range tbody tr').each(function (n) {
		if ($('td.tdLink:eq(' + n + ') div').hasClass('divHitTail')) {
			$('td.tdLink:eq(' + n + ') div.divHitTail').after("<span class='spBlog'>" + $('td.tdBlog:eq(' + n + ') > a').text() + "</span>");
		} else {
			$('td.tdLink:eq(' + n + ') .tdDiv').append("<span class='spBlog'>" + $('td.tdBlog:eq(' + n + ') > a').text() + "</span>");
		}
	});
}


var cMgr = new H_CookieManager();
var str = cMgr.getCookie('set[chTable]');
if (str == undefined) {
	str = global_chTable
}
var arr = str.split('.');

if (arr[0] != 1) {
	$('#liDate').removeClass('btn-info').addClass('btn-inverse').text('日時を非表示');
	if (arr[0] == 0) $('#thDate,.tdDate').addClass('hide');
}
if (arr[1] != 1) {
	$('#liCat').removeClass('btn-info').addClass('btn-inverse').text('カテゴリを非表示');
	if (arr[1] == 0) $('#thCat,.tdCat').addClass('hide');
}
if (arr[2] != 1) {
	$('#liHit').removeClass('btn-info').addClass('btn-inverse').text('HITバーを非表示');
	if (arr[2] == 0) $('#thHit,.tdHit').addClass('hide');
}
if (arr[3] != 1) {
	$('#liBlog').removeClass('btn-info').addClass('btn-inverse').text('ブログを非表示');
	if (arr[3] == 0) $('#thBlog,.tdBlog').addClass('hide');
}
if (arr[4] != 1) {
	$('#liOver').removeClass('btn-info').addClass('btn-inverse').text('記事を折り返さない');
	if (arr[4] == 0) $('td.tdLink a').removeClass('ofoff');
}
if (!($('div').hasClass('divHit')) && !($('div').hasClass('divHitTail'))) {
	if (arr[5] >= 1) {
		switchHit(1);
	}
}
if (!($('span').hasClass('spBlog'))) {
	if (arr[6] == 1) {
		switchBlog();
	}
}
if (arr[7] != 1) {
	$('#liFilter').removeClass('btn-info').addClass('btn-inverse').text('フィルター列を非表示');
	if (arr[7] == 0) $('#thFilter, .filter').addClass('hide');
}