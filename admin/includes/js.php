  <script src="../assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="../assets/vendors/jquery-bar-rating/jquery.barrating.min.js"></script>
  <script src="../assets/vendors/chart.js/Chart.min.js"></script>
  <script src="../assets/vendors/flot/jquery.flot.js"></script>
  <script src="../assets/vendors/flot/jquery.flot.resize.js"></script>
  <script src="../assets/vendors/flot/jquery.flot.categories.js"></script>
  <script src="../assets/vendors/flot/jquery.flot.fillbetween.js"></script>
  <script src="../assets/vendors/flot/jquery.flot.stack.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../assets/js/off-canvas.js"></script>
  <script src="../assets/js/hoverable-collapse.js"></script>
  <script src="../assets/js/misc.js"></script>
  <script src="../assets/js/settings.js"></script>
  <script src="../assets/js/todolist.js"></script>

  <!-- endinject -->
  <!-- Custom js for this page -->
  <script src="../assets/js/dashboard.js"></script>

  <script>
    //
      if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}

  </script>
    <script type="text/javascript">
        function getmyImageForPreview(event){
    // alert("man");
    var image=URL.createObjectURL(event.target.files[0]);
    var imagediv = document.getElementById('image_de_couverture');
    var newimg=document.createElement('img');
    imagediv.innerHTML='';
    newimg.src=image;
    //newimg.
    newimg.width="200";
    imagediv.appendChild(newimg);
   }
     


    $(document).ready(function () {

 

      function getDatas() {
        $.post('../snipets/categories.php', function (data) {
          $('#getlist').html(data);
        });
      };
      // function get_cover_img() {
      //   $.post('Views/admin/mydash/snipets/image_de_couverture.php', function (data) {
      //     $('.image_de_couverture').html(data);
      //   });
      // };



    // getDatas();
    // get_cover_img()
    
      setInterval(getDatas(), 1000);  



//       function mydata(){



//     var request = new XMLHttpRequest();
//      var input = document.getElementById("livre_title").value;
//      request.open("GET","Views/admin/mydash/snipets/image_de_couverture.php?myName="+input);   
   
//     // alert(input);
//     request.onreadystatechange=function(){
//       // alert(this.readyState);
      
//       if(this.status===200){
//       document.getElementById("livre_titre_ajax").innerHTML = ' <span>....' + this.responseText + '</span>';       
//       }
//       else
//        document.getElementById("livre_titre_ajax").innerHTML = ' <span>....' + this.responseText + '</span>';        
//     };
//     request.send();
// }







// setInterval(mydata() , 1000);




// function controle(){
//          var text = document.getElementById('myDiv').innerText;
//         alert(text);
// }
// setInterval('controle()', 1000); 
 });
   





  





    // function createXmlHttpRequestObject(){
      
    //   var xmlHttp;
    //   try{
    //     xmlHttp = new XMLHttpRequest();
    //   }
    //   catch(e){
    //     try{
    //       xmlHttp = new ActiveXobject(Microsift.XMLHTTP);
    //     }
    //     catch(e){
    //         alert("erreur lors de la creation de l'objet xmlHttp")
    //     }
    //   }
    //   if(!xmlHttp)
    //   alert("erreur lors de la creation de l'objet xmlhttpRequest");
    //   else
    //   return xmlHttp
    // }
    // // livre_title
    // function process(){
    //   if(xmlHttp.readState==0 || xmlHttp.readystate==4 ){
    //     name=encodeURIComponent(document.getElementById('livre_title').value);
    //     xmlHttp.open("GET","Views/admin/mydash/snipets/image_de_couverture.php?name="+name,true);
    //     xmlHttp.onreadystatechange==handleResponse;
    //     xmlHttp.send(null);
    //   }
    //   else{
    //     setTimeout('process()',1000);
    //   }
    // }

    // function handleResponse(){
    //   if(xmlHttp.readstate=4){
    //     if(xmlHttp.status==200){
    //       response = xmlHttp.responseXML;
    //       xmlRoot = response.documentElemnt;
    //       message = xmlRoot.firstChild.data;

    //       document.getElementById("livre_titre_ajax").innerHTML = ' <span>' + message + '</span>';
          
    //       setTimeout('process()',1000);
      
    //     }
    //     else {
    //       alert("erreur de lecture du xml");
    //     }
    //   }
    // }
 

    </script>
  <!-- End custom js for this page -->