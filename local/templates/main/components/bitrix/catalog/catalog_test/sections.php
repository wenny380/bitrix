<div class="catalog" data-catalog>
    <section class="section">
        <div class="section__wrapper">
            <div class="catalog__wrapper">
                <div class="catalog__mobile-filter" data-mobile-filter>
                    <mobile-filter v-cloak inline-template>
                        <div class="catalog__mobile-filter-wrapper">
                            <div class="catalog__mobile-filter-controls">
                                <button class="button button--color--monochrome-thin catalog__mobile-filter-button" @click.prevent="toggleFilterActive" :class="{'is-active': filterSelectedItems.length}"><span class="button__wrapper">
                                        <svg class="icon icon--filter button__icon button__icon--left">
                                          <use xlink:href="./img/sprite.svg#filter-usage"></use>
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
                                                    <use xlink:href="./img/sprite.svg#chevron-right-usage"></use>
                                                </svg>
                                            </div>
                                            <div class="mobile-filter__title">{{ activeItem.NAME }}</div>
                                        </div>
                                        <div class="mobile-filter__body">
                                            <transition :name="transition">
                                                <div class="mobile-filter__list-container" v-if="!activeItem" key="rootCategory">
                                                    <ul class="mobile-filter__list">
                                                        <li class="mobile-filter__list-item" v-for="item in filterItems" :key="item.ID" :class="{'is-selected': item.SELECTED_ITEMS.length}">
                                                            <div class="mobile-filter__reset-btn" v-if="item.SELECTED_ITEMS.length" @click.prevent="resetFilterOption($event, item.SELECTED_ITEMS)"><img class="img-responsive" src="./img/svg/cross-thin.svg" alt=""></div>
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
                                                                                    <use xlink:href="./img/sprite.svg#check-usage"></use>
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
                                            <use xlink:href="./img/sprite.svg#chevron-right-usage"></use>
                                        </svg><span class="link__text">Каталог</span></a>
                                </li>
                                <li class="catalog-categories__item"><a class="link catalog-categories__link link--color--black" href="#">
                                        <svg class="icon icon--chevron-right link__icon link__icon--left">
                                            <use xlink:href="./img/sprite.svg#chevron-right-usage"></use>
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
                                                                    <use xlink:href="./img/sprite.svg#check-usage"></use>
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
                <div class="catalog__main">
                    <div class="catalog__head">
                        <div class="catalog__chips" data-chips v-if="filterSelectedItems.length" v-cloak>
                            <div class="chips">
                                <div class="chips__chip" v-for="(item, index) in filterSelectedItems">
                                    <div class="chips__chip-wrapper">
                                        <div class="chips__text">
                                            <template v-if="item.RANGE_TYPE === 'MIN'">от</template>
                                            <template v-if="item.RANGE_TYPE === 'MAX'">до</template>{{ item.RANGE_TYPE ? item.HTML_VALUE : item.VALUE }}
                                            <template v-if="item.IS_PRICE"><span class="rouble-sign">₽</span></template>
                                        </div>
                                        <div class="chips__btn" @click.prevent="resetFilterOption($event, [item])">
                                            <svg class="icon icon--cross chips__icon">
                                                <use xlink:href="./img/sprite.svg#cross-usage"></use>
                                            </svg>
                                        </div>
                                    </div>
                                </div><a class="link t-base t-base--size--small chips__link" href="#" @click.prevent="resetFilterOption($event, filterSelectedItems)"><span class="link__text">Очистить фильтр</span></a>
                            </div>
                        </div>
                        <div class="catalog__controls" data-catalog-sorting>
                            <div class="catalog__sortings">
                                <div class="catalog__sorting">
                                    <div class="catalog-sorting">
                                        <div class="catalog-sorting__label">Сортировать</div>
                                        <div class="catalog-sorting__select">
                                            <div class="custom-select custom-select--theme--blue" data-custom-select>
                                                <div class="catalog-sorting__select-btn" data-custom-select-button>
                                                    <div class="catalog-sorting__select-btn-text" data-custom-select-button-text>По умолчанию</div>
                                                    <div class="catalog-sorting__select-btn-icon">
                                                        <svg class="icon icon--triangle">
                                                            <use xlink:href="./img/sprite.svg#triangle-usage"></use>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <select class="custom-select__select" name="sorting" data-custom-select-select data-catalog-sort>
                                                    <option value="/catalog.html?sort=default">По умолчанию</option>
                                                    <option value="/catalog.html?sort=article&amp;order=asc">Артикул по возрастанию</option>
                                                    <option value="/catalog.html?sort=article&amp;order=desc">Артикул по убыванию</option>
                                                    <option value="/catalog.html?sort=price&amp;order=asc">Сначала подешевле</option>
                                                    <option value="/catalog.html?sort=price&amp;order=desc">Сначала подороже</option>
                                                    <option value="/catalog.html?sort=newest">Сначала новинки</option>
                                                    <option value="/catalog.html?sort=main">Сначала основной ассортимент</option>
                                                </select>
                                                <div class="custom-select__list catalog-sorting__select-list" data-custom-select-list>
                                                    <ul class="custom-select__options">
                                                        <li class="custom-select__option"><a class="link link--color--black t-base t-base--size--small custom-select__option-link is-selected" href="javascript;;" data-custom-select-value="/catalog.html?sort=default"><span class="link__text">По умолчанию</span></a>
                                                        </li>
                                                        <li class="custom-select__option"><a class="link link--color--black t-base t-base--size--small custom-select__option-link" href="javascript;;" data-custom-select-value="/catalog.html?sort=article&amp;order=asc"><span class="link__text">Артикул по возрастанию</span></a>
                                                        </li>
                                                        <li class="custom-select__option"><a class="link link--color--black t-base t-base--size--small custom-select__option-link" href="javascript;;" data-custom-select-value="/catalog.html?sort=article&amp;order=desc"><span class="link__text">Артикул по убыванию</span></a>
                                                        </li>
                                                        <li class="custom-select__option"><a class="link link--color--black t-base t-base--size--small custom-select__option-link" href="javascript;;" data-custom-select-value="/catalog.html?sort=price&amp;order=asc"><span class="link__text">Сначала подешевле</span></a>
                                                        </li>
                                                        <li class="custom-select__option"><a class="link link--color--black t-base t-base--size--small custom-select__option-link" href="javascript;;" data-custom-select-value="/catalog.html?sort=price&amp;order=desc"><span class="link__text">Сначала подороже</span></a>
                                                        </li>
                                                        <li class="custom-select__option"><a class="link link--color--black t-base t-base--size--small custom-select__option-link" href="javascript;;" data-custom-select-value="/catalog.html?sort=newest"><span class="link__text">Сначала новинки</span></a>
                                                        </li>
                                                        <li class="custom-select__option"><a class="link link--color--black t-base t-base--size--small custom-select__option-link" href="javascript;;" data-custom-select-value="/catalog.html?sort=main"><span class="link__text">Сначала основной ассортимент</span></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="catalog__sorting">
                                    <div class="catalog-sorting">
                                        <div class="catalog-sorting__label">Показать</div>
                                        <div class="catalog-sorting__select">
                                            <div class="custom-select custom-select--theme--blue" data-custom-select>
                                                <div class="catalog-sorting__select-btn" data-custom-select-button>
                                                    <div class="catalog-sorting__select-btn-text" data-custom-select-button-text>По 30</div>
                                                    <div class="catalog-sorting__select-btn-icon">
                                                        <svg class="icon icon--triangle">
                                                            <use xlink:href="./img/sprite.svg#triangle-usage"></use>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <select class="custom-select__select" name="sorting" data-custom-select-select data-catalog-sort>
                                                    <option value="/catalog.html?amount=30">По 30</option>
                                                    <option value="/catalog.html?amount=90">По 90</option>
                                                    <option value="/catalog.html?amount=all">Все</option>
                                                </select>
                                                <div class="custom-select__list catalog-sorting__select-list" data-custom-select-list>
                                                    <ul class="custom-select__options">
                                                        <li class="custom-select__option"><a class="link link--color--black t-base t-base--size--small custom-select__option-link is-selected" href="javascript;;" data-custom-select-value="/catalog.html?amount=30"><span class="link__text">По&nbsp;30</span></a>
                                                        </li>
                                                        <li class="custom-select__option"><a class="link link--color--black t-base t-base--size--small custom-select__option-link" href="javascript;;" data-custom-select-value="/catalog.html?amount=90"><span class="link__text">По&nbsp;90</span></a>
                                                        </li>
                                                        <li class="custom-select__option"><a class="link link--color--black t-base t-base--size--small custom-select__option-link" href="javascript;;" data-custom-select-value="/catalog.html?amount=all"><span class="link__text">Все</span></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="catalog__view-mods">
                                <div class="catalog-sorting">
                                    <div class="catalog-sorting__label">Вид</div>
                                    <div class="catalog-sorting__view-modes"><a class="catalog-sorting__view-mode catalog-sorting__view-mode--list is-active" href="/catalog.html?sort=default&amp;amount=30&amp;display=list" data-catalog-view-mode>
                                            <svg class="icon icon--view-list">
                                                <use xlink:href="./img/sprite.svg#view-list-usage"></use>
                                            </svg></a><a class="catalog-sorting__view-mode catalog-sorting__view-mode--block" href="/catalog.html?sort=default&amp;amount=30&amp;display=block" data-catalog-view-mode>
                                            <svg class="icon icon--view-block">
                                                <use xlink:href="./img/sprite.svg#view-block-usage"></use>
                                            </svg></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="catalog__body" data-catalog-content>
                        <div class="catalog__body-wrapper">
                            <div class="catalog__products" data-catalog-products>
                                <div class="products-grid" data-catalog-products-grid="list">
                                    <div class="products-grid__col">
                                        <div class="products-grid__item">
                                            <div class="product-card products-grid__card" data-product="111111">
                                                <div class="product-card__wrapper">
                                                    <div class="product-card__labels">
                                                        <div class="labels">
                                                            <div class="labels__label labels__label--color--blue">
                                                                <div class="labels__text">эксклюзив</div>
                                                            </div>
                                                            <div class="labels__label labels__label--color--green">
                                                                <div class="labels__text">new</div>
                                                            </div>
                                                            <div class="labels__label labels__label--color--orange">
                                                                <div class="labels__text">хит</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="product-card__favorite"><a class="product-card__favorite-btn" href="./static/fakedata/addToCart.json" data-add-to-wish="111111">
                                                            <svg class="icon icon--heart-filled">
                                                                <use xlink:href="./img/sprite.svg#heart-filled-usage"></use>
                                                            </svg></a></div>
                                                    <div class="product-card__img"><a class="product-card__img-wrapper" href="#">
                                                            <div class="product-card__img-container"><img class="img-responsive lazy" src="./img/pixel.png" alt="" data-src="./img/products-thumbs/1.jpg" data-srcset="./img/products-thumbs/1@2x.jpg"></div>
                                                            <div class="product-card__badge">
                                                                <div class="badge-fluid">
                                                                    <div class="badge-fluid__wrapper">
                                                                        <div class="badge-fluid__icon"><img class="img-responsive" src="./img/don-head.svg" alt=""></div>
                                                                        <div class="badge-fluid__text">собственная <br> разработка</div>
                                                                    </div>
                                                                </div>
                                                            </div></a>
                                                        <div class="product-card__quick-view"><a class="button button--color--transparent" href="./modals/fastview.html" data-fast-view><span class="button__wrapper"><span class="button__text">Быстрый просмотр</span></span></a>
                                                        </div>
                                                    </div>
                                                    <div class="product-card__body">
                                                        <div class="product-card__prices">
                                                            <div class="product-card__discount">
                                                                <div class="product-card__old-price">590 <span class="rouble-sign">₽</span></div>
                                                                <div class="labels">
                                                                    <div class="labels__label labels__label--color--red">
                                                                        <div class="labels__text">-18%</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="product-card__price">
                                                                <div class="product-card__price-value">480 <span class="rouble-sign">₽</span></div>
                                                                <div class="product-card__price-quantity">48 <span class="rouble-sign">₽</span> за шт</div>
                                                            </div>
                                                        </div>
                                                        <div class="product-card__info">
                                                            <div class="product-card__article">
                                                                <div class="product-card__article-tooltip">
                                                                    <div class="tooltip-icon" data-tooltip data-tooltip-params="{&quot;placement&quot;: &quot;top-start&quot;, &quot;offset&quot;: [-15, 10]}">!
                                                                        <div class="is-hidden" data-tooltip-content>
                                                                            <div class="tooltip-content">
                                                                                <div class="tooltip-content__body">Рекомендуем заказывать <br/> в заводской упаковке</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="product-card__article-value">813001V</div>
                                                            </div>
                                                            <div class="product-card__name"><a class="link link--color--black t-base t-base--size--small" href="#"><span class="link__text">Шар (18''/46 см) Звезда, Красный, 10 шт.</span></a>
                                                            </div>
                                                            <div class="product-card__vendor"><a class="link link--color--monochrome-medium t-base t-base--size--small" href="#"><span class="link__text">CTI, США</span></a>
                                                            </div>
                                                        </div>
                                                        <div class="product-card__cart">
                                                            <div class="add-to-cart" data-add-to-cart="111111">
                                                                <div class="add-to-cart__count-control">
                                                                    <div class="count-control" data-count-control="">
                                                                        <div class="count-control__info" data-count-control-info=""></div>
                                                                        <div class="count-control__btn count-control__btn--dec" data-count-control-control="dec"></div>
                                                                        <input class="count-control__input" type="text" value="2" data-max="10" data-count-control-input="" data-count-control-step="2">
                                                                        <div class="count-control__btn count-control__btn--inc" data-count-control-control="inc"></div><a class="link link--display--inline count-control__cart-info" href="#" target="_blank" data-count-control-cart-info=""><span class="link__text"></span></a>
                                                                    </div>
                                                                </div>
                                                                <div class="add-to-cart__button"><a class="button" href="./static/fakedata/addToCart.json" data-add-to-cart-btn><span class="button__wrapper">
                                                                                                  <svg class="icon icon--to-cart button__icon ">
                                                                                                    <use xlink:href="./img/sprite.svg#to-cart-usage"></use>
                                                                                                  </svg></span></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-card__deleted">
                                                    <div class="info-label">Товар удалён</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="products-grid__col">
                                        <div class="products-grid__item">
                                            <div class="product-card products-grid__card" data-product="222222">
                                                <div class="product-card__wrapper">
                                                    <div class="product-card__labels">
                                                        <div class="labels">
                                                            <div class="labels__label labels__label--color--green">
                                                                <div class="labels__text">new</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="product-card__favorite"><a class="product-card__favorite-btn" href="./static/fakedata/addToCart.json" data-add-to-wish="222222">
                                                            <svg class="icon icon--heart-filled">
                                                                <use xlink:href="./img/sprite.svg#heart-filled-usage"></use>
                                                            </svg></a></div>
                                                    <div class="product-card__img"><a class="product-card__img-wrapper" href="#">
                                                            <div class="product-card__img-container"><img class="img-responsive lazy" src="./img/pixel.png" alt="" data-src="./img/products-thumbs/2.jpg" data-srcset="./img/products-thumbs/2@2x.jpg"></div></a>
                                                        <div class="product-card__quick-view"><a class="button button--color--transparent" href="./modals/fastview.html" data-fast-view><span class="button__wrapper"><span class="button__text">Быстрый просмотр</span></span></a>
                                                        </div>
                                                    </div>
                                                    <div class="product-card__body">
                                                        <div class="product-card__prices">
                                                            <div class="product-card__discount">
                                                                <div class="t-base t-base--size--xsmall t-base--color--red-main">Скидки нет</div>
                                                            </div>
                                                            <div class="product-card__price">
                                                                <div class="product-card__price-value">480 <span class="rouble-sign">₽</span></div>
                                                            </div>
                                                        </div>
                                                        <div class="product-card__info">
                                                            <div class="product-card__article">
                                                                <div class="product-card__article-value">81650</div>
                                                            </div>
                                                            <div class="product-card__name"><a class="link link--color--black t-base t-base--size--small" href="#"><span class="link__text">Сердце (12''/30 см) Красный (315), кристалл, 100 шт.</span></a>
                                                            </div>
                                                            <div class="product-card__vendor"><a class="link link--color--monochrome-medium t-base t-base--size--small" href="#"><span class="link__text">Sempertex S.A., Колумбия</span></a>
                                                            </div>
                                                        </div>
                                                        <div class="product-card__cart">
                                                            <div class="add-to-cart" data-add-to-cart="222222">
                                                                <div class="add-to-cart__count-control">
                                                                    <div class="count-control" data-count-control="">
                                                                        <div class="count-control__info" data-count-control-info=""></div>
                                                                        <div class="count-control__btn count-control__btn--dec" data-count-control-control="dec"></div>
                                                                        <input class="count-control__input" type="text" value="2" data-max="10" data-count-control-input="" data-count-control-step="2">
                                                                        <div class="count-control__btn count-control__btn--inc" data-count-control-control="inc"></div><a class="link link--display--inline count-control__cart-info" href="#" target="_blank" data-count-control-cart-info=""><span class="link__text"></span></a>
                                                                    </div>
                                                                </div>
                                                                <div class="add-to-cart__button"><a class="button" href="./static/fakedata/addToCart.json" data-add-to-cart-btn><span class="button__wrapper">
                                                                                                  <svg class="icon icon--to-cart button__icon ">
                                                                                                    <use xlink:href="./img/sprite.svg#to-cart-usage"></use>
                                                                                                  </svg></span></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-card__deleted">
                                                    <div class="info-label">Товар удалён</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="products-grid__col">
                                        <div class="products-grid__item">
                                            <div class="product-card products-grid__card" data-product="333333">
                                                <div class="product-card__wrapper">
                                                    <div class="product-card__favorite"><a class="product-card__favorite-btn" href="./static/fakedata/addToCart.json" data-add-to-wish="333333">
                                                            <svg class="icon icon--heart-filled">
                                                                <use xlink:href="./img/sprite.svg#heart-filled-usage"></use>
                                                            </svg></a></div>
                                                    <div class="product-card__img"><a class="product-card__img-wrapper" href="#">
                                                            <div class="product-card__img-container"><img class="img-responsive lazy" src="./img/pixel.png" alt="" data-src="./img/products-thumbs/3.jpg" data-srcset="./img/products-thumbs/3@2x.jpg"></div></a>
                                                        <div class="product-card__quick-view"><a class="button button--color--transparent" href="./modals/fastview.html" data-fast-view><span class="button__wrapper"><span class="button__text">Быстрый просмотр</span></span></a>
                                                        </div>
                                                    </div>
                                                    <div class="product-card__body">
                                                        <div class="product-card__prices">
                                                            <div class="product-card__discount">
                                                            </div>
                                                            <div class="product-card__price">
                                                                <div class="product-card__price-value">480 <span class="rouble-sign">₽</span></div>
                                                            </div>
                                                        </div>
                                                        <div class="product-card__info">
                                                            <div class="product-card__article">
                                                                <div class="product-card__article-value">629070</div>
                                                            </div>
                                                            <div class="product-card__name"><a class="link link--color--black t-base t-base--size--small" href="#"><span class="link__text">Сердце (12''/30 см) Красный (315), кристалл, 100 шт.</span></a>
                                                            </div>
                                                            <div class="product-card__vendor"><a class="link link--color--monochrome-medium t-base t-base--size--small" href="#"><span class="link__text">Falali, Китай</span></a>
                                                            </div>
                                                        </div>
                                                        <div class="product-card__cart">
                                                            <div class="info-label product-card__availability">Доступен в магазинах</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-card__deleted">
                                                    <div class="info-label">Товар удалён</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="products-grid__col">
                                        <div class="products-grid__item">
                                            <div class="product-card products-grid__card" data-product="333333">
                                                <div class="product-card__wrapper">
                                                    <div class="product-card__favorite"><a class="product-card__favorite-btn" href="./static/fakedata/addToCart.json" data-add-to-wish="333333">
                                                            <svg class="icon icon--heart-filled">
                                                                <use xlink:href="./img/sprite.svg#heart-filled-usage"></use>
                                                            </svg></a></div>
                                                    <div class="product-card__img"><a class="product-card__img-wrapper" href="#">
                                                            <div class="product-card__img-container"><img class="img-responsive lazy" src="./img/pixel.png" alt="" data-src="./img/products-thumbs/1.jpg" data-srcset="./img/products-thumbs/1@2x.jpg"></div></a>
                                                        <div class="product-card__quick-view"><a class="button button--color--transparent" href="./modals/fastview.html" data-fast-view><span class="button__wrapper"><span class="button__text">Быстрый просмотр</span></span></a>
                                                        </div>
                                                    </div>
                                                    <div class="product-card__body">
                                                        <div class="product-card__prices">
                                                            <div class="product-card__discount">
                                                            </div>
                                                            <div class="product-card__price">
                                                                <div class="product-card__price-value">480 <span class="rouble-sign">₽</span></div>
                                                            </div>
                                                        </div>
                                                        <div class="product-card__info">
                                                            <div class="product-card__article">
                                                                <div class="product-card__article-value">629070</div>
                                                            </div>
                                                            <div class="product-card__name"><a class="link link--color--black t-base t-base--size--small" href="#"><span class="link__text">Сердце (12''/30 см) Красный (315), кристалл, 100 шт.</span></a>
                                                            </div>
                                                            <div class="product-card__vendor"><a class="link link--color--monochrome-medium t-base t-base--size--small" href="#"><span class="link__text">Falali, Китай</span></a>
                                                            </div>
                                                        </div>
                                                        <div class="product-card__cart">
                                                            <div class="info-label product-card__availability">Временно недоступен</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-card__deleted">
                                                    <div class="info-label">Товар удалён</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="products-grid__col">
                                        <div class="products-grid__item">
                                            <div class="product-card products-grid__card" data-product="444444">
                                                <div class="product-card__wrapper">
                                                    <div class="product-card__labels">
                                                        <div class="labels">
                                                            <div class="labels__label labels__label--color--blue">
                                                                <div class="labels__text">эксклюзив</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="product-card__favorite"><a class="product-card__favorite-btn" href="./static/fakedata/addToCart.json" data-add-to-wish="444444">
                                                            <svg class="icon icon--heart-filled">
                                                                <use xlink:href="./img/sprite.svg#heart-filled-usage"></use>
                                                            </svg></a></div>
                                                    <div class="product-card__img"><a class="product-card__img-wrapper" href="#">
                                                            <div class="product-card__img-container"><img class="img-responsive lazy" src="./img/pixel.png" alt="" data-src="./img/products-thumbs/4.jpg" data-srcset="./img/products-thumbs/4@2x.jpg"></div>
                                                            <div class="product-card__badge">
                                                                <div class="badge-fluid">
                                                                    <div class="badge-fluid__wrapper">
                                                                        <div class="badge-fluid__icon"><img class="img-responsive" src="./img/don-head.svg" alt=""></div>
                                                                        <div class="badge-fluid__text">собственная <br> разработка</div>
                                                                    </div>
                                                                </div>
                                                            </div></a>
                                                        <div class="product-card__quick-view"><a class="button button--color--transparent" href="./modals/fastview.html" data-fast-view><span class="button__wrapper"><span class="button__text">Быстрый просмотр</span></span></a>
                                                        </div>
                                                    </div>
                                                    <div class="product-card__body">
                                                        <div class="product-card__prices">
                                                            <div class="product-card__discount">
                                                                <div class="product-card__old-price">70 <span class="rouble-sign">₽</span></div>
                                                                <div class="labels">
                                                                    <div class="labels__label labels__label--color--red">
                                                                        <div class="labels__text">-8%</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="product-card__price">
                                                                <div class="product-card__price-value">480 <span class="rouble-sign">₽</span></div>
                                                                <div class="product-card__price-quantity">48 <span class="rouble-sign">₽</span> за шт</div>
                                                            </div>
                                                        </div>
                                                        <div class="product-card__info">
                                                            <div class="product-card__article">
                                                                <div class="product-card__article-value">813001V</div>
                                                            </div>
                                                            <div class="product-card__name"><a class="link link--color--black t-base t-base--size--small" href="#"><span class="link__text">Шар (18''/46 см) Круг, Смайл, Желтый, 1 шт.</span></a>
                                                            </div>
                                                            <div class="product-card__vendor"><a class="link link--color--monochrome-medium t-base t-base--size--small" href="#"><span class="link__text">CTI, США</span></a>
                                                            </div>
                                                        </div>
                                                        <div class="product-card__cart">
                                                            <div class="add-to-cart" data-add-to-cart="444444">
                                                                <div class="add-to-cart__count-control">
                                                                    <div class="count-control" data-count-control="">
                                                                        <div class="count-control__info" data-count-control-info=""></div>
                                                                        <div class="count-control__btn count-control__btn--dec" data-count-control-control="dec"></div>
                                                                        <input class="count-control__input" type="text" value="2" data-max="10" data-count-control-input="" data-count-control-step="2">
                                                                        <div class="count-control__btn count-control__btn--inc" data-count-control-control="inc"></div><a class="link link--display--inline count-control__cart-info" href="#" target="_blank" data-count-control-cart-info=""><span class="link__text"></span></a>
                                                                    </div>
                                                                </div>
                                                                <div class="add-to-cart__button"><a class="button" href="./static/fakedata/addToCart.json" data-add-to-cart-btn><span class="button__wrapper">
                                                                                                  <svg class="icon icon--to-cart button__icon ">
                                                                                                    <use xlink:href="./img/sprite.svg#to-cart-usage"></use>
                                                                                                  </svg></span></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-card__deleted">
                                                    <div class="info-label">Товар удалён</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="products-grid__col">
                                        <div class="products-grid__item">
                                            <div class="product-card products-grid__card" data-product="555555">
                                                <div class="product-card__wrapper">
                                                    <div class="product-card__favorite"><a class="product-card__favorite-btn" href="./static/fakedata/addToCart.json" data-add-to-wish="555555">
                                                            <svg class="icon icon--heart-filled">
                                                                <use xlink:href="./img/sprite.svg#heart-filled-usage"></use>
                                                            </svg></a></div>
                                                    <div class="product-card__img"><a class="product-card__img-wrapper" href="#">
                                                            <div class="product-card__img-container"><img class="img-responsive lazy" src="./img/pixel.png" alt="" data-src="./img/products-thumbs/5.jpg" data-srcset="./img/products-thumbs/5@2x.jpg"></div></a>
                                                        <div class="product-card__quick-view"><a class="button button--color--transparent" href="./modals/fastview.html" data-fast-view><span class="button__wrapper"><span class="button__text">Быстрый просмотр</span></span></a>
                                                        </div>
                                                    </div>
                                                    <div class="product-card__body">
                                                        <div class="product-card__prices">
                                                            <div class="product-card__discount">
                                                            </div>
                                                            <div class="product-card__price">
                                                                <div class="product-card__price-value">480 <span class="rouble-sign">₽</span></div>
                                                            </div>
                                                        </div>
                                                        <div class="product-card__info">
                                                            <div class="product-card__article">
                                                                <div class="product-card__article-value">629070</div>
                                                            </div>
                                                            <div class="product-card__name"><a class="link link--color--black t-base t-base--size--small" href="#"><span class="link__text">Шар с клапаном (18''/46 см) Сфера 3D, Deco Bubble, Синий, 10 шт.</span></a>
                                                            </div>
                                                            <div class="product-card__vendor"><a class="link link--color--monochrome-medium t-base t-base--size--small" href="#"><span class="link__text">Falali, Китай</span></a>
                                                            </div>
                                                        </div>
                                                        <div class="product-card__cart">
                                                            <div class="info-label product-card__availability info-label--bg--green">Поступит 15 сентября</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-card__deleted">
                                                    <div class="info-label">Товар удалён</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="products-grid__col">
                                        <div class="products-grid__item">
                                            <div class="product-card products-grid__card" data-product="111111">
                                                <div class="product-card__wrapper">
                                                    <div class="product-card__labels">
                                                        <div class="labels">
                                                            <div class="labels__label labels__label--color--blue">
                                                                <div class="labels__text">эксклюзив</div>
                                                            </div>
                                                            <div class="labels__label labels__label--color--green">
                                                                <div class="labels__text">new</div>
                                                            </div>
                                                            <div class="labels__label labels__label--color--orange">
                                                                <div class="labels__text">хит</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="product-card__favorite"><a class="product-card__favorite-btn" href="./static/fakedata/addToCart.json" data-add-to-wish="111111">
                                                            <svg class="icon icon--heart-filled">
                                                                <use xlink:href="./img/sprite.svg#heart-filled-usage"></use>
                                                            </svg></a></div>
                                                    <div class="product-card__img"><a class="product-card__img-wrapper" href="#">
                                                            <div class="product-card__img-container"><img class="img-responsive lazy" src="./img/pixel.png" alt="" data-src="./img/products-thumbs/1.jpg" data-srcset="./img/products-thumbs/1@2x.jpg"></div>
                                                            <div class="product-card__badge">
                                                                <div class="badge-fluid">
                                                                    <div class="badge-fluid__wrapper">
                                                                        <div class="badge-fluid__icon"><img class="img-responsive" src="./img/don-head.svg" alt=""></div>
                                                                        <div class="badge-fluid__text">собственная <br> разработка</div>
                                                                    </div>
                                                                </div>
                                                            </div></a>
                                                        <div class="product-card__quick-view"><a class="button button--color--transparent" href="./modals/fastview.html" data-fast-view><span class="button__wrapper"><span class="button__text">Быстрый просмотр</span></span></a>
                                                        </div>
                                                    </div>
                                                    <div class="product-card__body">
                                                        <div class="product-card__prices">
                                                            <div class="product-card__discount">
                                                                <div class="product-card__old-price">590 <span class="rouble-sign">₽</span></div>
                                                                <div class="labels">
                                                                    <div class="labels__label labels__label--color--red">
                                                                        <div class="labels__text">-18%</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="product-card__price">
                                                                <div class="product-card__price-value">480 <span class="rouble-sign">₽</span></div>
                                                                <div class="product-card__price-quantity">48 <span class="rouble-sign">₽</span> за шт</div>
                                                            </div>
                                                        </div>
                                                        <div class="product-card__info">
                                                            <div class="product-card__article">
                                                                <div class="product-card__article-tooltip">
                                                                    <div class="tooltip-icon" data-tooltip data-tooltip-params="{&quot;placement&quot;: &quot;top-start&quot;, &quot;offset&quot;: [-15, 10]}">!
                                                                        <div class="is-hidden" data-tooltip-content>
                                                                            <div class="tooltip-content">
                                                                                <div class="tooltip-content__body">Рекомендуем заказывать <br/> в заводской упаковке</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="product-card__article-value">813001V</div>
                                                            </div>
                                                            <div class="product-card__name"><a class="link link--color--black t-base t-base--size--small" href="#"><span class="link__text">Шар (18''/46 см) Звезда, Красный, 10 шт.</span></a>
                                                            </div>
                                                            <div class="product-card__vendor"><a class="link link--color--monochrome-medium t-base t-base--size--small" href="#"><span class="link__text">CTI, США</span></a>
                                                            </div>
                                                        </div>
                                                        <div class="product-card__cart">
                                                            <div class="add-to-cart" data-add-to-cart="111111">
                                                                <div class="add-to-cart__count-control">
                                                                    <div class="count-control" data-count-control="">
                                                                        <div class="count-control__info" data-count-control-info=""></div>
                                                                        <div class="count-control__btn count-control__btn--dec" data-count-control-control="dec"></div>
                                                                        <input class="count-control__input" type="text" value="2" data-max="10" data-count-control-input="" data-count-control-step="2">
                                                                        <div class="count-control__btn count-control__btn--inc" data-count-control-control="inc"></div><a class="link link--display--inline count-control__cart-info" href="#" target="_blank" data-count-control-cart-info=""><span class="link__text"></span></a>
                                                                    </div>
                                                                </div>
                                                                <div class="add-to-cart__button"><a class="button" href="./static/fakedata/addToCart.json" data-add-to-cart-btn><span class="button__wrapper">
                                                                                                  <svg class="icon icon--to-cart button__icon ">
                                                                                                    <use xlink:href="./img/sprite.svg#to-cart-usage"></use>
                                                                                                  </svg></span></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-card__deleted">
                                                    <div class="info-label">Товар удалён</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="products-grid__col">
                                        <div class="products-grid__item">
                                            <div class="product-card products-grid__card" data-product="222222">
                                                <div class="product-card__wrapper">
                                                    <div class="product-card__labels">
                                                        <div class="labels">
                                                            <div class="labels__label labels__label--color--green">
                                                                <div class="labels__text">new</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="product-card__favorite"><a class="product-card__favorite-btn" href="./static/fakedata/addToCart.json" data-add-to-wish="222222">
                                                            <svg class="icon icon--heart-filled">
                                                                <use xlink:href="./img/sprite.svg#heart-filled-usage"></use>
                                                            </svg></a></div>
                                                    <div class="product-card__img"><a class="product-card__img-wrapper" href="#">
                                                            <div class="product-card__img-container"><img class="img-responsive lazy" src="./img/pixel.png" alt="" data-src="./img/products-thumbs/2.jpg" data-srcset="./img/products-thumbs/2@2x.jpg"></div></a>
                                                        <div class="product-card__quick-view"><a class="button button--color--transparent" href="./modals/fastview.html" data-fast-view><span class="button__wrapper"><span class="button__text">Быстрый просмотр</span></span></a>
                                                        </div>
                                                    </div>
                                                    <div class="product-card__body">
                                                        <div class="product-card__prices">
                                                            <div class="product-card__discount">
                                                                <div class="t-base t-base--size--xsmall t-base--color--red-main">Скидки нет</div>
                                                            </div>
                                                            <div class="product-card__price">
                                                                <div class="product-card__price-value">480 <span class="rouble-sign">₽</span></div>
                                                            </div>
                                                        </div>
                                                        <div class="product-card__info">
                                                            <div class="product-card__article">
                                                                <div class="product-card__article-value">81650</div>
                                                            </div>
                                                            <div class="product-card__name"><a class="link link--color--black t-base t-base--size--small" href="#"><span class="link__text">Сердце (12''/30 см) Красный (315), кристалл, 100 шт.</span></a>
                                                            </div>
                                                            <div class="product-card__vendor"><a class="link link--color--monochrome-medium t-base t-base--size--small" href="#"><span class="link__text">Sempertex S.A., Колумбия</span></a>
                                                            </div>
                                                        </div>
                                                        <div class="product-card__cart">
                                                            <div class="add-to-cart" data-add-to-cart="222222">
                                                                <div class="add-to-cart__count-control">
                                                                    <div class="count-control" data-count-control="">
                                                                        <div class="count-control__info" data-count-control-info=""></div>
                                                                        <div class="count-control__btn count-control__btn--dec" data-count-control-control="dec"></div>
                                                                        <input class="count-control__input" type="text" value="2" data-max="10" data-count-control-input="" data-count-control-step="2">
                                                                        <div class="count-control__btn count-control__btn--inc" data-count-control-control="inc"></div><a class="link link--display--inline count-control__cart-info" href="#" target="_blank" data-count-control-cart-info=""><span class="link__text"></span></a>
                                                                    </div>
                                                                </div>
                                                                <div class="add-to-cart__button"><a class="button" href="./static/fakedata/addToCart.json" data-add-to-cart-btn><span class="button__wrapper">
                                                                                                  <svg class="icon icon--to-cart button__icon ">
                                                                                                    <use xlink:href="./img/sprite.svg#to-cart-usage"></use>
                                                                                                  </svg></span></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-card__deleted">
                                                    <div class="info-label">Товар удалён</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="products-grid__col">
                                        <div class="products-grid__item">
                                            <div class="product-card products-grid__card" data-product="333333">
                                                <div class="product-card__wrapper">
                                                    <div class="product-card__favorite"><a class="product-card__favorite-btn" href="./static/fakedata/addToCart.json" data-add-to-wish="333333">
                                                            <svg class="icon icon--heart-filled">
                                                                <use xlink:href="./img/sprite.svg#heart-filled-usage"></use>
                                                            </svg></a></div>
                                                    <div class="product-card__img"><a class="product-card__img-wrapper" href="#">
                                                            <div class="product-card__img-container"><img class="img-responsive lazy" src="./img/pixel.png" alt="" data-src="./img/products-thumbs/3.jpg" data-srcset="./img/products-thumbs/3@2x.jpg"></div></a>
                                                        <div class="product-card__quick-view"><a class="button button--color--transparent" href="./modals/fastview.html" data-fast-view><span class="button__wrapper"><span class="button__text">Быстрый просмотр</span></span></a>
                                                        </div>
                                                    </div>
                                                    <div class="product-card__body">
                                                        <div class="product-card__prices">
                                                            <div class="product-card__discount">
                                                            </div>
                                                            <div class="product-card__price">
                                                                <div class="product-card__price-value">480 <span class="rouble-sign">₽</span></div>
                                                            </div>
                                                        </div>
                                                        <div class="product-card__info">
                                                            <div class="product-card__article">
                                                                <div class="product-card__article-value">629070</div>
                                                            </div>
                                                            <div class="product-card__name"><a class="link link--color--black t-base t-base--size--small" href="#"><span class="link__text">Сердце (12''/30 см) Красный (315), кристалл, 100 шт.</span></a>
                                                            </div>
                                                            <div class="product-card__vendor"><a class="link link--color--monochrome-medium t-base t-base--size--small" href="#"><span class="link__text">Falali, Китай</span></a>
                                                            </div>
                                                        </div>
                                                        <div class="product-card__cart">
                                                            <div class="info-label product-card__availability">Доступен в магазинах</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-card__deleted">
                                                    <div class="info-label">Товар удалён</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="products-grid__col">
                                        <div class="products-grid__item">
                                            <div class="product-card products-grid__card" data-product="333333">
                                                <div class="product-card__wrapper">
                                                    <div class="product-card__favorite"><a class="product-card__favorite-btn" href="./static/fakedata/addToCart.json" data-add-to-wish="333333">
                                                            <svg class="icon icon--heart-filled">
                                                                <use xlink:href="./img/sprite.svg#heart-filled-usage"></use>
                                                            </svg></a></div>
                                                    <div class="product-card__img"><a class="product-card__img-wrapper" href="#">
                                                            <div class="product-card__img-container"><img class="img-responsive lazy" src="./img/pixel.png" alt="" data-src="./img/products-thumbs/1.jpg" data-srcset="./img/products-thumbs/1@2x.jpg"></div></a>
                                                        <div class="product-card__quick-view"><a class="button button--color--transparent" href="./modals/fastview.html" data-fast-view><span class="button__wrapper"><span class="button__text">Быстрый просмотр</span></span></a>
                                                        </div>
                                                    </div>
                                                    <div class="product-card__body">
                                                        <div class="product-card__prices">
                                                            <div class="product-card__discount">
                                                            </div>
                                                            <div class="product-card__price">
                                                                <div class="product-card__price-value">480 <span class="rouble-sign">₽</span></div>
                                                            </div>
                                                        </div>
                                                        <div class="product-card__info">
                                                            <div class="product-card__article">
                                                                <div class="product-card__article-value">629070</div>
                                                            </div>
                                                            <div class="product-card__name"><a class="link link--color--black t-base t-base--size--small" href="#"><span class="link__text">Сердце (12''/30 см) Красный (315), кристалл, 100 шт.</span></a>
                                                            </div>
                                                            <div class="product-card__vendor"><a class="link link--color--monochrome-medium t-base t-base--size--small" href="#"><span class="link__text">Falali, Китай</span></a>
                                                            </div>
                                                        </div>
                                                        <div class="product-card__cart">
                                                            <div class="info-label product-card__availability">Временно недоступен</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-card__deleted">
                                                    <div class="info-label">Товар удалён</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="products-grid__col">
                                        <div class="products-grid__item">
                                            <div class="product-card products-grid__card" data-product="444444">
                                                <div class="product-card__wrapper">
                                                    <div class="product-card__labels">
                                                        <div class="labels">
                                                            <div class="labels__label labels__label--color--blue">
                                                                <div class="labels__text">эксклюзив</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="product-card__favorite"><a class="product-card__favorite-btn" href="./static/fakedata/addToCart.json" data-add-to-wish="444444">
                                                            <svg class="icon icon--heart-filled">
                                                                <use xlink:href="./img/sprite.svg#heart-filled-usage"></use>
                                                            </svg></a></div>
                                                    <div class="product-card__img"><a class="product-card__img-wrapper" href="#">
                                                            <div class="product-card__img-container"><img class="img-responsive lazy" src="./img/pixel.png" alt="" data-src="./img/products-thumbs/4.jpg" data-srcset="./img/products-thumbs/4@2x.jpg"></div>
                                                            <div class="product-card__badge">
                                                                <div class="badge-fluid">
                                                                    <div class="badge-fluid__wrapper">
                                                                        <div class="badge-fluid__icon"><img class="img-responsive" src="./img/don-head.svg" alt=""></div>
                                                                        <div class="badge-fluid__text">собственная <br> разработка</div>
                                                                    </div>
                                                                </div>
                                                            </div></a>
                                                        <div class="product-card__quick-view"><a class="button button--color--transparent" href="./modals/fastview.html" data-fast-view><span class="button__wrapper"><span class="button__text">Быстрый просмотр</span></span></a>
                                                        </div>
                                                    </div>
                                                    <div class="product-card__body">
                                                        <div class="product-card__prices">
                                                            <div class="product-card__discount">
                                                                <div class="product-card__old-price">70 <span class="rouble-sign">₽</span></div>
                                                                <div class="labels">
                                                                    <div class="labels__label labels__label--color--red">
                                                                        <div class="labels__text">-8%</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="product-card__price">
                                                                <div class="product-card__price-value">480 <span class="rouble-sign">₽</span></div>
                                                                <div class="product-card__price-quantity">48 <span class="rouble-sign">₽</span> за шт</div>
                                                            </div>
                                                        </div>
                                                        <div class="product-card__info">
                                                            <div class="product-card__article">
                                                                <div class="product-card__article-value">813001V</div>
                                                            </div>
                                                            <div class="product-card__name"><a class="link link--color--black t-base t-base--size--small" href="#"><span class="link__text">Шар (18''/46 см) Круг, Смайл, Желтый, 1 шт.</span></a>
                                                            </div>
                                                            <div class="product-card__vendor"><a class="link link--color--monochrome-medium t-base t-base--size--small" href="#"><span class="link__text">CTI, США</span></a>
                                                            </div>
                                                        </div>
                                                        <div class="product-card__cart">
                                                            <div class="add-to-cart" data-add-to-cart="444444">
                                                                <div class="add-to-cart__count-control">
                                                                    <div class="count-control" data-count-control="">
                                                                        <div class="count-control__info" data-count-control-info=""></div>
                                                                        <div class="count-control__btn count-control__btn--dec" data-count-control-control="dec"></div>
                                                                        <input class="count-control__input" type="text" value="2" data-max="10" data-count-control-input="" data-count-control-step="2">
                                                                        <div class="count-control__btn count-control__btn--inc" data-count-control-control="inc"></div><a class="link link--display--inline count-control__cart-info" href="#" target="_blank" data-count-control-cart-info=""><span class="link__text"></span></a>
                                                                    </div>
                                                                </div>
                                                                <div class="add-to-cart__button"><a class="button" href="./static/fakedata/addToCart.json" data-add-to-cart-btn><span class="button__wrapper">
                                                                                                  <svg class="icon icon--to-cart button__icon ">
                                                                                                    <use xlink:href="./img/sprite.svg#to-cart-usage"></use>
                                                                                                  </svg></span></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-card__deleted">
                                                    <div class="info-label">Товар удалён</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="products-grid__col">
                                        <div class="products-grid__item">
                                            <div class="product-card products-grid__card" data-product="555555">
                                                <div class="product-card__wrapper">
                                                    <div class="product-card__favorite"><a class="product-card__favorite-btn" href="./static/fakedata/addToCart.json" data-add-to-wish="555555">
                                                            <svg class="icon icon--heart-filled">
                                                                <use xlink:href="./img/sprite.svg#heart-filled-usage"></use>
                                                            </svg></a></div>
                                                    <div class="product-card__img"><a class="product-card__img-wrapper" href="#">
                                                            <div class="product-card__img-container"><img class="img-responsive lazy" src="./img/pixel.png" alt="" data-src="./img/products-thumbs/5.jpg" data-srcset="./img/products-thumbs/5@2x.jpg"></div></a>
                                                        <div class="product-card__quick-view"><a class="button button--color--transparent" href="./modals/fastview.html" data-fast-view><span class="button__wrapper"><span class="button__text">Быстрый просмотр</span></span></a>
                                                        </div>
                                                    </div>
                                                    <div class="product-card__body">
                                                        <div class="product-card__prices">
                                                            <div class="product-card__discount">
                                                            </div>
                                                            <div class="product-card__price">
                                                                <div class="product-card__price-value">480 <span class="rouble-sign">₽</span></div>
                                                            </div>
                                                        </div>
                                                        <div class="product-card__info">
                                                            <div class="product-card__article">
                                                                <div class="product-card__article-value">629070</div>
                                                            </div>
                                                            <div class="product-card__name"><a class="link link--color--black t-base t-base--size--small" href="#"><span class="link__text">Шар с клапаном (18''/46 см) Сфера 3D, Deco Bubble, Синий, 10 шт.</span></a>
                                                            </div>
                                                            <div class="product-card__vendor"><a class="link link--color--monochrome-medium t-base t-base--size--small" href="#"><span class="link__text">Falali, Китай</span></a>
                                                            </div>
                                                        </div>
                                                        <div class="product-card__cart">
                                                            <div class="info-label product-card__availability info-label--bg--green">Поступит 15 сентября</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-card__deleted">
                                                    <div class="info-label">Товар удалён</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="products-grid__col">
                                        <div class="products-grid__item">
                                            <div class="product-card products-grid__card" data-product="111111">
                                                <div class="product-card__wrapper">
                                                    <div class="product-card__labels">
                                                        <div class="labels">
                                                            <div class="labels__label labels__label--color--blue">
                                                                <div class="labels__text">эксклюзив</div>
                                                            </div>
                                                            <div class="labels__label labels__label--color--green">
                                                                <div class="labels__text">new</div>
                                                            </div>
                                                            <div class="labels__label labels__label--color--orange">
                                                                <div class="labels__text">хит</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="product-card__favorite"><a class="product-card__favorite-btn" href="./static/fakedata/addToCart.json" data-add-to-wish="111111">
                                                            <svg class="icon icon--heart-filled">
                                                                <use xlink:href="./img/sprite.svg#heart-filled-usage"></use>
                                                            </svg></a></div>
                                                    <div class="product-card__img"><a class="product-card__img-wrapper" href="#">
                                                            <div class="product-card__img-container"><img class="img-responsive lazy" src="./img/pixel.png" alt="" data-src="./img/products-thumbs/1.jpg" data-srcset="./img/products-thumbs/1@2x.jpg"></div>
                                                            <div class="product-card__badge">
                                                                <div class="badge-fluid">
                                                                    <div class="badge-fluid__wrapper">
                                                                        <div class="badge-fluid__icon"><img class="img-responsive" src="./img/don-head.svg" alt=""></div>
                                                                        <div class="badge-fluid__text">собственная <br> разработка</div>
                                                                    </div>
                                                                </div>
                                                            </div></a>
                                                        <div class="product-card__quick-view"><a class="button button--color--transparent" href="./modals/fastview.html" data-fast-view><span class="button__wrapper"><span class="button__text">Быстрый просмотр</span></span></a>
                                                        </div>
                                                    </div>
                                                    <div class="product-card__body">
                                                        <div class="product-card__prices">
                                                            <div class="product-card__discount">
                                                                <div class="product-card__old-price">590 <span class="rouble-sign">₽</span></div>
                                                                <div class="labels">
                                                                    <div class="labels__label labels__label--color--red">
                                                                        <div class="labels__text">-18%</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="product-card__price">
                                                                <div class="product-card__price-value">480 <span class="rouble-sign">₽</span></div>
                                                                <div class="product-card__price-quantity">48 <span class="rouble-sign">₽</span> за шт</div>
                                                            </div>
                                                        </div>
                                                        <div class="product-card__info">
                                                            <div class="product-card__article">
                                                                <div class="product-card__article-tooltip">
                                                                    <div class="tooltip-icon" data-tooltip data-tooltip-params="{&quot;placement&quot;: &quot;top-start&quot;, &quot;offset&quot;: [-15, 10]}">!
                                                                        <div class="is-hidden" data-tooltip-content>
                                                                            <div class="tooltip-content">
                                                                                <div class="tooltip-content__body">Рекомендуем заказывать <br/> в заводской упаковке</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="product-card__article-value">813001V</div>
                                                            </div>
                                                            <div class="product-card__name"><a class="link link--color--black t-base t-base--size--small" href="#"><span class="link__text">Шар (18''/46 см) Звезда, Красный, 10 шт.</span></a>
                                                            </div>
                                                            <div class="product-card__vendor"><a class="link link--color--monochrome-medium t-base t-base--size--small" href="#"><span class="link__text">CTI, США</span></a>
                                                            </div>
                                                        </div>
                                                        <div class="product-card__cart">
                                                            <div class="add-to-cart" data-add-to-cart="111111">
                                                                <div class="add-to-cart__count-control">
                                                                    <div class="count-control" data-count-control="">
                                                                        <div class="count-control__info" data-count-control-info=""></div>
                                                                        <div class="count-control__btn count-control__btn--dec" data-count-control-control="dec"></div>
                                                                        <input class="count-control__input" type="text" value="2" data-max="10" data-count-control-input="" data-count-control-step="2">
                                                                        <div class="count-control__btn count-control__btn--inc" data-count-control-control="inc"></div><a class="link link--display--inline count-control__cart-info" href="#" target="_blank" data-count-control-cart-info=""><span class="link__text"></span></a>
                                                                    </div>
                                                                </div>
                                                                <div class="add-to-cart__button"><a class="button" href="./static/fakedata/addToCart.json" data-add-to-cart-btn><span class="button__wrapper">
                                                                                                  <svg class="icon icon--to-cart button__icon ">
                                                                                                    <use xlink:href="./img/sprite.svg#to-cart-usage"></use>
                                                                                                  </svg></span></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-card__deleted">
                                                    <div class="info-label">Товар удалён</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="products-grid__col">
                                        <div class="products-grid__item">
                                            <div class="product-card products-grid__card" data-product="222222">
                                                <div class="product-card__wrapper">
                                                    <div class="product-card__labels">
                                                        <div class="labels">
                                                            <div class="labels__label labels__label--color--green">
                                                                <div class="labels__text">new</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="product-card__favorite"><a class="product-card__favorite-btn" href="./static/fakedata/addToCart.json" data-add-to-wish="222222">
                                                            <svg class="icon icon--heart-filled">
                                                                <use xlink:href="./img/sprite.svg#heart-filled-usage"></use>
                                                            </svg></a></div>
                                                    <div class="product-card__img"><a class="product-card__img-wrapper" href="#">
                                                            <div class="product-card__img-container"><img class="img-responsive lazy" src="./img/pixel.png" alt="" data-src="./img/products-thumbs/2.jpg" data-srcset="./img/products-thumbs/2@2x.jpg"></div></a>
                                                        <div class="product-card__quick-view"><a class="button button--color--transparent" href="./modals/fastview.html" data-fast-view><span class="button__wrapper"><span class="button__text">Быстрый просмотр</span></span></a>
                                                        </div>
                                                    </div>
                                                    <div class="product-card__body">
                                                        <div class="product-card__prices">
                                                            <div class="product-card__discount">
                                                                <div class="t-base t-base--size--xsmall t-base--color--red-main">Скидки нет</div>
                                                            </div>
                                                            <div class="product-card__price">
                                                                <div class="product-card__price-value">480 <span class="rouble-sign">₽</span></div>
                                                            </div>
                                                        </div>
                                                        <div class="product-card__info">
                                                            <div class="product-card__article">
                                                                <div class="product-card__article-value">81650</div>
                                                            </div>
                                                            <div class="product-card__name"><a class="link link--color--black t-base t-base--size--small" href="#"><span class="link__text">Сердце (12''/30 см) Красный (315), кристалл, 100 шт.</span></a>
                                                            </div>
                                                            <div class="product-card__vendor"><a class="link link--color--monochrome-medium t-base t-base--size--small" href="#"><span class="link__text">Sempertex S.A., Колумбия</span></a>
                                                            </div>
                                                        </div>
                                                        <div class="product-card__cart">
                                                            <div class="add-to-cart" data-add-to-cart="222222">
                                                                <div class="add-to-cart__count-control">
                                                                    <div class="count-control" data-count-control="">
                                                                        <div class="count-control__info" data-count-control-info=""></div>
                                                                        <div class="count-control__btn count-control__btn--dec" data-count-control-control="dec"></div>
                                                                        <input class="count-control__input" type="text" value="2" data-max="10" data-count-control-input="" data-count-control-step="2">
                                                                        <div class="count-control__btn count-control__btn--inc" data-count-control-control="inc"></div><a class="link link--display--inline count-control__cart-info" href="#" target="_blank" data-count-control-cart-info=""><span class="link__text"></span></a>
                                                                    </div>
                                                                </div>
                                                                <div class="add-to-cart__button"><a class="button" href="./static/fakedata/addToCart.json" data-add-to-cart-btn><span class="button__wrapper">
                                                                                                  <svg class="icon icon--to-cart button__icon ">
                                                                                                    <use xlink:href="./img/sprite.svg#to-cart-usage"></use>
                                                                                                  </svg></span></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-card__deleted">
                                                    <div class="info-label">Товар удалён</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="products-grid__col">
                                        <div class="products-grid__item">
                                            <div class="product-card products-grid__card" data-product="333333">
                                                <div class="product-card__wrapper">
                                                    <div class="product-card__favorite"><a class="product-card__favorite-btn" href="./static/fakedata/addToCart.json" data-add-to-wish="333333">
                                                            <svg class="icon icon--heart-filled">
                                                                <use xlink:href="./img/sprite.svg#heart-filled-usage"></use>
                                                            </svg></a></div>
                                                    <div class="product-card__img"><a class="product-card__img-wrapper" href="#">
                                                            <div class="product-card__img-container"><img class="img-responsive lazy" src="./img/pixel.png" alt="" data-src="./img/products-thumbs/3.jpg" data-srcset="./img/products-thumbs/3@2x.jpg"></div></a>
                                                        <div class="product-card__quick-view"><a class="button button--color--transparent" href="./modals/fastview.html" data-fast-view><span class="button__wrapper"><span class="button__text">Быстрый просмотр</span></span></a>
                                                        </div>
                                                    </div>
                                                    <div class="product-card__body">
                                                        <div class="product-card__prices">
                                                            <div class="product-card__discount">
                                                            </div>
                                                            <div class="product-card__price">
                                                                <div class="product-card__price-value">480 <span class="rouble-sign">₽</span></div>
                                                            </div>
                                                        </div>
                                                        <div class="product-card__info">
                                                            <div class="product-card__article">
                                                                <div class="product-card__article-value">629070</div>
                                                            </div>
                                                            <div class="product-card__name"><a class="link link--color--black t-base t-base--size--small" href="#"><span class="link__text">Сердце (12''/30 см) Красный (315), кристалл, 100 шт.</span></a>
                                                            </div>
                                                            <div class="product-card__vendor"><a class="link link--color--monochrome-medium t-base t-base--size--small" href="#"><span class="link__text">Falali, Китай</span></a>
                                                            </div>
                                                        </div>
                                                        <div class="product-card__cart">
                                                            <div class="info-label product-card__availability">Доступен в магазинах</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-card__deleted">
                                                    <div class="info-label">Товар удалён</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="products-grid__col">
                                        <div class="products-grid__item">
                                            <div class="product-card products-grid__card" data-product="333333">
                                                <div class="product-card__wrapper">
                                                    <div class="product-card__favorite"><a class="product-card__favorite-btn" href="./static/fakedata/addToCart.json" data-add-to-wish="333333">
                                                            <svg class="icon icon--heart-filled">
                                                                <use xlink:href="./img/sprite.svg#heart-filled-usage"></use>
                                                            </svg></a></div>
                                                    <div class="product-card__img"><a class="product-card__img-wrapper" href="#">
                                                            <div class="product-card__img-container"><img class="img-responsive lazy" src="./img/pixel.png" alt="" data-src="./img/products-thumbs/1.jpg" data-srcset="./img/products-thumbs/1@2x.jpg"></div></a>
                                                        <div class="product-card__quick-view"><a class="button button--color--transparent" href="./modals/fastview.html" data-fast-view><span class="button__wrapper"><span class="button__text">Быстрый просмотр</span></span></a>
                                                        </div>
                                                    </div>
                                                    <div class="product-card__body">
                                                        <div class="product-card__prices">
                                                            <div class="product-card__discount">
                                                            </div>
                                                            <div class="product-card__price">
                                                                <div class="product-card__price-value">480 <span class="rouble-sign">₽</span></div>
                                                            </div>
                                                        </div>
                                                        <div class="product-card__info">
                                                            <div class="product-card__article">
                                                                <div class="product-card__article-value">629070</div>
                                                            </div>
                                                            <div class="product-card__name"><a class="link link--color--black t-base t-base--size--small" href="#"><span class="link__text">Сердце (12''/30 см) Красный (315), кристалл, 100 шт.</span></a>
                                                            </div>
                                                            <div class="product-card__vendor"><a class="link link--color--monochrome-medium t-base t-base--size--small" href="#"><span class="link__text">Falali, Китай</span></a>
                                                            </div>
                                                        </div>
                                                        <div class="product-card__cart">
                                                            <div class="info-label product-card__availability">Временно недоступен</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-card__deleted">
                                                    <div class="info-label">Товар удалён</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="products-grid__col">
                                        <div class="products-grid__item">
                                            <div class="product-card products-grid__card" data-product="444444">
                                                <div class="product-card__wrapper">
                                                    <div class="product-card__labels">
                                                        <div class="labels">
                                                            <div class="labels__label labels__label--color--blue">
                                                                <div class="labels__text">эксклюзив</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="product-card__favorite"><a class="product-card__favorite-btn" href="./static/fakedata/addToCart.json" data-add-to-wish="444444">
                                                            <svg class="icon icon--heart-filled">
                                                                <use xlink:href="./img/sprite.svg#heart-filled-usage"></use>
                                                            </svg></a></div>
                                                    <div class="product-card__img"><a class="product-card__img-wrapper" href="#">
                                                            <div class="product-card__img-container"><img class="img-responsive lazy" src="./img/pixel.png" alt="" data-src="./img/products-thumbs/4.jpg" data-srcset="./img/products-thumbs/4@2x.jpg"></div>
                                                            <div class="product-card__badge">
                                                                <div class="badge-fluid">
                                                                    <div class="badge-fluid__wrapper">
                                                                        <div class="badge-fluid__icon"><img class="img-responsive" src="./img/don-head.svg" alt=""></div>
                                                                        <div class="badge-fluid__text">собственная <br> разработка</div>
                                                                    </div>
                                                                </div>
                                                            </div></a>
                                                        <div class="product-card__quick-view"><a class="button button--color--transparent" href="./modals/fastview.html" data-fast-view><span class="button__wrapper"><span class="button__text">Быстрый просмотр</span></span></a>
                                                        </div>
                                                    </div>
                                                    <div class="product-card__body">
                                                        <div class="product-card__prices">
                                                            <div class="product-card__discount">
                                                                <div class="product-card__old-price">70 <span class="rouble-sign">₽</span></div>
                                                                <div class="labels">
                                                                    <div class="labels__label labels__label--color--red">
                                                                        <div class="labels__text">-8%</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="product-card__price">
                                                                <div class="product-card__price-value">480 <span class="rouble-sign">₽</span></div>
                                                                <div class="product-card__price-quantity">48 <span class="rouble-sign">₽</span> за шт</div>
                                                            </div>
                                                        </div>
                                                        <div class="product-card__info">
                                                            <div class="product-card__article">
                                                                <div class="product-card__article-value">813001V</div>
                                                            </div>
                                                            <div class="product-card__name"><a class="link link--color--black t-base t-base--size--small" href="#"><span class="link__text">Шар (18''/46 см) Круг, Смайл, Желтый, 1 шт.</span></a>
                                                            </div>
                                                            <div class="product-card__vendor"><a class="link link--color--monochrome-medium t-base t-base--size--small" href="#"><span class="link__text">CTI, США</span></a>
                                                            </div>
                                                        </div>
                                                        <div class="product-card__cart">
                                                            <div class="add-to-cart" data-add-to-cart="444444">
                                                                <div class="add-to-cart__count-control">
                                                                    <div class="count-control" data-count-control="">
                                                                        <div class="count-control__info" data-count-control-info=""></div>
                                                                        <div class="count-control__btn count-control__btn--dec" data-count-control-control="dec"></div>
                                                                        <input class="count-control__input" type="text" value="2" data-max="10" data-count-control-input="" data-count-control-step="2">
                                                                        <div class="count-control__btn count-control__btn--inc" data-count-control-control="inc"></div><a class="link link--display--inline count-control__cart-info" href="#" target="_blank" data-count-control-cart-info=""><span class="link__text"></span></a>
                                                                    </div>
                                                                </div>
                                                                <div class="add-to-cart__button"><a class="button" href="./static/fakedata/addToCart.json" data-add-to-cart-btn><span class="button__wrapper">
                                                                                                  <svg class="icon icon--to-cart button__icon ">
                                                                                                    <use xlink:href="./img/sprite.svg#to-cart-usage"></use>
                                                                                                  </svg></span></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-card__deleted">
                                                    <div class="info-label">Товар удалён</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="products-grid__col">
                                        <div class="products-grid__item">
                                            <div class="product-card products-grid__card" data-product="555555">
                                                <div class="product-card__wrapper">
                                                    <div class="product-card__favorite"><a class="product-card__favorite-btn" href="./static/fakedata/addToCart.json" data-add-to-wish="555555">
                                                            <svg class="icon icon--heart-filled">
                                                                <use xlink:href="./img/sprite.svg#heart-filled-usage"></use>
                                                            </svg></a></div>
                                                    <div class="product-card__img"><a class="product-card__img-wrapper" href="#">
                                                            <div class="product-card__img-container"><img class="img-responsive lazy" src="./img/pixel.png" alt="" data-src="./img/products-thumbs/5.jpg" data-srcset="./img/products-thumbs/5@2x.jpg"></div></a>
                                                        <div class="product-card__quick-view"><a class="button button--color--transparent" href="./modals/fastview.html" data-fast-view><span class="button__wrapper"><span class="button__text">Быстрый просмотр</span></span></a>
                                                        </div>
                                                    </div>
                                                    <div class="product-card__body">
                                                        <div class="product-card__prices">
                                                            <div class="product-card__discount">
                                                            </div>
                                                            <div class="product-card__price">
                                                                <div class="product-card__price-value">480 <span class="rouble-sign">₽</span></div>
                                                            </div>
                                                        </div>
                                                        <div class="product-card__info">
                                                            <div class="product-card__article">
                                                                <div class="product-card__article-value">629070</div>
                                                            </div>
                                                            <div class="product-card__name"><a class="link link--color--black t-base t-base--size--small" href="#"><span class="link__text">Шар с клапаном (18''/46 см) Сфера 3D, Deco Bubble, Синий, 10 шт.</span></a>
                                                            </div>
                                                            <div class="product-card__vendor"><a class="link link--color--monochrome-medium t-base t-base--size--small" href="#"><span class="link__text">Falali, Китай</span></a>
                                                            </div>
                                                        </div>
                                                        <div class="product-card__cart">
                                                            <div class="info-label product-card__availability info-label--bg--green">Поступит 15 сентября</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-card__deleted">
                                                    <div class="info-label">Товар удалён</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="catalog__paginator" data-catalog-paginator>
                                <div class="paginator" data-catalog-paginator>
                                    <div class="paginator__wrapper">
                                        <div class="paginator__button"><a class="button button--color--monochrome-thin" href="/catalog.html?sort=main&amp;amount=all&amp;display=block&amp;page=2" data-catalog-paginator-more><span class="button__wrapper"><span class="button__text">Показать ещё</span></span></a>
                                        </div>
                                        <div class="paginator__controls">
                                            <ul class="paginator__list">
                                                <li class="paginator__item"><a class="paginator__link" href="/catalog.html?sort=main&amp;amount=all&amp;display=bloc">
                                                        <svg class="icon icon--chevron-right paginator__icon paginator__icon--prev" data-catalog-paginator-link>
                                                            <use xlink:href="./img/sprite.svg#chevron-right-usage"></use>
                                                        </svg></a></li>
                                                <li class="paginator__item"><a class="link paginator__link link--color--black" href="/catalog.html?sort=main&amp;amount=all&amp;display=block" data-catalog-paginator-link><span class="link__text">1</span></a>
                                                </li>
                                                <li class="paginator__item is-active"><a class="link paginator__link link--color--black" href="/catalog.html?sort=main&amp;amount=all&amp;display=block" data-catalog-paginator-link><span class="link__text">2</span></a>
                                                </li>
                                                <li class="paginator__item"><a class="link paginator__link link--color--black" href="/catalog.html?sort=main&amp;amount=all&amp;display=block" data-catalog-paginator-link><span class="link__text">3</span></a>
                                                </li>
                                                <li class="paginator__item"><a class="link paginator__link link--color--black" href="/catalog.html?sort=main&amp;amount=all&amp;display=block" data-catalog-paginator-link><span class="link__text">...</span></a>
                                                </li>
                                                <li class="paginator__item"><a class="link paginator__link link--color--black" href="/catalog.html?sort=main&amp;amount=all&amp;display=block" data-catalog-paginator-link><span class="link__text">31</span></a>
                                                </li>
                                                <li class="paginator__item"><a class="link paginator__link link--color--black" href="/catalog.html?sort=main&amp;amount=all&amp;display=block" data-catalog-paginator-link><span class="link__text">32</span></a>
                                                </li>
                                                <li class="paginator__item"><a class="link paginator__link link--color--black" href="/catalog.html?sort=main&amp;amount=all&amp;display=block" data-catalog-paginator-link><span class="link__text">33</span></a>
                                                </li>
                                                <li class="paginator__item"><a class="paginator__link" href="/catalog.html?sort=main&amp;amount=all&amp;display=bloc">
                                                        <svg class="icon icon--chevron-right paginator__icon paginator__icon--next" data-catalog-paginator-link>
                                                            <use xlink:href="./img/sprite.svg#chevron-right-usage"></use>
                                                        </svg></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="catalog__loader">
                            <div class="catalog__loader-wrapper">
                                <div class="v-ident v-ident--orange">
                                    <div class="catalog__loader-img"><img class="img-responsive" src="./img/don-head.svg" alt=""></div>
                                </div>
                                <div class="catalog__loader-text"><b>Шары на подлёте...</b></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>