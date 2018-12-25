/*
*本文件用于控制轮播图
*/

	var prev=document.getElementById("banner_prev");
	var next=document.getElementById("banner_next");
	var slides=document.getElementById("banner_slides");
	var slideArea=document.getElementById("banner_slide_area");
	var slideCtrl=document.getElementById("banner_point_btn").getElementsByTagName("li");
	var index=1;
	function slideChange(direction){
			
			slideOffset=100;
			currentOffset=parseInt(slides.style.left);
				if(currentOffset>-100){
					slides.style.left="-500%";
					return;
				}else{
				if(currentOffset<-500){
					slides.style.left="-100%";
					return;
				}
			switch(direction){
				case 'next':
					{
						newLeft=parseInt(slides.style.left)-slideOffset;
						break;
					}
				case 'prev':
				{
					newLeft=parseInt(slides.style.left)+slideOffset;
					break;
				}
				default:return;
			}
				slides.style.left=newLeft+"%";
			}
		}
	var slidePlayTimer;
	function play(){
		slidePlayTimer=setInterval("next.onclick()",2500);
	}
	function stop(){
		clearInterval(slidePlayTimer);
	}
	play();
	slideArea.onmouseover=stop;
	slideArea.onmouseout=play;
	function slideCtrlClick(){
		for (var i=0;i<slideCtrl.length;i++){
			if(slideCtrl[i].className=='slide_ctrl_active'){
				slideCtrl[i]='';
			}
			slideCtrl[index-1].className='slide_ctrl_active';
		}
	}
	for(var i=0;i<=slideCtrl.length-1;i++){
		slideCtrl[i].onclick=function(){
			var clickCtrl=parseInt(this.dataset.id);
			var offset=100*(index-clickCrtl);
			newLeft=parseInt(slides.style.left)+offset;
			slides.style.left=newLeft+"%";
			index=clickCtrl;
			slideCtrlClick();
		}
	}