// JavaScript Document
window.onload=function(){
		currentURL=encodeURI(window.location.href);
		shareTitle=encodeURI(document.getElementById('article_title').innerHTML+"（来自疯玩游戏H-Cube.ga）");
		shareBtnArea=document.getElementById("share_btn_area");
		shareBtnArea.addEventListener("click",function(event){
			switch(event.target.id){
				case "weibo_share":weiboShare();break;
				case "qzone_share":qzoneShare();break;
				case "twitter_share":twitterShare();break;
				case "linkedin_share":linkedinShare();break;
				case "fb_share":fbShare();break;
				default:console.log("default");break;
			}
			
		},false);
		function weiboShare(){
			window.open("http://service.weibo.com/share/share.php?title="+shareTitle+"&url="+currentURL,"_blank","toolbar=yes, location=yes, directories=no, status=no, menubar=yes, scrollbars=yes, resizable=no, copyhistory=yes, width=640, height=480");
		}
		function qzoneShare(){
			window.open("https://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url="+currentURL+"&title="+shareTitle+"&summary=","_blank","toolbar=yes, location=yes, directories=no, status=no, menubar=yes, scrollbars=yes, resizable=no, copyhistory=yes, width=640, height=480");
		}
		
		function twitterShare(){
			window.open("https://twitter.com/intent/tweet?text="+shareTitle+"&url="+currentURL,"_blank","toolbar=yes, location=yes, directories=no, status=no, menubar=yes, scrollbars=yes, resizable=no, copyhistory=yes, width=640, height=480");
		}
		
		function linkedinShare(){
			window.open("http://www.linkedin.com/shareArticle?mini=true&ro=true&url="+currentURL+"&title="+shareTitle+"&summary=","_blank","toolbar=yes, location=yes, directories=no, status=no, menubar=yes, scrollbars=yes, resizable=no, copyhistory=yes, width=640, height=480");
		}

		function fbShare(){
			window.open("https://www.facebook.com/share.php?u="+currentURL+"&t="+shareTitle+"&pic=","_blank","toolbar=yes, location=yes, directories=no, status=no, menubar=yes, scrollbars=yes, resizable=no, copyhistory=yes, width=640, height=480");
		}
		
		
		
	}