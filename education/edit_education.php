<?php

    session_start();
    require '../db.php';
    $id = $_GET['id'];

    $select_  = "SELECT * FROM educations WHERE id=$id";
    $select__result = mysqli_query($db_connect, $select_);
    $after_assoc = mysqli_fetch_assoc($select__result);

    require '../dashboard_header.php';
?>

<div class="container">
    <div class="row">
    <div class="col-lg-8 m-auto">
            <div class="card">
                <div class="card-header">
                    <h3>Add Educational Qualification</h3>
                </div>
                <div class="card-body">
                    <form action="education_update.php" method = "POST">
                        <div class="mb-3">

                        <input type="hidden"name="id" value="<?=$after_assoc['id']?>" >
                            <input type="text" class = "form-control" name = "title" value="<?=$after_assoc['title']?>">
                        </div>
                        <div class="mb-3">
                            <input type="number" class = "form-control" name = "percentage" value="<?=$after_assoc['percentage']?>">
                        </div>
                        <div class="mb-3">
                            <input type="number" class = "form-control" name = "year" value="<?=$after_assoc['year']?>">
                        </div>
                        <div class="mb-3">
                            <button type = "submit" class = "btn btn-primary">Update Content</button>
                        </div>
                    </form>
                </div>
            </div>

            
        </div>
    </div>
</div>