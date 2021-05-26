<?php
$title = 'Deleted';
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
            <?php
                $query = "SELECT * FROM restorablenotes";
                $restorablenotes = mysqli_query($conn, $query);
                while ($_restorablenotes = mysqli_fetch_assoc($restorablenotes)){
                    ?>
                        <div class="deletednotes">
                            <h2><?php echo $_restorablenotes['noteTitle']?> <span class="date"> - <?php echo $_restorablenotes['date']?></span></h2>
                            <p>
                                <?php echo $_restorablenotes['note']?>
                            </p>
                            <a href="./restore.php?id=<?php echo $_restorablenotes['id']?>&note_title=<?php echo $_restorablenotes['noteTitle']?>&note_body=<?php echo $_restorablenotes['note']?>">
                                <button class="btn btn-success"><i class="fa fa-refresh"></i> Restore</button>
                            </a>
                            <a href="./deletepermanentlyRestorableNote.php?id=<?php echo $_restorablenotes['id']?>">
                                <button class="btn btn-danger"><i class="fa fa-trash"></i> Delete Permanently</button>
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