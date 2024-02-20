<h1>Bu category list</h1>

<div class="container">
    <a href="add_category.php" class="btn btn-primary">Add tag</a>
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Category</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($listArr as $item){
            echo "<tr >";
            echo '<td>'.$item['id'].'</td>';
            echo '<td>'.$item['name'].'</td>';
            echo "<td><a href='/dars.loc/index.php/category/update/".$item['id']."' class='btn btn-primary'>Tahrirlash</a>";
            echo '<a href="/dars.loc/index.php/category/delete/'.$item['id'].'" class="btn btn-danger ms-2">O\'chirish</a></td>';
            echo "</tr>";}?>
        </tbody>
    </table>
    <!--    Pagenotion-->
    <nav aria-label="Page navigation example  ">
        <ul class="pagination">
            <li class="page-item border border-primary  ">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <?php
            for ($i=1; $i<=$pageCount;$i++ ){ ?>
                <li class="page-item border border-primary"><a class="page-link" href="/dars.loc/index.php/category/list?page=<?= $i ?>"><?= $i ?></a></li>
            <?php } ?>
            <li class="page-item border border-primary">
                <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
</div>

