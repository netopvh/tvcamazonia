/** FOXIZ_CORE_SCRIPT */
var FOXIZ_CORE_SCRIPT = (function (Module, $) {
    "use strict";

    Module.init = function () {
        this._body = $('body');
        this.darkModeID = foxizCoreParams.darkModeID || 'RubyDarkMode';
        this.mSiteID = foxizCoreParams.mSiteID || null;
        this.isCMode = document.body.classList.contains("is-cmode");
        this.personailizeUID = this.getUserUUID();
        this.initDarkModeCookie();
        this.switchDarkMode();
        this.noteToggle();
        this.emailToDownload();
        this.ajaxURL = foxizCoreParams.ajaxurl
    }

    /**
     * generate UUID
     * @returns {string}
     */
    Module.generateUUID = function () {
        const alphabet = 'abcdefghijklmnopqrstuvwxyz0123456789';
        let id = '';
        for (let i = 0; i < 7; i++) {
            const randomIndex = Math.floor(Math.random() * alphabet.length);
            id += alphabet[randomIndex];
        }
        return id;
    }

    /**
     * set cookies
     * @param name
     * @param value
     * @param days
     */
    Module.setCookie = function (name, value, days = 60) {

        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        var expires = '; expires=' + date.toUTCString();
        var cookieDomain = foxizCoreParams.cookieDomain || '';
        var cookiePath = foxizCoreParams.cookiePath || '/';

        document.cookie = name + '=' + encodeURIComponent(value) + expires + '; path=' + cookiePath + '; domain=' + cookieDomain;
    }

    /**
     * get cookie
     * @param name
     * @returns {string|null}
     */
    Module.getCookie = function (name) {
        var nameEQ = name + '=';
        var cookies = document.cookie.split(';');
        for (var i = 0; i < cookies.length; i++) {
            var cookie = cookies[i];
            while (cookie.charAt(0) == ' ') cookie = cookie.substring(1, cookie.length);
            if (cookie.indexOf(nameEQ) == 0) return decodeURIComponent(cookie.substring(nameEQ.length, cookie.length));
        }
        return null;
    }

    /**
     * delete cookies
     * @param name
     */
    Module.deleteCookie = function (name) {
        var cookieDomain = foxizCoreParams.cookieDomain || '';
        var cookiePath = foxizCoreParams.cookiePath || '/';
        document.cookie = name + '=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=' + cookiePath + '; domain=' + cookieDomain;
    }

    /**
     * set localStorage
     * @param key
     * @param data
     */
    Module.setStorage = function (key, data) {
        localStorage.setItem(key, JSON.stringify(data));
    }

    /**
     * get localStorage
     * @param key
     * @param defaultValue
     * @returns {any}
     */
    Module.getStorage = function (key, defaultValue) {
        const data = localStorage.getItem(key);
        if (data === null) {
            return defaultValue;
        }
        return JSON.parse(data);
    }

    /**
     * delelte localStorage
     * @param key
     */
    Module.deleteStorage = function (key) {
        localStorage.removeItem(key);
    }

    /**
     * create UUID
     * @returns {string|*}
     */
    Module.getUserUUID = function () {
        let uuid;

        if (!navigator.cookieEnabled) {
            return 'uuid';
        }

        if (this.getCookie('RBUUID')) {
            uuid = this.getCookie('RBUUID');
        } else {
            uuid = this.getStorage('RBUUID', null);
            if (null === uuid) {
                uuid = this.generateUUID();
                this.setStorage('RBUUID', uuid);
                this.setCookie('personalize_sync', 'yes', 1);
            }

            this.setCookie('RBUUID', uuid);
        }

        if (this.mSiteID) {
            uuid = this.mSiteID + uuid;
        }

        return uuid;
    }

    Module.initDarkModeCookie = function () {
        if (this.isCMode && !this.getCookie(this.darkModeID)) {
            this.setCookie(this.darkModeID, document.body.getAttribute('data-theme'));
        }
    }

    Module.setDarkModeCookie = function (name, value) {
        if (this.isCMode) {
            this.setCookie(name, value);
        }
    }

    Module.switchDarkMode = function () {
        var self = this;

        $('.dark-mode-toggle').off('click').on('click', function (e) {
            e.preventDefault();
            e.stopPropagation();

            if (!$(this).hasClass('triggered')) {
                $(this).addClass('triggered')
            }

            const iconDefault = $('.mode-icon-default');
            const iconDark = $('.mode-icon-dark');
            const currentMode = (
                (self.isCMode || !navigator.cookieEnabled) ?
                    document.body.getAttribute('data-theme') :
                    localStorage.getItem(self.darkModeID)
            );

            self._body.addClass('switch-smooth');

            if ('dark' === currentMode) {
                if (navigator.cookieEnabled) {
                    localStorage.setItem(self.darkModeID, 'default');
                    self.setDarkModeCookie(self.darkModeID, 'default');
                }
                self._body.attr('data-theme', 'default');
                iconDefault.addClass('activated');
                iconDark.removeClass('activated');
            } else {
                if (navigator.cookieEnabled) {
                    localStorage.setItem(self.darkModeID, 'dark');
                    self.setDarkModeCookie(self.darkModeID, 'dark');
                }
                self._body.attr('data-theme', 'dark');
                iconDefault.removeClass('activated');
                iconDark.addClass('activated');
            }
        })
    }

    /** share action */
    Module.shareTrigger = function () {

        $('a.share-trigger').off('click').on('click', function (e) {
            e.preventDefault();
            e.stopPropagation();
            window.open($(this).attr('href'), '_blank', 'width=600, height=350');
            return false;
        });

        const copyButton = $('a.copy-trigger');
        if (navigator.clipboard) {
            copyButton.off('click').on('click', function (e) {
                e.preventDefault();
                e.stopPropagation();
                var target = $(this);
                var link = target.data('link');
                var copied = target.data('copied');
                if (link) {
                    navigator.clipboard.writeText(link).then(
                        function () {
                            $('body').find('.tipsy-inner').html((copied));
                        }).catch(function () {
                        console.log('Clipboard API not supported.');
                    });
                }
            });
        } else {
            console.log('Clipboard API not supported.');
            copyButton.hide();
        }

        const shareButton = $('a.native-share-trigger');
        if (navigator.share) {
            shareButton.on('click', function (e) {
                e.preventDefault();
                e.stopPropagation();
                const target = $(this);

                const link = target.data('link');
                const title = target.data('ptitle');
                navigator.share({
                    title: title,
                    url: link
                })
            });
        } else {
            console.log('Native share API not supported.');
            shareButton.hide();
        }
    };

    /** single infinite load */
    Module.loadGoogleAds = function (response) {
        var googleAds = $(response).find('.adsbygoogle');
        if (typeof window.adsbygoogle !== 'undefined' && googleAds.length) {
            var adsbygoogle;
            googleAds.each(function () {
                (adsbygoogle = window.adsbygoogle || []).push({});
            });
        }
    }

    Module.loadInstagram = function (response) {
        var instEmbed = $(response).find('.instagram-media');
        if ('undefined' !== typeof window.instgrm) {
            window.instgrm.Embeds.process();
        } else if (instEmbed.length && 'undefined' === typeof window.instgrm) {
            var embedJS = document.createElement('script');
            embedJS.src = '//platform.instagram.com/en_US/embeds.js';
            embedJS.onload = function () {
                window.instgrm.Embeds.process();
            };
            this._body.append(embedJS);
        }
    }

    Module.loadTwttr = function () {
        if (typeof twttr !== 'undefined' && typeof twttr.widgets !== 'undefined') {
            twttr.ready(function (twttr) {
                twttr.widgets.load();
            });
        }
    }

    Module.updateGA = function (article) {
        var gaURL = article.postURL.replace(/https?:\/\/[^\/]+/i, '');
        if (typeof _gaq !== 'undefined' && _gaq !== null) {
            _gaq.push(['_trackPageview', gaURL]);
        }
        if (typeof ga !== 'undefined' && ga !== null) {
            ga('send', 'pageview', gaURL);
        }
        if (typeof __gaTracker !== 'undefined' && __gaTracker !== null) {
            __gaTracker('send', 'pageview', gaURL);
        }

        if (window.googletag && googletag.pubadsReady) {
            googletag.pubads().refresh();
        }
    }

    Module.noteToggle = function () {
        $('.yes-toggle > .note-header').on('click', function () {
            let wrapper = $(this).parent();
            let timing = wrapper.hasClass('is-inline') ? 0 : 300;

            wrapper.toggleClass('explain');
            wrapper.find('.note-content').slideToggle(timing);
        });
    }

    Module.isValidEmail = function (email) {
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    Module.emailToDownload = function () {
        var self = this;

        $('.download-form').each(function () {
            var form = $(this);
            var acceptTermsCheckbox = form.find('input[name="acceptTerms"]');
            var submitButton = form.find('input[type="submit"]');
            var noticeText = form.find('.notice-text');

            if (acceptTermsCheckbox.length > 0) {
                acceptTermsCheckbox.change(function () {
                    submitButton.prop('disabled', !this.checked);
                });
            }

            form.submit(function (event) {
                event.preventDefault();

                var emailInput = form.find('input[name="EMAIL"]');
                var email = emailInput.val();
                var label = form.find('input[type="submit"]').val();
                noticeText.empty();

                if (!self.isValidEmail(email)) {
                    var errorNotice = 'Please enter a valid email address.';
                    noticeText.text(errorNotice);
                    return;
                }

                var wrapper = form.parents('.gb-download');
                wrapper.addClass('submitting');

                $.ajax({
                    url: self.ajaxURL,
                    method: 'POST',
                    data: form.serialize(),
                    success: function (response) {
                        var fileURL = response.file;
                        if (fileURL) {
                            var link = document.createElement('a');
                            link.href = fileURL;
                            link.setAttribute('download', '');
                            link.click();
                            var newContent = `<div class="fallback-info">${response.message}</div><a href="${response.file}" download="" class="is-btn gb-download-btn fallback-download-btn">${label}</a>`;
                            form.replaceWith(newContent);
                        } else {
                            noticeText.text(response.message);
                        }
                        wrapper.removeClass('submitting');
                    }
                });
            });
        });
    };

    return Module;

}(FOXIZ_CORE_SCRIPT || {}, jQuery));

jQuery(document).ready(function () {
    FOXIZ_CORE_SCRIPT.init();
});

jQuery(window).on('load', function () {
    FOXIZ_CORE_SCRIPT.shareTrigger();
});