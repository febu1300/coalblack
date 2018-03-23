<style>
  .border-color{

        border-style:solid;
        border-width:2px;
        border-color:#c7984e;   
    }
    .searchbox{position:relative;
    margin-top:15%;}
    

       
          
            #livesearch{
                margin-top: 5px;
            }
        #livesearch{ width: 19em;
        position:absolute;
        z-index: 99999;
        background-color:white;
        font-size:18px; }
      
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>
    $(document).ready(function(){
    $("table").click(function(){
        $(this).hide();
    });
});

    </script>
<div class="col-sm-3 col-md-3 col-lg-3 searchbox" ><!-- content -->
        <div class="row"></div><div class="row"></div>
 
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control bg-light border-color" id="inputid" list="product" name="ptoducts" autocomplete="off"   onkeyup="showResult(this.value)" type="text" placeholder="Suchst du etwas spezielles?">
      
    </form>
<div  id="livesearch" ></div>
</div>

<script>
    



</script>
<script>
 function showResult(str) {
       var obj,txt="";
       obj={"table":str,"limit":6};
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
       txt="<div >";
            txt+= this.responseText;
         txt+='</div>';
       
         document.getElementById("livesearch").innerHTML=txt;
         document.getElementById("livesearch").style.border="1px solid #A5ACB2";
      
                }
            };
            
            xmlhttp.open("GET","/autosuggest?wh="+str,true);
                
            xmlhttp.send();
            
    }
</script>
