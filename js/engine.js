window.onload = function(){
            var a = false;

            document.getElementById('btn1').onclick = function(){
                if(a===false){
                document.getElementById('p1').style.height= "80px";
                a= true;
            } else{
                document.getElementById('p1').style.height= "0px";
                a= false;
            }
        };
    };

/*facebook plug in*/
    (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/sv_SE/sdk.js#xfbml=1&version=v2.8";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));