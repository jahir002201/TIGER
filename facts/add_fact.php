<?php

    session_start();
    require '../db.php';

    $select_fact = "SELECT * FROM facts";
    $select_fact_result = mysqli_query($db_connect, $select_fact);

    require '../dashboard_header.php';
?>

    <div class="row">
        <div class="col-lg-7">
            <div class="card">
                <div class="card-header">
                    <h3>Facts List</h3>
                </div>
                <div class="card-body">
                    <table class = "table table-striped">
                        <tr>
                            <th>SL</th> 
                            <th>Icon</th>
                            <th>Count</th>
                            <th>Title</th>
                            <th>Status</th>
                            <th>Action</th>  
                        </tr>
                        <?php foreach($select_fact_result as $key => $fact){?>
                        <tr>
                            <td><?=$key+1 ?></td>
                            <td><i class="<?=$fact['icon']?>"></i></td>
                            <td><?=$fact['count']?></td>
                            <td><?=$fact['title']?></td>
                            <td>
                                <a href ="fact_status.php?id=<?=$fact['id']?>" class = "btn btn-<?=($fact['status'] == 0?'secondary':'success')?>"><?=($fact['status'] == 0?'deactive':'active')?></a>
                            </td>
                            <td>
                                <a href = "delete_fact.php?id=<?=$fact['id']?>" class = "btn btn-danger">Delete</a>
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
                    <h3>Add Facts</h3>
                </div>
                <div class="card-body">
                    <form action="fact_post.php" method = "POST">
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
                        <label for="" class = "form-label">Count</label>
                            <input type="text" name = "count" class = "form-control">
                        </div>
                        <div class="mb-3">
                        <label for="" class = "form-label">Title</label>
                            <input type="text" name = "title" class = "form-control">
                        </div>
                        <div class="mb-3">
                            <button type = "submit" class = "btn btn-primary">Add Fact</button>
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