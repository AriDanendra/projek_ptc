<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<div class="row">
    <div class="col-xl-3 col-lg-4 col-sm-6">
        <div class="icon-card mb-30">
            <div class="icon purple">
                <i class="lni lni-user"></i>
            </div>
            <div class="content">
                <h6 class="mb-10">Total User</h6>
                <h3 class="text-bold mb-10">2</h3>
            </div>
        </div>
        <!-- End Icon Cart -->
    </div>
    <!-- End Col -->
    <div class="col-xl-3 col-lg-4 col-sm-6">
        <div class="icon-card mb-30">
            <div class="icon success">
                <i class="lni lni-home"></i>
            </div>
            <div class="content">
                <h6 class="mb-10">Total Ruangan</h6>
                <h3 class="text-bold mb-10">3</h3>
            </div>
        </div>
        <!-- End Icon Cart -->
    </div>
    <!-- End Col -->
</div>
<!-- End Row -->

<?= $this->endSection() ?>