
























<form action="<?= site_url('SearchController/index') ?>" method="get">
    <input type="text" name="keyword" placeholder="Keyword">
    <select name="category">
        <option value="">All categories</option>
        <option value="women dress2">Category 1</option>
        <option value="Electronice">Category 2</option>
    </select>
    
    <button type="submit">Search</button>
</form>

<?php if (!empty($results)) : ?>
    <table border="1">
        <thead>
            <tr>
                <th>Name</th>
                <th>Catagory</th>
                <th>SubCatagory</th>
                <th>Order</th>
       
            </tr>
        </thead>
        <tbody>
            <?php foreach ($results as $result) : ?>
                <tr>
                    <td><?= $result->itemname ?></td
                    <td><?= $result->catname ?></td>
                    <td><?= $result->catname ?></td>
                    <td><?= $result->subcname ?></td>
                    
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else : ?>
    <p>No results found.</p>
<?php endif; ?>

