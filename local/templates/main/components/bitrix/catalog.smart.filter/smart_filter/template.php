<?php

//echo $arResult["FACET_FILTER"]["ACTIVE_DATE"];
//pre($arResult);
 //json_encode($arResult);

?>
<script>
    window.arResult = <?=json_encode($arResult);?>;
    for (itemID in window.arResult.ITEMS) {
        for (valueID in window.arResult.ITEMS[itemID].VALUES) {
            if (window.arResult.ITEMS[itemID].VALUES[valueID].DISABLED) {
                delete window.arResult.ITEMS[itemID].VALUES[valueID];
            }
        }
    }

</script>

<div class="catalog__mobile-filter" data-mobile-filter>
    <mobile-filter v-cloak inline-template>
        <div class="catalog__mobile-filter-wrapper">
            <div class="catalog__mobile-filter-controls">
                <button class="button button--color--monochrome-thin catalog__mobile-filter-button" @click.prevent="toggleFilterActive" :class="{'is-active': filterSelectedItems.length}"><span class="button__wrapper">
                                        <svg class="icon icon--filter button__icon button__icon--left">
                                          <use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/sprite.svg#filter-usage"></use>
                                        </svg><span class="button__text">Фильтр</span><span class="catalog__mobile-filter-button-counter" v-if="filterSelectedItems.length">{{ filterSelectedItems.length }}</span></span></button><a class="link link--color--monochrome-medium catalog__mobile-filter-reset" href="#" v-if="filterSelectedItems.length" @click.prevent="resetFilterOption($event, filterSelectedItems)"><span class="link__text">Очистить</span></a>
            </div>
            <div class="catalog__mobile-filter-container">
                <div class="mobile-filter" :class="{'is-active': filterActive}">
                    <div class="mobile-filter__wrapper">
                        <div class="mobile-filter__head" v-if="!activeItem">
                            <div class="mobile-filter__clear-btn"><a class="link t-base t-base--size--xsmall mobile-filter__clear-btn-link" href="#" :class="{'is-disabled': !filterSelectedItems.length}" @click.prevent="resetFilterOption($event, filterSelectedItems)"><span class="link__text">Очистить</span></a>
                            </div>
                            <div class="mobile-filter__title">Фильтр</div>
                            <div class="mobile-filter__close-btn"><a class="link t-base t-base--size--xsmall" href="#" @click.prevent="toggleFilterActive"><span class="link__text">Закрыть</span></a>
                            </div>
                        </div>
                        <div class="mobile-filter__head" v-else>
                            <div class="mobile-filter__back-btn" @click.prevent="setActiveItem(null)">
                                <svg class="icon icon--chevron-right mobile-filter__back-btn-icon">
                                    <use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/sprite.svg#chevron-right-usage"></use>
                                </svg>
                            </div>
                            <div class="mobile-filter__title">{{ activeItem.NAME }}</div>
                        </div>
                        <div class="mobile-filter__body">
                            <transition :name="transition">
                                <div class="mobile-filter__list-container" v-if="!activeItem" key="rootCategory">
                                    <ul class="mobile-filter__list">
                                        <li class="mobile-filter__list-item" v-for="item in filterItems" :key="item.ID" :class="{'is-selected': item.SELECTED_ITEMS.length}">
                                            <div class="mobile-filter__reset-btn" v-if="item.SELECTED_ITEMS.length" @click.prevent="resetFilterOption($event, item.SELECTED_ITEMS)"><img class="img-responsive" src="<?=SITE_TEMPLATE_PATH?>/img/svg/cross-thin.svg" alt=""></div>
                                            <div class="mobile-filter__param-wrapper"><a class="mobile-filter__link mobile-filter__link--parent mobile-filter__param" href="#" @click.prevent="setActiveItem(item, true)"><span class="mobile-filter__link-text">{{ item.NAME }}</span>
                                                    <div class="mobile-filter__selected" v-if="item.SELECTED_ITEMS.length"><span v-for="(el, index) in item.SELECTED_ITEMS">
                                              <template v-if="el.RANGE_TYPE === 'MIN'">от</template>
                                              <template v-if="el.RANGE_TYPE === 'MAX'">до</template><span>{{ el.RANGE_TYPE ? el.HTML_VALUE : el.VALUE }}<span class="rouble-sign" v-if="el.IS_PRICE"> ₽</span><span v-if="(index + 1) != item.SELECTED_ITEMS.length">, </span></span></span></div></a></div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="mobile-filter__child-category" v-else key="childCategory">
                                    <template v-if="activeItem">
                                        <div class="mobile-filter__search" v-if="Object.keys(activeItem.VALUES).length &gt;= 15">
                                            <input type="text" placeholder="Поиск" @input="search($event, activeItem)" :value="activeItem.SEARCH_STRING">
                                        </div>
                                    </template>
                                    <ul class="mobile-filter__list">
                                        <template v-if="activeItem.DISPLAY_TYPE === 'F' || activeItem.DISPLAY_TYPE === 'H' || activeItem.DISPLAY_TYPE === 'G'">
                                            <li class="mobile-filter__list-item" v-for="(value, valueID) in activeItem.VALUES" :key="value.CONTROL_NAME" v-if="!value.HIDDEN">
                                                <div class="mobile-filter__param-wrapper">
                                                    <div class="mobile-filter__checkbox mobile-filter__param" :class="{'mobile-filter__checkbox--type--color': activeItem.DISPLAY_TYPE === 'H'}">
                                                        <label class="checkbox" :class="{'is-disabled': value.DISABLED}">
                                                            <input type="checkbox" :checked="value.CHECKED" :value="value.HTML_VALUE" :name="value.CONTROL_NAME" @change="setValueChecked($event, activeItem.ID, valueID)" :disabled="value.DISABLED">
                                                            <div class="checkbox__icon">
                                                                <svg class="icon icon--check">
                                                                    <use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/sprite.svg#check-usage"></use>
                                                                </svg>
                                                            </div>
                                                            <div class="checkbox__text"><img class="img-responsive" :src="value.FILE.SRC" v-if="activeItem.DISPLAY_TYPE === 'H'">{{ value.VALUE }}</div>
                                                        </label>
                                                    </div>
                                                </div>
                                            </li>
                                        </template>
                                        <template v-if="activeItem.PRICE || activeItem.DISPLAY_TYPE === 'A'">
                                            <li class="mobile-filter__list-item">
                                                <div class="mobile-filter__param-wrapper">
                                                    <div class="range-slider mobile-filter__param" :data-filter-range-slider="`{&quot;min&quot;: ${activeItem.VALUES.MIN.VALUE}, &quot;max&quot;: ${activeItem.VALUES.MAX.VALUE}, &quot;start&quot;: ${activeItem.VALUES.MIN.HTML_VALUE || activeItem.VALUES.MIN.VALUE}, &quot;finish&quot;: ${activeItem.VALUES.MAX.HTML_VALUE || activeItem.VALUES.MAX.VALUE}, &quot;step&quot;: &quot;1&quot;}`">
                                                        <div class="range-slider__wrapper">
                                                            <div class="range-slider__slider">
                                                                <div data-filter-range-slider-bar></div>
                                                            </div>
                                                            <div class="range-slider__inputs">
                                                                <div class="range-slider__input">
                                                                    <label class="range-slider__input-label">от</label>
                                                                    <input type="text" step="1" :min="activeItem.VALUES.MIN.VALUE" :max="activeItem.VALUES.MAX.VALUE" :value="activeItem.VALUES.MIN.HTML_VALUE || activeItem.VALUES.MIN.VALUE" :name="activeItem.VALUES.MAX.CONTROL_NAME" @change="setRangeValue($event, activeItem.CODE, 'MIN')" data-filter-range-slider-input>
                                                                </div>
                                                                <div class="range-slider__input">
                                                                    <label class="range-slider__input-label">до</label>
                                                                    <input type="text" step="1" :min="activeItem.VALUES.MIN.VALUE" :max="activeItem.VALUES.MAX.VALUE" :value="activeItem.VALUES.MAX.HTML_VALUE || activeItem.VALUES.MAX.VALUE" :name="activeItem.VALUES.MIN.CONTROL_NAME" @change="setRangeValue($event, activeItem.CODE, 'MAX')" data-filter-range-slider-input>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </template>
                                    </ul>
                                </div>
                            </transition>
                        </div>
                        <div class="mobile-filter__footer" v-if="activeItem &amp;&amp; activeItem.SELECTED_ITEMS.length"><a class="button mobile-filter__apply-btn" href="#" @click.prevent="setActiveItem(null)"><span class="button__wrapper"><span class="button__text">Применить</span></span></a>
                        </div>
                        <div class="mobile-filter__footer" v-if="!activeItem &amp;&amp; filterData.ELEMENT_COUNT"><a class="button mobile-filter__apply-btn" href="#" @click.prevent="toggleFilterActive"><span class="button__wrapper"><span class="button__text">Показать {{ filterData.ELEMENT_COUNT }}</span></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </mobile-filter>
</div>
<div class="catalog__filter" data-filter>
    <div class="catalog__categories">
        <div class="catalog-categories">
            <ul class="catalog-categories__list">
                <li class="catalog-categories__item"><a class="link catalog-categories__link link--color--black" href="#">
                        <svg class="icon icon--chevron-right link__icon link__icon--left">
                            <use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/sprite.svg#chevron-right-usage"></use>
                        </svg><span class="link__text">Каталог</span></a>
                </li>
                <li class="catalog-categories__item"><a class="link catalog-categories__link link--color--black" href="#">
                        <svg class="icon icon--chevron-right link__icon link__icon--left">
                            <use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/sprite.svg#chevron-right-usage"></use>
                        </svg><span class="link__text">Воздушные шары из фольги</span></a>
                    <ul class="catalog-categories__list catalog-categories__list--child">
                        <li class="catalog-categories__item"><a class="link catalog-categories__link link--color--black" href="#"><span class="link__text">Оформительские без рисунка</span></a>
                        </li>
                        <li class="catalog-categories__item"><a class="link catalog-categories__link link--color--black" href="#"><span class="link__text">18-21'' Звёзды</span></a>
                        </li>
                        <li class="catalog-categories__item"><a class="link catalog-categories__link link--color--black" href="#"><span class="link__text">18'' Круги</span></a>
                        </li>
                        <li class="catalog-categories__item"><a class="link catalog-categories__link link--color--black" href="#"><span class="link__text">18-21'' Сердца</span></a>
                        </li>
                        <li class="catalog-categories__item"><span class="link catalog-categories__link link--color--black is-active"><span class="link__text">32-36'' ультра Звёзды</span></span>
                        </li>
                        <li class="catalog-categories__item"><a class="link catalog-categories__link link--color--black" href="#"><span class="link__text">32'' ультра Круги</span></a>
                        </li>
                        <li class="catalog-categories__item"><a class="link catalog-categories__link link--color--black" href="#"><span class="link__text">30-36'' ультра Сердца</span></a>
                        </li>
                        <li class="catalog-categories__item"><a class="link catalog-categories__link link--color--black" href="#"><span class="link__text">4'' микро Звёзды</span></a>
                        </li>
                        <li class="catalog-categories__item"><a class="link catalog-categories__link link--color--black" href="#"><span class="link__text">4'' микро Сердца</span></a>
                        </li>
                        <li class="catalog-categories__item"><a class="link catalog-categories__link link--color--black" href="#"><span class="link__text">9-10'' мини Звёзды</span></a>
                        </li>
                        <li class="catalog-categories__item"><a class="link catalog-categories__link link--color--black" href="#"><span class="link__text">9-10'' мини Звёзды</span></a>
                        </li>
                        <li class="catalog-categories__item"><a class="link catalog-categories__link link--color--black" href="#"><span class="link__text">9'' мини Круги</span></a>
                        </li>
                        <li class="catalog-categories__item"><a class="link catalog-categories__link link--color--black" href="#"><span class="link__text">9-10'' мини Сердца</span></a>
                        </li>
                        <li class="catalog-categories__item"><a class="link catalog-categories__link link--color--black" href="#"><span class="link__text">Специальные фигуры</span></a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <filter-desktop v-cloak inline-template>
        <div class="filter">
            <div class="filter__wrapper">
                <div class="filter__category" v-for="item in filterItems" :key="item.ID">
                    <div class="filter__accordion is-active" data-filter-accordion>
                        <div class="filter__accordion-heading" data-accordion-heading>
                            <div class="filter__accordion-title">{{ item.NAME }}</div>
                        </div>
                        <div class="filter__accordion-body" data-accordion-body style="display: block">
                            <div class="filter__search" v-if="Object.keys(item.VALUES).length &gt;= 15">
                                <input type="text" placeholder="Поиск" @input="search($event, item)" :value="item.SEARCH_STRING">
                            </div>
                            <div class="filter__params" data-filter-custom-scroll>
                                <template v-if="item.DISPLAY_TYPE === 'F' || item.DISPLAY_TYPE === 'H'">
                                    <div class="filter__checkbox" :class="{'filter__checkbox--type--color': item.DISPLAY_TYPE === 'H'}" v-for="(value, valueID) in item.VALUES" :key="value.CONTROL_NAME">
                                        <label class="checkbox" :class="{'is-disabled': value.DISABLED}" v-if="!value.HIDDEN">
                                            <input type="checkbox" :checked="value.CHECKED" :value="value.HTML_VALUE" :name="value.CONTROL_NAME" @change="setValueChecked($event, item.ID, valueID)" :disabled="value.DISABLED">
                                            <div class="checkbox__icon">
                                                <svg class="icon icon--check">
                                                    <use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/sprite.svg#check-usage"></use>
                                                </svg>
                                            </div>
                                            <div class="checkbox__text"> <img class="img-responsive" :src="value.FILE.SRC" v-if="item.DISPLAY_TYPE === 'H'">{{ value.VALUE }}</div>
                                        </label>
                                    </div>
                                </template>
                                <template v-if="item.DISPLAY_TYPE === 'G'">
                                    <div class="filter-icon-checkboxes">
                                        <div class="filter-icon-checkboxes__row">
                                            <div class="filter-icon-checkboxes__col" v-for="(value, valueID) in item.VALUES" :key="value.CONTROL_NAME">
                                                <label class="filter-icon-checkboxes__label">
                                                    <input type="checkbox" :checked="value.CHECKED" :value="value.HTML_VALUE" :name="value.CONTROL_NAME" @change="setValueChecked($event, item.ID, valueID)" :disabled="value.DISABLED">
                                                    <div class="filter-icon-checkboxes__container" data-tooltip>
                                                        <div class="is-hidden" data-tooltip-content>
                                                            <div class="tooltip-content">
                                                                <div class="tooltip-content__body">{{ value.VALUE }}</div>
                                                            </div>
                                                        </div>
                                                        <div class="filter-icon-checkboxes__icon-wrapper">
                                                            <div class="filter-icon-checkboxes__icon" :class="`filter-icon-checkboxes__icon--${valueID}`"></div>
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </template>
                                <template v-if="item.PRICE || item.DISPLAY_TYPE === 'A'">
                                    <div class="range-slider" :data-filter-range-slider="`{&quot;min&quot;: ${item.VALUES.MIN.VALUE}, &quot;max&quot;: ${item.VALUES.MAX.VALUE}, &quot;start&quot;: ${item.VALUES.MIN.HTML_VALUE || item.VALUES.MIN.VALUE}, &quot;finish&quot;: ${item.VALUES.MAX.HTML_VALUE || item.VALUES.MAX.VALUE}, &quot;step&quot;: &quot;1&quot;}`">
                                        <div class="range-slider__wrapper">
                                            <div class="range-slider__slider">
                                                <div data-filter-range-slider-bar></div>
                                            </div>
                                            <div class="range-slider__inputs">
                                                <div class="range-slider__input">
                                                    <label class="range-slider__input-label">от</label>
                                                    <input type="text" step="1" :min="item.VALUES.MIN.VALUE" :max="item.VALUES.MAX.VALUE" :value="item.VALUES.MIN.HTML_VALUE || item.VALUES.MIN.VALUE" :name="item.VALUES.MAX.CONTROL_NAME" @change="setRangeValue($event, item.CODE, 'MIN')" data-filter-range-slider-input>
                                                </div>
                                                <div class="range-slider__input">
                                                    <label class="range-slider__input-label">до</label>
                                                    <input type="text" step="1" :min="item.VALUES.MIN.VALUE" :max="item.VALUES.MAX.VALUE" :value="item.VALUES.MAX.HTML_VALUE || item.VALUES.MAX.VALUE" :name="item.VALUES.MIN.CONTROL_NAME" @change="setRangeValue($event, item.CODE, 'MAX')" data-filter-range-slider-input>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </filter-desktop>
</div>
