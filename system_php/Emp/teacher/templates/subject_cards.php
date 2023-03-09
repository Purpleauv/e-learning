<!-- Cards -->
<div class="page-inner mt--5">
    <div class="row mt--2">
        <?php if(isset($result)) { ?>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <div class="col-md-3">
            <div class="card full-height">
                <div class="card-body">
                    <label for="subject">
                        <div class="card-title"><?php echo $row["subject_name"] ?></div>
                    </label>
                    <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                        <div class="px-2 pb-2 pb-md-0 text-center">
                            <div class="count"></div>
                            <label for="students">
                                <?php $subject_id = $row["subject_id"]; ?>
                                <form method="POST" action=<?php echo "index.php?subject_id=" . $subject_id ?>>
                                    <button type="submit" class="fw-bold mt-3 mb-0">View Students</h6>
                                </form>
                            </label><br>
                        </div>
                        <div class="px-2 pb-2 pb-md-0 text-center">
                            <div class="count"></div>
                            <label for="info">
                                <button type="submit" class="fw-bold mt-3 mb-0">View Info</h6>
                            </label>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } } ?>
    </div>
</div>
<!-- End Cards -->