<?php class chek
{
    public static function checkEmail($email)
    {
        // echo $email;
        $checkimail = preg_match("/^\D\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/", ($email));
    
        if ($checkimail === 0) {
            //  echo $email . "helll <br>";
    
            throw new Exception(" your email not corrict");
        }
    }
    public static  function checkName4word($username,$message)
    {
     
       // $full_name = $username;
        $countword=explode(" ",$username);
        $word_count=count($countword);
       // $word_count = str_word_count("$full_name");
        //echo $username."<br>";
        //echo $word_count."<br>";
    //die();
        if ($word_count == "") {
            // echo "<div class='massamge'>   Username Is Required   </div>";
            
            throw new Exception("أدخل اسمك الرباعي ");
            die();
    
        } elseif ($word_count < 3) {
    
            
            throw new Exception(" $message");
         
        }
        else{
            
            return $username;
        }
    }
    
    public static  function checnotempty($input,$message)
    {
     
        $inputchek = $input;

        if ($inputchek == "") {
            // echo "<div class='massamge'>   Username Is Required   </div>";
            
            throw new Exception(" $message");
            die();
        }
        else{
            
            return $inputchek;
        }
    }

    public static function checkphone_yemen($phone,$message)
    {
    $checkphone = preg_match("/^(00967)?(7)(7|8|3|1|0)([0-9]){7}$/", ($phone));
    if( $checkphone ==false){
       
      throw new Exception("$message");
      die();
      }
      else{
        return $phone;
      }
    }

}


?>