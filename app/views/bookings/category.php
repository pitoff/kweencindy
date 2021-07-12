<style>
    #category {
        color: white;
    }

    .categoryHead {
        color: #ffc107 !important;
    }
</style>
<?php require APPROOT . '/views/inc/header.php'; ?>
<div id="colorlib-main">
    <section class="ftco-section ftco-no-pt ftco-no-pb">
        <div class="container px-md-0">
            <div class="row d-flex no-gutters">
                <div class="col-lg-12 col-md-10 order-md-last d-flex align-items-stretch">
                    <div class="contact-wrap w-100 p-md-5 p-4">
                        <div class="table-responsive">
                            <h3 class="mb-4 heading categoryHead pb-1">Categories: </h3>
                            <table class="table table-hover" id="category">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Category</th>
                                        <th>Price</th>
                                        <th>Edit</th>
                                        <th>Remove</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                <?php foreach($data['categories'] as $category):?>
                                    <tr>
                                        <td></td>
                                        <td><?= $category->category?></td>
                                        <td>#<?= number_format($category->price, 2)?></td>
                                        <td>
                                            <button type="button" data-toggle="tooltip" title="Edit Package" class="btn btn-secondary">
                                                <a href="<?= URLROOT?>/bookings/editcategory/<?=$category->id?>"><i class="fa fa-edit"></i></a>
                                            </button>
                                        </td>
                                        <td>
                                            <form action="<?=URLROOT?>/bookings/removeCategory/<?= $category->id?>" method="POST">
                                                <button type="submit" data-toggle="tooltip" title="Remove" class="btn btn-danger">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php endforeach;?>
                                </tbody>
                                
                            </table>
                        </div>

                        <div class="col-md-6">
                            <a href="<?= URLROOT;?>/bookings/addcategory"><button type="button" class="btn btn-primary">Add New</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>