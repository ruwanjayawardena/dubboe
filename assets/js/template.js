"use strict";
function ownKeys(t, e) {
    var a = Object.keys(t);
    if (Object.getOwnPropertySymbols) {
        var r = Object.getOwnPropertySymbols(t);
        e &&
            (r = r.filter(function (e) {
                return Object.getOwnPropertyDescriptor(t, e).enumerable;
            })),
            a.push.apply(a, r);
    }
    return a;
}
function _objectSpread(t) {
    for (var e = 1; e < arguments.length; e++) {
        var a = null != arguments[e] ? arguments[e] : {};
        e % 2
            ? ownKeys(Object(a), !0).forEach(function (e) {
                  _defineProperty(t, e, a[e]);
              })
            : Object.getOwnPropertyDescriptors
            ? Object.defineProperties(t, Object.getOwnPropertyDescriptors(a))
            : ownKeys(Object(a)).forEach(function (e) {
                  Object.defineProperty(t, e, Object.getOwnPropertyDescriptor(a, e));
              });
    }
    return t;
}
function _defineProperty(e, t, a) {
    return t in e ? Object.defineProperty(e, t, { value: a, enumerable: !0, configurable: !0, writable: !0 }) : (e[t] = a), e;
}
function _typeof(e) {
    return (_typeof =
        "function" == typeof Symbol && "symbol" == typeof Symbol.iterator
            ? function (e) {
                  return typeof e;
              }
            : function (e) {
                  return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype ? "symbol" : typeof e;
              })(e);
}
!(function (t) {
    var e = {
        init: function () {
            e.masonryGrid(),
                e.stickyNavbar(),
                e.navbarSearch(),
                e.passwordVisibilityToggle(),
                e.customFileInput(),
                e.fileDropArea(),
                e.labelUpdate(),
                e.radioTabs(),
                e.formValidation(),
                e.inputFormatter(),
                e.bsAccordion(),
                e.multilevelDropdown(),
                e.offcanvas(),
                e.tooltips(),
                e.popovers(),
                e.smoothScroll(),
                e.scrollTopButton(),
                e.carousel(),
                e.gallery(),
                e.productGallery(),
                e.videoPopupBtn(),
                e.countdown(),
                e.charts(),
                e.priceSwitch(),
                e.rangeSlider(),
                e.ajaxifySubscribeForm(),
                e.viewSwitcher(),
                e.datePicker(),
                e.checkboxToggleClass(),
                e.masterCheckbox(),
                e.parallax();
        },
        masonryGrid: function () {
            var n,
                o = document.querySelectorAll(".cs-masonry-grid");
            if (null !== o)
                for (
                    var e = function (e) {
                            (n = new Shuffle(o[e], { itemSelector: ".cs-grid-item", sizer: ".cs-grid-item" })),
                                imagesLoaded(o[e]).on("progress", function () {
                                    n.layout();
                                });
                            var r = o[e].closest(".cs-masonry-filterable");
                            if (null === r) return { v: void 0 };
                            for (var t = r.querySelectorAll(".cs-masonry-filters [data-group]"), a = 0; a < t.length; a++)
                                t[a].addEventListener("click", function (e) {
                                    var t = r.querySelector(".cs-masonry-filters .active"),
                                        a = this.dataset.group;
                                    null !== t && t.classList.remove("active"), this.classList.add("active"), n.filter(a), e.preventDefault();
                                });
                        },
                        t = 0;
                    t < o.length;
                    t++
                ) {
                    var a = e(t);
                    if ("object" === _typeof(a)) return a.v;
                }
        },
        stickyNavbar: function () {
            var t = document.querySelector(".navbar-sticky");
            if (null != t) {
                var e = t.classList,
                    a = t.offsetHeight;
                e.contains("navbar-floating") && e.contains("navbar-dark")
                    ? window.addEventListener("scroll", function (e) {
                          500 < e.currentTarget.pageYOffset ? (t.classList.remove("navbar-dark"), t.classList.add("navbar-light", "navbar-stuck")) : (t.classList.remove("navbar-light", "navbar-stuck"), t.classList.add("navbar-dark"));
                      })
                    : e.contains("navbar-floating") && e.contains("navbar-light")
                    ? window.addEventListener("scroll", function (e) {
                          500 < e.currentTarget.pageYOffset ? t.classList.add("navbar-stuck") : t.classList.remove("navbar-stuck");
                      })
                    : window.addEventListener("scroll", function (e) {
                          500 < e.currentTarget.pageYOffset ? ((document.body.style.paddingTop = a + "px"), t.classList.add("navbar-stuck")) : ((document.body.style.paddingTop = ""), t.classList.remove("navbar-stuck"));
                      });
            }
        },
        navbarSearch: function () {
            var e = document.querySelectorAll('[data-toggle="search"]'),
                t = document.querySelector(".navbar-search");
            if (null !== t)
                for (var a = t.querySelector(".navbar-search-field"), r = 0; r < e.length; r++)
                    e[r].addEventListener("click", function (e) {
                        t.classList.toggle("show"), a.focus(), e.preventDefault();
                    });
        },
        passwordVisibilityToggle: function () {
            for (
                var a = document.querySelectorAll(".cs-password-toggle"),
                    e = function (e) {
                        var t = a[e].querySelector(".form-control");
                        a[e].querySelector(".cs-password-toggle-btn").addEventListener(
                            "click",
                            function (e) {
                                "checkbox" === e.target.type && (e.target.checked ? (t.type = "text") : (t.type = "password"));
                            },
                            !1
                        );
                    },
                    t = 0;
                t < a.length;
                t++
            )
                e(t);
        },
        customFileInput: function () {
            "object" === ("undefined" == typeof bsCustomFileInput ? "undefined" : _typeof(bsCustomFileInput)) && bsCustomFileInput.init();
        },
        fileDropArea: function () {
            for (
                var t = document.querySelectorAll(".cs-file-drop-area"),
                    e = function (e) {
                        var n = t[e].querySelector(".cs-file-drop-input"),
                            o = t[e].querySelector(".cs-file-drop-message"),
                            s = t[e].querySelector(".cs-file-drop-icon");
                        t[e].querySelector(".cs-file-drop-btn").addEventListener("click", function () {
                            n.click();
                        }),
                            n.addEventListener("change", function () {
                                if (n.files && n.files[0]) {
                                    var e = new FileReader();
                                    (e.onload = function (e) {
                                        var t = e.target.result,
                                            a = n.files[0].name;
                                        if (((o.innerHTML = a), t.startsWith("data:image"))) {
                                            var r = new Image();
                                            (r.src = t),
                                                (r.onload = function () {
                                                    (s.className = "cs-file-drop-preview"), (s.innerHTML = '<img class="img-thumbnail rounded" src="' + r.src + '" alt="' + a + '">'), console.log(this.width);
                                                });
                                        } else
                                            t.startsWith("data:video")
                                                ? ((s.innerHTML = ""), (s.className = ""), (s.className = "cs-file-drop-icon fe-video"))
                                                : ((s.innerHTML = ""), (s.className = ""), (s.className = "cs-file-drop-icon fe-file-text"));
                                    }),
                                        e.readAsDataURL(n.files[0]);
                                }
                            });
                    },
                    a = 0;
                a < t.length;
                a++
            )
                e(a);
        },
        labelUpdate: function () {
            for (var e = document.querySelectorAll("[data-label]"), t = 0; t < e.length; t++)
                e[t].addEventListener("change", function () {
                    var e = this.dataset.label;
                    try {
                        document.getElementById(e).textContent = this.value;
                    } catch (e) {
                        (e.message = "Cannot set property 'textContent' of null"), console.error("Make sure the [data-label] matches with the id of the target element you want to change text of!");
                    }
                });
        },
        radioTabs: function () {
            for (var e = document.querySelectorAll('[data-toggle="radioTab"]'), t = 0; t < e.length; t++)
                e[t].addEventListener("click", function () {
                    var e = this.dataset.target;
                    document
                        .querySelector(this.dataset.parent)
                        .querySelectorAll(".radio-tab-pane")
                        .forEach(function (e) {
                            e.classList.remove("active");
                        }),
                        document.querySelector(e).classList.add("active");
                });
        },
        formValidation: function () {
            window.addEventListener(
                "load",
                function () {
                    var e = document.getElementsByClassName("needs-validation");
                    Array.prototype.filter.call(e, function (t) {
                        t.addEventListener(
                            "submit",
                            function (e) {
                                !1 === t.checkValidity() && (e.preventDefault(), e.stopPropagation()), t.classList.add("was-validated");
                            },
                            !1
                        );
                    });
                },
                !1
            );
        },
        inputFormatter: function () {
            var e = document.querySelectorAll("[data-format]");
            if (0 !== e.length)
                for (var t = 0; t < e.length; t++) {
                    var a = e[t].dataset.format,
                        r = e[t].dataset.blocks,
                        n = e[t].dataset.delimiter;
                    switch (((r = void 0 !== r ? r.split(" ").map(Number) : ""), (n = void 0 !== n ? n : " "), a)) {
                        case "card":
                            new Cleave(e[t], { creditCard: !0 });
                            break;
                        case "cvc":
                            new Cleave(e[t], { numeral: !0, numeralIntegerScale: 3 });
                            break;
                        case "date":
                            new Cleave(e[t], { date: !0, datePattern: ["m", "y"] });
                            break;
                        case "date-long":
                            new Cleave(e[t], { date: !0, delimiter: "-", datePattern: ["Y", "m", "d"] });
                            break;
                        case "time":
                            new Cleave(e[t], { time: !0, datePattern: ["h", "m"] });
                            break;
                        case "custom":
                            new Cleave(e[t], { delimiter: n, blocks: r });
                            break;
                        default:
                            console.error(
                                "Sorry, your format " +
                                    a +
                                    " is not available. You can add it to the theme object method - inputFormatter in src/js/theme.js or choose one from the list of available formats: card, cvc, date, date-long, time or custom."
                            );
                    }
                }
        },
        bsAccordion: function () {
            for (
                var n = document.querySelectorAll(".accordion-alt"),
                    o = function (e, t) {
                        e.classList.add(t);
                    },
                    s = function (e, t) {
                        e.classList.remove(t);
                    },
                    e = function (e) {
                        for (var t = n[e].querySelectorAll('[data-toggle="collapse"]'), a = n[e].querySelectorAll(".card"), r = 0; r < t.length; r++)
                            t[r].addEventListener("click", function () {
                                for (var e = this.parentNode.parentNode.parentNode, t = 0; t < a.length; t++) s(a[t], "card-active");
                                (this.classList.contains("collapsed") ? (this.classList.contains("custom-control") ? s : o) : this.classList.contains("custom-control") ? o : s)(e, "card-active");
                            });
                    },
                    t = 0;
                t < n.length;
                t++
            )
                e(t);
        },
        multilevelDropdown: function () {
            t(".dropdown-menu [data-toggle='dropdown']").on("click", function (e) {
                e.preventDefault(),
                    e.stopPropagation(),
                    t(this).siblings().toggleClass("show"),
                    t(this).next().hasClass("show") || t(this).parents(".dropdown-menu").first().find(".show").removeClass("show"),
                    t(this)
                        .parents("li.nav-item.dropdown.show")
                        .on("hidden.bs.dropdown", function () {
                            t(".dropdown-submenu .show").removeClass("show");
                        });
            });
        },
        offcanvas: function () {
            for (var e = document.querySelectorAll('[data-toggle="offcanvas"]'), t = 0; t < e.length; t++)
                e[t].addEventListener("click", function (e) {
                    e.preventDefault(), document.getElementById(e.currentTarget.dataset.offcanvasId).classList.toggle("show");
                });
        },
        tooltips: function () {
            t('[data-toggle="tooltip"]').tooltip();
        },
        popovers: function () {
            t('[data-toggle="popover"]').popover();
        },
        smoothScroll: function () {
            new SmoothScroll("[data-scroll]", { speed: 700, speedAsDuration: !0, offset: 40, header: "[data-scroll-header]", updateURL: !1 });
        },
        scrollTopButton: function () {
            var t = document.querySelector(".btn-scroll-top");
            if (null != t) {
                var a = parseInt(600, 10);
                window.addEventListener("scroll", function (e) {
                    e.currentTarget.pageYOffset > a ? t.classList.add("show") : t.classList.remove("show");
                });
            }
        },
        carousel: function () {
            !(function (e, t, a) {
                for (var r = 0; r < e.length; r++) t.call(a, r, e[r]);
            })(document.querySelectorAll(".cs-carousel .cs-carousel-inner"), function (e, t) {
                var a,
                    r = {
                        container: t,
                        controlsText: ['<i class="fe-arrow-left"></i>', '<i class="fe-arrow-right"></i>'],
                        navPosition: "top",
                        controlsPosition: "top",
                        mouseDrag: !0,
                        speed: 600,
                        autoplayHoverPause: !0,
                        autoplayButtonOutput: !1,
                    };
                null != t.dataset.carouselOptions && (a = JSON.parse(t.dataset.carouselOptions));
                var n = _objectSpread(_objectSpread({}, r), a),
                    o = tns(n),
                    s = t.closest(".cs-carousel"),
                    c = s.querySelectorAll(".tns-item"),
                    l = s.querySelector(".cs-carousel-pager");
                if (null != l) {
                    for (var i = l.querySelectorAll("[data-goto]"), d = 0; d < i.length; d++)
                        i[d].addEventListener("click", function (e) {
                            o.goTo(this.dataset.goto - 1), e.preventDefault();
                        });
                    o.events.on("indexChanged", function () {
                        for (var e = o.getInfo(), t = 0; t < i.length; t++) i[t].classList.remove("active");
                        l.querySelector('[data-goto="' + e.displayIndex + '"]').classList.add("active");
                    });
                }
                var u = s.querySelector(".cs-carousel-label");
                if (
                    (null != u &&
                        o.events.on("indexChanged", function () {
                            var e = o.getInfo(),
                                t = c[e.index].dataset.carouselLabel;
                            u.innerHTML = t;
                        }),
                    null !== s.querySelector(".cs-carousel-progress"))
                ) {
                    var f = o.getInfo(),
                        v = s.querySelector(".cs-current-slide"),
                        p = s.querySelector(".cs-total-slides"),
                        h = s.querySelector(".cs-carousel-progress .progress-bar");
                    (v.innerHTML = f.displayIndex),
                        (p.innerHTML = f.slideCount),
                        (h.style.width = (f.displayIndex / f.slideCount) * 100 + "%"),
                        o.events.on("indexChanged", function () {
                            var e = o.getInfo();
                            (v.innerHTML = e.displayIndex), (h.style.width = (e.displayIndex / e.slideCount) * 100 + "%");
                        });
                }
            });
        },
        gallery: function () {
            var e = document.querySelectorAll(".cs-gallery");
            if (e.length)
                for (var t = 0; t < e.length; t++)
                    lightGallery(e[t], {
                        selector: ".cs-gallery-item",
                        download: !1,
                        videojs: !0,
                        youtubePlayerParams: { modestbranding: 1, showinfo: 0, rel: 0, controls: 0 },
                        vimeoPlayerParams: { byline: 0, portrait: 0, color: "766df4" },
                    });
        },
        productGallery: function () {
            var o = document.querySelectorAll(".cs-product-gallery");
            if (o.length)
                for (
                    var e = function (a) {
                            for (var r = o[a].querySelectorAll(".cs-thumblist-item"), n = o[a].querySelectorAll(".cs-preview-item"), e = 0; e < r.length; e++) r[e].addEventListener("click", t);
                            function t(e) {
                                e.preventDefault();
                                for (var t = 0; t < r.length; t++) n[t].classList.remove("active"), r[t].classList.remove("active");
                                this.classList.add("active"), o[a].querySelector(this.getAttribute("href")).classList.add("active");
                            }
                        },
                        t = 0;
                    t < o.length;
                    t++
                )
                    e(t);
        },
        videoPopupBtn: function () {
            var e = document.querySelectorAll(".cs-video-btn");
            if (e.length)
                for (var t = 0; t < e.length; t++)
                    lightGallery(e[t], { selector: "this", download: !1, videojs: !0, youtubePlayerParams: { modestbranding: 1, showinfo: 0, rel: 0, controls: 0 }, vimeoPlayerParams: { byline: 0, portrait: 0, color: "766df4" } });
        },
        countdown: function () {
            var t = document.querySelectorAll(".cs-countdown");
            if (null != t)
                for (
                    var e = function (e) {
                            var a = t[e].dataset.countdown,
                                r = t[e].querySelector(".cs-countdown-days .cs-countdown-value"),
                                n = t[e].querySelector(".cs-countdown-hours .cs-countdown-value"),
                                o = t[e].querySelector(".cs-countdown-minutes .cs-countdown-value"),
                                s = t[e].querySelector(".cs-countdown-seconds .cs-countdown-value"),
                                c = void 0,
                                l = void 0,
                                i = void 0,
                                d = void 0;
                            if (((a = new Date(a).getTime()), isNaN(a))) return { v: void 0 };
                            setInterval(function () {
                                var e = new Date().getTime(),
                                    t = parseInt((a - e) / 1e3);
                                {
                                    if (!(0 <= t)) return;
                                    (c = parseInt(t / 86400)),
                                        (t %= 86400),
                                        (l = parseInt(t / 3600)),
                                        (t %= 3600),
                                        (i = parseInt(t / 60)),
                                        (t %= 60),
                                        (d = parseInt(t)),
                                        null != r && (r.innerHTML = parseInt(c, 10)),
                                        null != n && (n.innerHTML = l < 10 ? "0" + l : l),
                                        null != o && (o.innerHTML = i < 10 ? "0" + i : i),
                                        null != s && (s.innerHTML = d < 10 ? "0" + d : d);
                                }
                            }, 1e3);
                        },
                        a = 0;
                    a < t.length;
                    a++
                ) {
                    var r = e(a);
                    if ("object" === _typeof(r)) return r.v;
                }
        },
        charts: function () {
            function o(e, t) {
                return e + t;
            }
            var e = document.querySelectorAll("[data-line-chart]"),
                t = document.querySelectorAll("[data-bar-chart]"),
                s = document.querySelectorAll("[data-pie-chart]");
            if (0 !== e.length || 0 !== t.length || 0 !== s.length) {
                var c,
                    a = document.head || document.getElementsByTagName("head")[0],
                    l = document.createElement("style");
                a.appendChild(l);
                for (var r = 0; r < e.length; r++) {
                    var n = JSON.parse(e[r].dataset.lineChart),
                        i = null != e[r].dataset.options ? JSON.parse(e[r].dataset.options) : "",
                        d = e[r].dataset.seriesColor,
                        u = void 0;
                    if ((e[r].classList.add("cz-line-chart-" + r), null != d)) {
                        u = JSON.parse(d);
                        for (var f = 0; f < u.colors.length; f++)
                            (c = "\n              .cz-line-chart-"
                                .concat(r, " .ct-series:nth-child(")
                                .concat(f + 1, ") .ct-line,\n              .cz-line-chart-")
                                .concat(r, " .ct-series:nth-child(")
                                .concat(f + 1, ") .ct-point {\n                stroke: ")
                                .concat(u.colors[f], " !important;\n              }\n            ")),
                                l.appendChild(document.createTextNode(c));
                    }
                    new Chartist.Line(e[r], n, i);
                }
                for (var v = 0; v < t.length; v++) {
                    var p = JSON.parse(t[v].dataset.barChart),
                        h = null != t[v].dataset.options ? JSON.parse(t[v].dataset.options) : "",
                        m = t[v].dataset.seriesColor,
                        g = void 0;
                    if ((t[v].classList.add("cz-bar-chart-" + v), null != m)) {
                        g = JSON.parse(m);
                        for (var y = 0; y < g.colors.length; y++)
                            (c = "\n            .cz-bar-chart-"
                                .concat(v, " .ct-series:nth-child(")
                                .concat(y + 1, ") .ct-bar {\n                stroke: ")
                                .concat(g.colors[y], " !important;\n              }\n            ")),
                                l.appendChild(document.createTextNode(c));
                    }
                    new Chartist.Bar(t[v], p, h);
                }
                for (
                    var b = function (e) {
                            var t = JSON.parse(s[e].dataset.pieChart),
                                a = s[e].dataset.seriesColor,
                                r = void 0;
                            if ((s[e].classList.add("cz-pie-chart-" + e), null != a)) {
                                r = JSON.parse(a);
                                for (var n = 0; n < r.colors.length; n++)
                                    (c = "\n            .cz-pie-chart-"
                                        .concat(e, " .ct-series:nth-child(")
                                        .concat(n + 1, ") .ct-slice-pie {\n                fill: ")
                                        .concat(r.colors[n], " !important;\n              }\n            ")),
                                        l.appendChild(document.createTextNode(c));
                            }
                            new Chartist.Pie(s[e], t, {
                                labelInterpolationFnc: function (e) {
                                    return Math.round((e / t.series.reduce(o)) * 100) + "%";
                                },
                            });
                        },
                        S = 0;
                    S < s.length;
                    S++
                )
                    b(S);
            }
        },
        priceSwitch: function () {
            var o = document.querySelectorAll(".cs-pricing-wrap");
            if (null !== o)
                for (
                    var e = function (e) {
                            function t() {
                                if (r.checked) {
                                    a.parentNode.classList.add("cs-price-switch-on");
                                    for (var e = 0; e < n.length; e++) n[e].innerHTML = n[e].dataset.newPrice;
                                } else {
                                    a.parentNode.classList.remove("cs-price-switch-on");
                                    for (var t = 0; t < n.length; t++) n[t].innerHTML = n[t].dataset.currentPrice;
                                }
                            }
                            var a = o[e].querySelector(".custom-switch"),
                                r = a.querySelector('input[type="checkbox"]'),
                                n = o[e].querySelectorAll(".cs-price");
                            t(),
                                r.addEventListener("change", function () {
                                    t();
                                });
                        },
                        t = 0;
                    t < o.length;
                    t++
                )
                    e(t);
        },
        rangeSlider: function () {
            for (
                var o = document.querySelectorAll(".cs-range-slider"),
                    e = function (e) {
                        var t = o[e].querySelector(".cs-range-slider-ui"),
                            r = o[e].querySelector(".cs-range-slider-value-min"),
                            n = o[e].querySelector(".cs-range-slider-value-max"),
                            a = {
                                dataStartMin: parseInt(o[e].dataset.startMin, 10),
                                dataStartMax: parseInt(o[e].dataset.startMax, 10),
                                dataMin: parseInt(o[e].dataset.min, 10),
                                dataMax: parseInt(o[e].dataset.max, 10),
                                dataStep: parseInt(o[e].dataset.step, 10),
                            };
                        noUiSlider.create(t, {
                            start: [a.dataStartMin, a.dataStartMax],
                            connect: !0,
                            step: a.dataStep,
                            pips: { mode: "count", values: 5 },
                            tooltips: !0,
                            range: { min: a.dataMin, max: a.dataMax },
                            format: {
                                to: function (e) {
                                    return "$" + parseInt(e, 10);
                                },
                                from: function (e) {
                                    return Number(e);
                                },
                            },
                        }),
                            t.noUiSlider.on("update", function (e, t) {
                                var a = e[t];
                                (a = a.replace(/\D/g, "")), t ? (n.value = Math.round(a)) : (r.value = Math.round(a));
                            }),
                            r.addEventListener("change", function () {
                                t.noUiSlider.set([this.value, null]);
                            }),
                            n.addEventListener("change", function () {
                                t.noUiSlider.set([null, this.value]);
                            });
                    },
                    t = 0;
                t < o.length;
                t++
            )
                e(t);
        },
        ajaxifySubscribeForm: function () {
            var s = document.querySelectorAll(".cs-subscribe-form");
            if (null !== s) {
                for (
                    var e = function (e) {
                            var t = s[e].querySelector('button[type="submit"]'),
                                a = t.innerHTML,
                                r = s[e].querySelector(".form-control"),
                                n = s[e].querySelector(".cs-subscribe-form-antispam"),
                                o = s[e].querySelector(".cs-subscribe-status");
                            s[e].addEventListener("submit", function (e) {
                                e && e.preventDefault(), "" === n.value && c(this, t, r, a, o);
                            });
                        },
                        t = 0;
                    t < s.length;
                    t++
                )
                    e(t);
                var c = function (e, t, a, r, n) {
                    t.innerHTML = "Sending...";
                    var o = e.action.replace("/post?", "/post-json?"),
                        s = "&" + a.name + "=" + encodeURIComponent(a.value),
                        c = document.createElement("script");
                    (c.src = o + "&c=callback" + s), document.body.appendChild(c);
                    var l = "callback";
                    window[l] = function (e) {
                        delete window[l],
                            document.body.removeChild(c),
                            (t.innerHTML = r),
                            "success" == e.result
                                ? (a.classList.remove("is-invalid"),
                                  a.classList.add("is-valid"),
                                  n.classList.remove("cs-status-error"),
                                  n.classList.add("cs-status-success"),
                                  (n.innerHTML = e.msg),
                                  setTimeout(function () {
                                      a.classList.remove("is-valid"), (n.innerHTML = ""), n.classList.remove("cs-status-success");
                                  }, 6e3))
                                : (a.classList.remove("is-valid"),
                                  a.classList.add("is-invalid"),
                                  n.classList.remove("cs-status-success"),
                                  n.classList.add("cs-status-error"),
                                  (n.innerHTML = e.msg.substring(4)),
                                  setTimeout(function () {
                                      a.classList.remove("is-invalid"), (n.innerHTML = ""), n.classList.remove("cs-status-error");
                                  }, 6e3));
                    };
                };
            }
        },
        viewSwitcher: function () {
            var e = document.querySelectorAll("[data-view]");
            if (0 < e.length)
                for (var t = 0; t < e.length; t++)
                    e[t].addEventListener("click", function (e) {
                        var t = this.dataset.view;
                        a(t), "#" === this.getAttribute("href") && e.preventDefault();
                    });
            var a = function (e) {
                for (var t = document.querySelector(e), a = t.parentNode.querySelectorAll(".cs-view"), r = 0; r < a.length; r++) a[r].classList.remove("show");
                t.classList.add("show");
            };
        },
        datePicker: function () {
            var e = document.querySelectorAll(".cs-date-picker");
            if (0 !== e.length)
                for (var t = 0; t < e.length; t++) {
                    var a = void 0;
                    null != e[t].dataset.datepickerOptions && (a = JSON.parse(e[t].dataset.datepickerOptions));
                    var r = e[t].classList.contains("cs-date-range") ? { plugins: [new rangePlugin({ input: e[t].dataset.linkedInput })] } : "{}",
                        n = _objectSpread(_objectSpread(_objectSpread({}, { disableMobile: "true" }), r), a);
                    flatpickr(e[t], n);
                }
        },
        checkboxToggleClass: function () {
            var e = document.querySelectorAll("[data-checkbox-toggle-class]");
            if (0 !== e.length)
                for (var t = 0; t < e.length; t++)
                    e[t].addEventListener("change", function () {
                        var e = document.querySelector(this.dataset.target),
                            t = this.dataset.checkboxToggleClass;
                        this.checked ? e.classList.add(t) : e.classList.remove(t);
                    });
        },
        masterCheckbox: function () {
            var e = document.querySelectorAll("[data-master-checkbox-for]");
            if (0 !== e.length)
                for (var t = 0; t < e.length; t++)
                    e[t].addEventListener("change", function () {
                        var e = document.querySelector(this.dataset.masterCheckboxFor).querySelectorAll('input[type="checkbox"]');
                        if (this.checked) for (var t = 0; t < e.length; t++) (e[t].checked = !0), e[t].dataset.checkboxToggleClass && document.querySelector(e[t].dataset.target).classList.add(e[t].dataset.checkboxToggleClass);
                        else for (var a = 0; a < e.length; a++) (e[a].checked = !1), e[a].dataset.checkboxToggleClass && document.querySelector(e[a].dataset.target).classList.remove(e[a].dataset.checkboxToggleClass);
                    });
        },
        parallax: function () {
            for (var e = document.querySelectorAll(".cs-parallax"), t = 0; t < e.length; t++) new Parallax(e[t]);
        },
    };
    e.init();
})(jQuery);
