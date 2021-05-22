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
                        </tr>
                    </thead>
                    <?php
                    $sql = "SELECT * FROM betcodes ORDER BY id DESC LIMIT 10";
                    $query = $db->query($sql);
                    while ($code = mysqli_fetch_array($query)) {
                    ?>
                    <tr>
                        <td><a
                                href="https://twitter.com/<?php echo $code['punter']; ?>">@<?php echo $code['punter']; ?></a>
                        </td>
                        <td><?php echo $code['betcode']; ?></td>
                        <td><?php echo $code['bookie']; ?></td>
                        <td><?php echo $code['odds']; ?></td>
                    </tr>
                    <?php } ?>
                </table>
            </div>


        </div>
    </div>
</section>
<!-- Doctor Section End -->

<?php
include "includes/footer.php"
?>