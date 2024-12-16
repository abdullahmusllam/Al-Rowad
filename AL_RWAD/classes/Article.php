<?php 
include "db2.php";
class Article extends dbh{
public $title;

public $subtitle;
public $content;
public $author;
public $date;
public $image;

public static $ArticleArray=[];

public function __construct($dbname, $table,$title,$subtitle, $content, $author,$image)
{  
    $con=parent::__construct($dbname, $table);
    //$this->title = $title;
   $this->title = mysqli_real_escape_string($this->con,$title);
    $this->subtitle = mysqli_real_escape_string($this->con,$subtitle);
   // $this->content = $content;
    $this->author = mysqli_real_escape_string($this->con,$author);
    $this->content = mysqli_real_escape_string($this->con,$content);
    $this->date = date("F-d-Y");
    $this->image=$image;

    $this->insertToTable(["title","subTitle","author","content","creationDate","image"],["$this->title","$this->subtitle","$this->author","$this->content","$this->date","$this->image"]);
  
  //  $tempArticle=['title'=>$title,'subtitle'=>$this->subtitle ,'content'=>$content, 'author'=> $this->author, 'date'=>$this->date];
 //   self::$ArticleArray[]=$tempArticle;
   // echo "$title $contine $auther $this->date";

}
 public static function ArticleInfo(){
    return self::$ArticleArray;
 }



}
//استخدام HEREDOC**:
 //  - يمكنك استخدام طريقة HERDOC لتسهيل إدخال نصوص متعددة الأسطر.
$content = <<<EOD

                       <article class='mb-4'>
            <div class='container px-4 px-lg-5'>
                <div class='row gx-4 gx-lg-5 justify-content-center'>
                    <div class='col-md-10 col-lg-8 col-xl-7'>
                        <p>Never in all their history have men been able truly to conceive of the world as one: a single sphere, a globe, having the qualities of a globe, a round earth in which all the directions eventually meet, in which there is no center because every point, or none, is center — an equal earth which all men occupy as equals. The airman's earth, if free men make it, will be truly round: a globe in practice, not in theory.</p>
                        <p>Science cuts two ways, of course; its products can be used for both good and evil. But there's no turning back from science. The early warnings about technological dangers also come from science.</p>
                        <p>What was most significant about the lunar voyage was not that man set foot on the Moon but that they set eye on the earth.</p>
                        <p>A Chinese tale tells of some men sent to harm a young girl who, upon seeing her beauty, become her protectors rather than her violators. That's how I felt seeing the Earth for the first time. I could not help but love and cherish her.</p>
                        <p>For those who have seen the Earth from space, and for the hundreds and perhaps thousands more who will, the experience most certainly changes your perspective. The things that we share in our world are far more valuable than those which divide us.</p>
                        <h2 class='section-heading'>The Final Frontier</h2>
                        <p>There can be no thought of finishing for ‘aiming for the stars.’ Both figuratively and literally, it is a task to occupy the generations. And no matter how much progress one makes, there is always the thrill of just beginning.</p>
                        <p>There can be no thought of finishing for ‘aiming for the stars.’ Both figuratively and literally, it is a task to occupy the generations. And no matter how much progress one makes, there is always the thrill of just beginning.</p>
                        <blockquote class='blockquote'>The dreams of yesterday are the hopes of today and the reality of tomorrow. Science has not yet mastered prophecy. We predict too much for the next year and yet far too little for the next ten.</blockquote>
                        <p>Spaceflights cannot be stopped. This is not the work of any one man or even a group of men. It is a historical process which mankind is carrying out in accordance with the natural laws of human development.</p>
                        <h2 class='section-heading'>Reaching for the Stars</h2>
                        <p>As we got further and further away, it [the Earth] diminished in size. Finally it shrank to the size of a marble, the most beautiful you can imagine. That beautiful, warm, living object looked so fragile, so delicate, that if you touched it with a finger it would crumble and fall apart. Seeing this has to change a man.</p>
                        <a href='#!'><img class='img-fluid' src='assets/img/post-sample-image.jpg' alt='...' /></a>
                        <span class='caption text-muted'>To go places and do things that have never been done before – that’s what living is all about.</span>
                        <p>Space, the final frontier. These are the voyages of the Starship Enterprise. Its five-year mission: to explore strange new worlds, to seek out new life and new civilizations, to boldly go where no man has gone before.</p>
                        <p>As I stand out here in the wonders of the unknown at Hadley, I sort of realize there’s a fundamental truth to our nature, Man must explore, and this is exploration at its greatest.</p>
                        <p>
                            Placeholder text by
                            <a href='http://spaceipsum.com/'>Space Ipsum</a>
                            &middot; Images by
                            <a href='https://www.flickr.com/photos/nasacommons/'>NASA on The Commons</a>
                        </p>
                    </div>
                </div>
            </div>
        </article>

EOD;
$content2 =<<<EOD
<article>
    <h2>The Importance of Making Every Heartbeat Count</h2>
    <p><em>I believe every human has a finite number of heartbeats. I don't intend to waste any of mine.</em></p>
    <p>This quote reflects a profound philosophy about the value of time and how we choose to spend it. Every moment that passes is an opportunity to live it fully, and we should be mindful of how we utilize our time.</p>
    
    <h3>1. The Importance of Time Awareness</h3>
    <p>Time is the only resource we cannot get bak. Therefore, it is crucial to consider how we use it effectively. Are we spending our time on activities that enhance our lives and achieve our goals, or are we wasting it on unproductive tasks?</p>

    <h3>2. Setting Goals</h3>
    <p>When we set clear goals, we can direct our time and efforts toward achieving them. This helps us focus on what truly matters in our lives.</p>

    <h3>3. Making Wise Decisions</h3>
    <p>We must learn to say "no" to things that consume our time without benefit. Makingwise decisions about how we spend our time can lead to a more fulfilling life.</p>

    <h3>Conclusion</h3>
    <p>In the end, we should remember that every heartbeat represents a moment of our lives. It is essential to live each moment to the fullest and utilize our time in ways that bring us joy and success.</p>
    
    <p><small>Posted by Start Bootstrap on September 09, 2024</small></p>
</article>
EOD;
//$article1 = new Article("articles","articles","Man must explore, and this is exploration at its greatest", "Problems look mighty small from 150 miles up",
//$content,"Start Bootstrap","assets/img/contact-bg.jpg");
// $article2 = new Article("articles","articles","I believe every human has a finite number of heartbeats. I don't intend to waste any of mine.","","$content2","Start Bootstrap","assets/img/about-bg.jpg");
// $try = new Article("Man must explore, and this is exploration at its greatest", "Problems look mighty small from 150 miles up", "Start Bootstrap");
// $try = new Article("I believe every human has a finite number of heartbeats. I don't intend to waste any of mine.", "", "Start Bootstrap");
// $try = new Article("Science has not yet mastered prophecy", "We predict too much for the next year and yet far too little for the next ten.", "Start Bootstrap");
// $try = new Article("Failure is not an option", "Many say exploration is part of our destiny, but it’s actually our duty to future generations.", "Start Bootstrap");
 //$try->insertToTable(["title","subTitle","author","content"])

 class edite extends dbh{
 public $title;

public $subtitle;
public $content;
public $author;
public $date;
public $image;

public static $ArticleArray=[];

public function __construct($dbname, $table,$title,$subtitle, $author,$content,$image,$id)
{  
    $con=parent::__construct($dbname, $table);
   $this->title = mysqli_real_escape_string($this->con,$title);
    $this->subtitle = mysqli_real_escape_string($this->con,$subtitle);
    $this->author = mysqli_real_escape_string($this->con,$author);
    $this->content = mysqli_real_escape_string($this->con,$content);
    $this->date = date("F-d-Y");
    $this->image=$image;
  //  $sql = " UPDATE $table SET title='$this->title' , subTitle='$this->subtitle' , author='$this->author',content='$this->content',creationDate='$this->date',image='$this->image' WHERE id=$id";
    $this->update(["title","$this->title","subTitle","$this->subtitle","author","$this->author","content","$this->content","creationDate","$this->date","image","$this->image"],'id','=',$id);
     // $this->insertToTable(["title","subTitle","author","content","creationDate","image"],["$this->title","$this->subtitle","$this->author","$this->content","$this->date","$this->image"]);

  //  $tempArticle=['title'=>$title,'subtitle'=>$this->subtitle ,'content'=>$content, 'author'=> $this->author, 'date'=>$this->date];
 //   self::$ArticleArray[]=$tempArticle;
   // echo "$title $contine $auther $this->date";

}
 public static function ArticleInfo(){
    return self::$ArticleArray;
 }



 }
?>






