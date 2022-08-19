<!DOCTYPE html>
<html>
    <head><?php 
       


//decode JSON string, put into global
    ?>
     
        <meta charset="UTF_8" />
        <meta name="viewport" content="width=device-width">
    <title>HW #2</title>
    </head>
    <body>
        
<form action="" method="post">
    <input type="text" name="username" placeholder="github username" />
    <h3>choose: </h3>
<select name="choose" value="choose">
    <option value="repos">repos</option>
    <option value="followers">followers</option>
    <option value="repos and followers">repos and followers</option>
</select>

<button type="submit" name="submit">submit and get results</button>
</form>

<?php  

if(isset($_POST['submit']) && $_POST['username']!==""){
$eu=$_POST['username'];


////////////////////////////ERROR handling
function errHandle($errNo, $errStr, $errFile, $errLine) {
  $msg = "$errStr in $errFile on line $errLine";
  if ($errNo == E_NOTICE || $errNo == E_WARNING) {
      echo "ERROR: username you entered is not exist";
  } //else {
      //echo $msg;
    //}
}

set_error_handler('errHandle');

///////////////////////////


if($_POST['choose']==="repos"){
$init=curl_init("https://api.github.com/users/$eu/repos");
curl_setopt($init,CURLOPT_RETURNTRANSFER, true);
////////////////////////////////////////////////////////return info


//echo $_SERVER['HTTP_USER_AGENT'] . "\n\n";
$browser = get_browser(null, true);

curl_setopt($init, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36 ");

$IFDT=json_decode(curl_exec($init),true); /* */
//
$ex=curl_exec($init);//
//curl_exec($init);
curl_close($init);

file_put_contents('userdata.json',$ex);
//write a string into file



foreach($IFDT as $key => $value){
    //////
    $fws=$value['name'];
print "<a href=https://github.com/$eu/$fws target='_blank'>$fws</a><br></br>";

}
}


//followers'


    if($_POST['choose']==="followers"){$eu=$_POST['username'];
    $init=curl_init("https://api.github.com/users/$eu/followers");
    curl_setopt($init,CURLOPT_RETURNTRANSFER, true);
    ////////////////////////////////////////////////////////return info
    
    
    //echo $_SERVER['HTTP_USER_AGENT'] . "\n\n";
    $browser = get_browser(null, true);
    
    curl_setopt($init, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36 ");
    //if (/Opera[\/\s](\d+\.\d+)/.test(navigator.userAgent)) {
   // browser = 'Opera';
//} else if (/MSIE (\d+\.\d+);/.tests(navigator.userAgent)) {
  //  browser = 'MSIE';
//} else if (/Navigator[\/\s](\d+\.\d+)/.test(navigator.userAgent)) {
  //  browser = 'Netscape';
//} else if (/Chrome[\/\s](\d+\.\d+)/.test(navigator.userAgent)) {
 //   browser = 'Chrome';
//} else if (/Safari[\/\s](\d+\.\d+)/.test(navigator.userAgent)) {
 //   browser = 'Safari';
   // /Version[\/\s](\d+\.\d+)/.test(navigator.userAgent);
    //browserVersion = new Number(RegExp.$1);
//} else if (/Firefox[\/\s](\d+\.\d+)/.test(navigator.userAgent)) {
  //  browser = 'Firefox';
//}
//if(browserVersion === 0){
  //  browserVersion = parseFloat(new Number(RegExp.$1));
//}
//alert(browser + "*" + browserVersion);

          $IFDT=json_decode(curl_exec($init),true); /* */
    //
    $ex=curl_exec($init);//
    //curl_exec($init);
    curl_close($init);
    
    file_put_contents('userdata.json',$ex);
    //write a string into file


foreach($IFDT as $key => $value){

      echo  $value['login'];
////

      $picture = $value['avatar_url'];
 
      echo "<img  class = 'profpict' src=$picture  ><br></br>" ;
  
   }

    
        

    

 
  
}

if($_POST['choose']==="repos and followers"){

  $init=curl_init("https://api.github.com/users/$eu/repos");
  curl_setopt($init,CURLOPT_RETURNTRANSFER, true);
  ////////////////////////////////////////////////////////return info
  
  
  //echo $_SERVER['HTTP_USER_AGENT'] . "\n\n";
  $browser = get_browser(null, true);
  
  curl_setopt($init, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36 ");
  

///$$$$$$$$$$$$$$$$$$$$$$$



  //
  $IFDT=json_decode(curl_exec($init),true); /* */
  //
  $ex=curl_exec($init);//
  //curl_exec($init);
  curl_close($init);
  
  file_put_contents('userdata.json',$ex);
  //write a string into file
  
  

   //////
      /*private function generateTree($courseID) {
        $q = "SELECT l.id, l.name AS lesson_name, c.name AS course_name FROM lessons AS l, courses AS c WHERE l.course_id=c.id AND c.id=?";
        $stmt = $this->db->prepare($q);
        $stmt->bind_param("i", $courseID);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $lName, $cName);
            echo "<li> <a href='#'>$cName</a> <ul>";
            while ($stmt->fetch()) <====HERE!!!
                echo "<li> <a href='?course=$courseID&lesson=$id'> $lName </a></li>";
            echo "</ul> </li>";
        }
    }*/
  

 foreach($IFDT as $key => $value){   $fws=$value['name'];
  print "<a href=https://github.com/$eu/$fws target='_blank'>$fws</a><br></br>";
 }

$init=curl_init("https://api.github.com/users/$eu/followers");
curl_setopt($init,CURLOPT_RETURNTRANSFER, true);
////////////////////////////////////////////////////////return info


//echo $_SERVER['HTTP_USER_AGENT'] . "\n\n";
$browser = get_browser(null, true);

curl_setopt($init, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36 ");
//if (/Opera[\/\s](\d+\.\d+)/.test(navigator.userAgent)) {

//}
//alert(browser + "*" + browserVersion);
$IFDT=json_decode(curl_exec($init),true); /* */
//
$ex=curl_exec($init);//
//curl_exec($init);
curl_close($init);
/*$result = $stmt->fetchAll(); // PDO
$result = $stmt->fetch_all(); // MySQLi

foreach($result as $row) { print $row['lesson_name']; }
foreach($result as $row) { print $row['lesson_name']; }
foreach($result as $row) { print $row['lesson_name']; }
etc...
*/
file_put_contents('userdata.json',$ex);
//write a string into file

 
 foreach($IFDT as $key => $value){
  echo  $value['login'];

  $picture = $value['avatar_url']; echo "<img  class = 'profpict' src=$picture  ><br></br>" ;
}




/*
  $('a.add').click(function(){ 
    $('#loader').show();
    var url = "/yadavari/test.php?";
    var json_text = JSON.stringify($("form[name='add']").serialize(), null, 2);
    var datas = JSON.parse(json_text);  
    ajx = $.ajax({
    url: url,
    type: 'post',
    data: datas,  
    dataType: 'json',
    success: function(r) {

                $('#loader').hide();
                if(r.r != 0){
                    alert("ok");
                    jsmsalert($('#alert_add'),'success',r.m);
                    apendtable(r.r);
                    $("tr").removeClass("odd");
                    $("tr.viewrow:odd").addClass("odd");
                    $("tr.editrow:odd").addClass("odd");
                    $('td[colspan="7"]').remove();
                }
                else{
                    jsmsalert($('#alert_add'),'error',r.m,0);                        
                }
            },
    error: function(request, status, err) {
        $('#loader').hide();
            jsmsalert($('#alert_add'),'error','error msg'); 
            alert( "ERROR:  " + err + "  -  "  );

    }*/
 
}






if($_POST['username']==="" && isset($_POST['submit'])){
  echo "ERROR: bro your github username field is empty";
}
}
////


//////



?>


<style>
  .profpict{
    border-radius:40px;
  }

</style>

    </body>


</html>