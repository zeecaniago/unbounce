<?php if ($error) { ?>
    <p style="color:red;"><?php echo $error; ?></p>
<?php } ?>
<form method="post">
    <select name="page">
        <?php foreach ($pages as $page) { ?>
            <option value="<?php echo $page['id']; ?>"><?php echo $page['name']; ?></option>
        <?php } ?>
    </select>
    <p>
        <label for="email">Email *: </label>
        <input type="email" name="email">
    </p>
    <p>
        <label for="first_name">First Name *: </label>
        <input type="text" name="first_name">
    </p>
    <p>
        <label for="last_name">Last Name *: </label>
        <input type="text" name="last_name">
    </p>
    <input type="submit" name="submit">
</form>
<?php foreach ($pages as $page) { ?>
    <h2><?php echo $page['name']; ?></h2>
    <?php if (sizeof($page['leads'])) { ?>
        <ul>
            <?php foreach ($page['leads']['leads'] as $lead ) { ?>
                <li>
                    <?php
                        echo sprintf(
                            '<pre>%s</pre>',
                            print_r($lead['formData'], true)
                        );
                    ?>
                </li>
            <?php } ?>
        </ul>
    <?php } ?>
<?php } ?>
