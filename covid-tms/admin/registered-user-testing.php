<?php
//DB conncetion
include_once('includes/config.php');
error_reporting(0);
if (isset($_POST['submit'])) {
    //getting post values
    $mnumber = $_POST['mobilenumber'];
    $testtype = $_POST['testtype'];
    $timeslot = $_POST['birthdaytime'];
    $orderno = mt_rand(100000000, 999999999);
    $query = "insert into tbltestrecord(PatientMobileNumber,TestType,TestTimeSlot,OrderNumber) values('$mnumber','$testtype','$timeslot','$orderno');";
    $result = mysqli_query($con, $query);
    if ($result) {
        echo '<script>alert("Yêu cầu xét nghiệm của bạn đã được gửi thành công. ID của bạn là là "+"' . $orderno . '")</script>';
        echo "<script>window.location.href='registered-user-testing.php'</script>";
    } else {
        echo "<script>alert('Đã xảy ra lỗi. Vui lòng thử lại.');</script>";
        echo "<script>window.location.href='registered-user-testing.php'</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Kovid 19 | Người dùng đã đăng ký</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style type="text/css">
        label {
            font-size: 16px;
            font-weight: bold;
            color: #000;
        }
    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include_once('includes/sidebar2.php'); ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->


                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Kovid 19 | Người dùng đã đăng ký</h1>

                    <form method="post">
                        <div class="row">

                            <div class="col-lg-6">

                                <!-- Basic Card Example -->
                                <div class="card shadow mb-4">

                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Số điện thoại đã đăng ký</label>
                                            <input type="text" class="form-control" id="regmobilenumber" name="regmobilenumber" placeholder="Vui lòng nhập số điện thoại đã đăng ký của bạn" pattern="[0-9]{10}" title="Chỉ 10 ký tự số" required="true" maxlength="10">
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-primary btn-user btn-block" name="search" value="Tìm kiếm">
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <hr />
                    <?php if (isset($_POST['search'])) { ?>
                        <h3 align="center" style="color:red">Kết quả so với số điện thoại "<?php echo $_POST['regmobilenumber']; ?>"</h3>
                        <hr />
                        <?php
                        $mnumber = intval($_POST['regmobilenumber']);
                        $sql = mysqli_query($con, "select * from tblpatients where MobileNumber='$mnumber'");
                        $row = mysqli_num_rows($sql);
                        if ($row > 0) {
                            while ($result = mysqli_fetch_array($sql)) {

                        ?>
                                <form name="newtesting" method="post">
                                    <div class="row">

                                        <div class="col-lg-6">

                                            <!-- Basic Card Example -->
                                            <div class="card shadow mb-4">
                                                <div class="card-header py-3">
                                                    <h6 class="m-0 font-weight-bold text-primary">Thông tin người đăng ký xét nghiệm</h6>
                                                </div>
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label>Họ và tên</label>
                                                        <input type="text" class="form-control" id="fullname" name="fullname" value="<?php echo $result['FullName']; ?>" readonly="true">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Số điện thoại</label>
                                                        <input type="text" class="form-control" id="mobilenumber" name="mobilenumber" value="<?php echo $result['MobileNumber']; ?>" readonly="true">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Ngày sinh</label>
                                                        <input type="text" class="form-control" id="dob" name="dob" readonly="true" value="<?php echo $result['DateOfBirth']; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Số CMND/CCCD/HC</label>
                                                        <input type="text" class="form-control" id="govtissuedid" name="govtissuedid" value="<?php echo $result['GovtIssuedId']; ?>" readonly="true">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Số thẻ bảo hiểm y tế</label>
                                                        <input type="text" class="form-control" id="govtidnumber" name="govtidnumber" value="<?php echo $result['GovtIssuedIdNo']; ?>" readonly="true">
                                                    </div>


                                                    <div class="form-group">
                                                        <label>Địa Chỉ hiện tại</label>
                                                        <textarea class="form-control" id="address" name="address" readonly="true"><?php echo $result['FullAddress']; ?></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Tỉnh/Thành phố</label>
                                                        <input type="text" class="form-control" id="state" name="state" value="<?php echo $result['State']; ?>" readonly="true">
                                                    </div>

                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-lg-6">

                                            <div class="card shadow mb-4">
                                                <div class="card-header py-3">
                                                    <h6 class="m-0 font-weight-bold text-primary">Thông tin xét nghiệm</h6>
                                                </div>
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label>Loại xét nghiệm</label>
                                                        <select class="form-control" id="testtype" name="testtype" required="true">
                                                            <option value="">Chọn</option>
                                                            <option value="Antigen">Antigen</option>
                                                            <option value="RT-PCR">RT-PCR</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Ngày giờ muốn xét nghiệm</label>
                                                        <input type="datetime-local" class="form-control" id="birthdaytime" name="birthdaytime" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="submit" class="btn btn-primary btn-user btn-block" name="submit">
                                                    </div>

                                                </div>
                                            </div>


                                        </div>

                                    </div>
                                </form>
                            <?php }
                        } else { ?>
                            <h4 align="center" style="color:red;">Không tìm thấy hồ sơ nào</h4>
                    <?php }
                    } ?>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <?php include_once('includes/footer.php'); ?>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>



    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>