<div class="rewiew-modal js-modal js-modal-rewiew" style="display: none;">
    <div class="rewiew-modal__scroll-container">
        <div class="rewiew-modal__form">
            <h2 class="rewiew-modal__title">
                Оставьте ваш отзыв
            </h2>
            <div class="rewiew-modal__text">
                <p>
                    Нам важен каждый отзыв. <br>
                    Ведь именно Вы делаете нас лучше.
                </p>
            </div>
            <form action="" class="form js-form">
                <div class="form__row">
                    <div class="form__half rewiew-modal__half">
                        <input type="text" class="form__input rewiew-modal__input" name="rewiewName"
                            placeholder="Ваше имя*" data-required>
                    </div>
                    <div class="form__half">
                        <input type="text" class="form__input rewiew-modal__input js-mask-phone" name="rewiewPhone"
                            placeholder="Ваш телефон*" data-required>
                    </div>
                </div>
                <textarea name="rewiewText" class="form__input rewiew-modal__textarea"
                    placeholder="Ваш отзыв*" data-required></textarea>
                <button type="submit" class="btn btn_fill form__submit rewiew-modal__submit js-submit">
                    Оставить отзыв
                </button>
            </form>
            <button class="rewiew-modal__close js-close">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M15.7071 1.70713C16.0976 1.3166 16.0976 0.683436 15.7071 0.292912C15.3166 -0.0976123 14.6834 -0.0976121 14.2929 0.292912L15.7071 1.70713ZM0.292893 14.2929C-0.0976311 14.6834 -0.097631 15.3166 0.292893 15.7071C0.683418 16.0977 1.31658 16.0977 1.70711 15.7071L0.292893 14.2929ZM14.2929 15.7071C14.6834 16.0976 15.3166 16.0976 15.7071 15.7071C16.0976 15.3166 16.0976 14.6834 15.7071 14.2929L14.2929 15.7071ZM1.70711 0.292893C1.31658 -0.0976311 0.683417 -0.0976311 0.292893 0.292893C-0.0976311 0.683417 -0.0976311 1.31658 0.292893 1.70711L1.70711 0.292893ZM14.2929 0.292912L0.292893 14.2929L1.70711 15.7071L15.7071 1.70713L14.2929 0.292912ZM15.7071 14.2929L1.70711 0.292893L0.292893 1.70711L14.2929 15.7071L15.7071 14.2929Z"
                        fill="#C9D1D8" />
                </svg>
            </button>

            <div class="rewiew-modal__success-message" style="display: none;">
                <img src="<?php get_uri('img/svg/logo-s.svg')?>" width="65" height="47" class="rewiew-modal__success-logo">
                <h2 class="rewiew-modal__success-title">
                    Спасибо за отзыв
                </h2>
                <div class="rewiew-modal__success-text">
                    <p>
                        Ваше мнение очень важно для нас.
                    </p>
                </div>
            </div>

        </div>
    </div>
</div>