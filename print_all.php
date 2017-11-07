<?php include './header.php'; ?>
<?php include './navbar.php'; ?>
<?php
include './dbconfig.php';

/* A4 ขาวดำ */
$sqlShowA41 = "SELECT SUM(qty) as A4B FROM print_log WHERE size=1 AND color=1";
$resultShowA41 = mysqli_query($dbconfig, $sqlShowA41);
if (mysqli_num_rows($resultShowA41) > 0) {
    while ($row = mysqli_fetch_assoc($resultShowA41)) {
        $ShowA41 = $row["A4B"];
    }
}

/* A4 สี */
$sqlShowA42 = "SELECT SUM(qty) as A4C FROM print_log WHERE size=1 AND color=2";
$resultShowA42 = mysqli_query($dbconfig, $sqlShowA42);
if (mysqli_num_rows($resultShowA42) > 0) {
    while ($row = mysqli_fetch_assoc($resultShowA42)) {
        $ShowA42 = $row["A4C"];
    }
}

/* A3 ขาวดำ */
$sqlShowA31 = "SELECT SUM(qty) as A3B FROM print_log WHERE size=2 AND color=1";
$resultShowA31 = mysqli_query($dbconfig, $sqlShowA31);
if (mysqli_num_rows($resultShowA31) > 0) {
    while ($row = mysqli_fetch_assoc($resultShowA31)) {
        $ShowA31 = $row["A3B"];
    }
}

/* A4 สี */
$sqlShowA32 = "SELECT SUM(qty) as A3C FROM print_log WHERE size=2 AND color=2";
$resultShowA32 = mysqli_query($dbconfig, $sqlShowA32);
if (mysqli_num_rows($resultShowA32) > 0) {
    while ($row = mysqli_fetch_assoc($resultShowA32)) {
        $ShowA32 = $row["A3C"];
    }
}

$sqlprintall = "SELECT * FROM print_log INNER JOIN print_type ON print_log.type = print_type.type_id WHERE IsDel = 0";
$objQueryprint = mysqli_query($dbconfig, $sqlprintall);
?>

<div class="page-content">
    <div class="row">
        <?php include './sidebar.php'; ?>
        <div class="col-md-10">
            <div class="row">
                <div class="col-md-6">
                    <div class="content-box-large">
                        <h1 style="text-align: center;">จำนวนพิมพ์ A4</h1>
                        <div class="row">
                            <div class="col-md-6 col-xs-6" style="text-align: center">
                                <div style="font-size: 50px;"><?php echo number_format($ShowA42, 0); ?></div>
                                <div style="color: red">พิมพ์สี</div>
                            </div>
                            <div class="col-md-6 col-xs-6" style="text-align: center">
                                <div style="font-size: 50px;"><?php echo number_format($ShowA41, 0); ?></div>
                                <div>ขาวดำ</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="content-box-large">
                        <h1 style="text-align: center;">จำนวนพิมพ์ A3</h1>
                        <div class="row">
                            <div class="col-md-6 col-xs-6" style="text-align: center">
                                <div style="font-size: 50px;"><?php echo number_format($ShowA32, 0); ?></div>
                                <div style="color: red">พิมพ์สี</div>
                            </div>
                            <div class="col-md-6 col-xs-6" style="text-align: center">
                                <div style="font-size: 50px;"><?php echo number_format($ShowA31, 0); ?></div>
                                <div>ขาวดำ</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="content-box-large">
                        <div class="row" style="padding-top: 30px;">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>ลำดับ</th>
                                                <th>จำนวน</th>
                                                <th>ขนาดกระดาษ</th>
                                                <th>สี/ขาวดำ</th>
                                                <th>ประเภท</th>
                                                <th>จัดพิมพ์โดย</th>
                                                <th>วันที่พิมพ์</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            while ($objResultprint= mysqli_fetch_array($objQueryprint)) {
                                                /* A4 = 1, A3 = 2 */
                                                if($objResultprint["size"]==1){
                                                    $paper = 'A4';
                                                } else {
                                                    $paper = 'A3';
                                                }
                                                /* B/W = 1, color = 2 */
                                                if($objResultprint["color"]==1){
                                                    $color = 'ขาวดำ';
                                                } else {
                                                    $color = 'สี';
                                                }
                                                
                                                ?>
                                                <tr>
                                                    <td><?php echo $objResultprint["print_id"]; ?></td>
                                                    <td><?php echo $objResultprint["qty"]; ?></td>
                                                    <td><?php echo $paper; ?></td>
                                                    <td><?php echo $color; ?></td>
                                                    <td><?php echo $objResultprint["type_name"]; ?></td>
                                                    <td><?php echo $objResultprint["create_by"]; ?></td>
                                                    <td><?php echo $objResultprint["create_date"]; ?></td>
                                                </tr>
                                                <?php
                                            }
                                            mysqli_close($dbconfig);
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include './footer.php'; ?>
