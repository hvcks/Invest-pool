 <!--Slider-->
<div class="w3-content w3-section" style="max-width:100%; max-height: 100px">
  <img class="mySlides" src="one.jpg" style="width:100%; height:400px;" >
  <img class="mySlides" src="two.jpg" style="width:100%; height: 400px;">
</div>

<script>
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 2000); // Change image every 2 seconds
}
</script>

</body>
</html>