<?php
$title = 'Home';
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
            <div class="square current_page nav_all_notes">
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
            <div class="square nav_deleted">
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
        <!-- note input -->
        <div class="noteinput">
            <div class="container">
                <form action="./addnote.php" method="post">
                    <input type="text" name="note_title" placeholder="Note Title..." required><br>
                    <textarea name="note_body" placeholder="Write something..." required></textarea><br>
                    <button type="submit" name="add" class="btn btn-info"><i class="fa fa-plus"></i> Add</button>
                </form>
                <button class="canceladdnote btn btn-danger"><i class="fa fa-times"></i> Cancel</button><br>
                <button class="addnotetrigger btn btn-info"><i class="fa fa-plus"></i> Add Note</button>
            </div>
        </div>
        <!-- note body -->
        <div class="notebody">
            <?php
                $query = "SELECT * FROM note";
                $notes = mysqli_query($conn, $query);
                while ($_notes = mysqli_fetch_assoc($notes)){
                    ?>
                        <div class="note">
                            <h2><?php echo $_notes['noteTitle']?> <span class="date"> - <?php echo $_notes['date']?></span></h2>
                            <p>
                                <?php echo $_notes['note']?>
                            </p>
                            <a href="./doneprocess.php?id=<?php echo $_notes['id']?>&note_title=<?php echo $_notes['noteTitle']?>&note_body=<?php echo $_notes['note']?>">
                                <button class="btn btn-success"><i class="fa fa-check"></i> Done</button>
                            </a>
                            <a href="./editpage.php?id=<?php echo $_notes['id']?>">
                                <button class="btn btn-info"><i class="fa fa-edit"></i> Edit</button>
                            </a>
                            <a href="./delete.php?id=<?php echo $_notes['id']?>&note_title=<?php echo $_notes['noteTitle']?>&note_body=<?php echo $_notes['note']?>">
                                <button class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
                            </a>
                        </div>
                    <?php
                }
            ?>
        </div>
    </div>
</section>

<?php
require './includes/foot.php';
?>