<!-- Sorting -->
<div class="filters">

    <div class="btn-group">
        <button type="button" data-section="0" class="btn btn-default active js-section">Все разделы</button>
        <?php foreach ($sections as $sectionItem): ?>
            <button type="button" data-section="<?php echo $sectionItem['id']; ?>"
                    class="btn btn-default js-section"><?php echo $sectionItem['name']; ?></button>
        <?php endforeach; ?>
    </div>
    <br>
    <form id="filters-form" role="form">
        <div>
            <br>
            <h4>Бренды</h4>
            <div id="brands">
                <div class="checkbox"><label><input type="checkbox" name="brands[]" value="1"> Castorland</label></div>
                <div class="checkbox"><label><input type="checkbox" name="brands[]" value="2"> JVToy</label></div>
                <div class="checkbox"><label><input type="checkbox" name="brands[]" value="3"> Boef</label></div>
                <div class="checkbox"><label><input type="checkbox" name="brands[]" value="4"> Украина</label></div>
                <div class="checkbox"><label><input type="checkbox" name="brands[]" value="5"> Китай</label></div>
            </div>
        </div>
        <br>
        <div>
            <h4>Фильтр по ценам</h4>
            <div id="prices-label">100 - 3000 грн.</div>
            <br>
            <input type="hidden" id="min-price" name="min_price" value="100">
            <input type="hidden" id="max-price" name="max_price" value="3000">
            <div id="prices"></div>
        </div>
        <div>
            <h4>Сортировка</h4>
            <select id="sort" name="sort" class="form-control">
                <option value="price_asc">По цене, сначала дешевые</option>
                <option value="price_desc">По цене, сначала дорогие</option>
                <option value="name_asc">По названию, A-Z</option>
                <option value="name_desc">По названию, Z-A</option>
            </select>
        </div>
    </form>

</div>