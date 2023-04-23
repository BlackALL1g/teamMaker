<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>team maker</title>

    <!-- main fav-icon link -->
    <link rel="shortcut icon" href="./style/favicon_io/android-chrome-512x512.png" type="image/x-icon">
    <!-- font awesome import -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- local style link -->
    <link rel="stylesheet" href="style/style.css">
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

</head>
<body>

<?php @include 'header.php';?>


<section class="page1" style="background: url(./img/1957845.jpg) no-repeat">


<?php 
$db = mysqli_init();
if ($db->connect('localhost', 'root', '', 'team_db')):
    $arr = $db->execute_query("SELECT * FROM `hero` order by id asc");
    if (!$arr) echo "what!?";
    else $arr = $arr->fetch_all();?>
    <section class="team">

    <p class="heading">Meet your great team</p>

    <div class="swiper team-slider">

    <div class="swiper-wrapper">

        <?php foreach ($arr as $key => list($id, $name, $title, $picture)): ?>
            <div class="swiper-slide slide">
                <img src="<?php 
                    if ($picture === "" || $picture == null){
                        $dirimg = scandir("./img");
                        $path = "./img/39972.jpg";
                        if (count($dirimg) != 0) {
                            $path = "./img/" . $dirimg[random_int(0, count($dirimg))];
                        }
                        echo $path;
                    } 
                    else echo $picture;
                    ?>" alt="img">
                    <div class="content">
                    <h3><?php echo $name;?></h3>
                    <p><?php echo $title; ?></p>
                </div>
            </div>
        <?php endforeach;?>
    </div>

<div class="swiper-pagination"></div>   
</div>

    </section>
<?php else: ?>

    <section class="team">

    <p class="heading">Meet your great team</p>

    <div class="swiper team-slider">

        <div class="swiper-wrapper">

            <div class="swiper-slide slide">
            <img src="./img/myheroes/328965.jpg" alt="">
                <div class="content">
                <h3>1 squad</h3>
                <p>CTO</p>
                </div>
            </div>

            <div class="swiper-slide slide">
            <img src="./img/myheroes/39972.jpg" alt="">
                <div class="content">
                <h3>Алиса</h3>
                <p>СIO</p>
                </div>
            </div>

            <div class="swiper-slide slide">
            <img src="./img/myheroes/32360.png" alt="">
                <div class="content">
                <h3>Steive Rogers and co</h3>
                <p>2 squad</p>
                </div>
            </div>

            <div class="swiper-slide slide">
            <img src="./img/myheroes/44863.jpg" alt="">
                <div class="content">
                <h3>Mr. Bald </h3>
                <p>Guardian</p>
                </div>
            </div>

            <div class="swiper-slide slide">
                <img src="./img/myheroes/328909.jpg" alt="">
                <div class="content">
                <h3>Super Squad</h3>
                <p>support team</p>
                </div>
            </div>

            <div class="swiper-slide slide">
                <img src="./img/Avengers.jpg" alt="">
                <div class="content">
                <h3>Iron Man sq</h3>
                <p>Creative dep</p>
                </div>
            </div>

        </div>

        <div class="swiper-pagination"></div>

    </div>

    </section>



<?php endif; ?>
</section>



<section class="page2" id="page2" style="background: url(./img/1957923.jpg) no-repeat">

<p class="heading">Add new character into your team !</p>

    <section class="create">
    <form autocomplete="off" id="addform">
    <div class="flex">
        <div class="inputBox">
            <span>character's name</span>
            <input type="text" placeholder="enter new name" name="name" required/>
        </div>
        <div class="inputBox">
            <span>character's title</span>
            <input type="text" placeholder="enter new title" name="title" required/>
        </div>

        <div class="card">

    	    <div class="drag-area">
                <span class="visible">
                    <span class="select" role="button">Drag & drop image here or Browse</span>
                </span>
			<span class="on-drop">Drop images here</span>
    		<input type="file" class="file" accept="image/png, image/jpeg" src="" alt="" name="picture" required/>

            </div>

            <!-- IMAGE PREVIEW CONTAINER -->
            <div class="container" id="container"></div>

        </div>

    </div>
    <input type="submit" value="create new character" name="send" class="btn" id="addform_btn"/>
    </form>


    </section>


</section>

    
<?php @include 'footer.php';?>



<!-- Swiper JS link -->
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

<!-- swiper & navBar script -->
<script src="./js/swiper.js"></script>

<!-- Submit form data via Ajax -->
<script src="./js/submitAjax.js"></script>

<!-- drag and drop script -->
<script src="./js/dragNdrop.js"></script>

</body>
</html>