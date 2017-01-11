<div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title text-center">All Promos</h4>
    </div>
    <div class="panel-body">
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Saving Rate</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($promos as $promo){?>
                <tr>
                    <td><?php echo $promo->title ?></td>
                    <td><?php echo $promo->description ?></td>
                    <td><?php echo $promo->saving_rate ?>%</td>
                    <td><?php echo $promo->status(); ?></td>
                    <td>
                        <a href="<?php echo $this->createUrl('backend.php/promo/view',array('id'=>$promo->id)) ?>" class="btn btn-default btn-sm">View Products</a>
                        <a href="<?php echo $this->createUrl('backend.php/promo/update',array('id'=>$promo->id)) ?>" class="btn btn-default btn-sm">Edit</a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
        <?php $this->widget('CLinkPager', array('pages' => $pages,)) ?>
    </div>
</div>