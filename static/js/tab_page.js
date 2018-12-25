/*
*本文件用于控制标签页切换
*/

window.onload=function(){
		var articleList=document.getElementById("article_list");
		var tags=document.getElementById("tags").getElementsByTagName("li");
		var tagPages=articleList.getElementsByTagName("section");
		for(var i=0;i<tags.length;i++){
			//循环遍历onclick事件
			tags[i].index=i;
			tags[i].onclick=function(){
				for(var i=0;i<tags.length;i++){
					tags[i].className='';
					tagPages[i].style.display="none";
				}
				this.className='tag_active';
				tagPages[this.index].style.display="block";
			}
		}
	}