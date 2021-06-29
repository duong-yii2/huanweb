var Utils = {
	alias: function(str, strtolower)
	{
		if(Utils.trim(str) == "")
			return false;
		
		str = str.replace(new RegExp("-", "g"), " ");
		str = Utils.strTrimTotal(Utils.stripUnicode(str));
		str = str.replace(/[^a-zA-Z0-9 ]+/g,"");
		str = Utils.trim(str).replace(new RegExp(" ", "g"),"-");
		if(strtolower)
			str = Utils.strtolower(str);
		return str;
	},
	
	stripUnicode: function(str){
		if(Utils.trim(str) == "")
			return false;
			
		var uni_string = {
			"a" : "à,á,ạ,ả,ã,â,ầ,ấ,ậ,ẩ,ẫ,ă,ằ,ắ,ặ,ẳ,ẵ",
			"A" : "À,Á,Ạ,Ả,Ã,Â,Ầ,Ấ,Ậ,Ẩ,Ẫ,Ă,Ằ,Ắ,Ặ,Ẳ,Ẵ",
			"e" : "è,é,ẹ,ẻ,ẽ,ê,ề,ế,ệ,ể,ễ",
			"E" : "È,É,Ẹ,Ẻ,Ẽ,Ê,Ề,Ế,Ệ,Ể,Ễ",
			"i" : "ì,í,ị,ỉ,ĩ",
			"I" : "Ì,Í,Ị,Ỉ,Ĩ",
			"o" : "ò,ó,ọ,ỏ,õ,ô,ồ,ố,ộ,ổ,ỗ,ơ,ờ,ớ,ợ,ở,ỡ",
			"O" : "Ò,Ó,Ọ,Ỏ,Õ,Ô,Ồ,Ố,Ộ,Ổ,Ỗ,Ơ,Ờ,Ớ,Ợ,Ở,Ỡ",
			"u" : "ù,ú,ụ,ủ,ũ,ư,ừ,ứ,ự,ử,ữ",		
			"U" : "Ù,Ú,Ụ,Ủ,Ũ,Ư,Ừ,Ứ,Ự,Ử,Ữ",
			"y" : "ỳ,ý,ỵ,ỷ,ỹ",
			"Y" : "Ỳ,Ý,Ỵ,Ỷ,Ỹ",
			"d" : "đ",
			"D" : "Đ"
		}
		
		var _split, rep_to, rep_from;
		for (rep_to in uni_string)
		{
			rep_from = uni_string[rep_to].split(',');
			for (var uni in rep_from){
				str = str.replace(new RegExp(rep_from[uni], "g"),rep_to);
			}
		}
		return Utils.trim(str);
	},
	
	strTrimTotal: function(str){
		if(Utils.trim(str) == "")
			return false;
		
		str = str.split(" ");
		var str_out = '';
		for(var k in str )
		{
			var c = Utils.trim(str[k]);
			if(c != '')
				str_out+= ' '+c;
		}
		return Utils.trim(str_out);
	},
	
	trim: function(str){
		if(typeof jQuery == "function")
			str = $.trim(str);
		return str;
	},
	
	strtolower: function(str){
		return (str + '').toLowerCase();
	}
}