<?php

    session_start();
    require '../db.php';

    $select_icon = "SELECT * FROM icons";
    $select_icon_result = mysqli_query($db_connect, $select_icon);

    require '../dashboard_header.php';
?>

    <div class="row">
        <div class="col-lg-7">
            <div class="card">
                <div class="card-header">
                    <h3>Icon List</h3>
                </div>
                <div class="card-body">
                    <table class = "table table-striped">
                        <tr>
                            <th>SL.</th> 
                            <th>Icon</th>
                            <th>Link</th>
                            <th>Status</th>
                            <th>Action</th>  
                        </tr>
                        <?php foreach($select_icon_result as $key => $icon){?>
                        <tr>
                            <td><?=$key+1?></td>
                            <td><i class="<?=$icon['icon']?>"></i></td>
                            <td><a target = "_blank" href="<?=$icon['link']?>"><?=$icon['link']?></a></td>
                            <td>
                                <a href ="icon_status.php?id=<?=$icon['id']?>" class = "btn btn-<?=($icon['status'] == 0?'secondary':'success')?>"><?=($icon['status'] == 0?'deactive':'active')?></a>
                            </td>
                            <td>
                                <a href = "delete_social.php?id=<?=$icon['id']?>" class = "btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        <?php }?>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="card">
                <div class="card-header">
                    <h3>Add Icons</h3>
                </div>
                <div class="card-body">
                    <form action="icon_post.php" method = "POST">
                            <?php 
                                $fonts = array(
                                    "fab fa-discord",
                                    "fab fa-facebook",
                                    "fab fa-flickr",
                                    "fab fa-github",
                                    "fab fa-google",
                                    "fab fa-imdb",
                                    "fab fa-instagram",
                                    "fab fa-linkedin",
                                    "fab fa-pinterest",
                                    "fab fa-quora",
                                    "fab fa-reddit",
                                    "fab fa-skype",
                                    "fab fa-snapchat",
                                    "fab fa-telegram",
                                    "fab fa-tumblr",
                                    "fab fa-twitch",
                                    "fab fa-twitter",
                                    "fab fa-viber",
                                    "fab fa-vine",
                                    "fab fa-whatsapp",
                                    "fab fa-wikipedia-w",
                                    "fab fa-yahoo",
                                    "fab fa-yandex",
                                    "fab fa-youtube"
                                );
                            ?>
                       
                       <div class = mb-3>
                            <?php foreach($fonts as $icon) { ?>
                                <i style = "margin-right:7px; font-size:30px" class = "fa <?=$icon?>"></i>
                            <?php } ?>
                       </div>

                        <div class="mb-3">
                            <label for="" class = "form-label">Icon</label>
                            <input type="text" id = "icon" name = "icon" class = "form-control">
                        </div>
                        <div class="mb-3">
                        <label for="" class = "form-label">Link</label>
                            <input type="text" name = "link" class = "form-control">
                        </div>
                        <div class="mb-3">
                            <button type = "submit" class = "btn btn-primary">Add Icons</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php
    require '../dashboard_footer.php';
?>

<script>
    $('.fa').click (function(){
        var icon  = $(this).attr('class');
        $('#icon').attr('value', icon);
    })
</script>

<?php if(isset($_SESSION['success'])){?> 
    <script>
        Swal.fire({
        
        icon: 'success',
        title: '<?=$_SESSION['success']?>',
        showConfirmButton: false,
        timer: 1500
        })
    </script>
<?php } unset($_SESSION['success'])?>