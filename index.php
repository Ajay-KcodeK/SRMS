<?php
include('admin/srms.php');

$object = new srms();
$object->query = "
SELECT * FROM exam_srms WHERE exam_result_published = 'Yes'
AND exam_status = 'Enable'";

$result = $object->get_result();

include('header.php');
?>
<div class="card">
    <form method="post" action="result.php">
        <div class="card-header">
            <h3><b>Search Result</b></h3>
        </div>
        <div class="card-body">

            <div class="row form-group">
                <label class="col col-md-4 text-right"><b>Select Exam</b></label>
                <div class="col col-md-8">
                    <select name="exam_name" class="form-control">
                        <option value="">Select Exam</option>
                        <?php
                       // echo "Aahay";
                        foreach ($result as $row) {
                            echo '<option value="' . $row["exam_id"] . '">' . $row["exam_name"] . '</option>';
                        }

                        ?>
                    </select>
                </div>
            </div>
            <div class="row form-group">
                <label class="col col-md-4 text-right"><b>Enter Roll No.</b></label>
                <div class="col col-md-8">
                    <input type="text" name="student_roll_no" class="form-control" />
                </div>
            </div>
        </div>
        <div class="card-footer text-center">
            <input type="submit" name="submit" class="btn btn-primary" value="Search" />
        </div>
    </form>
</div>
<?php
include('footer.php');
?>