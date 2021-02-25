function checkpass(){
	
		a = document.getElementById('phone1').value;
		b = document.getElementById('pass').value;
		
		
		d = 0;
		
		if(document.getElementById('sps').checked == true){d = 1;}
		
	
	    var req = new Subsys_JsHttpRequest_Js();
        req.onreadystatechange = function() {
            if (req.readyState == 4) {
                
				
					if (req.responseJS.err == 0) {
						document.location.href='/area/';
						
					}else{
						document.getElementById('erlop').innerHTML = 'Неправильный логин или пароль';
						document.getElementById('phone1').style.border = '1px solid Red';
						document.getElementById('pass').style.border = '1px solid Red';
						
					}
               
            }
        }
        req.caching = false;
        req.open('POST', '/js/checkpass2.php', true);
        req.send({a:a, b:b, d:d});

 }
 