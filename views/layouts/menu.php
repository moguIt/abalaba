<div class="col-sm-3">
    <div class="left-sidebar">
        <h2>Каталог</h2>
        <div class="panel-group category-products">
            <nav id="menuVertical">
                <ul>
                    <?php foreach ($sections as $sectionItem): ?>
                        <li>
                            <a href="/section/<?php echo $sectionItem['id']; ?>">
                                <?php echo $sectionItem['name']; ?>
                            </a>
                            <ul>
                                <?php foreach ($categories as $categoryItem):
                                    if ($categoryItem['section_id'] == $sectionItem['id']):?>
                                        <li>
                                            <a href="/category/<?php echo $categoryItem['id']; ?>">
                                                <?php echo $categoryItem['name']; ?>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </nav>
        </div>
    </div>



    <!--     <div id="fon"></div>
        <div id="load"></div>

        <div class="sort">
            <a href="/site/sort/name_a" class="btn btn-default">А - я &#9660;</a>
            <a href="/site/sort/name_d" class="btn btn-default">А - я &#9650;</a>
            <br>
            <br>
            <a href="/site/sort/price_a" class="btn btn-default">0 грн - ... &#9660;</a>
            <a href="/site/sort/price_d" class="btn btn-default">... - 0 грн &#9650;</a>
        </div> -->
<!--</div>-->