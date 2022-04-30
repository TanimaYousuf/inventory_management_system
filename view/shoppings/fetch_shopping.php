
<table class="table table-responsive" id="userList">
    <thead>
        <tr>
            <th>Buyer ID</th>
            <th>Amount</th>
            <th>Buyer</th>
            <th>Receipt Id</th>
            <th>Items</th>
            <th>Buyer Email</th>
            <th>Buyer IP</th>
            <th>Note</th>
            <th>City</th>
            <th>Phone No</th>
            <th>Entry At</th>
            <th>Entry By</th>
            <th>Hash Key</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($shoppings as $key=>$shopping){ ?>
        <tr>
            <td><?php echo $shopping->id; ?></td>
            <td><?php echo $shopping->amount; ?></td>
            <td><?php echo $shopping->buyer; ?></td>
            <td><?php echo $shopping->receipt_id; ?></td>
            <td>
                <?php $items = shopping_model::getItems($shopping->id);
                foreach($items as $item){?>
                    <p> <?php echo $item; ?> </p>
                <?php } ?>
            </td>
            <td><?php  echo $shopping->buyer_email; ?></td>
            <td><?php  echo $shopping->buyer_ip; ?></td>
            <td><?php echo $shopping->note; ?></td>
            <td><?php echo $shopping->city; ?></td>
            <td><?php echo $shopping->phone; ?></td>
            <td><?php echo date('d M, Y', strtotime($shopping->entry_at)); ?></td>
            <td><?php echo $shopping->entry_by ?></td>
            <td><?php echo $shopping->hash_key ?></td>
        </tr>
    <?php } ?>
    </tbody>
</table>
