  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="js/jquery-1.11.2.min.js"><\/script>')</script>
  <script src="js/modernizr.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
  <script src="js/main.js"></script>
  <script src="js/login.js"></script>
  <script>
    $( document ).ready(function() {
        var arr = ['assets/img/img1.jpeg','assets/img/img2.jpeg','assets/img/img3.jpeg','assets/img/img4.jpeg'];
        
        var i = 0;
        setInterval(function(){
            if(i == arr.length - 1){
                i = 0;
            }else{
                i++;
            }
            var img = 'url('+arr[i]+')';
            $(".fBgContainer").css('background-image',img); 
            // setTimeout(function() {
            //     $(".fBgContainer").removeClass('slide-in');
            // }, 1000);
        }, 2000);

    });
	</script>
</body>
</html>