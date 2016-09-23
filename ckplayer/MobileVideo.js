	var video =document.getElementsByTagName("video")[0];
	if(video){
		var width = window.innerWidth || document.body.clientWidth || document.documentElement.clientWidth;
		video.style.width=width+"px";
		video.style.height=260+"px";
		var a1 = document.getElementById("a1");
		a1.style.width=width+"px";
		a1.style.height=260+"px";
	}
