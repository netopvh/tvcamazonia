/** RUBY REACTION */
var RB_REACTION = (function (Module, $) {
        "use strict";

        Module.init = function () {
            this.ajaxURL = foxizCoreParams.ajaxurl || '';
            this.personailizeUID = FOXIZ_CORE_SCRIPT.personailizeUID;
            this._body = $('body');
            this.isProgress = false;
            this.syncReactLayout();
            this.reactionToggle();
        };

        /** like key */
        Module.getReactionKey = function (id) {
            return this.personailizeUID + '-react-' + id;
        }

        Module.setStorage = function (key, data) {
            localStorage.setItem(key, JSON.stringify(data));
        }

        Module.getStorage = function (key, defaultValue) {
            const data = localStorage.getItem(key);
            if (data === null) {
                return defaultValue;
            }
            return JSON.parse(data);
        }

        Module.deleteStorage = function (key) {
            localStorage.removeItem(key);
        }

        /** sync layouts */
        Module.syncReactLayout = function () {
            var self = this;
            const reacts = document.querySelectorAll('.rb-reaction');
            const jsCount = this._body.hasClass('is-jscount');

            reacts.forEach((react) => {
                if (react.classList.contains('loaded')) return;

                const key = self.getReactionKey(react.getAttribute('data-pid'));
                const reaction = self.getStorage(key);
                const item = react.querySelectorAll('[data-reaction="' + reaction + '"]');

                for (var i = 0; i < item.length; i++) {
                    item[i].classList.add("active");
                    if (jsCount) {
                        const countEl = item[i].querySelector('.reaction-count');
                        if (countEl) {
                            const count = parseInt(countEl.textContent.trim()) || 0;
                            countEl.textContent = count + 1;
                        }
                    }
                }
            });
        }

        /**
         * reaction toggle;
         */
        Module.reactionToggle = function () {
            const self = this;
            const activeClass = 'active';

            self._body.on('click', '[data-reaction]', function (e) {
                e.preventDefault();
                e.stopPropagation();

                if (self.isProgress) {
                    return;
                }

                self.isProgress = true;

                const target = $(this);
                target.addClass('loading');
                const reaction = target.data('reaction');
                const pid = target.closest('[data-pid]').data('pid');
                const key = self.getReactionKey(pid);

                const countEl = target.find('.reaction-count');
                let count = parseInt(countEl.text());

                if (isNaN(count)) {
                    count = 0;
                }

                let previous = target.siblings('.' + activeClass);

                if (target  .hasClass(activeClass)) {
                    self.deleteStorage(key);
                    target.removeClass(activeClass);
                    countEl.text(count > 1 ? count - 1 : 0);
                } else {
                    self.setStorage(key, reaction);
                    target.addClass(activeClass);
                    countEl.text(count + 1);

                    const preCountEl = $(previous).find('.reaction-count');
                    const preCount = parseInt(preCountEl.text());
                    $(previous).removeClass(activeClass);
                    preCountEl.text(Math.max(preCount - 1, 0));
                }

                $.ajax({
                    type: 'GET',
                    url: self.ajaxURL,
                    data: {
                        action: 'rbreaction',
                        pid,
                        reaction,
                        type: target.hasClass(activeClass) ? 'add' : 'delete'
                    },
                    complete: () => {
                        target.removeClass('loading');
                        self.isProgress = false;
                    }
                });

                return false;
            });
        };

        return Module;

    }(RB_REACTION || {}, jQuery)
);

/** init RUBY REACTION */
jQuery(window).on('load', function () {
    RB_REACTION.init();
});