
 </main>
      <footer class="footer" data-footer>
        <div class="footer__main">
          <section class="section section--bg--monochrome-thin section--inner">
            <div class="section__wrapper">
              <div class="footer-main">
                <div class="footer-main__wrapper">
                  <div class="footer-main__row">
                    <div class="footer-main__col footer-main__col--1">
                      <div class="v-ident v-ident--yellow">
                        <div class="t-base t-base--size--medium"><b>Всегда на связи</b></div>
                      </div>
                      <div class="v-ident v-ident--yellow"><a class="link link--color--black link--weight--bold t-base t-base--size--medium" href="tel:88002002809"><span class="link__text">8 800 200-28-09</span></a>
                        <p class="t-base t-base--size--small t-base--color--monochrome-medium"> Звонок по России бесплатный</p>
                      </div>
                      <div class="v-ident v-ident--yellow"><a class="link link--color--black link--weight--bold t-base t-base--size--medium" href="tel:+74956152809"><span class="link__text">+7 (495) 615-28-09</span></a>
                        <p class="t-base t-base--size--small t-base--color--monochrome-medium"> 8:00 — 17:00 МСК</p>
                      </div>
                      <div class="v-ident v-ident--yellow"><a class="link link--color--black link--weight--bold t-base t-base--size--medium" href="mailto:info@donballon.ru"><span class="link__text">info@donballon.ru</span></a>
                      </div>
                      <div class="v-ident v-ident--yellow">
                        <div class="footer-main__messengers">
                          <div class="footer-main__messenger"><a href="#"><img class="img-responsive" src="./img/whatsapp.svg" alt=""></a></div>
                          <div class="footer-main__messenger"><a href="#"><img class="img-responsive" src="./img/viber.svg" alt=""></a></div>
                          <div class="footer-main__messenger"><a href="#"><img class="img-responsive" src="./img/telegram-rectangle.svg" alt=""></a></div>
                          <div class="footer-main__messenger"><a href="#"><img class="img-responsive" src="./img/skype.svg" alt=""></a></div>
                        </div>
                      </div>
                    </div>
                    <div class="footer-main__col footer-main__col--2">
                      <div class="footer-main__subscribe">
                        <div class="v-ident v-ident--yellow">
                          <p class="t-base t-base--size--medium"><b>Узнавайте обо всем первыми</b></p>
                        </div>
                        <div class="v-ident v-ident--yellow"><a class="button" href="./modals/subscribe.html" data-modal><span class="button__wrapper"><span class="button__text">Подписаться на рассылку</span></span></a>
                        </div>
                      </div>
                        <?php

                        $APPLICATION->IncludeComponent("bitrix:menu","bottom_menu",Array(
                                "ROOT_MENU_TYPE" => "bottom1",
                                "MAX_LEVEL" => "1",
                                "CHILD_MENU_TYPE" => "bottom",
                                "USE_EXT" => "N",
                                "DELAY" => "N",
                                "ALLOW_MULTI_SELECT" => "Y",
                                "MENU_CACHE_TYPE" => "N",
                                "MENU_CACHE_TIME" => "3600",
                                "MENU_CACHE_USE_GROUPS" => "Y",
                                "MENU_CACHE_GET_VARS" => "",
                                "TITLE" =>"Доставка и оплата",
                            )
                        );
                        ?>
                        <?php

                        $APPLICATION->IncludeComponent("bitrix:menu","bottom_menu",Array(
                                "ROOT_MENU_TYPE" => "bottom2",
                                "MAX_LEVEL" => "1",
                                "CHILD_MENU_TYPE" => "bottom",
                                "USE_EXT" => "N",
                                "DELAY" => "N",
                                "ALLOW_MULTI_SELECT" => "Y",
                                "MENU_CACHE_TYPE" => "N",
                                "MENU_CACHE_TIME" => "3600",
                                "MENU_CACHE_USE_GROUPS" => "Y",
                                "MENU_CACHE_GET_VARS" => "",
                                "TITLE" =>"Скидки",
                            )
                        );
                        ?>


                    </div>
                    <div class="footer-main__col footer-main__col--3">
                        <?php

                        $APPLICATION->IncludeComponent("bitrix:menu","bottom_menu",Array(
                                "ROOT_MENU_TYPE" => "bottom3",
                                "MAX_LEVEL" => "1",
                                "CHILD_MENU_TYPE" => "bottom",
                                "USE_EXT" => "N",
                                "DELAY" => "N",
                                "ALLOW_MULTI_SELECT" => "Y",
                                "MENU_CACHE_TYPE" => "N",
                                "MENU_CACHE_TIME" => "3600",
                                "MENU_CACHE_USE_GROUPS" => "Y",
                                "MENU_CACHE_GET_VARS" => "",
                                "TITLE" =>"Компания",
                            )
                        );
                        ?>

                        <?php

                        $APPLICATION->IncludeComponent("bitrix:menu","bottom_menu",Array(
                                "ROOT_MENU_TYPE" => "bottom4",
                                "MAX_LEVEL" => "1",
                                "CHILD_MENU_TYPE" => "bottom",
                                "USE_EXT" => "N",
                                "DELAY" => "N",
                                "ALLOW_MULTI_SELECT" => "Y",
                                "MENU_CACHE_TYPE" => "N",
                                "MENU_CACHE_TIME" => "3600",
                                "MENU_CACHE_USE_GROUPS" => "Y",
                                "MENU_CACHE_GET_VARS" => "",
                                "TITLE" =>"Контакты",
                            )
                        );
                        ?>

                    </div>
                    <div class="footer-main__col footer-main__col--4">
                      <div class="footer-main__form v-ident v-ident--green">
                        <div class="v-ident v-ident--yellow">
                          <div class="t-base t-base--size--medium"><b>Узнавайте обо всем первыми</b></div>
                        </div>
                        <form class="form" data-form action="./static/fakedata/success.json">
                          <div class="form__wrapper">
                            <div class="form__control">
                                      <div class="input">
                                        <input class="input__control" type="email" data-input="" placeholder="Email" autocomplete="off" required name="EMAIL">
                                        <label class="input__placeholder">Email</label>
                                      </div>
                            </div>
                            <div class="form__control">
                                      <div class="input">
                                        <input class="input__control" type="text" data-input="" placeholder="Имя" autocomplete="off" required name="FIO">
                                        <label class="input__placeholder">Имя</label>
                                      </div>
                            </div>
                            <div class="form__control">
                              <div class="form__radio-group">
                                        <label class="radio">
                                          <input type="radio" name="gender" checked><span class="radio__icon"></span><span class="radio__text">Мужчина</span>
                                        </label>
                                        <label class="radio">
                                          <input type="radio" name="gender"><span class="radio__icon"></span><span class="radio__text">Женщина</span>
                                        </label>
                                        <label class="radio">
                                          <input type="radio" name="gender"><span class="radio__icon"></span><span class="radio__text">Компания</span>
                                        </label>
                              </div>
                            </div>
                            <div class="form__control">
                                      <button class="button" type="submit"><span class="button__wrapper"><span class="button__text">Подписаться на рассылку</span></span></button>
                            </div>
                            <div class="form__control">
                              <div class="t-base t-base--size--small t-base--color--monochrome-medium">Нажимая кнопку, я&nbsp;соглашаюсь с&nbsp;политикой конфиденциальности</div>
                            </div>
                          </div>
                                  <div class="modal modal-default modal-success">
                                    <div class="modal-default__container">
                                      <div class="modal-default__close"><a class="modal-default__close-btn" href="#close" rel="modal:close"><img class="img-responsive" src="./img/svg/cross.svg" alt=""></a></div>
                                      <div class="modal-default__head">
                                        <h3 class="modal-default__title">Вы успешно подписались на нашу рассылку!</h3>
                                        <div class="modal-default__info">Надеемся на долгосрочное сотрудничество!</div>
                                      </div>
                                      <div class="modal-default__body">
                                        <div class="modal-success__img"><img class="img-responsive" src="./img/don.svg" alt=""></div>
                                      </div>
                                    </div>
                                  </div>
                        </form>
                      </div>
                      <div class="v-ident v-ident--yellow">
                        <div class="t-base t-base--size--medium"><b>Присоединяйтесь!</b></div>
                      </div>
                      <div class="v-ident v-ident--yellow">
                        <div class="footer-main__socials">
                                  <div class="socials">
                                    <div class="socials__social"><a class="socials__link socials__link--instagram" href="#"></a></div>
                                    <div class="socials__social"><a class="socials__link socials__link--vk" href="#"></a></div>
                                    <div class="socials__social"><a class="socials__link socials__link--youtube" href="#"></a></div>
                                    <div class="socials__social"><a class="socials__link socials__link--telegram" href="#"></a></div>
                                    <div class="socials__social"><a class="socials__link socials__link--fb" href="#"></a></div>
                                    <div class="socials__social"><a class="socials__link socials__link--odnoklassniki" href="#"></a></div>
                                  </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
        <div class="footer__small">
          <section class="section">
            <div class="section__wrapper">
              <div class="footer-small">
                <div class="footer-small__row">
                  <div class="footer-small__col footer-small__col--1">
                    <p class="t-base t-base--size--small">© 2001–2019 DON BALLON</p>
                    <p><a class="link link--color--black t-base t-base--size--small" href="https://braind.agency/?utm_source=portfolio&amp;utm_campaign=donballon.ru" target="_blank"><span class="link__text">Политика конфиденциальности</span></a>
                    </p>
                  </div>
                  <div class="footer-small__col footer-small__col--2">
                    <p class="t-base t-base--size--small">Все цены и условия, указанные на данном <br> сайте, не являются публичной офертой.</p>
                  </div>
                  <div class="footer-small__col footer-small__col--3">
                    <p class="t-base t-base--size--small">Мы принимаем к оплате:</p>
                    <div class="footer-small__payments">
                      <div class="footer-small__payment"><img class="img-responsive" src="./img/visa.svg" alt=""></div>
                      <div class="footer-small__payment"><img class="img-responsive" src="./img/mc.svg" alt=""></div>
                      <div class="footer-small__payment"><img class="img-responsive" src="./img/mir.svg" alt=""></div>
                    </div>
                  </div>
                  <div class="footer-small__col footer-small__col--4"><a class="link link--underline t-base t-base--size--small" href="#"><span class="link__text">Старая версия сайта</span></a>
                  </div>
                  <div class="footer-small__col footer-small__col--5">
                    <p class="t-base t-base--size--small"><a class="link link--color--black t-base t-base--size--small" href="https://braind.agency/?utm_source=portfolio&amp;utm_campaign=donballon.ru" target="_blank"><span class="link__text">Сделано в Braind</span></a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
      </footer>
      <div class="mobile-nav">
        <div class="mobile-nav__wrapper">
          <div class="mobile-nav__row">
            <div class="mobile-nav__col"><a class="mobile-nav__button" href="#">
                <div class="mobile-nav__icon mobile-nav__icon--1">
                  <div class="mobile-nav__icon-container"><svg width="29" height="22" viewBox="0 0 29 22" fill="none" xmlns="http://www.w3.org/2000/svg">
<mask id="path-1-outside-1" maskUnits="userSpaceOnUse" x="0" y="0" width="29" height="22" fill="black">
<rect fill="white" width="29" height="22"/>
<path fill-rule="evenodd" clip-rule="evenodd" d="M18.402 2.9409C14.6248 1.58616 11.3922 1.77531 10.9421 2.99141C10.938 3.00234 10.9342 3.01335 10.9306 3.02444L9.18243 7.75923C5.91532 7.48548 3.57796 8.10882 3.09498 9.4172C2.31522 11.5285 6.4019 15.3352 12.9575 17.6862C19.513 20.0382 25.125 19.7104 25.9048 17.5991C26.3884 16.2913 25.0049 14.3331 22.3237 12.473L24.084 7.70555L24.0833 7.7053C24.5325 6.4882 22.1792 4.29565 18.402 2.9409Z"/>
</mask>
<path d="M10.9421 2.99141L9.06645 2.29711L9.06576 2.29898L10.9421 2.99141ZM18.402 2.9409L19.0772 1.05833V1.05833L18.402 2.9409ZM10.9306 3.02444L12.8068 3.71718C12.8163 3.69145 12.8253 3.66553 12.8337 3.63944L10.9306 3.02444ZM9.18243 7.75923L9.01544 9.75224C9.91134 9.82731 10.7472 9.29535 11.0586 8.45197L9.18243 7.75923ZM3.09498 9.4172L4.97111 10.1101L4.97122 10.1098L3.09498 9.4172ZM12.9575 17.6862L13.6328 15.8037L13.6326 15.8036L12.9575 17.6862ZM25.9048 17.5991L24.0289 16.9054L24.0286 16.9062L25.9048 17.5991ZM22.3237 12.473L20.4475 11.7803C20.1317 12.6357 20.4345 13.5965 21.1837 14.1163L22.3237 12.473ZM24.084 7.70555L25.9602 8.39829C26.3385 7.37361 25.8248 6.23491 24.8062 5.84049L24.084 7.70555ZM24.0833 7.7053L22.207 7.01286C21.8289 8.03748 22.3427 9.17599 23.3612 9.57036L24.0833 7.7053ZM12.8177 3.68571C12.6527 4.13149 12.3426 4.20259 12.4995 4.14077C12.6311 4.08894 12.9408 4.01343 13.4692 4.00159C14.5098 3.97826 16.0157 4.20978 17.7268 4.82348L19.0772 1.05833C17.0111 0.317285 15.0121 -0.0340014 13.3796 0.00259018C12.5714 0.020704 11.7525 0.135831 11.0334 0.419157C10.3395 0.692492 9.45655 1.24328 9.06645 2.29711L12.8177 3.68571ZM12.8337 3.63944C12.8289 3.65427 12.8238 3.66908 12.8184 3.68384L9.06576 2.29898C9.05224 2.3356 9.03951 2.37243 9.02755 2.40944L12.8337 3.63944ZM11.0586 8.45197L12.8068 3.71718L9.05445 2.3317L7.30624 7.06648L11.0586 8.45197ZM4.97122 10.1098C4.873 10.3759 4.77668 10.153 5.6174 9.92539C6.37077 9.72139 7.52068 9.627 9.01544 9.75224L9.34943 5.76621C7.57708 5.61771 5.92476 5.69811 4.57191 6.06444C3.30644 6.40711 1.79995 7.15012 1.21873 8.72459L4.97122 10.1098ZM13.6326 15.8036C10.5319 14.6916 8.10176 13.2632 6.5845 11.9497C5.81947 11.2875 5.3638 10.721 5.14174 10.3131C4.90848 9.8846 5.05571 9.88104 4.97111 10.1101L1.21884 8.72431C0.744363 10.009 1.11003 11.2731 1.62857 12.2256C2.15832 13.1987 2.98783 14.1267 3.96645 14.9739C5.93647 16.6794 8.82744 18.3298 12.2823 19.5688L13.6326 15.8036ZM24.0286 16.9062C24.1109 16.6833 24.2111 16.7883 23.7415 16.9734C23.2972 17.1484 22.5724 17.2941 21.5523 17.3169C19.5284 17.3621 16.7331 16.916 13.6328 15.8037L12.2821 19.5687C15.7374 20.8084 19.0258 21.3743 21.6417 21.3159C22.9416 21.2868 24.1757 21.1016 25.2079 20.6949C26.2147 20.2982 27.3087 19.5705 27.7809 18.292L24.0286 16.9062ZM21.1837 14.1163C22.4092 14.9665 23.2239 15.7641 23.6632 16.3909C24.1524 17.089 23.9269 17.1814 24.0289 16.9054L27.7806 18.2927C28.3663 16.7089 27.6908 15.1684 26.9389 14.0954C26.1371 12.9512 24.9195 11.8396 23.4637 10.8297L21.1837 14.1163ZM22.2078 7.01281L20.4475 11.7803L24.1999 13.1658L25.9602 8.39829L22.2078 7.01281ZM23.3612 9.57036L23.3618 9.57062L24.8062 5.84049L24.8055 5.84023L23.3612 9.57036ZM17.7268 4.82348C19.4383 5.43736 20.7405 6.21317 21.5184 6.8867C21.9137 7.22898 22.0968 7.47861 22.1595 7.59377C22.2332 7.72932 22.0402 7.46481 22.207 7.01286L25.9596 8.39774C26.351 7.33724 26.0323 6.34225 25.6731 5.68205C25.3028 5.00146 24.7457 4.39008 24.1367 3.86274C22.9059 2.79704 21.1428 1.79919 19.0772 1.05833L17.7268 4.82348Z" fill="#423B57" mask="url(#path-1-outside-1)" class="blue-fill"/>
<path d="M9 8L9.69763 7.28355L8.62668 6.24072L8.07152 7.62861L9 8ZM22 13L22.9285 13.3714L23.4864 11.9766L21.9843 12.0001L22 13ZM21 15.5L21.5547 16.3321C21.723 16.2198 21.8533 16.0592 21.9285 15.8714L21 15.5ZM8 10.5L7.07152 10.1286L6.97225 10.3768L7.01005 10.6414L8 10.5ZM8.30237 8.71645C10.4235 10.7818 12.296 12.1566 14.4603 12.9818C16.6189 13.8049 18.9796 14.0474 22.0157 13.9999L21.9843 12.0001C19.0561 12.046 16.9877 11.8051 15.1729 11.1131C13.3638 10.4233 11.7185 9.25133 9.69763 7.28355L8.30237 8.71645ZM21.0715 12.6286L20.0715 15.1286L21.9285 15.8714L22.9285 13.3714L21.0715 12.6286ZM20.4453 14.6679C19.9772 14.98 19.0989 15.1537 17.8501 15.0576C16.6424 14.9647 15.2518 14.6317 13.9159 14.127C12.5784 13.6217 11.3457 12.9633 10.4368 12.2517C9.49189 11.5119 9.0593 10.844 8.98995 10.3586L7.01005 10.6414C7.1907 11.906 8.13311 12.9881 9.20384 13.8264C10.3106 14.693 11.7341 15.4408 13.2091 15.998C14.6857 16.5558 16.2638 16.9415 17.6967 17.0517C19.0886 17.1588 20.5228 17.02 21.5547 16.3321L20.4453 14.6679ZM8.92848 10.8714L9.92848 8.37139L8.07152 7.62861L7.07152 10.1286L8.92848 10.8714Z" fill="#423B57" class="blue-fill"/>
</svg>
                  </div>
                </div>
                <div class="mobile-nav__title">Главная</div></a></div>
            <div class="mobile-nav__col"><a class="mobile-nav__button" href="#" data-mobile-menu-open>
                <div class="mobile-nav__icon mobile-nav__icon--2">
                  <div class="mobile-nav__icon-container"><svg width="22" height="17" viewBox="0 0 22 17" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M0 1C0 0.447715 0.447716 0 1 0H17C17.5523 0 18 0.447715 18 1C18 1.55228 17.5523 2 17 2H1C0.447715 2 0 1.55228 0 1ZM0 7C0 6.44772 0.447716 6 1 6H17C17.5523 6 18 6.44772 18 7C18 7.55228 17.5523 8 17 8H1C0.447715 8 0 7.55228 0 7ZM18 13C18 12.4477 17.5523 12 17 12H1C0.447715 12 0 12.4477 0 13C0 13.5523 0.447716 14 1 14H17C17.5523 14 18 13.5523 18 13Z" fill="#423B57" class="blue-fill"/>
<mask id="path-2-outside-1" maskUnits="userSpaceOnUse" x="8" y="3" width="14" height="14" fill="black">
<rect fill="white" x="8" y="3" width="14" height="14"/>
<path fill-rule="evenodd" clip-rule="evenodd" d="M17.9611 13.7746C17.0159 14.5409 15.8116 15 14.5 15C11.4624 15 9 12.5376 9 9.5C9 6.46243 11.4624 4 14.5 4C17.5376 4 20 6.46243 20 9.5C20 10.6849 19.6253 11.7823 18.9879 12.6801L20.5132 14.2053C20.806 14.4982 20.806 14.9731 20.5132 15.266C20.2203 15.5589 19.7454 15.5589 19.4525 15.266L17.9611 13.7746ZM18 9.5C18 11.433 16.433 13 14.5 13C12.567 13 11 11.433 11 9.5C11 7.567 12.567 6 14.5 6C16.433 6 18 7.567 18 9.5Z"/>
</mask>
<path fill-rule="evenodd" clip-rule="evenodd" d="M17.9611 13.7746C17.0159 14.5409 15.8116 15 14.5 15C11.4624 15 9 12.5376 9 9.5C9 6.46243 11.4624 4 14.5 4C17.5376 4 20 6.46243 20 9.5C20 10.6849 19.6253 11.7823 18.9879 12.6801L20.5132 14.2053C20.806 14.4982 20.806 14.9731 20.5132 15.266C20.2203 15.5589 19.7454 15.5589 19.4525 15.266L17.9611 13.7746ZM18 9.5C18 11.433 16.433 13 14.5 13C12.567 13 11 11.433 11 9.5C11 7.567 12.567 6 14.5 6C16.433 6 18 7.567 18 9.5Z" fill="#423B57" class="blue-fill"/>
<path d="M17.9611 13.7746L18.6682 13.0675L18.0312 12.4305L17.3314 12.9978L17.9611 13.7746ZM18.9879 12.6801L18.1725 12.1013L17.6836 12.79L18.2808 13.3872L18.9879 12.6801ZM20.5132 15.266L19.806 14.5589L19.806 14.5589L20.5132 15.266ZM14.5 16C16.0491 16 17.4741 15.4568 18.5909 14.5514L17.3314 12.9978C16.5578 13.625 15.5741 14 14.5 14V16ZM8 9.5C8 13.0899 10.9101 16 14.5 16V14C12.0147 14 10 11.9853 10 9.5H8ZM14.5 3C10.9101 3 8 5.91015 8 9.5H10C10 7.01472 12.0147 5 14.5 5V3ZM21 9.5C21 5.91015 18.0899 3 14.5 3V5C16.9853 5 19 7.01472 19 9.5H21ZM19.8034 13.259C20.5569 12.1976 21 10.899 21 9.5H19C19 10.4707 18.6938 11.367 18.1725 12.1013L19.8034 13.259ZM18.2808 13.3872L19.806 14.9124L21.2203 13.4982L19.6951 11.973L18.2808 13.3872ZM19.806 14.9124C19.7084 14.8148 19.7084 14.6565 19.806 14.5589L21.2203 15.9731C21.9037 15.2897 21.9037 14.1816 21.2203 13.4982L19.806 14.9124ZM19.806 14.5589C19.9037 14.4613 20.062 14.4613 20.1596 14.5589L18.7454 15.9731C19.4288 16.6565 20.5368 16.6565 21.2203 15.9731L19.806 14.5589ZM20.1596 14.5589L18.6682 13.0675L17.254 14.4817L18.7454 15.9731L20.1596 14.5589ZM14.5 14C16.9853 14 19 11.9853 19 9.5H17C17 10.8807 15.8807 12 14.5 12V14ZM10 9.5C10 11.9853 12.0147 14 14.5 14V12C13.1193 12 12 10.8807 12 9.5H10ZM14.5 5C12.0147 5 10 7.01472 10 9.5H12C12 8.11929 13.1193 7 14.5 7V5ZM19 9.5C19 7.01472 16.9853 5 14.5 5V7C15.8807 7 17 8.11929 17 9.5H19Z" fill="white" mask="url(#path-2-outside-1)"/>
<circle cx="14.5" cy="9.5" r="3.5" fill="white"/>
</svg>
                  </div>
                </div>
                <div class="mobile-nav__title">Меню</div></a></div>
            <div class="mobile-nav__col"><a class="mobile-nav__button" href="#">
                <div class="mobile-nav__icon mobile-nav__icon--3">
                  <div class="mobile-nav__icon-container" data-cart-indicator><svg width="23" height="22" viewBox="0 0 23 22" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M8.49289 21C9.00997 21 9.42914 20.5736 9.42914 20.0476C9.42914 19.5216 9.00997 19.0952 8.49289 19.0952C7.97581 19.0952 7.55664 19.5216 7.55664 20.0476C7.55664 20.5736 7.97581 21 8.49289 21Z" class="blue-stroke" fill="#423B57" stroke="#423B57" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M18.7868 21C19.3039 21 19.7231 20.5736 19.7231 20.0476C19.7231 19.5216 19.3039 19.0952 18.7868 19.0952C18.2698 19.0952 17.8506 19.5216 17.8506 20.0476C17.8506 20.5736 18.2698 21 18.7868 21Z" class="blue-stroke" fill="#423B57" stroke="#423B57" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M1 1H4.74501L7.25416 13.7526C7.33978 14.191 7.57427 14.5849 7.9166 14.8652C8.25893 15.1456 8.68728 15.2945 9.12666 15.2859H18.227C18.6664 15.2945 19.0948 15.1456 19.4371 14.8652C19.7794 14.5849 20.0139 14.191 20.0995 13.7526L21.5975 5.76197H5.68126" stroke="#423B57" class="blue-stroke" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
                    <div class="mobile-nav__indicator" data-cart-indicator-count></div>
                  </div>
                </div>
                <div class="mobile-nav__title">Корзина</div></a></div>
            <div class="mobile-nav__col"><a class="mobile-nav__button" href="#">
                <div class="mobile-nav__icon mobile-nav__icon--4">
                  <div class="mobile-nav__icon-container"><svg width="19" height="20" viewBox="0 0 19 20" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M12.8433 11.875C11.7222 11.875 11.1831 12.5 9.34326 12.5C7.50342 12.5 6.96826 11.875 5.84326 11.875C2.94482 11.875 0.593262 14.2266 0.593262 17.125V18.125C0.593262 19.1602 1.43311 20 2.46826 20H16.2183C17.2534 20 18.0933 19.1602 18.0933 18.125V17.125C18.0933 14.2266 15.7417 11.875 12.8433 11.875ZM16.2183 18.125H2.46826V17.125C2.46826 15.2656 3.98389 13.75 5.84326 13.75C6.41357 13.75 7.33936 14.375 9.34326 14.375C11.3628 14.375 12.269 13.75 12.8433 13.75C14.7026 13.75 16.2183 15.2656 16.2183 17.125V18.125ZM9.34326 11.25C12.4487 11.25 14.9683 8.73047 14.9683 5.625C14.9683 2.51953 12.4487 0 9.34326 0C6.23779 0 3.71826 2.51953 3.71826 5.625C3.71826 8.73047 6.23779 11.25 9.34326 11.25ZM9.34326 1.875C11.4097 1.875 13.0933 3.55859 13.0933 5.625C13.0933 7.69141 11.4097 9.375 9.34326 9.375C7.27686 9.375 5.59326 7.69141 5.59326 5.625C5.59326 3.55859 7.27686 1.875 9.34326 1.875Z" fill="#423B57" class="blue-fill"/>
</svg>
                  </div>
                </div>
                <div class="mobile-nav__title">Кабинет</div></a></div>
            <div class="mobile-nav__col"><a class="mobile-nav__button" href="#">
                <div class="mobile-nav__icon mobile-nav__icon--5">
                  <div class="mobile-nav__icon-container"><svg width="19" height="23" viewBox="0 0 19 23" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M9.79333 20C10.3626 20.8221 10.3629 20.822 10.3632 20.8218L10.3639 20.8213L10.3657 20.82L10.3714 20.816L10.3905 20.8026C10.4066 20.7912 10.4294 20.7751 10.4584 20.7542C10.5164 20.7125 10.5994 20.6519 10.7038 20.5737C10.9124 20.4172 11.2071 20.1893 11.5592 19.8983C12.2617 19.3175 13.2006 18.4787 14.1417 17.4477C15.9861 15.4272 18.0072 12.4864 17.9933 9.19784C17.9922 4.67664 14.3148 1 9.79333 1C5.27231 1 1.59456 4.67619 1.59334 9.19325C1.57946 12.4759 3.52247 15.3664 5.34001 17.3716C7.12684 19.343 8.94651 20.6264 9.19492 20.8016C9.203 20.8073 9.20943 20.8118 9.21413 20.8152L9.78595 21.2215L10.3626 20.8221L9.79333 20ZM9.79333 11.8C8.35662 11.8 7.19334 10.6367 7.19334 9.2C7.19334 7.76328 8.35662 6.6 9.79333 6.6C11.2301 6.6 12.3933 7.76328 12.3933 9.2C12.3933 10.6367 11.2301 11.8 9.79333 11.8Z" stroke="#423B57" class="blue-stroke" stroke-width="2"/>
</svg>
                  </div>
                </div>
                <div class="mobile-nav__title">Контакты</div></a></div>
          </div>
        </div>
      </div>
      <div class="mobile-menu" data-mobile-menu>
        <div class="mobile-menu__wrapper">
          <div class="mobile-menu__head">
            <div class="mobile-menu__back-btn" data-mobile-menu-back>
                    <svg class="icon icon--triangle mobile-menu__back-btn-icon">
                      <use xlink:href="./img/sprite.svg#triangle-usage"></use>
                    </svg>
            </div>
            <div class="mobile-menu__title" data-mobile-menu-title>Меню</div>
            <div class="mobile-menu__close" data-mobile-menu-close><img class="img-responsive" src="./img/svg/cross-thin.svg" alt=""></div>
          </div>
          <div class="mobile-menu__menu">
            <ul class="mobile-menu__list">
              <li class="mobile-menu__list-item" data-mobile-menu-parent>
                <div class="mobile-menu__link-wrapper"><span class="mobile-menu__link mobile-menu__link--parent" data-mobile-menu-category-title><span class="mobile-menu__link-text"><b>Шары из латекса</b></span><span class="text-labels"><span class="text-labels__label text-labels__label--color--green">new</span></span></span></div>
                <div class="mobile-menu__child-category" data-mobile-menu-child>
                  <ul class="mobile-menu__list">
                    <li class="mobile-menu__list-item">
                      <div class="mobile-menu__link-wrapper"><a class="mobile-menu__link" href="/"><span class="mobile-menu__link-text">Все товары раздела</span></a></div>
                    </li>
                    <li class="mobile-menu__list-item" data-mobile-menu-parent>
                      <div class="mobile-menu__link-wrapper"><span class="mobile-menu__link mobile-menu__link--parent" data-mobile-menu-category-title><span class="mobile-menu__link-text">Круглые без рисунка</span></span></div>
                      <div class="mobile-menu__child-category" data-mobile-menu-child>
                        <ul class="mobile-menu__list">
                          <li class="mobile-menu__list-item">
                            <div class="mobile-menu__link-wrapper"><a class="mobile-menu__link" href="/"><span class="mobile-menu__link-text">Все товары раздела</span></a></div>
                          </li>
                          <li class="mobile-menu__list-item">
                            <div class="mobile-menu__link-wrapper"><a class="mobile-menu__link" href="/"><span class="mobile-menu__link-text">5 " / 13 см</span></a></div>
                          </li>
                          <li class="mobile-menu__list-item">
                            <div class="mobile-menu__link-wrapper"><a class="mobile-menu__link" href="/"><span class="mobile-menu__link-text">10 " / 25 см</span><span class="text-labels"><span class="text-labels__label text-labels__label--color--green">new</span></span></a></div>
                          </li>
                          <li class="mobile-menu__list-item">
                            <div class="mobile-menu__link-wrapper"><a class="mobile-menu__link" href="/"><span class="mobile-menu__link-text">10 " / 25 см</span></a></div>
                          </li>
                        </ul>
                      </div>
                    </li>
                    <li class="mobile-menu__list-item" data-mobile-menu-parent>
                      <div class="mobile-menu__link-wrapper"><span class="mobile-menu__link mobile-menu__link--parent" data-mobile-menu-category-title><span class="mobile-menu__link-text">Сердца</span></span></div>
                      <div class="mobile-menu__child-category" data-mobile-menu-child>
                        <ul class="mobile-menu__list">
                          <li class="mobile-menu__list-item">
                            <div class="mobile-menu__link-wrapper"><a class="mobile-menu__link" href="/"><span class="mobile-menu__link-text">Все товары раздела</span></a></div>
                          </li>
                          <li class="mobile-menu__list-item">
                            <div class="mobile-menu__link-wrapper"><a class="mobile-menu__link" href="/"><span class="mobile-menu__link-text">Сердца 6 "</span></a></div>
                          </li>
                          <li class="mobile-menu__list-item">
                            <div class="mobile-menu__link-wrapper"><a class="mobile-menu__link" href="/"><span class="mobile-menu__link-text">Сердца 12 "</span></a></div>
                          </li>
                          <li class="mobile-menu__list-item">
                            <div class="mobile-menu__link-wrapper"><a class="mobile-menu__link" href="/"><span class="mobile-menu__link-text">Сердца 16 "</span></a></div>
                          </li>
                          <li class="mobile-menu__list-item">
                            <div class="mobile-menu__link-wrapper"><a class="mobile-menu__link" href="/"><span class="mobile-menu__link-text">Сердца с рисунком</span></a></div>
                          </li>
                        </ul>
                      </div>
                    </li>
                    <li class="mobile-menu__list-item" data-mobile-menu-parent>
                      <div class="mobile-menu__link-wrapper"><span class="mobile-menu__link mobile-menu__link--parent" data-mobile-menu-category-title><span class="mobile-menu__link-text"> Круглые с рисунком</span></span></div>
                      <div class="mobile-menu__child-category" data-mobile-menu-child>
                        <ul class="mobile-menu__list">
                          <li class="mobile-menu__list-item">
                            <div class="mobile-menu__link-wrapper"><a class="mobile-menu__link" href="/"><span class="mobile-menu__link-text">Все товары раздела</span></a></div>
                          </li>
                          <li class="mobile-menu__list-item">
                            <div class="mobile-menu__link-wrapper"><a class="mobile-menu__link" href="/"><span class="mobile-menu__link-text">День рождения</span></a></div>
                          </li>
                          <li class="mobile-menu__list-item">
                            <div class="mobile-menu__link-wrapper"><a class="mobile-menu__link" href="/"><span class="mobile-menu__link-text">Аэродизайн</span></a></div>
                          </li>
                          <li class="mobile-menu__list-item">
                            <div class="mobile-menu__link-wrapper"><a class="mobile-menu__link" href="/"><span class="mobile-menu__link-text"> Детские</span></a></div>
                          </li>
                          <li class="mobile-menu__list-item">
                            <div class="mobile-menu__link-wrapper"><a class="mobile-menu__link" href="/"><span class="mobile-menu__link-text"> Новый год</span><span class="text-labels"><span class="text-labels__label text-labels__label--color--green">new</span></span></a></div>
                          </li>
                          <li class="mobile-menu__list-item">
                            <div class="mobile-menu__link-wrapper"><a class="mobile-menu__link" href="/"><span class="mobile-menu__link-text"> Любовь и свадьба</span></a></div>
                          </li>
                          <li class="mobile-menu__list-item">
                            <div class="mobile-menu__link-wrapper"><a class="mobile-menu__link" href="/"><span class="mobile-menu__link-text"> Разное</span></a></div>
                          </li>
                          <li class="mobile-menu__list-item">
                            <div class="mobile-menu__link-wrapper"><a class="mobile-menu__link" href="/"><span class="mobile-menu__link-text"> С цифрами</span></a></div>
                          </li>
                          <li class="mobile-menu__list-item">
                            <div class="mobile-menu__link-wrapper"><a class="mobile-menu__link" href="/"><span class="mobile-menu__link-text">Праздничная тематика</span></a></div>
                          </li>
                        </ul>
                      </div>
                    </li>
                    <li class="mobile-menu__list-item" data-mobile-menu-parent>
                      <div class="mobile-menu__link-wrapper"><span class="mobile-menu__link mobile-menu__link--parent" data-mobile-menu-category-title><span class="mobile-menu__link-text"> Шары для упаковки</span></span></div>
                      <div class="mobile-menu__child-category" data-mobile-menu-child>
                        <ul class="mobile-menu__list">
                          <li class="mobile-menu__list-item">
                            <div class="mobile-menu__link-wrapper"><a class="mobile-menu__link" href="/"><span class="mobile-menu__link-text">Все товары раздела</span></a></div>
                          </li>
                          <li class="mobile-menu__list-item">
                            <div class="mobile-menu__link-wrapper"><a class="mobile-menu__link" href="/"><span class="mobile-menu__link-text"> С рисунком</span></a></div>
                          </li>
                          <li class="mobile-menu__list-item">
                            <div class="mobile-menu__link-wrapper"><a class="mobile-menu__link" href="/"><span class="mobile-menu__link-text">Без рисунка</span></a></div>
                          </li>
                        </ul>
                      </div>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="mobile-menu__list-item" data-mobile-menu-parent>
                <div class="mobile-menu__link-wrapper"><span class="mobile-menu__link mobile-menu__link--parent" data-mobile-menu-category-title><span class="mobile-menu__link-text"> <b>Шары из Фольги</b></span></span></div>
                <div class="mobile-menu__child-category" data-mobile-menu-child>
                  <ul class="mobile-menu__list">
                    <li class="mobile-menu__list-item">
                      <div class="mobile-menu__link-wrapper"><a class="mobile-menu__link" href="/"><span class="mobile-menu__link-text">Все товары раздела</span></a></div>
                    </li>
                    <li class="mobile-menu__list-item" data-mobile-menu-parent>
                      <div class="mobile-menu__link-wrapper"><span class="mobile-menu__link mobile-menu__link--parent" data-mobile-menu-category-title><span class="mobile-menu__link-text"> Круглые без рисунка</span></span></div>
                      <div class="mobile-menu__child-category" data-mobile-menu-child>
                        <ul class="mobile-menu__list">
                          <li class="mobile-menu__list-item">
                            <div class="mobile-menu__link-wrapper"><a class="mobile-menu__link" href="/"><span class="mobile-menu__link-text">Все товары раздела</span></a></div>
                          </li>
                          <li class="mobile-menu__list-item">
                            <div class="mobile-menu__link-wrapper"><a class="mobile-menu__link" href="/"><span class="mobile-menu__link-text">5 " / 13 см</span></a></div>
                          </li>
                        </ul>
                      </div>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="mobile-menu__list-item" data-mobile-menu-parent>
                <div class="mobile-menu__link-wrapper"><span class="mobile-menu__link mobile-menu__link--parent" data-mobile-menu-category-title><span class="mobile-menu__link-text"><b>Оборудование для шаров</b></span></span></div>
                <div class="mobile-menu__child-category" data-mobile-menu-child>
                  <ul class="mobile-menu__list">
                    <li class="mobile-menu__list-item">
                      <div class="mobile-menu__link-wrapper"><a class="mobile-menu__link" href="/"><span class="mobile-menu__link-text">Все товары раздела</span></a></div>
                    </li>
                    <li class="mobile-menu__list-item" data-mobile-menu-parent>
                      <div class="mobile-menu__link-wrapper"><span class="mobile-menu__link mobile-menu__link--parent" data-mobile-menu-category-title><span class="mobile-menu__link-text">Круглые без рисунка</span></span></div>
                      <div class="mobile-menu__child-category" data-mobile-menu-child>
                        <ul class="mobile-menu__list">
                          <li class="mobile-menu__list-item">
                            <div class="mobile-menu__link-wrapper"><a class="mobile-menu__link" href="/"><span class="mobile-menu__link-text">Все товары раздела</span></a></div>
                          </li>
                          <li class="mobile-menu__list-item">
                            <div class="mobile-menu__link-wrapper"><a class="mobile-menu__link" href="/"><span class="mobile-menu__link-text">5 " / 13 см</span></a></div>
                          </li>
                        </ul>
                      </div>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="mobile-menu__list-item" data-mobile-menu-parent>
                <div class="mobile-menu__link-wrapper"><span class="mobile-menu__link mobile-menu__link--parent" data-mobile-menu-category-title><span class="mobile-menu__link-text"><b>Товары для праздника</b></span></span></div>
                <div class="mobile-menu__child-category" data-mobile-menu-child>
                  <ul class="mobile-menu__list">
                    <li class="mobile-menu__list-item">
                      <div class="mobile-menu__link-wrapper"><a class="mobile-menu__link" href="/"><span class="mobile-menu__link-text">Все товары раздела</span></a></div>
                    </li>
                    <li class="mobile-menu__list-item" data-mobile-menu-parent>
                      <div class="mobile-menu__link-wrapper"><span class="mobile-menu__link mobile-menu__link--parent" data-mobile-menu-category-title><span class="mobile-menu__link-text">Круглые без рисунка</span></span></div>
                      <div class="mobile-menu__child-category" data-mobile-menu-child>
                        <ul class="mobile-menu__list">
                          <li class="mobile-menu__list-item">
                            <div class="mobile-menu__link-wrapper"><a class="mobile-menu__link" href="/"><span class="mobile-menu__link-text">Все товары раздела</span></a></div>
                          </li>
                          <li class="mobile-menu__list-item">
                            <div class="mobile-menu__link-wrapper"><a class="mobile-menu__link" href="/"><span class="mobile-menu__link-text">5 " / 13 см</span></a></div>
                          </li>
                        </ul>
                      </div>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="mobile-menu__list-item" data-mobile-menu-parent>
                <div class="mobile-menu__link-wrapper"><span class="mobile-menu__link mobile-menu__link--parent" data-mobile-menu-category-title><span class="mobile-menu__link-text"><b>Карнавальные аксессуары</b></span></span></div>
                <div class="mobile-menu__child-category" data-mobile-menu-child>
                  <ul class="mobile-menu__list">
                    <li class="mobile-menu__list-item">
                      <div class="mobile-menu__link-wrapper"><a class="mobile-menu__link" href="/"><span class="mobile-menu__link-text">Все товары раздела</span></a></div>
                    </li>
                    <li class="mobile-menu__list-item" data-mobile-menu-parent>
                      <div class="mobile-menu__link-wrapper"><span class="mobile-menu__link mobile-menu__link--parent" data-mobile-menu-category-title><span class="mobile-menu__link-text">Круглые без рисунка</span></span></div>
                      <div class="mobile-menu__child-category" data-mobile-menu-child>
                        <ul class="mobile-menu__list">
                          <li class="mobile-menu__list-item">
                            <div class="mobile-menu__link-wrapper"><a class="mobile-menu__link" href="/"><span class="mobile-menu__link-text">Все товары раздела</span></a></div>
                          </li>
                          <li class="mobile-menu__list-item">
                            <div class="mobile-menu__link-wrapper"><a class="mobile-menu__link" href="/"><span class="mobile-menu__link-text">5 " / 13 см</span></a></div>
                          </li>
                        </ul>
                      </div>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="mobile-menu__list-item" data-mobile-menu-parent>
                <div class="mobile-menu__link-wrapper"><span class="mobile-menu__link mobile-menu__link--parent" data-mobile-menu-category-title><span class="mobile-menu__link-text"><b>Праздничная упаковка</b></span></span></div>
                <div class="mobile-menu__child-category" data-mobile-menu-child>
                  <ul class="mobile-menu__list">
                    <li class="mobile-menu__list-item">
                      <div class="mobile-menu__link-wrapper"><a class="mobile-menu__link" href="/"><span class="mobile-menu__link-text">Все товары раздела</span></a></div>
                    </li>
                    <li class="mobile-menu__list-item" data-mobile-menu-parent>
                      <div class="mobile-menu__link-wrapper"><span class="mobile-menu__link mobile-menu__link--parent" data-mobile-menu-category-title><span class="mobile-menu__link-text">Круглые без рисунка</span></span></div>
                      <div class="mobile-menu__child-category" data-mobile-menu-child>
                        <ul class="mobile-menu__list">
                          <li class="mobile-menu__list-item">
                            <div class="mobile-menu__link-wrapper"><a class="mobile-menu__link" href="/"><span class="mobile-menu__link-text">Все товары раздела</span></a></div>
                          </li>
                          <li class="mobile-menu__list-item">
                            <div class="mobile-menu__link-wrapper"><a class="mobile-menu__link" href="/"><span class="mobile-menu__link-text">5 " / 13 см</span></a></div>
                          </li>
                        </ul>
                      </div>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="mobile-menu__list-item" data-mobile-menu-parent>
                <div class="mobile-menu__link-wrapper"><span class="mobile-menu__link mobile-menu__link--parent" data-mobile-menu-category-title><span class="mobile-menu__link-text">Покупателям</span></span></div>
                <div class="mobile-menu__child-category" data-mobile-menu-child>
                  <ul class="mobile-menu__list">
                    <li class="mobile-menu__list-item">
                      <div class="mobile-menu__link-wrapper"><a class="mobile-menu__link" href="/"><span class="mobile-menu__link-text">Статьи</span></a></div>
                    </li>
                    <li class="mobile-menu__list-item">
                      <div class="mobile-menu__link-wrapper"><a class="mobile-menu__link" href="/"><span class="mobile-menu__link-text">Бизнесу</span></a></div>
                    </li>
                    <li class="mobile-menu__list-item">
                      <div class="mobile-menu__link-wrapper"><a href="/"><span class="mobile-menu__link-text">Расход гелия</span></a></div>
                    </li>
                    <li class="mobile-menu__list-item">
                      <div class="mobile-menu__link-wrapper"><a href="/"><span class="mobile-menu__link-text">Услуги в магазинах</span></a></div>
                    </li>
                    <li class="mobile-menu__list-item">
                      <div class="mobile-menu__link-wrapper"><a href="/"><span class="mobile-menu__link-text">Сертификаты гелия</span></a></div>
                    </li>
                    <li class="mobile-menu__list-item">
                      <div class="mobile-menu__link-wrapper"><a href="/"><span class="mobile-menu__link-text">Гарантия и возврат</span></a></div>
                    </li>
                    <li class="mobile-menu__list-item">
                      <div class="mobile-menu__link-wrapper"><a href="/"><span class="mobile-menu__link-text">Политика конфиденциальности</span></a></div>
                    </li>
                    <li class="mobile-menu__list-item">
                      <div class="mobile-menu__link-wrapper"><a href="/"><span class="mobile-menu__link-text">Пользовательское соглашение</span></a></div>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="mobile-menu__list-item" data-mobile-menu-parent>
                <div class="mobile-menu__link-wrapper"><span class="mobile-menu__link mobile-menu__link--parent" data-mobile-menu-category-title><span class="mobile-menu__link-text">Доставка и оплата</span></span></div>
                <div class="mobile-menu__child-category" data-mobile-menu-child>
                  <ul class="mobile-menu__list">
                    <li class="mobile-menu__list-item">
                      <div class="mobile-menu__link-wrapper"><a class="mobile-menu__link" href="/"><span class="mobile-menu__link-text">Москва и МО</span></a></div>
                    </li>
                    <li class="mobile-menu__list-item">
                      <div class="mobile-menu__link-wrapper"><a class="mobile-menu__link" href="/"><span class="mobile-menu__link-text">Санкт-Перетбург и ЛО</span></a></div>
                    </li>
                    <li class="mobile-menu__list-item">
                      <div class="mobile-menu__link-wrapper"><a class="mobile-menu__link" href="/"><span class="mobile-menu__link-text">Россия и СНГ</span></a></div>
                    </li>
                    <li class="mobile-menu__list-item">
                      <div class="mobile-menu__link-wrapper"><a class="mobile-menu__link" href="/"><span class="mobile-menu__link-text">Самовывоз</span></a></div>
                    </li>
                    <li class="mobile-menu__list-item">
                      <div class="mobile-menu__link-wrapper"><a class="mobile-menu__link" href="/"><span class="mobile-menu__link-text">Условия бесплатной доставки по&nbsp;регионам</span></a></div>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="mobile-menu__list-item" data-mobile-menu-parent>
                <div class="mobile-menu__link-wrapper"><span class="mobile-menu__link mobile-menu__link--parent" data-mobile-menu-category-title><span class="mobile-menu__link-text">Скидки</span></span></div>
                <div class="mobile-menu__child-category" data-mobile-menu-child>
                  <ul class="mobile-menu__list">
                    <li class="mobile-menu__list-item">
                      <div class="mobile-menu__link-wrapper"><a class="mobile-menu__link" href="/"><span class="mobile-menu__link-text">Разовая скидка</span></a></div>
                    </li>
                    <li class="mobile-menu__list-item">
                      <div class="mobile-menu__link-wrapper"><a class="mobile-menu__link" href="/"><span class="mobile-menu__link-text">Накопительная скидка</span></a></div>
                    </li>
                    <li class="mobile-menu__list-item">
                      <div class="mobile-menu__link-wrapper"><a class="mobile-menu__link" href="/"><span class="mobile-menu__link-text">Условия дистрибьютора</span></a></div>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="mobile-menu__list-item" data-mobile-menu-parent>
                <div class="mobile-menu__link-wrapper"><span class="mobile-menu__link mobile-menu__link--parent" data-mobile-menu-category-title><span class="mobile-menu__link-text">О компании</span></span></div>
                <div class="mobile-menu__child-category" data-mobile-menu-child>
                  <ul class="mobile-menu__list">
                    <li class="mobile-menu__list-item">
                      <div class="mobile-menu__link-wrapper"><a class="mobile-menu__link" href="/"><span class="mobile-menu__link-text">Дон Баллон</span></a></div>
                    </li>
                    <li class="mobile-menu__list-item">
                      <div class="mobile-menu__link-wrapper"><a class="mobile-menu__link" href="/"><span class="mobile-menu__link-text"> Новости</span></a></div>
                    </li>
                    <li class="mobile-menu__list-item">
                      <div class="mobile-menu__link-wrapper"><a class="mobile-menu__link" href="/"><span class="mobile-menu__link-text"> Производители</span></a></div>
                    </li>
                    <li class="mobile-menu__list-item">
                      <div class="mobile-menu__link-wrapper"><a class="mobile-menu__link" href="/"><span class="mobile-menu__link-text"> Сотрудничество</span></a></div>
                    </li>
                    <li class="mobile-menu__list-item">
                      <div class="mobile-menu__link-wrapper"><a class="mobile-menu__link" href="/"><span class="mobile-menu__link-text"> Рассылка</span></a></div>
                    </li>
                    <li class="mobile-menu__list-item">
                      <div class="mobile-menu__link-wrapper"><a class="mobile-menu__link" href="/"><span class="mobile-menu__link-text"> Контакты</span></a></div>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="mobile-menu__list-item">
                <div class="mobile-menu__link-wrapper"><a class="mobile-menu__link" href="/"><span class="mobile-menu__link-text"> Контакты</span></a></div>
              </li>
              <li class="mobile-menu__list-item" data-mobile-menu-parent>
                <div class="mobile-menu__link-wrapper"><span class="mobile-menu__link mobile-menu__link--parent" data-mobile-menu-category-title><span class="mobile-menu__link-text">Выбор версии сайта</span></span></div>
                <div class="mobile-menu__child-category" data-mobile-menu-child>
                  <ul class="mobile-menu__list">
                    <li class="mobile-menu__list-item">
                      <div class="mobile-menu__link-wrapper"><a class="mobile-menu__link is-current" href="/"><span class="mobile-menu__link-text">Оптовый сайт</span></a></div>
                    </li>
                    <li class="mobile-menu__list-item">
                      <div class="mobile-menu__link-wrapper"><a class="mobile-menu__link" href="/"><span class="mobile-menu__link-text">Магазин Сокольники</span></a></div>
                    </li>
                    <li class="mobile-menu__list-item">
                      <div class="mobile-menu__link-wrapper"><a class="mobile-menu__link" href="/"><span class="mobile-menu__link-text">Магазин Полежаевская</span></a></div>
                    </li>
                    <li class="mobile-menu__list-item">
                      <div class="mobile-menu__link-wrapper"><a class="mobile-menu__link" href="/"><span class="mobile-menu__link-text">Старый сайт</span></a></div>
                    </li>
                  </ul>
                </div>
              </li>
            </ul>
          </div>
          <div class="mobile-menu__search">
            <div class="header-search input-form" data-header-search>
              <form class="input-form__wrapper">
                <div class="header-search__select-container custom-select" data-custom-select><a class="button header-search__button button--color--orange-light button--weight--regular" href="#" data-custom-select-button="">
                    <div class="button__wrapper">
                      <div class="button__text" data-custom-select-button-text>Везде</div>
                                  <svg class="icon icon--triangle button__icon">
                                    <use xlink:href="./img/sprite.svg#triangle-usage"></use>
                                  </svg>
                    </div></a>
                  <select class="custom-select__select" name="SEARCH_TYPE" data-custom-select-select>
                    <option value="1">Везде</option>
                    <option value="2">По артикулу</option>
                    <option value="3">По названию</option>
                    <option value="4">По названию и арикулу</option>
                  </select>
                  <div class="custom-select__list header-search__custom-select-list" data-custom-select-list>
                    <ul class="custom-select__options">
                      <li class="custom-select__option"><a class="link link--color--black t-base t-base--size--medium custom-select__option-link is-selected" href="javascript;;" data-custom-select-value="1"><span class="link__text">Везде</span></a>
                      </li>
                      <li class="custom-select__option"><a class="link link--color--black t-base t-base--size--medium custom-select__option-link" href="javascript;;" data-custom-select-value="2"><span class="link__text">По артикулу</span></a>
                      </li>
                      <li class="custom-select__option"><a class="link link--color--black t-base t-base--size--medium custom-select__option-link" href="javascript;;" data-custom-select-value="3"><span class="link__text">По названию</span></a>
                      </li>
                      <li class="custom-select__option"><a class="link link--color--black t-base t-base--size--medium custom-select__option-link" href="javascript;;" data-custom-select-value="4"><span class="link__text">По названию и арикулу</span></a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="input-form__input">
                  <input name="search" type="text" placeholder="Искать">
                </div>
                <div class="input-form__submit">
                              <button class="button input-form__button button--color--red" type="submit"><span class="button__wrapper">
                                                  <svg class="icon icon--loupe button__icon ">
                                                    <use xlink:href="./img/sprite.svg#loupe-usage"></use>
                                                  </svg></span></button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="float-button float-button--to-top" data-to-top>
        <div class="float-button__wrapper">
          <div class="float-button__icon">
                            <svg class="icon icon--chevron-right float-button__icon-chevron">
                              <use xlink:href="./img/sprite.svg#chevron-right-usage"></use>
                            </svg>
          </div>
          <div class="float-button__don"><img src="./img/flying-don.svg" alt=""></div>
        </div>
      </div>
      <div class="float-button float-button--social">
        <div class="float-button__wrapper">
          <div class="float-button__icon">
                            <svg class="icon icon--chat">
                              <use xlink:href="./img/sprite.svg#chat-usage"></use>
                            </svg>
          </div>
          <div class="float-button__socials"><a class="float-button__socials-button float-button__socials-button--skype" href="#">
                              <svg class="icon icon--skype">
                                <use xlink:href="./img/sprite.svg#skype-usage"></use>
                              </svg></a><a class="float-button__socials-button float-button__socials-button--whatsapp" href="#">
                              <svg class="icon icon--whatsapp">
                                <use xlink:href="./img/sprite.svg#whatsapp-usage"></use>
                              </svg></a><a class="float-button__socials-button float-button__socials-button--viber" href="#">
                              <svg class="icon icon--viber">
                                <use xlink:href="./img/sprite.svg#viber-usage"></use>
                              </svg></a><a class="float-button__socials-button float-button__socials-button--jivosite" onclick="jivo_api.open();">
                              <svg class="icon icon--jivosite">
                                <use xlink:href="./img/sprite.svg#jivosite-usage"></use>
                              </svg></a></div>
        </div>
      </div>
    </div>
    <script>
      setTimeout(function(){
      	var elem = document.createElement('script');
      	elem.type = 'text/javascript';
      	elem.src = '////api-maps.yandex.ru/2.1/?lang=ru_RU&apikey=399e5f97-64d7-40e2-90f0-c4efe671ab16&onload=getYaMap';
      	document.getElementsByTagName('body')[0].appendChild(elem);
      }, 2000);

      function getYaMap(){
      	document.dispatchEvent(new Event('ymaps-ready'));
      	window.ymapsReady = true;
      }
    </script>
    <script>
      window.presenceCountries = [
      	{
      		id: 1,
      		active: true,
      		name: 'Россия',
      		iso3166: 'RU',
      		regions: [
      			{
      				id: "1",
      				name: "Алтайский край",
      				iso3166: "RU-ALT",
      				active: false,
      				managers: [
      					{
      						id: "1",
      						title: "Менеджер по продажам в Алтайском крае",
      						avatar: "https://via.placeholder.com/200",
      						name: 'Муравьёв Назар',
      						email: 'nazar@test.test',
      						phone: '+74955152809',
      						phoneFormatted: '+7 (495) 515-28-09',
      						additionalPhone: "102",
      						active: true
      					},

      					{
      						id: "2",
      						title: "Менеджер по продажам в Алтайском крае",
      						avatar: "https://via.placeholder.com/200",
      						name: 'Савенко Пётр',
      						email: 'petr@test.test',
      						phone: '+74955153819',
      						phoneFormatted: '+7 (495) 515-38-19',
      						additionalPhone: "102",
      						active: false
      					}
      				],
      				deliveryParams: [
      					'Бесплатная доставка от&nbsp;30&nbsp;000&nbsp;<span class="rouble-sign">₽</span>',
      					'Минимальный заказ с&nbsp;учётом скидок&nbsp;&mdash; 5&nbsp;000&nbsp;<span class="rouble-sign">₽</span>',
      					'Доставка ТК&nbsp;от&nbsp;4&nbsp;дней',
      					'EMS Почта России&nbsp;&mdash; от&nbsp;4&nbsp;дней',
      					'Доставка курьером&nbsp;&mdash; от&nbsp;5&nbsp;000&nbsp;<span class="rouble-sign">₽</span>'
      				]
      			},
      			{
      				id: "2",
      				name: "Амурская область",
      				iso3166: "RU-AMU",
      				active: false,
      				managers: [
      					{
      						id: "1",
      						title: "Менеджер по продажам в Амурской области",
      						avatar: "https://via.placeholder.com/200",
      						name: 'Блохин Ярослав',
      						email: 'blohin@test.test',
      						phone: '+74955152809',
      						phoneFormatted: '+7 (495) 515-28-09',
      						additionalPhone: "102",
      						active: true
      					}
      				],
      				deliveryParams: [
      					'Бесплатная доставка от&nbsp;30&nbsp;000&nbsp;<span class="rouble-sign">₽</span>',
      					'Минимальный заказ с&nbsp;учётом скидок&nbsp;&mdash; 5&nbsp;000&nbsp;<span class="rouble-sign">₽</span>',
      					'Доставка ТК&nbsp;от&nbsp;4&nbsp;дней',
      					'EMS Почта России&nbsp;&mdash; от&nbsp;4&nbsp;дней',
      					'Доставка курьером&nbsp;&mdash; от&nbsp;5&nbsp;000&nbsp;<span class="rouble-sign">₽</span>'
      				]
      			},
      			{
      				id: "3",
      				name: "Архангельская область",
      				iso3166: "RU-ARK",
      				active: false
      			},
      			{
      				id: "4",
      				name: "Астраханская область",
      				iso3166: "RU-AST",
      				active: false
      			},
      			{
      				id: "5",
      				name: "Белгородская область",
      				iso3166: "RU-BEL",
      				active: false
      			},
      			{
      				id: "6",
      				name: "Брянская область",
      				iso3166: "RU-BRY",
      				active: false
      			},
      			{
      				id: "7",
      				name: "Владимирская область",
      				iso3166: "RU-VLA",
      				active: false
      			},
      			{
      				id: "8",
      				name: "Волгоградская область",
      				iso3166: "RU-VGG",
      				active: false
      			},
      			{
      				id: "9",
      				name: "Вологодская область",
      				iso3166: "RU-VLG",
      				active: false
      			},
      			{
      				id: "10",
      				name: "Воронежская область",
      				iso3166: "RU-VOR",
      				active: false
      			},
      			{
      				id: "12",
      				name: "Еврейская автономная область",
      				iso3166: "RU-YEV",
      				active: false
      			},
      			{
      				id: "13",
      				name: "Забайкальский край",
      				iso3166: "RU-ZAB",
      				active: false
      			},
      			{
      				id: "14",
      				name: "Ивановская область",
      				iso3166: "RU-IVA",
      				active: false
      			},
      			{
      				id: "15",
      				name: "Иркутская область",
      				iso3166: "RU-IRK",
      				active: false
      			},
      			{
      				id: "16",
      				name: "Кабардино-Балкарская Республика",
      				iso3166: "RU-KB",
      				active: false
      			},
      			{
      				id: "17",
      				name: "Калининградская область",
      				iso3166: "RU-KGD",
      				active: false
      			},
      			{
      				id: "18",
      				name: "Калужская область",
      				iso3166: "RU-KLU",
      				active: false
      			},
      			{
      				id: "19",
      				name: "Камчатский край",
      				iso3166: "RU-KAM",
      				active: false
      			},
      		]
      	},
      	{
      		id: 2,
      		active: false,
      		name: 'Белоруссия',
      		iso3166: 'BY',
      		managers: [
      			{
      				id: "1",
      				title: "Менеджер по продажам в Белоруссии",
      				avatar: "https://via.placeholder.com/200",
      				name: 'Блохин Ярослав',
      				email: 'blohin@test.test',
      				phone: '+74955152809',
      				phoneFormatted: '+7 (495) 515-28-09',
      				additionalPhone: "102",
      				active: true
      			}
      		],
      		deliveryParams: [
      			'Бесплатная доставка от&nbsp;30&nbsp;000&nbsp;<span class="rouble-sign">₽</span>',
      			'Минимальный заказ с&nbsp;учётом скидок&nbsp;&mdash; 5&nbsp;000&nbsp;<span class="rouble-sign">₽</span>',
      			'Доставка ТК&nbsp;от&nbsp;4&nbsp;дней',
      			'EMS Почта России&nbsp;&mdash; от&nbsp;4&nbsp;дней',
      			'Доставка курьером&nbsp;&mdash; от&nbsp;5&nbsp;000&nbsp;<span class="rouble-sign">₽</span>'
      		]
      		//- regions: [
      		//- 	{
      		//- 		id: "20",
      		//- 		name: "Витебская область",
      		//- 		iso3166: "BY-VI",
      		//- 		active: false
      		//- 	},
      		//- 	{
      		//- 		id: "21",
      		//- 		name: "Могилёвская область",
      		//- 		iso3166: "BY-MA",
      		//- 		active: false
      		//- 	},
      		//- ]
      	}
      ]
    </script>
    <script>
      window.inCart = [
      	{
      		id: 111111,
      		count: 4
      	},

      	{
      		id: 222222,
      		count: 6
      	}
      ];

      window.inWish = [
      	{
      		id: 444444,
      	},
      	{
      		id: 101,
      	},
      	{
      		id: 102,
      	},
      	{
      		id: 103,
      	},
      	{
      		id: 104,
      	},
      	{
      		id: 105,
      	}
      ];
    </script>

    <script type="text/javascript">
      document.addEventListener('DOMContentLoaded', function(e) {
      	window.loadModal({
      		url: '/modals/success-reset.html',
      		urlParam: 'success_change_password=Y'
      	})
      })
    </script><script src="//code.jivosite.com/widget.js" data-jv-id="qLzjrvjKuf" async></script>
  </body>
</html>

 <?
 use \Bitrix\Main\Page\Asset;
 Asset::getInstance()->addJs("/local/templates/main/js/main.js");
 Asset::getInstance()->addCss("/local/templates/main/styles/main.css");
 ?>
