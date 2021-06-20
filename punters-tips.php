<?php
$page = "betcodes";
define("TITLE", "Punters Tips | ConvertedCode");
include "includes/header.php"
?>
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-option spad set-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Punters Tips</h2>
                    <div class="breadcrumb__links">
                        <a href="./index.php">Home</a>
                        <span>Punters Tips</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<?php
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

$no_of_records_per_page = 10;
$offset = ($page - 1) * $no_of_records_per_page;

$total_page_sql = "SELECT COUNT(*) FROM betcodes";
$result = $db->query($total_page_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages =  ceil($total_rows / $no_of_records_per_page);
?>

<!-- Doctor Section Begin -->
<section class="doctor spad">
    <div class="container">
        <div class="doctor__item">

            <h2>Punters Tips</h2>
            <div class="_tips mt-3">
                <table class="table table-dark table-hover  table-striped">
                    <thead>
                        <tr>
                            <th>Punter</th>
                            <th>Bet Code</th>
                            <th>Bookie</th>
                            <th>Odds</th>
                            <th>Date</th>
                            <?php
                            if (isset($_SESSION['UserID']) && $_SESSION['isAdmin'] == 'true') {

                            ?>
                            <th>Actions</th>
                            <?php
                            }
                            ?>
                        </tr>
                    </thead>
                    <?php
                    $sql = "SELECT * FROM betcodes ORDER BY id DESC LIMIT $offset, $no_of_records_per_page";
                    $query = $db->query($sql);
                    while ($code = mysqli_fetch_array($query)) {
                    ?>
                    <tr>
                        <td><a href="https://twitter.com/<?php echo $code['punter']; ?>"
                                target="_blank">@<?php echo $code['punter']; ?></a>
                        </td>
                        <td><a href="<?php echo $code['betcode']; ?>" target="_blank">View Code </a></td>
                        <td><?php echo $code['bookie']; ?></td>
                        <td><?php echo $code['odds']; ?></td>
                        <?php
                            $raw_date = strval($code['date_time']);
                            $dateArray = explode(" ", $raw_date)
                            ?>
                        <td><?php echo $dateArray[0]; ?></td>
                        <?php
                            if (isset($_SESSION['UserID']) && $_SESSION['isAdmin'] == 'true') {

                            ?>
                        <td class="action-btns">
                            <form method="POST" action="./includes/edit-code.inc.php">
                                <input type="hidden" value="<?php echo $code['id']; ?>" name="id">
                                <button type="button" class="btn btn-link" name="edit-btn">Edit</button>
                            </form>
                            <form method="POST" action="includes/del-code.inc.php">
                                <input type="hidden" value="<?php echo $code['id']; ?>" name="id">
                                <button type="submit" class="btn btn-link" name="del-btn">Delete</button>
                            </form>
                        </td>
                        <?php
                            }
                            ?>
                    </tr>
                    <?php } ?>
                </table>
            </div>

            <nav aria-label="...">
                <ul class="pagination">
                    <li class="page-item <?php if ($page <= 1) {
                                                echo 'disabled';
                                            } ?>">
                        <a class="page-link" href="<?php echo "?page=" . ($page - 1); ?>" tabindex="-1">Previous</a>
                    </li>
                    <?php
                    for ($x = 1; $x <= $total_pages; $x++) {
                    ?>
                    <li class="page-item <?php if ($page == $x) {
                                                    echo "active";
                                                } ?>"><a class="page-link"
                            href="?page=<?php echo $x ?>"><?php echo $x ?><?php if ($page == $x) {
                                                                                                                                echo '<span class="sr-only">(current)</span>';
                                                                                                                            } ?></a></li>
                    <?php
                    }
                    ?>
                    <a class="page-link" href="<?php if ($page >= $total_pages) {
                                                    echo '#';
                                                } else {
                                                    echo "?page=" . ($page + 1);
                                                } ?>">Next</a>
                    </li>
                </ul>
            </nav>

        </div>
    </div>
</section>
<!-- Doctor Section End -->

<?php
include "includes/footer.php"
?>