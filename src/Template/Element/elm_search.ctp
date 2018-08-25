
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>
    $(document).ready(function(){
    $("table").click(function(){
        $(this).hide();
    });
});

    </script>

  <div class="row"></div>
  <div class="row"></div>
 
  <input  class="form-control bg-light border-color" id="inputid" list="product" name="ptoducts" autocomplete="off"   onkeyup="showResult(this.value)" type="text" placeholder="Suchst du etwas spezielles?">

  <div id="livesearch" ></div>


<script>
 function showResult(str) {
       var obj,txt="";
       obj={"table":str,"limit":5};
     if (str.length===0) {
            document.getElementById("livesearch").innerHTML="";
            document.getElementById("livesearch").style.border="0px";
            return;
         }
     if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
        } else {  // code for IE6, IE5
         xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
           }
            xmlhttp.onreadystatechange=function() { 
     if (this.readyState===4 && this.status===200) {
 
            txt+= this.responseText;
     
       
         document.getElementById("livesearch").innerHTML=txt;
         document.getElementById("livesearch").style.border="1px solid #A5ACB2";
      
                }
            };
            
            xmlhttp.open("GET","autosuggest?wh="+str,true);
                
            xmlhttp.send();
            
    }
</script>


