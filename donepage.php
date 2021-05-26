<?php
$title = 'Done';
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
            <div class="square current_page nav_done">
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
        <!-- note body -->
        <div class="notebody">
            <?php
                $query = "SELECT * FROM donenotes";
                $donenotes = mysqli_query($conn, $query);
                while ($_donenotes = mysqli_fetch_assoc($donenotes)){
                    ?>
                        <div class="noteDone">
                            <h2><?php echo $_donenotes['noteTitle']?> <span class="date"> - <?php echo $_donenotes['date']?></span></h2>
                            <p>
                                <?php echo $_donenotes['note']?>
                            </p>
                            <a href="./undone.php?id=<?php echo $_donenotes['id']?>&note_title=<?php echo $_donenotes['noteTitle']?>&note_body=<?php echo $_donenotes['note']?>">
                                <button class="btn btn-success"><i class="fa fa-times"></i> Undone</button>
                            </a>
                            <a href="./deletepermanently.php?id=<?php echo $_donenotes['id']?>">
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