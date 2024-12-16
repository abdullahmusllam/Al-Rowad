<?php
class dbh
{
    protected static $host = "localhost";
    protected static $user = "root";
    protected static $pass = "";
    private $dbname;
    protected $con;
    private static $table;
  

    public  function __construct($dbname, $table)
    {
        try {
            $con = new mysqli(self::$host, self::$user, self::$pass, $dbname);
            if (!$con) {

                throw new  Exception(die());
            } else {
               // echo " conncted with DateBase ✳️ $dbname ✳️ <br>";
                $this->con = $con;
                self::$table = $table;
                return $con;
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public static function ArticleInfo(){
        return self::$ArticleArray;
     }

    public function getcon()
    {
        return $this->con;
    }
    public function query($query){
        $con = $this->con;
        //$table = self::$table;

        $sql = "$query";
        $result = $con->query($sql);
        return $result;
    }
    public function update( $coulmnsName = [],$targetRow,$condition,$targetCell)
    {
        $con = $this->con;
        $table = self::$table;
        $count = count($coulmnsName);
        $coulmnsValues = "";
        for ($i = 0; $i < $count; $i = $i + 2) {
            if ($count - 2 == $i) {
                $coulmnsValues .= $coulmnsName[$i] . " = '" . $coulmnsName[$i + 1]."'";
            } else {
                //echo $i."<br>";
                $coulmnsValues .= $coulmnsName[$i] . " = '" . $coulmnsName[$i + 1] . "' , ";
            }
        }

      //  echo $coulmnsValues;

        $sql = " UPDATE $table SET $coulmnsValues WHERE $targetRow $condition $targetCell";
       $result = $con->query($sql);
       return $result;

    }

    public function deleteFromTable($where, $condition, $Keyword)
    {
        $con = $this->con;
        $table = self::$table;
        $sql = " DELETE FROM  $table WHERE $where $condition $Keyword ";
        $result = $con->query($sql);
    }

    public  function selectFromTable($coulmns = [])
    {
        $con = $this->con;
        $table = self::$table;
        $coulmnsStr = implode(' , ', $coulmns);
        $sql = "SELECT  $coulmnsStr FROM $table";

        $result = $con->query($sql);
        return $result;
        //self::selectshow($result, $coulmns);
    }
    public  function selectFromTableOrderBy($coulmns = [], $orderBy, $type)
    {
        $con = $this->con;
        $table = self::$table;
        $coulmnsStr = implode(' , ', $coulmns);
        $sql = "SELECT  $coulmnsStr FROM $table ORDER BY $orderBy $type";

        $result = $con->query($sql);
        return $result;
        // self::selectshow($result, $coulmns);
    }
    public  function selectFromTableOrderByLIMT($coulmns = [], $orderBy, $type, $Numlimt, $NumOffset)
    {
        $con = $this->con;
        $table = self::$table;
        $coulmnsStr = implode(' , ', $coulmns);
        $sql = "SELECT  $coulmnsStr FROM $table ORDER BY $orderBy $type LIMIT $Numlimt OFFSET $NumOffset ";

        $result = $con->query($sql);
        return $result;
        // self::selectshow($result, $coulmns);
    }
    public  function selectFromTableWhere($coulmns = [], $where, $condition, $Keyword)
    {
        $con = $this->con;
        $table = self::$table;

        $coulmnsStr = implode(' , ', $coulmns);

        $sql = "SELECT  $coulmnsStr FROM $table WHERE $where $condition '$Keyword' ";

        return $result = $con->query($sql);
        // self::selectshow($result, $coulmns);
    }
    public  function selectFromTableWhereAnd($coulmns = [], $where, $condition, $Keyword, $where2, $condition2, $Keyword2)
    {
        $con = $this->con;
        $table = self::$table;

        $coulmnsStr = implode(' , ', $coulmns);

        $sql = "SELECT  $coulmnsStr FROM $table WHERE $where $condition '$Keyword' AND $where2 = '$Keyword2'";

        return $result = $con->query($sql);
        // self::selectshow($result, $coulmns);
    }

    //$con = new select("northwind", "categories");
    //$con->selectFromTable(["categoryName", "description"]);
    //$con->selectFromTableWhere(["categoryName", "description"], 'categoryId', '>', 3)
    //select::selectsWhere("northwind", "categories", ["categoryName", "description"],'categoryId','>',3)



    public function insertToTable($coulmns = [], $VALUES = [])
    {

        $coulmnsStr = implode(' , ', $coulmns);
        //var_dump($VALUES);
        $con = $this->con;
        $table = self::$table;
        //echo "helllo" . count($VALUES);
        $output = "";
        foreach ($VALUES as $key => $value) {
            // echo "helllo".$key;
            if (count($VALUES) - 1 == $key) {
                //  echo "key " . $key . "and VALUES" . count($VALUES) - 1;
                $output .= "'$value'";
            } else {
                $output .= "'$value',";
            }
        }
        //echo $output;

        $sql = "INSERT INTO $table ($coulmnsStr) VALUES ($output)";
        //echo "$sql";
        //mysqli_real_escape_string($output)
        if ($con->query($sql)) {

          //  echo "$table Inserted into [$coulmnsStr] columns with value[ $output]";
        } else {
          //  echo "Not Insert";
        }
    }

    public function countTotalArticles()
    {
        $tablename = self::$table;
        $result = $this->con->query("SELECT COUNT(*) FROM $tablename");
        $row = $result->fetch_row();
        return $row[0];
    }
}

//$con = new dbh("northwind", "categories");
// $con->selectFromTable(["categoryId","categoryName", "description"]);
// dbh::selectsWhereStatic("northwind", "categories",["categoryId","categoryName", "description"], "categoryId", "=",2);
//$con->selectFromTableWhere(["categoryId","categoryName", "description"], "categoryId", "=",2);

//$post=new dbh("articles","articles");
//$post->insertToTable(["title","subTitle","author","content","creationDate","image"],["title","subTitle","author","content","creationDate","image"]);
//$update = new dbh("articles", "articles");
 //$update->update([ "title","this is title", "subTitle","this is subTitle", "author","this is author", "content","this is content", "creationDate"," this is creationDate", "image", "image"], "id", "=", 230);

class staticDB
{
    protected static $host = "localhost";
    protected static $user = "root";
    protected static $pass = "";

    public static function DBconnected($dbname)
    {
        try {
            $con = new mysqli(self::$host, self::$user, self::$pass, $dbname);
            if (!$con) {

                throw new  Exception(die());
            } else {
              //  echo " conncted with DateBase ✳️ $dbname ✳️ <br>";
                return $con;
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public static function insert($dbname, $table, $coulmns = [], $VALUES = [])
    {

        $con = self::DBconnected($dbname);

        $coulmnsStr = implode(' , ', $coulmns);
        $output = "";
        foreach ($VALUES as $key => $value) {
            // echo "helllo".$key;
            if (count($VALUES) - 1 == $key) {

                $output .= "'$value'";
            } else {
                $output .= "'$value',";
            }
        }
      //  echo  $output ;
      //  $value=mysqli_real_escape_string(self::DBconnected($dbname),$output);

        $sql = "INSERT INTO $table ($coulmnsStr) VALUES ($output)";
       // echo   $sql ;
         if ($con->query($sql)) {
          //   echo "$table Inserted into [$coulmnsStr] columns with value[ $output]";
             return true;
        } else {
           //  echo "Not Insert";
             return false;
         }
    }

    public static function delete($dbname, $table, $where, $condition, $Keyword)
    {
        $con = self::DBconnected("$dbname");
        // $sql = "SELECT  categoryName , description FROM categories where categoryName ";
        $sql = " DELETE FROM  $table WHERE $where $condition $Keyword ";


        $result = $con->query($sql);
    }
    public static function selectFromTable($dbname, $table, $coulmns = [])
    {
        $con = self::DBconnected("$dbname");
        $coulmnsStr = implode(' , ', $coulmns);
        $sql = "SELECT  $coulmnsStr FROM $table";

        $result = $con->query($sql);
        return $result;
        //self::selectshow($result, $coulmns);
    }
    public static function selectFromTableWhere($dbname, $table, $coulmns = [], $where, $condition, $Keyword)
    {
        $con = self::DBconnected("$dbname");
        $coulmnsStr = implode(' , ', $coulmns);
        $sql = "SELECT  $coulmnsStr FROM $table WHERE $where $condition '$Keyword'";

        $result = $con->query($sql);
        return $result;
        //  self::selectshow($result, $coulmns);
    }


    public static function selectShow($result, $coulmns)
    {
        // var_dump($coulmns);
        // echo $coulmns[1];
        //if ($result->num_rows);
        //     echo "<table  class='table table-hover '> <tr>
        //             <th>categoryName</th>
        //             <th>description</th>
        //             </tr>";
        // while ($row = $result->fetch_assoc()) {
        //     echo '<tr>';
        //     foreach ($coulmns as $coulmn) {
        //         echo "<td>" . $row[$coulmn] . " </td>";
        //     }
        //     echo "</tr>";
        // }
        // echo "</table>";
        // var_dump($coulmns) ;
        echo "<table  class='table table-hover '> <tr>
          <th>categoryId</th>
          <th>categoryName</th>
          <th>description</th>
          </tr>";
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<tr>';
            foreach ($coulmns as $coulmn) {
                echo "<td>" . $row[$coulmn] . " </td>";
            }
            //     echo "<td> <form method='POST' style='display:inline;'>
            //   <input type='hidden' name='delete_id' value='".$row['categoryId']."'>
            //   <button type='submit' class='btn btn-danger'>حذف</button></td>
            //     </form>
            //     echo ";
            //     echo "<td> <form method='POST' style='display:inline; name='Edite_id'>
            //     <input type='hidden' name='Edite_id' value='".$row['categoryId']."'>
            //     <button type='submit' class='btn btn-info'>Edite</button></td>
            //       </form>";
            //   echo "</tr>";
        }
      //  echo "</table>";
    }

    public static function update($dbname,$table, $coulmnsName = [],$targetRow,$condition,$targetCell)
    {
        $con = self::DBconnected("$dbname");
        $count = count($coulmnsName);
        $coulmnsValues = "";
        for ($i = 0; $i < $count; $i = $i + 2) {
            if ($count - 2 == $i) {
                $coulmnsValues .= $coulmnsName[$i] . " = '" . $coulmnsName[$i + 1]."'";
            } else {
                //echo $i."<br>";
                $coulmnsValues .= $coulmnsName[$i] . " = '" . $coulmnsName[$i + 1] . "' , ";
            }
        }

     //   echo $coulmnsValues;

        $sql = " UPDATE $table SET $coulmnsValues WHERE $targetRow $condition $targetCell";
       $result = $con->query($sql);
       return $result;

       
    }
    public static function query($dbname,$query){
        $con = self::DBconnected("$dbname");
        $sql = "$query";
        $result = $con->query($sql);
        return $result;
    }
    public static  function selectFromTableOrderBy($dbname,$table,$coulmns = [], $orderBy, $type)
    {
        $con = self::DBconnected("$dbname");
        $coulmnsStr = implode(' , ', $coulmns);
        $sql = "SELECT  $coulmnsStr FROM $table ORDER BY $orderBy $type";

        $result = $con->query($sql);
        return $result;
        // self::selectshow($result, $coulmns);
    }
    public static function selectFromTableOrderByLIMT($dbname,$table,$coulmns = [], $orderBy, $type, $Numlimt, $NumOffset)
    {
        $con = self::DBconnected("$dbname");
        $coulmnsStr = implode(' , ', $coulmns);
        $sql = "SELECT  $coulmnsStr FROM $table ORDER BY $orderBy $type LIMIT $Numlimt OFFSET $NumOffset ";

        $result = $con->query($sql);
        return $result;
        // self::selectshow($result, $coulmns);
    }
    public static function countTotalArticles($dbname,$table)
    {
        $con = self::DBconnected("$dbname");
        $result = $con->query("SELECT COUNT(*) FROM $table");
        $row = $result->fetch_row();
        return $row[0];
    }

    public static function selectFromTableWhereAnd($dbname,$table,$coulmns = [], $where, $condition, $Keyword, $where2, $condition2, $Keyword2)
    {
        $con = self::DBconnected("$dbname");

        $coulmnsStr = implode(' , ', $coulmns);

        $sql = "SELECT  $coulmnsStr FROM $table WHERE $where $condition '$Keyword' AND $where2 = '$Keyword2'";

        return $result = $con->query($sql);
        // self::selectshow($result, $coulmns);
    }
}
//staticDB::update("articles", "articles",[ "title","hello", "subTitle","this is subTitle", "author","this is author", "content","this is content", "creationDate"," this is creationDate", "image", "image"], "id", "=", 228);
//$try=new dbh("articles", "articles");
//$sql = "SELECT  categoryName , description FROM categories where categoryName='$Keyword' ";

//$sql="SELECT title , subTitle FROM articles where id=227";
// $result=staticDB::query("articles","SELECT title , subTitle FROM articles where id=227");
// //$result=$try->query($sql);
// while ($post = $result->fetch_assoc()) {
//     echo $post["title"];
// }

// $result2=staticDB::selectFromTableWhere("articles", "comments",["article_id","author","content	","creation_date"],"article_id","=",229);
// while ($row2 = $result2->fetch_assoc()) {
            
 
//     echo $row2["article_id"];
//     echo $row2["author"]."<br>";
//     echo $row2["content"]."<br>";
//     echo $row2["creation_date"]."<br>";
   
//  }
//  staticDB::insert("centerstudentsdb","student_registration",["full_name","date_of_birth","place_of_birth","governorate","area",	"current_residence","current_residence_details","phone_number","mobile_number","health_conditions","school_name","next_grade","last_grade_percentage".	"guardian_name",	"relationship",  	"guardian_occupation","guardian_mobile","skills_hobbies","achievements_participations","reason_for_joining","future_ambitions","desired_school"]
//  ,
//                                                           ["$full_name","$date_of_birth","$place_of_birth","$governorate","$area","$current_residence","$current_residence_details",	"$phone_number",	"$mobile_number"	,"$health_conditions",	"$school_name",	"$next_grade",	"$last_grade_percentage".	"$guardian_name",	"$relationship",	"$guardian_occupation"	,"$guardian_mobile",	"$skills_hobbies",	"$achievements_participations","$reason_for_joining","$future_ambitions","$desired_school"]);


// staticDB::insert("centerstudentsdb","student_registration",["full_name","date_of_birth","place_of_birth","governorate","area",	"current_residence","current_residence_details","phone_number","mobile_number","health_conditions","school_name","next_grade","last_grade_percentage".	"guardian_name",	"relationship",  	"guardian_occupation","guardian_mobile","skills_hobbies","achievements_participations","reason_for_joining","future_ambitions","desired_school"]
//  ,
//   ["عبده كرامه عيظه ساحب","2245","حضرموت","تريم","مشطه","حضرموت","مشطه",	"777485697",	"77145877"	,"لا",	"مدرسه الكوده",	"أول ثانوي",	"9.5",	"كرام عيظه ساحب ",	"أب",	"عمل خاص"	,"777489532",	"كره القدم والسباحة  وشاركت في الاذاعه المدرسيه",	"حصلت على شهادة تخرج من مركز القلم النموذجيه "," لتحسين وتطوير المواهب لدي","مدير اعمال"," الإبداع الأهلية"]);