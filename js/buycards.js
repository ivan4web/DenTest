function buycard(a){

		var req = new JsHttpRequest();
        req.onreadystatechange = function() {
            if (req.readyState == 4) {		
				if(req.responseJS.res != ''){		
					alert(req.responseJS.res);	
				}else{}				
            }
		}
     
    req.caching = false;
    req.open('POST', '/js/buycards.php', true);
    req.send({a:a});
}
 