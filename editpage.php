<?php
$title = 'Edit';
require './includes/head.php';
require './database/connect.php';
?>

<header>
    <div class="container">
        <h1>Noty<span class="blue">Pie</span></h1>
    </div>
</header>

<section class="notes">
    <div class="container">
        <!-- note menu -->
        <div class="notemenu">
            <div class="square nav_all_notes">
                <?php
                    $query_all_notes = "SELECT * FROM note";
                    $select_all_notes = mysqli_query($conn, $query_all_notes);
                    ?>
                        <b>
                            <i class="fa fa-tasks all"></i> All Notes
                            <span class="count">
                                <?php echo mysqli_num_rows($select_all_notes)?>
                            </span>
                        </b>
                    <?php
                ?>
            </div>
            <div class="square nav_done">
                <?php
                    $query_done_notes = "SELECT * FROM donenotes";
                    $select_done_notes = mysqli_query($conn, $query_done_notes);
                    ?>
                        <b>
                            <i class="fa fa-check done"></i> Done
                            <span class="count">
                                <?php echo mysqli_num_rows($select_done_notes)?>
                            </span>
                        </b>
                    <?php
                ?>
            </div>
            <div class="square current_page nav_deleted">
                <?php
                    $query_deleted_notes = "SELECT * FROM restorablenotes";
                    $select_deleted_notes = mysqli_query($conn, $query_deleted_notes);
                    ?>
                        <b>
                            <i class="fa fa-trash del"></i> Deleted
                            <span class="count">
                                <?php echo mysqli_num_rows($select_deleted_notes)?>
                            </span>
                        </b>
                    <?php
                ?>
            </div>
        </div>
        <!-- note body -->
        <div class="notebody">
            <div class="editform">
                <h2>Edit Note</h2>
                <?php
                    $edit_id = $_REQUEST['id'];
                    $edit_query = "SELECT * FROM note WHERE id = '$edit_id'";
                    $edit = mysqli_query($conn, $edit_query);
                    while ($_edit = mysqli_fetch_assoc($edit)) {
                        ?>
                            <form action="./editprocess.php?id=<?php echo $_edit['id']?>" method="post">
                                <input type="text" name="newTitle" placeholder="Enter new note title..." value="<?php echo $_edit['noteTitle']?>" required><br>
                                <textarea name="newNoteBody"><?php echo $_edit['note']?></textarea><br>
                                <button type="submit" name="save" class="btn btn-info"><i class="fa fa-check"></i> Save</button>
                            </form>
                        <?php
                    }
                ?>
                <a href="./index.php">
                    <button class="btn btn-danger"><i class="fa fa-times"></i> Cancel</button>
                </a>
            </div>
        </div>
    </div>
</section>

<?php
require './includes/foot.php';
?>