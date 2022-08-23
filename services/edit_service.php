<?php 
session_start();
require '../db.php';
$id = $_GET['id'];

$select_banner = "SELECT * FROM services WHERE id = $id";
$select_banner_result = mysqli_query($db_connect, $select_banner);
$after_assoc = mysqli_fetch_assoc($select_banner_result);


require '../dashboard_header.php';
?>

<div class="container">
    <div class="row">
    <div class="col-lg-4 m-auto">
            <div class="card">
                <div class="card-header">
                    <h3>Add Service Content</h3>
                </div>

                <div class="card-body">
                    <form action="service_update.php" method="POST">
                        <div>
                            <input type="hidden"name="id" value="<?=$after_assoc['id']?>"> 




                        <?php
                            $fonts = array (

                                'fa-yelp',
                                'fa-yen',
                                'fa-yoast',
                                'fa-youtube',
                                'fa-youtube-play',
                                'fa-youtube-square',
                                );
                        ?>

                        <?php foreach($fonts as $icon){ ?>
                            <i style="margin:5px; font-size:" class="fa <?= $icon;?>"></i>
                        <?php } ?>
                        </div>
                        <div class="mb-3">
                            <input type="text" name="icon" id="icon_input" class="form-control" value="<?=$after_assoc['icon']?>">
                        </div>
                        <div class="mb-3">
                            <input type="text" name="title" class="form-control" value="<?=$after_assoc['title']?>">
                        </div>
                        <div class="mb-3">
                            <input type="text" name="desp" class="form-control" value="<?=$after_assoc['desp']?>">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Update Content</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
require '../dashboard_footer.php';
?>
<script>
    $('.fa').click(function (){
        var icon = $(this).attr('class');
        $('#icon_input').attr('value', icon);
        
    });
</script>