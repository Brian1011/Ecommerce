		function openNav() {
		    document.getElementById("mysidenav").style.width = "200px";
		    document.getElementById("main").style.marginLeft = "200px";
		}

		function closeNav() {
		    document.getElementById("mysidenav").style.width = "0";
		    document.getElementById("main").style.marginLeft= "0";
		}

		function color(x){
			if(x==1){
			document.getElementById("head").style.background='red';
			}else if(x==2){
			document.getElementById("head").style.background='blue';
			}else{
			document.getElementById("head").style.background='green';
			}
		}