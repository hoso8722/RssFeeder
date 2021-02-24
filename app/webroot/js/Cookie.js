/**
 * @version 0.1
 * H_CookieManager - クッキー管理クラス
 * @author  H-Hash (studyinghttp.net)
 */
function H_CookieManager() {
	/**
	 * getCookie - クッキー取得用メソッド
	 * name という名前のクッキーがない場合は null を返す
	 * @param name クッキー名
	 * @return クッキー値
	 */
	this.getCookie = function(name) {
		if (! _cookieHash[name]) {
			return null;
		} else {
			return unescape(_cookieHash[name]);
		}
	};

	/**
	 * setCookie - クッキー設定用メソッド
	 * @param name   クッキー名
	 * @param value  クッキー値
	 * @param age    クッキー有効期限（秒単位）
	 * @param path   クッキー有効パス
	 * @param domain クッキー有効ドメイン
	 * @param secure 真の場合、SSL通信時のみクッキーを送る
	 * @return なし
	 */
	this.setCookie = function(name, value, age, path, domain, secure) {
		// Set-Cookie: header
		var _setCookieHeader;

		// name, value
		_cookieHash[name] = escape(value);
		_setCookieHeader = name +"="+ _cookieHash[name];

		// expires (age)
		if (age > 0) {
			_setCookieHeader += "; expires=" + _convGmtStr(age);
		}

		// path は String型である事を明示
		path = new String(path);
		// pathの先頭は“/”
		if (path.charAt(0) == "/") {
			_setCookieHeader += "; path=" + path;
		}

		// domain
		// Todo: “.”の数をチェック
		if (domain) {
			_setCookieHeader += "; domain=" + domain;
		}

		// secure
		if (secure) {
			_setCookieHeader += "; secure";
		}

		document.cookie = _setCookieHeader;

		if(window.localStorage){
			localStorage.setItem(name,value);
		}
	};

	// Constructor
	{
		var _cookieHash = new Object();
		_parseCookie();
	}

	// private method
	function _parseCookie() {
		var _ary1 = new Array();
		var _ary2 = new Array();
		
		if (document.cookie) {
			// スペースを先頭に付加
			var _cStr = document.cookie;
			_ary1 = _cStr.split(";");
			for (var i=0; i<_ary1.length; i++) {
				_ary2 = _ary1[i].split("=");
				// 余計な空白文字は消す
				_ary2[0].match(/^\s*(.+)/);
				_cookieHash[RegExp.$1] = _ary2[1];
			}
		}
	}
	function _convGmtStr(age) {
		var _exDate = new Date();
		_exDate.setTime( _exDate.getTime() + age*1000);
		return _exDate.toGMTString();
	}
}
