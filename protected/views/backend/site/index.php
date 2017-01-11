<div class="col-md-12">
    <div class="panel">
        <div class="panel-body">
            <h4>DASHBOARD</h4>
            <hr style="margin: 0"/>
            <h5><strong>New Orders</strong> <a href="#">See All >></a></h5>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Order Date</th>
                        <th>Order Number</th>
                        <th>Product Title</th>
                        <th>Shipping Address</th>
                        <th>Quantity</th>
                        <th>Unit Price</th>
                        <th>Total Amount</th>
                        <th>Payment</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(count($newOrders) == 0){ ?>
                        <tr><td>No new order.</td></tr>
                    <?php }else{ ?>
                        <?php foreach($newOrders as $order) {?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        <?php } ?>
                    <?php } ?>
                </tbody>
            </table>
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">Products Listings</h4>
                    </div>
                    <div class="panel-body">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <span class="badge">0</span>
                                Pending Items
                            </li>
                            <li class="list-group-item">
                                <span class="badge">10</span>
                                Live on Site
                            </li>
                            <li class="list-group-item">
                                <span class="badge">0</span>
                                Sold Out
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">Orders Summary</h4>
                    </div>
                    <div class="panel-body">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <span class="badge">0</span>
                                Delivered
                            </li>
                            <li class="list-group-item">
                                <span class="badge">0</span>
                                Returned
                            </li>
                            <li class="list-group-item">
                                <span class="badge">0</span>
                                Cancelled
                            </li>
                            <li class="list-group-item">
                                <span class="badge">0</span>
                                New
                            </li>
                            <li class="list-group-item">
                                <span class="badge">0</span>
                                Shipped
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
