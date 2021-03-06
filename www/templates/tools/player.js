! function(e) {
    var t = {};

    function r(n) {
        if (t[n]) return t[n].exports;
        var o = t[n] = {
            i: n,
            l: !1,
            exports: {}
        };
        return e[n].call(o.exports, o, o.exports, r), o.l = !0, o.exports
    }
    r.m = e, r.c = t, r.d = function(e, t, n) {
        r.o(e, t) || Object.defineProperty(e, t, {
            enumerable: !0,
            get: n
        })
    }, r.r = function(e) {
        "undefined" != typeof Symbol && Symbol.toStringTag && Object.defineProperty(e, Symbol.toStringTag, {
            value: "Module"
        }), Object.defineProperty(e, "__esModule", {
            value: !0
        })
    }, r.t = function(e, t) {
        if (1 & t && (e = r(e)), 8 & t) return e;
        if (4 & t && "object" == typeof e && e && e.__esModule) return e;
        var n = Object.create(null);
        if (r.r(n), Object.defineProperty(n, "default", {
                enumerable: !0,
                value: e
            }), 2 & t && "string" != typeof e)
            for (var o in e) r.d(n, o, function(t) {
                return e[t]
            }.bind(null, o));
        return n
    }, r.n = function(e) {
        var t = e && e.__esModule ? function() {
            return e.default
        } : function() {
            return e
        };
        return r.d(t, "a", t), t
    }, r.o = function(e, t) {
        return Object.prototype.hasOwnProperty.call(e, t)
    }, r.p = "", r(r.s = 479)
}([function(e, t, r) {
    e.exports = r(78)
}, function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    });
    var n = r(26),
        o = r(14),
        i = window.Promise;
    e.exports = o.checkNativeCode(i) ? i : n.default || n
}, , , , function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    }), t.noop = function() {}
}, , , function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    }), t.getUserAgent = function() {
        var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : window;
        try {
            return (e.navigator || {}).userAgent || ""
        } catch (e) {
            return ""
        }
    }
}, function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    }), t.getObjectKeys = function(e) {
        if ("function" == typeof Object.keys) return Object.keys(e);
        var t = [];
        for (var r in e) e.hasOwnProperty(r) && t.push(r);
        return t
    }
}, function(e, t, r) {
    "use strict";
    var n = Object.assign || function(e) {
        for (var t = 1; t < arguments.length; t++) {
            var r = arguments[t];
            for (var n in r) Object.prototype.hasOwnProperty.call(r, n) && (e[n] = r[n])
        }
        return e
    };
    Object.defineProperty(t, "__esModule", {
        value: !0
    });
    var o = r(40),
        i = r(62),
        a = r(12),
        s = document.createElement("a");

    function u(e) {
        s.href = e;
        var t = s.pathname || "";
        "/" !== t.charAt(0) && (t = "/" + t);
        var r = (s.search || "") + (s.hash || ""),
            n = e.lastIndexOf(r);
        return {
            originalPath: -1 === n ? e : e.slice(0, n),
            href: s.href,
            protocol: s.protocol,
            host: s.host,
            hostname: s.hostname,
            port: s.port,
            pathname: t,
            search: s.search,
            hash: s.hash
        }
    }

    function c(e) {
        if (arguments.length > 1 && void 0 !== arguments[1] && arguments[1]) {
            var t = e.originalPath,
                r = "/" === e.pathname && "/" !== t[t.length - 1];
            return e.originalPath + (r ? "/" : "") + e.search + e.hash
        }
        var n = "443" === e.port || "80" === e.port ? e.hostname : e.host;
        return e.protocol + "//" + n + e.pathname + e.search + e.hash
    }
    t.parseUrlUsingCache = i.memoize(function(e) {
        var t = u(e);
        return n({}, t)
    }), t.parseUrl = u;
    var l = function(e) {
        try {
            return decodeURIComponent(e)
        } catch (t) {
            return e
        }
    };

    function d(e) {
        for (var t = {}, r = e.replace(/^\?+/, "").split("&"), n = 0; n < r.length; n++) {
            var o = r[n].indexOf("="),
                i = void 0,
                a = void 0;
            if (-1 === o ? (i = r[n], a = "") : (i = r[n].slice(0, o), a = r[n].slice(o + 1)), i) {
                var s = Boolean(/(\[\])$/.exec(i));
                i = i.replace(/\[\]$/, ""), s ? void 0 === t[i] ? t[i] = [l(a)] : t[i] = [].concat(t[i], l(a)) : t[i] = l(a)
            }
        }
        return t
    }
    t.parseQueryString = d, t.getParamsFromUrl = function(e) {
        return d(u(e).search)
    };
    var f = function(e, t) {
        return t.map(function(t) {
            return e + "[]=" + encodeURIComponent(t)
        }).join("&")
    };

    function v(e) {
        var t = [];
        for (var r in e)
            if (e.hasOwnProperty(r)) {
                var n = e[r];
                o.isArray(n) ? t.push(f(r, n)) : void 0 !== n && t.push(r + "=" + encodeURIComponent(n))
            } return "?" + t.join("&")
    }

    function p(e) {
        return u(e).pathname.split("/").pop() || ""
    }
    t.formatQueryString = v, t.addParamToUrl = function(e, t, r) {
        if (void 0 === r) return e;
        var o = u(e),
            i = d(o.search);
        return i[t] = r, c(n({}, o, {
            search: v(i)
        }))
    }, t.addParamsToUrl = function(e, t) {
        var r = arguments.length > 2 && void 0 !== arguments[2] ? arguments[2] : {},
            o = r.override,
            i = void 0 === o || o,
            s = r.saveOriginalPath,
            l = void 0 !== s && s,
            f = u(e),
            p = d(f.search);
        a.forOwn(t, function(e, t) {
            (void 0 === p[t] || i) && (p[t] = e)
        });
        var m = v(p);
        return c(n({}, f, {
            search: m
        }), l)
    }, t.getFileName = p, t.getFileExt = function(e) {
        var t = p(e).split(".");
        return t.length > 1 ? t.pop() : ""
    }
}, , function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    }), t.forOwn = function(e, t, r) {
        for (var n in e) e.hasOwnProperty(n) && t.call(r, e[n], n, e)
    }
}, function(e, t, r) {
    "use strict";
    var n;

    function o(e) {
        return t.AllControlNames.indexOf(e) > -1
    }
    Object.defineProperty(t, "__esModule", {
            value: !0
        }),
        function(e) {
            e.ALL = "*", e.PLAY = "play", e.VOLUME = "sound", e.SETTINGS = "settings", e.FULLSCREEN = "fullscreen", e.TIMELINE = "timeline", e.LIVE = "live", e.POSTER = "poster", e.TIME_DISPLAY = "time", e.TITLE_DISPLAY = "title", e.SHARE = "share", e.REPORT = "report", e.FORWARD = "forward", e.BACKWARD = "backward", e.LOGO = "logo", e.PRELOADER = "preloader", e.CONTEXT_MENU = "contextMenu", e.START_SCREEN = "startScreen"
        }(n = t.ControlName || (t.ControlName = {})), t.AllControlNames = Object.keys(n).map(function(e) {
            return n[e]
        }), t.isControlName = o, t.parseControlsString = function(e) {
            return e.split(",").map(function(e) {
                return e.trim()
            }).filter(o)
        }
}, function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    }), t.checkNativeCode = function(e) {
        if (!e || !e.toString) return !1;
        var t = e.toString();
        return /\[native code\]/.test(t) || /\/\* source code not available \*\//.test(t)
    }
}, function(e, t, r) {
    "use strict";
    var n = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function(e) {
        return typeof e
    } : function(e) {
        return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype ? "symbol" : typeof e
    };
    Object.defineProperty(t, "__esModule", {
        value: !0
    });
    var o = r(23),
        i = r(58),
        a = r(59),
        s = r(60);
    var u = function(e) {
        function t(e) {
            var r = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : {};
            ! function(e, t) {
                if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
            }(this, t);
            var u = "object" === (void 0 === e ? "undefined" : n(e)) ? e : {
                    message: String(e || a.DEFAULT_ERROR.message)
                },
                c = function(e, t) {
                    if (!e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                    return !t || "object" != typeof t && "function" != typeof t ? e : t
                }(this, (t.__proto__ || Object.getPrototypeOf(t)).call(this));
            s(c, t.prototype), c.message = r.message || u.message || a.DEFAULT_ERROR.message, c.code = r.code || u.code || u.id || a.DEFAULT_ERROR.code, c.isFatal = Boolean(i.getFirstDefined([r.isFatal, u.isFatal, a.DEFAULT_ERROR.isFatal])), c.details = r.details || u.details || a.DEFAULT_ERROR.details;
            var l = r.stack || u.stack || function(e) {
                var t = e.url,
                    r = e.line,
                    n = e.col,
                    o = e.fileName,
                    i = e.columnNumber,
                    a = e.lineNumber;
                return (t || o || "?") + ":" + (r || a || "?") + ":" + (n || i || "?")
            }(u);
            return l !== a.DEFAULT_ERROR.stack ? c.stack = l : c.stack || (c.stack = a.DEFAULT_ERROR.stack), c.toString = function() {
                return o(c.toJSON())
            }, c.toJSON = function() {
                return {
                    message: c.message,
                    code: c.code,
                    isFatal: c.isFatal,
                    details: c.details,
                    stack: l
                }
            }, c
        }
        return function(e, t) {
            if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + typeof t);
            e.prototype = Object.create(t && t.prototype, {
                constructor: {
                    value: e,
                    enumerable: !1,
                    writable: !0,
                    configurable: !0
                }
            }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
        }(t, Error), t
    }();
    t.CustomError = u
}, function(e, t, r) {
    "use strict";
    (function(e) {
        var r = function() {
            function e(e, t) {
                for (var r = 0; r < t.length; r++) {
                    var n = t[r];
                    n.enumerable = n.enumerable || !1, n.configurable = !0, "value" in n && (n.writable = !0), Object.defineProperty(e, n.key, n)
                }
            }
            return function(t, r, n) {
                return r && e(t.prototype, r), n && e(t, n), t
            }
        }();

        function n(e, t) {
            e.forEach(function(e) {
                ! function(e) {
                    return "function" == typeof e.dispatch
                }(e) ? e(t): e.dispatch(t)
            })
        }
        Object.defineProperty(t, "__esModule", {
            value: !0
        });
        var o = function() {
            function t() {
                ! function(e, t) {
                    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                }(this, t), this.on = [], this.once = []
            }
            return r(t, [{
                key: "add",
                value: function() {
                    for (var e, t = this, r = arguments.length, n = Array(r), o = 0; o < r; o++) n[o] = arguments[o];
                    return (e = this.on).push.apply(e, n),
                        function() {
                            return t.remove.apply(t, n)
                        }
                }
            }, {
                key: "addOne",
                value: function() {
                    for (var e, t = this, r = arguments.length, n = Array(r), o = 0; o < r; o++) n[o] = arguments[o];
                    return (e = this.once).push.apply(e, n),
                        function() {
                            return t.remove.apply(t, n)
                        }
                }
            }, {
                key: "promise",
                value: function() {
                    var t = this;
                    return new e(function(e) {
                        return t.addOne(e)
                    })
                }
            }, {
                key: "dispatch",
                value: function(e) {
                    n(this.on, e), n(this.once, e), this.once.length = 0
                }
            }, {
                key: "removeAll",
                value: function() {
                    this.on.length = 0, this.once.length = 0
                }
            }, {
                key: "remove",
                value: function() {
                    for (var e = arguments.length, t = Array(e), r = 0; r < e; r++) t[r] = arguments[r];
                    this.on = this.on.filter(function(e) {
                        return t.indexOf(e) < 0
                    }), this.once = this.once.filter(function(e) {
                        return t.indexOf(e) < 0
                    })
                }
            }]), t
        }();
        t.Signal = o
    }).call(this, r(1))
}, function(e, t, r) {
    "use strict";
    var n = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function(e) {
        return typeof e
    } : function(e) {
        return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype ? "symbol" : typeof e
    };
    Object.defineProperty(t, "__esModule", {
        value: !0
    }), t.isObject = function(e) {
        var t = void 0 === e ? "undefined" : n(e);
        return Boolean(e) && ("object" === t || "function" === t)
    }
}, function(e, t, r) {
    "use strict";
    var n = Object.assign || function(e) {
            for (var t = 1; t < arguments.length; t++) {
                var r = arguments[t];
                for (var n in r) Object.prototype.hasOwnProperty.call(r, n) && (e[n] = r[n])
            }
            return e
        },
        o = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function(e) {
            return typeof e
        } : function(e) {
            return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype ? "symbol" : typeof e
        },
        i = function() {
            function e(e, t) {
                for (var r = 0; r < t.length; r++) {
                    var n = t[r];
                    n.enumerable = n.enumerable || !1, n.configurable = !0, "value" in n && (n.writable = !0), Object.defineProperty(e, n.key, n)
                }
            }
            return function(t, r, n) {
                return r && e(t.prototype, r), n && e(t, n), t
            }
        }();
    Object.defineProperty(t, "__esModule", {
        value: !0
    });
    var a = r(33),
        s = r(145);
    t.IFrameApiErrorObjects = {
        UNABLE_TO_CHANGE_SOURCE: {
            code: a.UNABLE_TO_CHANGE_SOURCE_ERROR_CODE,
            message: "UNABLE_TO_CHANGE_SOURCE",
            isFatal: !0
        },
        HOST_NOT_ALLOWED: {
            code: -3,
            message: "Embedding of 1TV Player is not allowed on this host",
            isFatal: !0
        },
        UNABLE_TO_LOAD_PLAYER_IFRAME: {
            code: -5,
            message: "Unable to load player iframe",
            isFatal: !0
        }
    };
    var u = function(e) {
            var t = e.url,
                r = e.line,
                n = e.col,
                o = e.fileName,
                i = e.columnNumber,
                a = e.lineNumber;
            return (t || o || "?") + ":" + (r || a || "?") + ":" + (n || i || "?")
        },
        c = function(e) {
            function t(e) {
                ! function(e, t) {
                    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                }(this, t);
                var r = "object" === (void 0 === e ? "undefined" : o(e)) ? e : {
                        message: String(e)
                    },
                    n = function(e, t) {
                        if (!e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                        return !t || "object" != typeof t && "function" != typeof t ? e : t
                    }(this, (t.__proto__ || Object.getPrototypeOf(t)).call(this, String(r.message)));
                return s(n, t.prototype), n.message = r.message || n.message, n.code = r.code || 0, n.details = r.details, n.isFatal = void 0 === r.isFatal || r.isFatal, n.stack = r.stack || u(r), n
            }
            return function(e, t) {
                if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                e.prototype = Object.create(t && t.prototype, {
                    constructor: {
                        value: e,
                        enumerable: !1,
                        writable: !0,
                        configurable: !0
                    }
                }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
            }(t, Error), i(t, [{
                key: "toString",
                value: function() {
                    return JSON.stringify(this.toJSON())
                }
            }, {
                key: "toJSON",
                value: function() {
                    var e = {
                        message: this.message,
                        code: this.code,
                        isFatal: this.isFatal,
                        details: this.details,
                        stack: this.stack
                    };
                    return n({}, e, {
                        raw: JSON.stringify(e)
                    })
                }
            }]), t
        }();
    t.IFrameApiError = c
}, function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    }), t.getWindowLocation = function(e) {
        if (e && e.location) {
            var t = e.location;
            return "function" == typeof t.toString ? t.toString() : t.href || ""
        }
        return ""
    }
}, , , , function(e, t) {
    function r(e, t) {
        var r = [],
            n = [];
        return null == t && (t = function(e, t) {
                return r[0] === t ? "[Circular ~]" : "[Circular ~." + n.slice(0, r.indexOf(t)).join(".") + "]"
            }),
            function(o, i) {
                if (r.length > 0) {
                    var a = r.indexOf(this);
                    ~a ? r.splice(a + 1) : r.push(this), ~a ? n.splice(a, 1 / 0, o) : n.push(o), ~r.indexOf(i) && (i = t.call(this, o, i))
                } else r.push(i);
                return null == e ? i : e.call(this, o, i)
            }
    }(e.exports = function(e, t, n, o) {
        return JSON.stringify(e, r(t, o), n)
    }).getSerialize = r
}, function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    }), t.generateHexString = function(e) {
        for (var t = "", r = 0; r < e; r++) t += (16 * Math.random() | 0).toString(16);
        return t
    }
}, function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    });
    var n = r(9);
    t.getObjectEntries = function(e) {
        return "function" == typeof Object.entries ? Object.entries(e) : n.getObjectKeys(e).map(function(t) {
            return [t, e[t]]
        })
    }
}, function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    });
    var n, o = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function(e) {
            return typeof e
        } : function(e) {
            return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype ? "symbol" : typeof e
        },
        i = r(30),
        a = (n = i) && n.__esModule ? n : {
            default: n
        };
    var s = setTimeout;

    function u() {}

    function c(e) {
        if (!(this instanceof c)) throw new TypeError("Promises must be constructed via new");
        if ("function" != typeof e) throw new TypeError("not a function");
        this._state = 0, this._handled = !1, this._value = void 0, this._deferreds = [], m(e, this)
    }

    function l(e, t) {
        for (; 3 === e._state;) e = e._value;
        0 !== e._state ? (e._handled = !0, c._immediateFn(function() {
            var r = 1 === e._state ? t.onFulfilled : t.onRejected;
            if (null !== r) {
                var n;
                try {
                    n = r(e._value)
                } catch (e) {
                    return void f(t.promise, e)
                }
                d(t.promise, n)
            } else(1 === e._state ? d : f)(t.promise, e._value)
        })) : e._deferreds.push(t)
    }

    function d(e, t) {
        try {
            if (t === e) throw new TypeError("A promise cannot be resolved with itself.");
            if (t && ("object" === (void 0 === t ? "undefined" : o(t)) || "function" == typeof t)) {
                var r = t.then;
                if (t instanceof c) return e._state = 3, e._value = t, void v(e);
                if ("function" == typeof r) return void m((n = r, i = t, function() {
                    n.apply(i, arguments)
                }), e)
            }
            e._state = 1, e._value = t, v(e)
        } catch (t) {
            f(e, t)
        }
        var n, i
    }

    function f(e, t) {
        e._state = 2, e._value = t, v(e)
    }

    function v(e) {
        2 === e._state && 0 === e._deferreds.length && c._immediateFn(function() {
            e._handled || c._unhandledRejectionFn(e._value)
        });
        for (var t = 0, r = e._deferreds.length; t < r; t++) l(e, e._deferreds[t]);
        e._deferreds = null
    }

    function p(e, t, r) {
        this.onFulfilled = "function" == typeof e ? e : null, this.onRejected = "function" == typeof t ? t : null, this.promise = r
    }

    function m(e, t) {
        var r = !1;
        try {
            e(function(e) {
                r || (r = !0, d(t, e))
            }, function(e) {
                r || (r = !0, f(t, e))
            })
        } catch (e) {
            if (r) return;
            r = !0, f(t, e)
        }
    }
    c.prototype.catch = function(e) {
        return this.then(null, e)
    }, c.prototype.then = function(e, t) {
        var r = new this.constructor(u);
        return l(this, new p(e, t, r)), r
    }, c.prototype.finally = a.default, c.all = function(e) {
        return new c(function(t, r) {
            if (!e || void 0 === e.length) throw new TypeError("Promise.all accepts an array");
            var n = Array.prototype.slice.call(e);
            if (0 === n.length) return t([]);
            var i = n.length;

            function a(e, s) {
                try {
                    if (s && ("object" === (void 0 === s ? "undefined" : o(s)) || "function" == typeof s)) {
                        var u = s.then;
                        if ("function" == typeof u) return void u.call(s, function(t) {
                            a(e, t)
                        }, r)
                    }
                    n[e] = s, 0 == --i && t(n)
                } catch (e) {
                    r(e)
                }
            }
            for (var s = 0; s < n.length; s++) a(s, n[s])
        })
    }, c.resolve = function(e) {
        return e && "object" === (void 0 === e ? "undefined" : o(e)) && e.constructor === c ? e : new c(function(t) {
            t(e)
        })
    }, c.reject = function(e) {
        return new c(function(t, r) {
            r(e)
        })
    }, c.race = function(e) {
        return new c(function(t, r) {
            for (var n = 0, o = e.length; n < o; n++) e[n].then(t, r)
        })
    }, c._immediateFn = "function" == typeof setImmediate && function(e) {
        setImmediate(e)
    } || function(e) {
        s(e, 0)
    }, c._unhandledRejectionFn = function(e) {
        "undefined" != typeof console && console && console.warn("Possible Unhandled Promise Rejection:", e)
    }, t.default = c
}, function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    }), t.isString = function(e) {
        return "string" == typeof e
    }
}, , function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    });
    var n = r(44);
    t.getParentFriendlyIFrames = function(e) {
        var t = !(arguments.length > 1 && void 0 !== arguments[1]) || arguments[1];
        if (n.isSafari && t) return [];
        for (var r = [], o = e;;) try {
            if (!(o = o.ownerDocument.defaultView.frameElement)) return r;
            r.push(o)
        } catch (e) {
            return r
        }
    }
}, function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    }), t.default = function(e) {
        var t = this.constructor;
        return this.then(function(r) {
            return t.resolve(e()).then(function() {
                return r
            })
        }, function(r) {
            return t.resolve(e()).then(function() {
                return t.reject(r)
            })
        })
    }
}, function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    }), t.filter = function(e, t, r) {
        for (var n = [], o = 0; o < e.length; o++) {
            var i = e[o];
            t.call(r, i, o, e) && n.push(i)
        }
        return n
    }
}, function(e, t, r) {
    "use strict";
    var n = function() {
        function e(e, t) {
            for (var r = 0; r < t.length; r++) {
                var n = t[r];
                n.enumerable = n.enumerable || !1, n.configurable = !0, "value" in n && (n.writable = !0), Object.defineProperty(e, n.key, n)
            }
        }
        return function(t, r, n) {
            return r && e(t.prototype, r), n && e(t, n), t
        }
    }();
    Object.defineProperty(t, "__esModule", {
        value: !0
    });
    var o = function() {
        function e() {
            ! function(e, t) {
                if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
            }(this, e)
        }
        return n(e, null, [{
            key: "internalToPublic",
            value: function(e) {
                return Math.round(100 * e)
            }
        }, {
            key: "publicToInternal",
            value: function(e) {
                return e / 100
            }
        }]), e
    }();
    t.VolumeUtils = o
}, function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
            value: !0
        }), t.UNABLE_TO_CHANGE_SOURCE_ERROR_CODE = -1,
        function(e) {
            e.DEAFULT_ERROR = "DEAFULT_ERROR", e.BROADCAST_AD_BLOCK_INIT_ERROR = "BROADCAST_AD_BLOCK_INIT_ERROR", e.AD_LOADER_INIT_ERROR = "AD_LOADER_INIT_ERROR", e.UNSUPPORTED_MEDIA_TYPE = "UNSUPPORTED_MEDIA_TYPE", e.SCRIPT_INIT_ERROR = "SCRIPT_INIT_ERROR", e.HLS_NOT_FATAL_ERROR = "HLS_NOT_FATAL_ERROR", e.MPD_WIDEVINE_NOT_SUPPORTED_ERROR = "MPD_WIDEVINE_NOT_SUPPORTED_ERROR", e.MPD_SHAKA_INIT_ERROR = "MPD_SHAKA_INIT_ERROR", e.MPD_NOT_SUPPORTED_ERROR = "MPD_NOT_SUPPORTED_ERROR", e.MEDIA_NOT_PLAYING = "MEDIA_NOT_PLAYING", e.HLS_MEDIA_ERROR = "HLS_MEDIA_ERROR", e.REFRESH_SUBTITLES_ERROR = "REFRESH_SUBTITLES_ERROR", e.FAIRPLAY_NOT_SUPPORTED = "FAIRPLAY_NOT_SUPPORTED", e.FAIRPLAY_CERT_LOAD_ERROR = "FAIRPLAY_CERT_LOAD_ERROR", e.FAIRPLAY_CREATE_MEDIA_KEYS_ERROR = "FAIRPLAY_CREATE_MEDIA_KEYS_ERROR", e.FAIRPLAY_CREATE_KEY_SESSION_ERROR = "FAIRPLAY_CREATE_KEY_SESSION_ERROR", e.FAIRPLAY_SPC_LOAD_ERROR = "FAIRPLAY_SPC_LOAD_ERROR", e.FAIRPLAY_CREATE_KEY_ERROR = "FAIRPLAY_CREATE_KEY_ERROR", e.FAIRPLAY_INVALID_CONTENT_ID = "FAIRPLAY_INVALID_CONTENT_ID", e.PROTECTED_FRAME_DIRECT_LINK_BLOCKED = "PROTECTED_FRAME_DIRECT_LINK_BLOCKED", e.NO_HLS_JS_INSTANCE = "NO_HLS_JS_INSTANCE", e.INVALID_SEEK_POSITION_OBJECT = "INVALID_SEEK_POSITION_OBJECT", e.AD_IS_ALREADY_PLAYING = "AD_IS_ALREADY_PLAYING", e.MULTIROLL_INIT_ERROR = "MULTIROLL_INIT_ERROR", e.PREROLL_ERROR = "PREROLL_ERROR", e.USING_VIDEO_AD_IN_MULTIROLL_SHEME = "USING_VIDEO_AD_IN_MULTIROLL_SHEME", e.DETECT_PLAY_BY_INTERVAL = "DETECT_PLAY_BY_INTERVAL", e.NO_PLAYABLE_STREAMS = "NO_PLAYABLE_STREAMS", e.REACT_COMPONENT_DID_CATCH_ERROR_INFO = "REACT_COMPONENT_DID_CATCH_ERROR_INFO", e.UNEXPECTED_FEATURE_NAME = "UNEXPECTED_FEATURE_NAME", e.UNEXPECTED_FEATURE_ACTION_NAME = "UNEXPECTED_FEATURE_ACTION_NAME", e.NO_PARAMS_IN_FEATURE_ACTION = "NO_PARAMS_IN_FEATURE_ACTION", e.FEATURE_ACTION_DISPATCH_ERROR = "FEATURE_ACTION_DISPATCH_ERROR"
        }(t.StreamPlayerErrorCode || (t.StreamPlayerErrorCode = {}))
}, function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    }), t.isSerializable = function(e) {
        try {
            return JSON.stringify(e), !0
        } catch (e) {
            return !1
        }
    }
}, function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    });
    var n = r(81).getCurrentScript();
    t.CURRENT_SCRIPT_SRC = n ? n.src : ""
}, function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
            value: !0
        }),
        function(e) {
            e[e.PLAYING = 1] = "PLAYING", e[e.NOT_PLAYING = 2] = "NOT_PLAYING"
        }(t.AdState || (t.AdState = {}))
}, function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    });
    var n = r(14);
    t.getNativeMethod = function(e, t) {
        var r = e[t];
        if (!n.checkNativeCode(r)) {
            var o = r;
            try {
                delete e[t];
                var i = e[t];
                "function" == typeof i && (r = i), e[t] = o
            } catch (e) {}
        }
        return r
    }
}, function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
            value: !0
        }),
        function(e) {
            e.LOAD_SCRIPT_ERROR = "LOAD_SCRIPT_ERROR", e.STATS_SENSOR_NAME_ERROR = "STATS_SENSOR_NAME_ERROR", e.STATS_LABEL_KEY_ERROR = "STATS_LABEL_KEY_ERROR", e.STATS_LABEL_VALUE_ERROR = "STATS_LABEL_VALUE_ERROR"
        }(t.CommonError || (t.CommonError = {}))
}, function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    }), t.map = function(e, t, r) {
        for (var n = new Array(e.length), o = 0; o < e.length; o++) n[o] = t.call(r, e[o], o, e);
        return n
    }
}, function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    });
    var n = r(37).getNativeMethod(Array, "isArray"),
        o = {};
    t.isArray = Boolean(n) ? function(e) {
        return n.call(Array, e)
    } : function(e) {
        return "[object Array]" === o.toString.call(o, e)
    }
}, function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    }), t.DEFAULT_SID_LENGTH = 64
}, , function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    }), t.removeNodeFromParent = function(e) {
        if (e) {
            var t = e.parentElement;
            t && t.removeChild(e)
        }
    }
}, function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    });
    var n = r(82);
    t.isSafari = n.getIsSafari()
}, function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
            value: !0
        }),
        function(e) {
            e.PLAY = "play", e.PAUSE = "pause", e.BUFFERING = "buffering", e.END = "end"
        }(t.VideoPlayingState || (t.VideoPlayingState = {}))
}, function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    }), t.PCODE_LOGS_URL = "https://an.yandex.ru/jstracer"
}, function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    }), t.SOLOMON_SERVICE_NAME = "StreamPlayer"
}, function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    }), t.getHead = function(e) {
        var t = e.document,
            r = t.getElementsByTagName("head")[0];
        return r || (r = t.createElement("head"), t.documentElement.appendChild(r)), r
    }
}, function(e, t, r) {
    "use strict";
    var n = function() {
            return function(e, t) {
                if (Array.isArray(e)) return e;
                if (Symbol.iterator in Object(e)) return function(e, t) {
                    var r = [],
                        n = !0,
                        o = !1,
                        i = void 0;
                    try {
                        for (var a, s = e[Symbol.iterator](); !(n = (a = s.next()).done) && (r.push(a.value), !t || r.length !== t); n = !0);
                    } catch (e) {
                        o = !0, i = e
                    } finally {
                        try {
                            !n && s.return && s.return()
                        } finally {
                            if (o) throw i
                        }
                    }
                    return r
                }(e, t);
                throw new TypeError("Invalid attempt to destructure non-iterable instance")
            }
        }(),
        o = function() {
            function e(e, t) {
                for (var r = 0; r < t.length; r++) {
                    var n = t[r];
                    n.enumerable = n.enumerable || !1, n.configurable = !0, "value" in n && (n.writable = !0), Object.defineProperty(e, n.key, n)
                }
            }
            return function(t, r, n) {
                return r && e(t.prototype, r), n && e(t, n), t
            }
        }(),
        i = Object.assign || function(e) {
            for (var t = 1; t < arguments.length; t++) {
                var r = arguments[t];
                for (var n in r) Object.prototype.hasOwnProperty.call(r, n) && (e[n] = r[n])
            }
            return e
        };

    function a(e, t, r) {
        return t in e ? Object.defineProperty(e, t, {
            value: r,
            enumerable: !0,
            configurable: !0,
            writable: !0
        }) : e[t] = r, e
    }
    Object.defineProperty(t, "__esModule", {
        value: !0
    });
    var s = r(38),
        u = r(15),
        c = r(35),
        l = r(50),
        d = r(19),
        f = r(24),
        v = r(71),
        p = r(52),
        m = r(12),
        h = r(25),
        y = r(9),
        g = r(86),
        E = r(10),
        b = r(88),
        _ = r(41),
        w = r(46),
        S = r(89),
        T = r(23);
    t.SEPARATE_SIGN = "_", t.CREATE_TAGS_FOR_STATS_DEFAULT = function(e) {
        var r = e.eventType,
            n = e.eventName,
            o = e.value,
            s = e.values,
            u = {};
        return m.forOwn(s, function(e, o) {
            u["" + r + t.SEPARATE_SIGN + n + t.SEPARATE_SIGN + o] = e
        }), i(a({}, "" + r + t.SEPARATE_SIGN + n, o), u)
    };
    var O = /^\w(\-|:|\s|\.|\w){1,20}$/,
        P = /^\w(\-|:|\s|\.|\w){0,70}$/,
        A = /^\w(\-|:|\s|\.|\w){1,70}$/,
        C = function() {
            function e(t) {
                var r = this;
                ! function(e, t) {
                    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                }(this, e), this.rootFields = {}, this.labels = {}, this.event = function(e) {
                    var t = e.name,
                        n = e.data,
                        o = e.labels,
                        i = e.probability;
                    r.push({
                        eventType: S.StatsEventType.event,
                        eventName: t,
                        data: n,
                        additionalStatsLabels: o,
                        probability: i
                    })
                }, this.error = function(e) {
                    var t = e.error,
                        n = e.labels,
                        o = e.probability,
                        i = new u.CustomError(t);
                    r.push({
                        eventName: String(i.code),
                        eventType: S.StatsEventType.error,
                        data: i,
                        additionalStatsLabels: n,
                        probability: o
                    })
                }, this.value = function(e) {
                    var t = e.name,
                        n = e.value,
                        o = e.data,
                        i = e.labels,
                        a = e.probability;
                    r.push({
                        eventName: t,
                        value: n,
                        eventType: S.StatsEventType.value,
                        data: o,
                        additionalStatsLabels: i,
                        probability: a
                    })
                }, this.values = function(e) {
                    var t = e.name,
                        n = e.values,
                        o = e.data,
                        i = e.labels,
                        a = e.probability;
                    r.push({
                        eventName: t,
                        eventType: S.StatsEventType.values,
                        data: o,
                        additionalStatsLabels: i,
                        probability: a,
                        values: n
                    })
                }, this.warning = function(e) {
                    var t = e.name,
                        n = e.message,
                        o = e.probability;
                    "undefined" != typeof console && "function" == typeof console.warn && console.warn(n), r.push({
                        eventName: t,
                        eventType: S.StatsEventType.warning,
                        data: {
                            message: n
                        },
                        probability: o
                    })
                }, this.getParams = function() {
                    return i({}, r.params)
                }, this.setRootFields = function(e) {
                    h.getObjectEntries(e).forEach(function(e) {
                        var t = n(e, 2),
                            o = t[0],
                            i = t[1];
                        void 0 === i ? delete r.rootFields[o] : r.rootFields[o] = i
                    })
                }, this.setLabels = function(e) {
                    h.getObjectEntries(e).forEach(function(e) {
                        var t = n(e, 2),
                            o = t[0],
                            i = t[1];
                        void 0 === i ? delete r.labels[o] : r.labels[o] = i
                    })
                }, this.eventToStats = function(e, t, n) {
                    r.push({
                        eventType: S.StatsEventType.event,
                        eventName: e,
                        data: t,
                        additionalStatsLabels: n
                    })
                }, this.errorToStats = function(e, t) {
                    var n = new u.CustomError(e);
                    r.push({
                        eventName: String(n.code),
                        eventType: S.StatsEventType.error,
                        data: n,
                        additionalStatsLabels: t
                    })
                }, this.deprecated = function(e, t) {
                    "undefined" != typeof console && "function" == typeof console.warn && console.warn(t), r.push({
                        eventName: e,
                        eventType: S.StatsEventType.deprecated,
                        data: {
                            message: t
                        }
                    })
                }, this.valueToStats = function(e, t, n, o) {
                    r.push({
                        eventName: e,
                        value: t,
                        eventType: S.StatsEventType.value,
                        data: n,
                        additionalStatsLabels: o
                    })
                }, this.params = i({}, t, {
                    sid: t.sid || f.generateHexString(_.DEFAULT_SID_LENGTH)
                })
            }
            return o(e, [{
                key: "push",
                value: function(e) {
                    var r = e.eventName,
                        n = e.eventType,
                        o = e.data,
                        s = void 0 === o ? {} : o,
                        u = e.additionalStatsLabels,
                        c = e.value,
                        l = void 0 === c ? 1 : c,
                        d = e.probability,
                        f = void 0 === d ? 1 : d,
                        v = e.values,
                        m = void 0 === v ? {} : v;
                    if (g.portion(f)) {
                        var h = this.params,
                            y = h.service,
                            b = h.version,
                            _ = {
                                service: y,
                                version: b,
                                data: s,
                                eventName: r,
                                eventType: n,
                                additionalStatsLabels: u,
                                value: l,
                                values: m
                            };
                        try {
                            var S;
                            p.request({
                                url: E.addParamsToUrl(w.PCODE_LOGS_URL, i((S = {}, a(S, y, b), a(S, n, r), S), u)),
                                data: T(this.createFullStatsObject(_)),
                                method: "POST",
                                onBeforeSend: this.params.onBeforeSend
                            })
                        } catch (e) {
                            t.stats.errorToStats(e, {
                                service: y
                            }), "undefined" != typeof console && "function" == typeof console.error && console.error("Cannot send stats data [" + JSON.stringify({
                                service: y,
                                version: b,
                                eventType: n,
                                eventName: r
                            }) + "]")
                        }
                    }
                }
            }, {
                key: "createFullStatsObject",
                value: function(e) {
                    var r = e.service,
                        o = e.version,
                        a = e.eventName,
                        f = e.eventType,
                        p = e.data,
                        m = e.additionalStatsLabels,
                        g = e.value,
                        E = (this.params.createTagsFunction || t.CREATE_TAGS_FOR_STATS_DEFAULT)(e),
                        b = i({}, this.labels, m, {
                            version: this.params.version
                        }),
                        _ = {
                            service: r,
                            tags: E,
                            labels: b
                        };
                    y.getObjectKeys(E).forEach(function(e) {
                        if (!A.test(e)) throw new u.CustomError({
                            code: s.CommonError.STATS_SENSOR_NAME_ERROR,
                            details: {
                                service: r,
                                sensorName: e
                            }
                        })
                    }), h.getObjectEntries(b).forEach(function(e) {
                        var t = n(e, 2),
                            o = t[0],
                            i = t[1];
                        if (!O.test(o)) throw new u.CustomError({
                            code: s.CommonError.STATS_LABEL_KEY_ERROR,
                            details: {
                                service: r,
                                labelKey: o
                            }
                        });
                        if (!P.test(i)) throw new u.CustomError({
                            code: s.CommonError.STATS_LABEL_VALUE_ERROR,
                            details: {
                                service: r,
                                labelValue: i
                            }
                        })
                    });
                    var w = l.getTopLocationData(document),
                        S = w.location,
                        T = w.referrer;
                    return i({}, this.rootFields, _, {
                        timestamp: Date.now(),
                        eventType: f,
                        eventName: a,
                        data: p,
                        sid: this.params.sid,
                        version: o,
                        location: d.getWindowLocation(window),
                        topLocation: S,
                        referrer: window.document.referrer,
                        topReferrer: T,
                        userAgent: window.navigator.userAgent,
                        currentScriptSrc: c.CURRENT_SCRIPT_SRC,
                        secureIFrame: v.isInSecureIFrame,
                        value: g
                    })
                }
            }]), e
        }();
    t.Stats = C, t.stats = new C({
        service: b.COMMON_LOCAL_STATS_SERVICE_NAME,
        version: "0",
        sid: f.generateHexString(_.DEFAULT_SID_LENGTH)
    })
}, function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    });
    var n = r(51);
    t.getTopLocationData = function(e) {
        var t = "",
            r = "";
        return e && n.getParentLocationsData(e).reverse().forEach(function(e) {
            var n = e.location,
                o = e.referrer;
            t = t || n, r = r || o
        }), {
            location: t,
            referrer: r
        }
    }
}, function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    });
    var n = r(19),
        o = r(29);
    t.getParentLocationsData = function(e) {
        var t = o.getParentFriendlyIFrames(e.documentElement).map(function(e) {
            return e.ownerDocument
        });
        return t.unshift(e), t.map(function(e) {
            return {
                location: n.getWindowLocation(e.defaultView),
                referrer: e.referrer
            }
        })
    }
}, function(e, t, r) {
    "use strict";
    var n = Object.assign || function(e) {
        for (var t = 1; t < arguments.length; t++) {
            var r = arguments[t];
            for (var n in r) Object.prototype.hasOwnProperty.call(r, n) && (e[n] = r[n])
        }
        return e
    };
    Object.defineProperty(t, "__esModule", {
        value: !0
    });
    var o = r(5),
        i = r(12),
        a = 200;
    t.request = function e(t) {
        var r = t.method,
            s = t.url,
            u = t.async,
            c = void 0 === u || u,
            l = t.data,
            d = t.responseType,
            f = void 0 === d ? "text" : d,
            v = t.onBeforeSend,
            p = void 0 === v ? o.noop : v,
            m = t.onError,
            h = void 0 === m ? o.noop : m,
            y = t.onSuccess,
            g = void 0 === y ? o.noop : y,
            E = t.onRetry,
            b = void 0 === E ? o.noop : E,
            _ = t.checkStatus,
            w = void 0 === _ ? function(e) {
                return a === e
            } : _,
            S = t.headers,
            T = void 0 === S ? {} : S,
            O = t.xhrConstructor,
            P = void 0 === O ? XMLHttpRequest : O,
            A = t.retries,
            C = void 0 === A ? 0 : A,
            R = t.timeout,
            I = void 0 === R ? 0 : R,
            L = t.withCredentials,
            F = new P;
        F.open(r, s, c), F.responseType = f, F.withCredentials = Boolean(L), i.forOwn(T, function(e, t) {
            try {
                F.setRequestHeader(t, e)
            } catch (e) {}
        });
        var k = void 0;
        I > 0 && isFinite(I) && (k = window.setTimeout(function() {
            M(new Error("Request timeout, " + s))
        }, I));
        var M = function(r) {
            if (F.onerror = null, F.onreadystatechange = null, void 0 !== k) {
                clearTimeout(k);
                try {
                    F.abort()
                } catch (r) {}
            }
            C > 0 ? (b(r), e(n({}, t, {
                retries: C - 1
            }))) : h(r, F)
        };
        F.onerror = M, F.onreadystatechange = function() {
            if (4 === F.readyState) {
                var e = F.status;
                w(e) ? (clearTimeout(k), g(F)) : M(new Error("Invalid request status " + e + ", " + s))
            }
        }, p(F, t);
        try {
            F.send(l)
        } catch (e) {
            M(e)
        }
    }
}, function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    });
    var n = function() {
        function e(e, t) {
            for (var r = 0; r < t.length; r++) {
                var n = t[r];
                n.enumerable = n.enumerable || !1, n.configurable = !0, "value" in n && (n.writable = !0), Object.defineProperty(e, n.key, n)
            }
        }
        return function(t, r, n) {
            return r && e(t.prototype, r), n && e(t, n), t
        }
    }();
    t.hasCookies = function() {
        var e = new u;
        try {
            e.setItem("__test", "1");
            var t = e.getItem("__test");
            return e.removeItem("__test"), "1" === t
        } catch (e) {
            return !1
        }
    };
    var o, i = r(114),
        a = (o = i) && o.__esModule ? o : {
            default: o
        };
    var s = "lS_",
        u = function() {
            function e() {
                var t = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {};
                ! function(e, t) {
                    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                }(this, e), this.cookieOptions = Object.assign({
                    path: "/"
                }, t), s = t.prefix || s
            }
            return n(e, [{
                key: "getItem",
                value: function(e) {
                    var t = a.default.parse(document.cookie);
                    return t && t.hasOwnProperty(s + e) ? t[s + e] : null
                }
            }, {
                key: "setItem",
                value: function(e, t) {
                    return document.cookie = a.default.serialize(s + e, t, this.cookieOptions), t
                }
            }, {
                key: "removeItem",
                value: function(e) {
                    var t = Object.assign({}, this.cookieOptions, {
                        maxAge: -1
                    });
                    return document.cookie = a.default.serialize(s + e, "", t), null
                }
            }, {
                key: "clear",
                value: function() {
                    var e = a.default.parse(document.cookie);
                    for (var t in e) 0 === t.indexOf(s) && this.removeItem(t.substr(s.length));
                    return null
                }
            }]), e
        }();
    t.default = u
}, , , , function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    }), t.isFunction = function(e) {
        return "[object Function]" === {}.toString.call(e)
    }
}, function(e, t, r) {
    "use strict";
    var n = function() {
        return function(e, t) {
            if (Array.isArray(e)) return e;
            if (Symbol.iterator in Object(e)) return function(e, t) {
                var r = [],
                    n = !0,
                    o = !1,
                    i = void 0;
                try {
                    for (var a, s = e[Symbol.iterator](); !(n = (a = s.next()).done) && (r.push(a.value), !t || r.length !== t); n = !0);
                } catch (e) {
                    o = !0, i = e
                } finally {
                    try {
                        !n && s.return && s.return()
                    } finally {
                        if (o) throw i
                    }
                }
                return r
            }(e, t);
            throw new TypeError("Invalid attempt to destructure non-iterable instance")
        }
    }();
    Object.defineProperty(t, "__esModule", {
        value: !0
    });
    var o = r(31);
    t.getFirstDefined = function(e) {
        var t = o.filter(e, function(e) {
            return void 0 !== e
        });
        return n(t, 1)[0]
    }
}, function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    }), t.DEFAULT_ERROR = {
        message: "DEFAULT_ERROR_MESSAGE",
        code: 0,
        details: "",
        stack: "?:?:?",
        isFatal: !0
    }
}, function(e, t) {
    e.exports = Object.setPrototypeOf || ({
            __proto__: []
        }
        instanceof Array ? function(e, t) {
            return e.__proto__ = t, e
        } : function(e, t) {
            for (var r in t) e.hasOwnProperty(r) || (e[r] = t[r]);
            return e
        })
}, , function(e, t, r) {
    "use strict";
    var n = function() {
        function e(e, t) {
            for (var r = 0; r < t.length; r++) {
                var n = t[r];
                n.enumerable = n.enumerable || !1, n.configurable = !0, "value" in n && (n.writable = !0), Object.defineProperty(e, n.key, n)
            }
        }
        return function(t, r, n) {
            return r && e(t.prototype, r), n && e(t, n), t
        }
    }();
    Object.defineProperty(t, "__esModule", {
        value: !0
    });
    var o = function() {
        function e(t) {
            ! function(e, t) {
                if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
            }(this, e), this.cache = t
        }
        return n(e, [{
            key: "get",
            value: function(e) {
                return this.cache[e]
            }
        }, {
            key: "has",
            value: function(e) {
                return e in this.cache
            }
        }, {
            key: "set",
            value: function(e, t) {
                this.cache[e] = t
            }
        }]), e
    }();
    t.ObjectCache = o, t.memoize = function(e) {
        var t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : function(e) {
                return e
            },
            r = arguments.length > 2 && void 0 !== arguments[2] ? arguments[2] : new o({});
        return function() {
            var n = t.apply(this, arguments);
            if (r.has(n)) return r.get(n);
            var o = e.apply(this, arguments);
            return r.set(n, o), o
        }
    }
}, function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    });
    var n = r(32);
    t.MAX_VOLUME = 1, t.MIN_VOLUME = 0, t.PUBLIC_MIN_VOLUME = n.VolumeUtils.internalToPublic(t.MIN_VOLUME), t.PUBLIC_MAX_VOLUME = n.VolumeUtils.internalToPublic(t.MAX_VOLUME)
}, function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
            value: !0
        }),
        function(e) {
            e.preroll = "preroll", e.midroll = "midroll", e.postroll = "postroll", e.replaced = "replaced", e.notReplaced = "notReplaced"
        }(t.AdType || (t.AdType = {}))
}, function(e, t, r) {
    "use strict";
    var n = function() {
            return function(e, t) {
                if (Array.isArray(e)) return e;
                if (Symbol.iterator in Object(e)) return function(e, t) {
                    var r = [],
                        n = !0,
                        o = !1,
                        i = void 0;
                    try {
                        for (var a, s = e[Symbol.iterator](); !(n = (a = s.next()).done) && (r.push(a.value), !t || r.length !== t); n = !0);
                    } catch (e) {
                        o = !0, i = e
                    } finally {
                        try {
                            !n && s.return && s.return()
                        } finally {
                            if (o) throw i
                        }
                    }
                    return r
                }(e, t);
                throw new TypeError("Invalid attempt to destructure non-iterable instance")
            }
        }(),
        o = Object.assign || function(e) {
            for (var t = 1; t < arguments.length; t++) {
                var r = arguments[t];
                for (var n in r) Object.prototype.hasOwnProperty.call(r, n) && (e[n] = r[n])
            }
            return e
        };
    Object.defineProperty(t, "__esModule", {
        value: !0
    });
    var i = document.createElement("a"),
        a = {};

    function s(e, t, r) {
        if (i.href = e, void 0 === t) return e;
        if (void 0 === r) return e;
        var n = encodeURIComponent(t) + "=" + encodeURIComponent(r);
        return i.search = i.search ? i.search + "&" + n : "?" + n, i.href
    }

    function u(e, t) {
        if (-1 === e.indexOf("?")) return e;
        i.href = e;
        var r = i.search.substring(1).split("&").filter(function(e) {
            return e !== t && 0 !== e.indexOf(t + "=")
        }).join("&");
        return i.search = r ? "?" + r : "", i.href
    }
    t.parseUrl = function(e) {
        var t = a[e];
        if (t) return t;
        i.href = e;
        var r = i.pathname || "";
        "/" !== r.charAt(0) && (r = "/" + r);
        var n = {
            href: i.href,
            protocol: i.protocol,
            host: i.host,
            hostname: i.hostname,
            port: i.port,
            pathname: r,
            search: i.search,
            hash: i.hash,
            baseDomain: (i.hostname || "").split(".").slice(-2).join(".")
        };
        return a[e] = n, o({}, n)
    }, t.getUrlDomain = function(e) {
        return i.href = e, i.hostname
    }, t.addParamToUrl = s, t.addParamsToUrl = function(e, t) {
        for (var r in t) t.hasOwnProperty(r) && (e = s(e, r, t[r]));
        return e
    }, t.getUrlParam = function(e, t) {
        i.href = e;
        var r = i.search.substring(1).split("&");
        for (var o in r)
            if (r.hasOwnProperty(o)) {
                var a = r[o].split("="),
                    s = n(a, 2),
                    u = s[0],
                    c = s[1];
                if (u === t) return c ? decodeURIComponent(c) : ""
            } return null
    }, t.removeParamFromUrl = u, t.removeParamsFromUrl = function(e, t) {
        return -1 === e.indexOf("?") ? e : t.reduce(u, e)
    };
    var c = ["http:", "https:"];
    t.setProtocolToUrl = function(e, t) {
        if (-1 === c.indexOf(t)) throw new Error("setProtocolToUrl Error: Unsupported protocol: " + t);
        return i.href = e, i.protocol = t, i.href
    }
}, function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    });
    var n = r(133);
    t.parseAdConfig = function(e) {
        return {
            partnerId: e.hasOwnProperty("partner_id") ? Number(e.partner_id) : e.partnerId,
            category: e.hasOwnProperty("category") ? Number(e.category) : n.DEFAULT_AD_CATEGORY,
            impId: e.hasOwnProperty("imp_id") ? e.imp_id : e.impId,
            videoContentId: e.hasOwnProperty("video_content_id") ? e.video_content_id : e.videoContentId,
            videoContentName: e.hasOwnProperty("video_content_name") ? e.video_content_name : e.videoContentName,
            videoPublisherId: e.hasOwnProperty("video_publisher_id") ? e.video_publisher_id : e.videoPublisherId,
            videoPublisherName: e.hasOwnProperty("video_publisher_name") ? e.video_publisher_name : e.videoPublisherName,
            videoGenreId: e.hasOwnProperty("video_genre_id") ? e.video_genre_id : e.videoGenreId,
            videoGenreName: e.hasOwnProperty("video_genre_name") ? e.video_genre_name : e.videoGenreName,
            distrId: e.hasOwnProperty("distr_id") ? e.distr_id : e.distrId
        }
    }
}, , , , function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    }), t.PROD_DOMAIN = "yastatic.net"
}, function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    });
    var n = r(84);
    t.isInSecureIFrame = n.isInSecureIFrame()
}, function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    }), t.DEFAULT_REPORT_URL = "https://yandex.ru/support/teletranslation/form.html", t.REPORT_URL_MAX_LENGTH = 2048
}, function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    }), t.isFiniteNumber = function(e) {
        return "number" == typeof e && isFinite(e)
    }
}, , , function(e, t, r) {
    "use strict";
    var n = Object.assign || function(e) {
        for (var t = 1; t < arguments.length; t++) {
            var r = arguments[t];
            for (var n in r) Object.prototype.hasOwnProperty.call(r, n) && (e[n] = r[n])
        }
        return e
    };
    Object.defineProperty(t, "__esModule", {
        value: !0
    });
    var o = r(48),
        i = r(5),
        a = r(43),
        s = r(77),
        u = function(e) {
            return !0
        };
    t.loadScriptLite = function e(t) {
        var r = t.src,
            c = t.win,
            l = t.charset,
            d = void 0 === l ? s.CHARSET_UTF_8 : l,
            f = t.async,
            v = void 0 === f || f,
            p = t.retries,
            m = void 0 === p ? 0 : p,
            h = t.onRetry,
            y = void 0 === h ? i.noop : h,
            g = t.checkLoad,
            E = void 0 === g ? u : g,
            b = t.onBeforeLoad,
            _ = void 0 === b ? i.noop : b,
            w = t.onLoad,
            S = void 0 === w ? i.noop : w,
            T = t.onError,
            O = void 0 === T ? i.noop : T,
            P = c || window,
            A = P.document.createElement("script"),
            C = function(r) {
                m > 0 ? (y(r), e(n({}, t, {
                    retries: m - 1
                }))) : O(r), a.removeNodeFromParent(A)
            };
        A.type = "text/javascript", A.async = v, A.onload = function() {
            return E(A) ? S() : C(new Error("checkLoad for " + r + " failed"))
        }, A.onerror = C, A.src = r, A.charset = d, _(A), o.getHead(P).appendChild(A)
    }
}, function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    }), t.CHARSET_UTF_8 = "utf-8"
}, function(e, t, r) {
    var n = function() {
            return this
        }() || Function("return this")(),
        o = n.regeneratorRuntime && Object.getOwnPropertyNames(n).indexOf("regeneratorRuntime") >= 0,
        i = o && n.regeneratorRuntime;
    if (n.regeneratorRuntime = void 0, e.exports = r(79), o) n.regeneratorRuntime = i;
    else try {
        delete n.regeneratorRuntime
    } catch (e) {
        n.regeneratorRuntime = void 0
    }
}, function(e, t, r) {
    (function(t) {
        ! function(r) {
            "use strict";
            var n, o = Object.prototype,
                i = o.hasOwnProperty,
                a = "function" == typeof Symbol ? Symbol : {},
                s = a.iterator || "@@iterator",
                u = a.asyncIterator || "@@asyncIterator",
                c = a.toStringTag || "@@toStringTag",
                l = "object" == typeof e,
                d = r.regeneratorRuntime;
            if (d) l && (e.exports = d);
            else {
                (d = r.regeneratorRuntime = l ? e.exports : {}).wrap = _;
                var f = "suspendedStart",
                    v = "suspendedYield",
                    p = "executing",
                    m = "completed",
                    h = {},
                    y = {};
                y[s] = function() {
                    return this
                };
                var g = Object.getPrototypeOf,
                    E = g && g(g(F([])));
                E && E !== o && i.call(E, s) && (y = E);
                var b = O.prototype = S.prototype = Object.create(y);
                T.prototype = b.constructor = O, O.constructor = T, O[c] = T.displayName = "GeneratorFunction", d.isGeneratorFunction = function(e) {
                    var t = "function" == typeof e && e.constructor;
                    return !!t && (t === T || "GeneratorFunction" === (t.displayName || t.name))
                }, d.mark = function(e) {
                    return Object.setPrototypeOf ? Object.setPrototypeOf(e, O) : (e.__proto__ = O, c in e || (e[c] = "GeneratorFunction")), e.prototype = Object.create(b), e
                }, d.awrap = function(e) {
                    return {
                        __await: e
                    }
                }, P(A.prototype), A.prototype[u] = function() {
                    return this
                }, d.AsyncIterator = A, d.async = function(e, t, r, n) {
                    var o = new A(_(e, t, r, n));
                    return d.isGeneratorFunction(t) ? o : o.next().then(function(e) {
                        return e.done ? e.value : o.next()
                    })
                }, P(b), b[c] = "Generator", b[s] = function() {
                    return this
                }, b.toString = function() {
                    return "[object Generator]"
                }, d.keys = function(e) {
                    var t = [];
                    for (var r in e) t.push(r);
                    return t.reverse(),
                        function r() {
                            for (; t.length;) {
                                var n = t.pop();
                                if (n in e) return r.value = n, r.done = !1, r
                            }
                            return r.done = !0, r
                        }
                }, d.values = F, L.prototype = {
                    constructor: L,
                    reset: function(e) {
                        if (this.prev = 0, this.next = 0, this.sent = this._sent = n, this.done = !1, this.delegate = null, this.method = "next", this.arg = n, this.tryEntries.forEach(I), !e)
                            for (var t in this) "t" === t.charAt(0) && i.call(this, t) && !isNaN(+t.slice(1)) && (this[t] = n)
                    },
                    stop: function() {
                        this.done = !0;
                        var e = this.tryEntries[0].completion;
                        if ("throw" === e.type) throw e.arg;
                        return this.rval
                    },
                    dispatchException: function(e) {
                        if (this.done) throw e;
                        var t = this;

                        function r(r, o) {
                            return s.type = "throw", s.arg = e, t.next = r, o && (t.method = "next", t.arg = n), !!o
                        }
                        for (var o = this.tryEntries.length - 1; o >= 0; --o) {
                            var a = this.tryEntries[o],
                                s = a.completion;
                            if ("root" === a.tryLoc) return r("end");
                            if (a.tryLoc <= this.prev) {
                                var u = i.call(a, "catchLoc"),
                                    c = i.call(a, "finallyLoc");
                                if (u && c) {
                                    if (this.prev < a.catchLoc) return r(a.catchLoc, !0);
                                    if (this.prev < a.finallyLoc) return r(a.finallyLoc)
                                } else if (u) {
                                    if (this.prev < a.catchLoc) return r(a.catchLoc, !0)
                                } else {
                                    if (!c) throw new Error("try statement without catch or finally");
                                    if (this.prev < a.finallyLoc) return r(a.finallyLoc)
                                }
                            }
                        }
                    },
                    abrupt: function(e, t) {
                        for (var r = this.tryEntries.length - 1; r >= 0; --r) {
                            var n = this.tryEntries[r];
                            if (n.tryLoc <= this.prev && i.call(n, "finallyLoc") && this.prev < n.finallyLoc) {
                                var o = n;
                                break
                            }
                        }
                        o && ("break" === e || "continue" === e) && o.tryLoc <= t && t <= o.finallyLoc && (o = null);
                        var a = o ? o.completion : {};
                        return a.type = e, a.arg = t, o ? (this.method = "next", this.next = o.finallyLoc, h) : this.complete(a)
                    },
                    complete: function(e, t) {
                        if ("throw" === e.type) throw e.arg;
                        return "break" === e.type || "continue" === e.type ? this.next = e.arg : "return" === e.type ? (this.rval = this.arg = e.arg, this.method = "return", this.next = "end") : "normal" === e.type && t && (this.next = t), h
                    },
                    finish: function(e) {
                        for (var t = this.tryEntries.length - 1; t >= 0; --t) {
                            var r = this.tryEntries[t];
                            if (r.finallyLoc === e) return this.complete(r.completion, r.afterLoc), I(r), h
                        }
                    },
                    catch: function(e) {
                        for (var t = this.tryEntries.length - 1; t >= 0; --t) {
                            var r = this.tryEntries[t];
                            if (r.tryLoc === e) {
                                var n = r.completion;
                                if ("throw" === n.type) {
                                    var o = n.arg;
                                    I(r)
                                }
                                return o
                            }
                        }
                        throw new Error("illegal catch attempt")
                    },
                    delegateYield: function(e, t, r) {
                        return this.delegate = {
                            iterator: F(e),
                            resultName: t,
                            nextLoc: r
                        }, "next" === this.method && (this.arg = n), h
                    }
                }
            }

            function _(e, t, r, n) {
                var o = t && t.prototype instanceof S ? t : S,
                    i = Object.create(o.prototype),
                    a = new L(n || []);
                return i._invoke = function(e, t, r) {
                    var n = f;
                    return function(o, i) {
                        if (n === p) throw new Error("Generator is already running");
                        if (n === m) {
                            if ("throw" === o) throw i;
                            return k()
                        }
                        for (r.method = o, r.arg = i;;) {
                            var a = r.delegate;
                            if (a) {
                                var s = C(a, r);
                                if (s) {
                                    if (s === h) continue;
                                    return s
                                }
                            }
                            if ("next" === r.method) r.sent = r._sent = r.arg;
                            else if ("throw" === r.method) {
                                if (n === f) throw n = m, r.arg;
                                r.dispatchException(r.arg)
                            } else "return" === r.method && r.abrupt("return", r.arg);
                            n = p;
                            var u = w(e, t, r);
                            if ("normal" === u.type) {
                                if (n = r.done ? m : v, u.arg === h) continue;
                                return {
                                    value: u.arg,
                                    done: r.done
                                }
                            }
                            "throw" === u.type && (n = m, r.method = "throw", r.arg = u.arg)
                        }
                    }
                }(e, r, a), i
            }

            function w(e, t, r) {
                try {
                    return {
                        type: "normal",
                        arg: e.call(t, r)
                    }
                } catch (e) {
                    return {
                        type: "throw",
                        arg: e
                    }
                }
            }

            function S() {}

            function T() {}

            function O() {}

            function P(e) {
                ["next", "throw", "return"].forEach(function(t) {
                    e[t] = function(e) {
                        return this._invoke(t, e)
                    }
                })
            }

            function A(e) {
                var r;
                this._invoke = function(n, o) {
                    function a() {
                        return new t(function(r, a) {
                            ! function r(n, o, a, s) {
                                var u = w(e[n], e, o);
                                if ("throw" !== u.type) {
                                    var c = u.arg,
                                        l = c.value;
                                    return l && "object" == typeof l && i.call(l, "__await") ? t.resolve(l.__await).then(function(e) {
                                        r("next", e, a, s)
                                    }, function(e) {
                                        r("throw", e, a, s)
                                    }) : t.resolve(l).then(function(e) {
                                        c.value = e, a(c)
                                    }, s)
                                }
                                s(u.arg)
                            }(n, o, r, a)
                        })
                    }
                    return r = r ? r.then(a, a) : a()
                }
            }

            function C(e, t) {
                var r = e.iterator[t.method];
                if (r === n) {
                    if (t.delegate = null, "throw" === t.method) {
                        if (e.iterator.return && (t.method = "return", t.arg = n, C(e, t), "throw" === t.method)) return h;
                        t.method = "throw", t.arg = new TypeError("The iterator does not provide a 'throw' method")
                    }
                    return h
                }
                var o = w(r, e.iterator, t.arg);
                if ("throw" === o.type) return t.method = "throw", t.arg = o.arg, t.delegate = null, h;
                var i = o.arg;
                return i ? i.done ? (t[e.resultName] = i.value, t.next = e.nextLoc, "return" !== t.method && (t.method = "next", t.arg = n), t.delegate = null, h) : i : (t.method = "throw", t.arg = new TypeError("iterator result is not an object"), t.delegate = null, h)
            }

            function R(e) {
                var t = {
                    tryLoc: e[0]
                };
                1 in e && (t.catchLoc = e[1]), 2 in e && (t.finallyLoc = e[2], t.afterLoc = e[3]), this.tryEntries.push(t)
            }

            function I(e) {
                var t = e.completion || {};
                t.type = "normal", delete t.arg, e.completion = t
            }

            function L(e) {
                this.tryEntries = [{
                    tryLoc: "root"
                }], e.forEach(R, this), this.reset(!0)
            }

            function F(e) {
                if (e) {
                    var t = e[s];
                    if (t) return t.call(e);
                    if ("function" == typeof e.next) return e;
                    if (!isNaN(e.length)) {
                        var r = -1,
                            o = function t() {
                                for (; ++r < e.length;)
                                    if (i.call(e, r)) return t.value = e[r], t.done = !1, t;
                                return t.value = n, t.done = !0, t
                            };
                        return o.next = o
                    }
                }
                return {
                    next: k
                }
            }

            function k() {
                return {
                    value: n,
                    done: !0
                }
            }
        }(function() {
            return this
        }() || Function("return this")())
    }).call(this, r(1))
}, function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    }), t.UNLOAD_EVENTS = ["beforeunload", "pagehide", "unload"], t.onUnload = function(e) {
        var r = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : window,
            n = function() {
                return t.UNLOAD_EVENTS.forEach(function(e) {
                    return r.removeEventListener(e, o)
                })
            },
            o = function(t) {
                "pagehide" === t.type && t.persisted || (e(t), n())
            };
        return t.UNLOAD_EVENTS.forEach(function(e) {
            return r.addEventListener(e, o)
        }), n
    }
}, function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    }), t.getCurrentScript = function() {
        var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : document,
            t = arguments[1],
            r = e.currentScript;
        if (r) return r;
        for (var n = e.getElementsByTagName("script"), o = [], i = 0; i < n.length; i++) o.push(n[i]);
        if ("function" == typeof t) {
            var a = o.filter(t);
            return a[a.length - 1]
        }
        return o[o.length - 1]
    }
}, function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    });
    var n = r(8),
        o = r(83);
    t.getIsSafari = function() {
        var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : window,
            t = n.getUserAgent(e).toLowerCase();
        return -1 !== t.indexOf("safari") && -1 === t.indexOf("chrome") && -1 === t.indexOf("android") && -1 === t.indexOf("phantomjs") && !o.getIsTizen(e)
    }
}, function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    });
    var n = r(8);
    t.getIsTizen = function() {
        var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : window;
        return n.getUserAgent(e).toLowerCase().indexOf("tizen") > -1
    }
}, function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    });
    var n = r(39),
        o = r(85);
    t.isInSecureIFrame = function() {
        var e = n.map(o.parentFriendlyIFrames, function(e) {
                return e.ownerDocument
            }),
            t = e.length,
            r = (t ? e[t - 1] : document).defaultView;
        return !!r && r.self !== r.parent
    }
}, function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    });
    var n = r(29);
    t.parentFriendlyIFrames = n.getParentFriendlyIFrames(document.documentElement)
}, function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    });
    var n = r(87);
    t.portion = function(e, t, r) {
        var o = e > (arguments.length > 3 && void 0 !== arguments[3] && arguments[3] ? Math.random() : n.RANDOM),
            i = o ? t : r;
        return "function" == typeof i && i(), o
    }
}, function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    }), t.RANDOM = Math.random()
}, function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    }), t.COMMON_LOCAL_STATS_SERVICE_NAME = "CommonPcode"
}, function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
            value: !0
        }),
        function(e) {
            e.event = "event", e.error = "error", e.deprecated = "deprecated", e.warning = "warning", e.value = "value", e.values = "values"
        }(t.StatsEventType || (t.StatsEventType = {}))
}, , function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
            value: !0
        }),
        function(e) {
            e[e.UNSTARTED = -1] = "UNSTARTED", e[e.ENDED = 0] = "ENDED", e[e.PLAYING = 1] = "PLAYING", e[e.PAUSED = 2] = "PAUSED", e[e.BUFFERING = 3] = "BUFFERING", e[e.CUED = 5] = "CUED"
        }(t.PlayingState || (t.PlayingState = {}))
}, function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    });
    var n = r(9);
    t.mapObjectValues = function(e, t) {
        var r = {};
        return n.getObjectKeys(e).forEach(function(n) {
            r[n] = t(e[n], n)
        }), r
    }
}, function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    });
    var n = r(48),
        o = r(159);
    t.CHARSET_UTF_8 = "utf-8", t.loadScript = function(e) {
        return o.loadScript(e).then(function() {
            return {}
        })
    }, t.loadCustomScript = function(e, t, r) {
        var o = !(arguments.length > 3 && void 0 !== arguments[3]) || arguments[3],
            i = e.document.createElement("script");
        i.type = "text/javascript", i.async = !0, r && (i.onload = function() {
            i.onload = function() {}, r()
        }), o && i.setAttribute("crossorigin", "anonymous"), i.src = t, n.getHead(e).appendChild(i)
    }, t.executeScript = function(e, t, r) {
        var o = e.document.createElement("script");
        o.text = t, n.getHead(e).appendChild(o), r()
    }
}, function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
            value: !0
        }),
        function(e) {
            e.Init = "Init", e.SetSource = "SetSource", e.AdEnd = "AdEnd", e.Seek = "Seek", e.VideoTrackChange = "VideoTrackChange", e.Recover = "Recover", e.MediaError = "MediaError", e.Offline = "Offline", e.Other = "Other", e.NoFragLoad = "NoFragLoad"
        }(t.ExpectedStalledReason || (t.ExpectedStalledReason = {}))
}, function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    }), t.createExpectedStalled = function(e, t) {
        return {
            reason: e,
            details: t,
            timestamp: Date.now()
        }
    }
}, , , , function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    });
    var n = r(100);
    t.isAndroid = n.getIfIsAndroid()
}, function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    });
    var n = r(101);
    t.getIfIsAndroid = function() {
        var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : window,
            t = e.navigator.userAgent,
            r = void 0 === t ? "" : t;
        return /Linux.*?Android/.test(r) && !n.isUCBrowser(e) || /com\.yandex\.mobile\.metrica\.ads\.sdk.*?Android/.test(r)
    }
}, function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    }), t.isUCBrowser = function() {
        return (arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : window).navigator.userAgent.indexOf("UCBrowser") > -1
    }
}, function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    }), t.MemoryStorage = t.CookieStorage = t.isSupported = t.storage = void 0;
    var n = a(r(113)),
        o = a(r(53)),
        i = a(r(115));

    function a(e) {
        return e && e.__esModule ? e : {
            default: e
        }
    }
    var s = null;
    (0, n.default)("localStorage") ? t.storage = s = window.localStorage: (0, n.default)("sessionStorage") ? t.storage = s = window.sessionStorage : (0, n.default)("cookieStorage") ? t.storage = s = new o.default : t.storage = s = new i.default, t.default = s, t.storage = s, t.isSupported = n.default, t.CookieStorage = o.default, t.MemoryStorage = i.default
}, , function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    }), t.getDefaultTrackingEvents = function() {
        return {
            init: [],
            start: [],
            end: [],
            setSource: [],
            adStart: [],
            adEnd: [],
            play: [],
            pause: [],
            seek: [],
            firstQuartile: [],
            midpoint: [],
            thirdQuartile: [],
            viewed: [],
            heartbeat: [],
            watchedTime: [],
            error: []
        }
    }
}, function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
            value: !0
        }),
        function(e) {
            e.FLASH = "FLASH", e.HTML = "HTML", e.TV1 = "TV1"
        }(t.PLATFORM || (t.PLATFORM = {}))
}, function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    }), t.forEach = function(e, t, r) {
        for (var n = 0; n < e.length; n++) t.call(r, e[n], n, e)
    }
}, function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    }), t.DEFAULT_VSID = "0000000000000000000000000000000000000000000000000000000000000000"
}, , function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    }), t.tryStringify = function(e) {
        var t = void 0;
        try {
            t = JSON.stringify(e)
        } catch (e) {}
        return t
    }
}, function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    }), t.BUNDLES_PATH = "/yandex-video-player-iframe-api-bundles/"
}, function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    });
    var n = /1\.0-(\d+)/;
    t.parseVersion = function(e) {
        if (void 0 !== e) {
            var t = e && e.match && e.match(n);
            if (t && t[1]) return parseInt(t[1], 10);
            throw new Error("paramsObject.version must be a string like [1.0-0] or undefined")
        }
    }
}, , function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    }), t.default = function() {
        var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : "localStorage",
            t = String(e).replace(/storage$/i, "").toLowerCase();
        if ("local" === t) return i("localStorage");
        if ("session" === t) return i("sessionStorage");
        if ("cookie" === t) return (0, n.hasCookies)();
        if ("memory" === t) return !0;
        throw new Error("Storage method `" + e + "` is not available.\n    Please use one of the following: localStorage, sessionStorage, cookieStorage, memoryStorage.")
    };
    var n = r(53),
        o = "__test";

    function i(e) {
        try {
            var t = window[e];
            return t.setItem(o, "1"), t.removeItem(o), !0
        } catch (e) {
            return !1
        }
    }
}, function(e, t, r) {
    "use strict";
    /*!
     * cookie
     * Copyright(c) 2012-2014 Roman Shtylman
     * Copyright(c) 2015 Douglas Christopher Wilson
     * MIT Licensed
     */
    t.parse = function(e, t) {
        if ("string" != typeof e) throw new TypeError("argument str must be a string");
        for (var r = {}, o = t || {}, a = e.split(i), u = o.decode || n, c = 0; c < a.length; c++) {
            var l = a[c],
                d = l.indexOf("=");
            if (!(d < 0)) {
                var f = l.substr(0, d).trim(),
                    v = l.substr(++d, l.length).trim();
                '"' == v[0] && (v = v.slice(1, -1)), null == r[f] && (r[f] = s(v, u))
            }
        }
        return r
    }, t.serialize = function(e, t, r) {
        var n = r || {},
            i = n.encode || o;
        if ("function" != typeof i) throw new TypeError("option encode is invalid");
        if (!a.test(e)) throw new TypeError("argument name is invalid");
        var s = i(t);
        if (s && !a.test(s)) throw new TypeError("argument val is invalid");
        var u = e + "=" + s;
        if (null != n.maxAge) {
            var c = n.maxAge - 0;
            if (isNaN(c)) throw new Error("maxAge should be a Number");
            u += "; Max-Age=" + Math.floor(c)
        }
        if (n.domain) {
            if (!a.test(n.domain)) throw new TypeError("option domain is invalid");
            u += "; Domain=" + n.domain
        }
        if (n.path) {
            if (!a.test(n.path)) throw new TypeError("option path is invalid");
            u += "; Path=" + n.path
        }
        if (n.expires) {
            if ("function" != typeof n.expires.toUTCString) throw new TypeError("option expires is invalid");
            u += "; Expires=" + n.expires.toUTCString()
        }
        n.httpOnly && (u += "; HttpOnly");
        n.secure && (u += "; Secure");
        if (n.sameSite) {
            var l = "string" == typeof n.sameSite ? n.sameSite.toLowerCase() : n.sameSite;
            switch (l) {
                case !0:
                    u += "; SameSite=Strict";
                    break;
                case "lax":
                    u += "; SameSite=Lax";
                    break;
                case "strict":
                    u += "; SameSite=Strict";
                    break;
                default:
                    throw new TypeError("option sameSite is invalid")
            }
        }
        return u
    };
    var n = decodeURIComponent,
        o = encodeURIComponent,
        i = /; */,
        a = /^[\u0009\u0020-\u007e\u0080-\u00ff]+$/;

    function s(e, t) {
        try {
            return t(e)
        } catch (t) {
            return e
        }
    }
}, function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    });
    var n = function() {
        function e(e, t) {
            for (var r = 0; r < t.length; r++) {
                var n = t[r];
                n.enumerable = n.enumerable || !1, n.configurable = !0, "value" in n && (n.writable = !0), Object.defineProperty(e, n.key, n)
            }
        }
        return function(t, r, n) {
            return r && e(t.prototype, r), n && e(t, n), t
        }
    }();
    var o = function() {
        function e() {
            ! function(e, t) {
                if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
            }(this, e), this._data = {}
        }
        return n(e, [{
            key: "getItem",
            value: function(e) {
                return this._data.hasOwnProperty(e) ? this._data[e] : void 0
            }
        }, {
            key: "setItem",
            value: function(e, t) {
                return this._data[e] = String(t)
            }
        }, {
            key: "removeItem",
            value: function(e) {
                return delete this._data[e]
            }
        }, {
            key: "clear",
            value: function() {
                return this._data = {}
            }
        }]), e
    }();
    t.default = o
}, function(e, t, r) {
    "use strict";
    (function(e) {
        Object.defineProperty(t, "__esModule", {
            value: !0
        });
        var n = r(117);

        function o(t) {
            var r = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : {},
                o = r.silent,
                i = void 0 === o || o,
                a = r.allowRelative;
            return void 0 !== a && a || n.isAbsoluteUrl(t) ? new e(function(e, r) {
                var n = document.createElement("img");
                n.onload = function() {
                    return e(t)
                }, n.onerror = i ? function() {
                    return e(null)
                } : function() {
                    return r(new Error("knockPixel failed to load image [" + t + "]"))
                }, n.src = t
            }) : i ? e.resolve(null) : e.reject("[" + t + "] is not an absolute url, to knock this pixel use { allowRelative: true } option")
        }
        t.knockPixel = o, t.knockPixels = function(t) {
            var r = (arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : {}).allowRelative,
                n = void 0 !== r && r;
            return e.all(t.map(function(e) {
                return o(e, {
                    silent: !0,
                    allowRelative: n
                })
            }))
        }
    }).call(this, r(1))
}, function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    }), t.isAbsoluteUrl = function(e) {
        var t = e.trim();
        return "//" === t.substr(0, 2) || "http://" === t.substr(0, 7) || "https://" === t.substr(0, 8)
    }
}, , , , , , , , , , , , , , , , function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    }), t.DEFAULT_AD_CATEGORY = 0
}, function(e, t, r) {
    "use strict";
    var n = Object.assign || function(e) {
            for (var t = 1; t < arguments.length; t++) {
                var r = arguments[t];
                for (var n in r) Object.prototype.hasOwnProperty.call(r, n) && (e[n] = r[n])
            }
            return e
        },
        o = function() {
            return function(e, t) {
                if (Array.isArray(e)) return e;
                if (Symbol.iterator in Object(e)) return function(e, t) {
                    var r = [],
                        n = !0,
                        o = !1,
                        i = void 0;
                    try {
                        for (var a, s = e[Symbol.iterator](); !(n = (a = s.next()).done) && (r.push(a.value), !t || r.length !== t); n = !0);
                    } catch (e) {
                        o = !0, i = e
                    } finally {
                        try {
                            !n && s.return && s.return()
                        } finally {
                            if (o) throw i
                        }
                    }
                    return r
                }(e, t);
                throw new TypeError("Invalid attempt to destructure non-iterable instance")
            }
        }(),
        i = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function(e) {
            return typeof e
        } : function(e) {
            return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype ? "symbol" : typeof e
        };
    Object.defineProperty(t, "__esModule", {
        value: !0
    });
    var a = r(73),
        s = r(230),
        u = r(17),
        c = r(231),
        l = r(92),
        d = r(27),
        f = r(156),
        v = r(13),
        p = r(140),
        m = r(232),
        h = r(141),
        y = r(18),
        g = r(72),
        E = r(104),
        b = r(34),
        _ = r(66),
        w = r(111),
        S = r(233),
        T = r(158);

    function O(e) {
        return Array.isArray(e) ? e.filter(function(e) {
            return "string" == typeof e
        }) : []
    }

    function P(e) {
        if (u.isObject(e)) {
            var t = e.init,
                r = e.start,
                n = e.end,
                i = e.setSource,
                a = e.adStart,
                s = e.adEnd,
                c = e.play,
                l = e.pause,
                d = e.seek,
                f = e.firstQuartile,
                v = e.midpoint,
                p = e.thirdQuartile,
                m = e.viewed,
                h = e.heartbeat,
                y = e.watchedTime,
                g = e.error;
            return {
                init: O(t),
                start: O(r),
                end: O(n),
                setSource: O(i),
                adStart: O(a),
                adEnd: O(s),
                play: O(c),
                pause: O(l),
                seek: O(d),
                firstQuartile: O(f),
                midpoint: O(v),
                thirdQuartile: O(p),
                heartbeat: (w = h, Array.isArray(w) ? w.filter(function(e) {
                    if (Array.isArray(e) && 2 === e.length) {
                        var t = o(e, 2),
                            r = t[0],
                            n = t[1];
                        if ("string" != typeof r) return !1;
                        if (!u.isObject(n)) return !1;
                        var i = n.offset,
                            a = n.delay,
                            s = n.callsCount;
                        return !("number" != typeof a || void 0 !== i && "number" != typeof i || void 0 !== s && ("number" != typeof s || s <= 0))
                    }
                    return !1
                }) : []),
                viewed: (_ = m, Array.isArray(_) ? _.filter(function(e) {
                    if (Array.isArray(e) && 2 === e.length) {
                        var t = o(e, 2),
                            r = t[0],
                            n = t[1];
                        return "string" == typeof r && !!u.isObject(n) && "number" == typeof n.percent
                    }
                    return !1
                }) : []),
                watchedTime: (b = y, Array.isArray(b) ? b.filter(function(e) {
                    if (!Array.isArray(e) || 2 !== e.length) return !1;
                    var t = o(e, 2),
                        r = t[0],
                        n = t[1];
                    return !("string" != typeof r || !u.isObject(n) || !u.isObject(n) || "number" != typeof n.offset)
                }) : []),
                error: O(g)
            }
        }
        return E.getDefaultTrackingEvents();
        var b, _, w
    }

    function A(e) {
        if (void 0 !== e && u.isObject(e)) {
            var t = e.trackingEvents;
            return {
                trackingEvents: (Array.isArray(t) ? t : [t]).map(P)
            }
        }
        return h.DEFAULT_TRACKING_CONFIG
    }

    function C(e, t) {
        if (void 0 === e) return f.DEFAULT_ADDITIONAL_PARAMS;
        if (u.isObject(e)) {
            var r = l.mapObjectValues(e, function(e, r) {
                return void 0 === e ? void 0 : ("string" != typeof e && t.warning({
                    name: "AdditionalParamsValueType",
                    message: "additionalParams." + r + " must be a string or undefined"
                }), String(e))
            });
            return void 0 === r.from ? n({}, r, {
                from: f.DEFAULT_ADDITIONAL_PARAMS.from
            }) : r
        }
        throw new y.IFrameApiError("additionalParams must be an object or undefined")
    }
    t.parseTrackings = A, t.parseAdditionalParams = C;
    var R = "";
    t.validateVideoIFrameParams = function(e, t) {
        if (!u.isObject(e)) throw new y.IFrameApiError("paramsObject must be an object");
        if (!e.stream && !e.source || !e.element) throw new y.IFrameApiError("paramsObject must have properties [source] and [element]");
        var r = [],
            o = e.stream,
            l = e.source,
            f = e.element,
            E = e.size,
            O = e.hidden,
            P = e.autoplay,
            I = e.autoQuality,
            L = e.preview,
            F = e.handlers,
            k = e.partnerId,
            M = e.adConfig,
            j = e.debug,
            N = e.startPosition,
            U = e.preload,
            D = e.version,
            x = e.cinemaVersion,
            V = e.additionalParams,
            B = e.env,
            H = e.volume,
            G = e.muted,
            Y = e.maxBufferLength,
            K = e.liveOffset,
            q = e.report,
            W = e.skinConfig,
            z = e.showLowConnectionSpeedAlert,
            J = e.withCredentials,
            X = e.preferNative,
            Q = e.features,
            $ = void 0;
        if (void 0 === j) $ = !1;
        else {
            if ("boolean" != typeof j) throw new y.IFrameApiError("paramsObject.debug must be a boolean or undefined");
            $ = j
        }
        var Z = void 0;
        if (void 0 !== N) {
            if (r.push({
                    code: "StartPosition",
                    message: "startPosition is deprecated, use stream.startPosition"
                }), !a.isFiniteNumber(N)) throw new y.IFrameApiError("paramsObject.startPosition must be a finite number or undefined");
            Z = N
        }
        var ee = u.isObject(o) ? A(o.trackings) : h.DEFAULT_TRACKING_CONFIG;
        if (void 0 !== L && "string" != typeof L) throw new y.IFrameApiError("paramsObject.preview must be a string or undefined");
        if (L && r.push({
                code: "Preview",
                message: "preview is deprecated, use stream.preview"
            }), void 0 !== k && !a.isFiniteNumber(k) && null !== k) throw new y.IFrameApiError("paramsObject.partnerId must be a finite number or undefined");
        k && r.push({
            code: "PartnerId",
            message: "partnerId is deprecated, use stream.adConfig.partnerId"
        }), M && r.push({
            code: "AdConfig",
            message: "adConfig is deprecated, use stream.adConfig"
        });
        var te = void 0;
        te = u.isObject(o) && u.isObject(o.adConfig) ? _.parseAdConfig(o.adConfig) : M ? _.parseAdConfig(n({}, M, {
            partnerId: M.partner_id || M.partnerId || k || void 0
        })) : {
            partnerId: k || void 0
        }, "boolean" == typeof J && r.push({
            code: "BooleanWithCredentials",
            message: "withCredentials is deprecated, use stream.withCredentials"
        });
        var re = void 0;
        if (u.isObject(l)) re = T.validateSource(l, t, {
            isForSetSource: !1
        });
        else if ("string" == typeof o) r.push({
            code: "StringStream",
            message: "string [stream] param is deprecated, use stream object with stream.mq param"
        }), re = {
            streams: [{
                url: o
            }],
            loop: !1,
            p2p: !1,
            trackings: ee,
            protectedFrame: !1,
            preview: L || R,
            adConfig: te,
            additionalParams: C(V, t),
            withCredentials: Boolean(J),
            startPosition: Z
        };
        else {
            if (!u.isObject(o)) throw new y.IFrameApiError("paramsObject.source must be an object");
            r.push({
                code: "StreamObject",
                message: "[stream] param is deprecated, use [source] param"
            });
            var ne = o.lq,
                oe = o.hq,
                ie = o.hd,
                ae = o.mq;
            if ("string" != typeof ne && "string" != typeof ae && "string" != typeof oe && "string" != typeof ie) throw new y.IFrameApiError("paramsObject.stream must have at least one of string parameters: lq, mq, hq, hd");
            (ne || oe || ie) && r.push({
                code: "LqHqHd",
                message: "lq, hq, hd params are deprecated, use stream.mq"
            });
            var se = o.drmConfig,
                ue = o.protectedFrame,
                ce = o.logoConfig,
                le = o.preview,
                de = o.additionalParams,
                fe = o.withCredentials,
                ve = o.startPosition;
            if (void 0 !== ue && "boolean" != typeof ue) throw new y.IFrameApiError("paramsObject.stream.protectedFrame must be a boolean or undefined");
            if (void 0 !== le && "string" != typeof le) throw new y.IFrameApiError("paramsObject.stream.preview must be a string or undefined");
            var pe = u.isObject(ce) && b.isSerializable(ce) && d.isString(ce.src);
            if (void 0 !== ce && !pe) throw new y.IFrameApiError("paramsObject.stream.logoConfig must be a valid LogoConfig or undefined");
            if (!b.isSerializable(se)) throw new y.IFrameApiError("paramsObject.stream.drmConfig must be serializable");
            if (void 0 !== ve) {
                if (!(a.isFiniteNumber(ve) && ve >= 0)) throw new y.IFrameApiError("paramsObject.stream.startPosition must be a NOT negative finite number or undefined");
                Z = ve
            }
            if (void 0 !== fe && "boolean" != typeof fe) throw new y.IFrameApiError("paramsObject.stream.withCredentials must be a boolean or undefined");
            re = {
                streams: [{
                    url: ie || oe || ae || ne,
                    drmConfig: se
                }],
                loop: !0 === o.loop,
                p2p: !0 === o.p2p,
                trackings: ee,
                protectedFrame: ue,
                logoConfig: ce,
                preview: le || L || R,
                adConfig: te,
                additionalParams: C(void 0 === de ? V : de, t),
                withCredentials: "boolean" == typeof fe ? fe : Boolean(J),
                startPosition: Z
            }
        }
        var me = void 0;
        if (function(e) {
                return "object" === ("undefined" == typeof HTMLElement ? "undefined" : i(HTMLElement)) ? e instanceof HTMLElement : e && 1 === e.nodeType
            }(f)) me = f;
        else {
            if ("string" != typeof f) throw new y.IFrameApiError("paramsObject.element must be a string or HTMLElement id");
            var he = document.getElementById(f);
            if (!he) throw new y.IFrameApiError("cannot find element with id: [" + f + "]");
            me = he
        }
        var ye = {
            width: "100%",
            height: "100%"
        };
        if (u.isObject(E)) {
            var ge = E.width,
                Ee = E.height;
            if ("number" == typeof Ee) ye.height = String(Ee) + "px";
            else {
                if ("string" != typeof Ee) throw new y.IFrameApiError("paramsObject.size.height must be a string or an number");
                ye.height = Ee
            }
            if ("number" == typeof ge) ye.width = String(ge) + "px";
            else {
                if ("string" != typeof ge) throw new y.IFrameApiError("paramsObject.size.width must be a string or an number");
                ye.width = ge
            }
        } else if (void 0 !== E) throw new y.IFrameApiError("paramsObject.size must be an object or undefined");
        var be = "";
        if (void 0 !== O) {
            if ("string" != typeof O) throw new y.IFrameApiError("paramsObject.hidden must be a string or undefined");
            for (var _e = O.split(",").map(function(e) {
                    return e.trim()
                }).filter(function(e) {
                    return "" !== e
                }), we = function(e) {
                    var t = _e[e];
                    if (!v.AllControlNames.some(function(e) {
                            return e === t
                        })) throw new y.IFrameApiError("Unresolved control name in paramsObject.hidden: " + t)
                }, Se = 0; Se < _e.length; Se++) we(Se);
            be = _e.join(",")
        }
        if (void 0 !== P && "boolean" != typeof P) throw new y.IFrameApiError("paramsObject.autoplay must be a boolean or undefined");
        if (void 0 !== H) {
            if ("number" != typeof H) throw new y.IFrameApiError("paramsObject.volume must be a number or undefined, but [" + H + "] given");
            if (!p.isValidPublicVolume(H)) throw new y.IFrameApiError("paramsObject.volume must be a number 0..100 or undefined, but [" + H + "] given")
        }
        if (void 0 !== G && "boolean" != typeof G) throw new y.IFrameApiError("paramsObject.muted must be a boolean or undefined");
        if (void 0 !== I && "boolean" != typeof I) throw new y.IFrameApiError("paramsObject.autoQuality must be a boolean or undefined");
        if (void 0 !== U && "boolean" != typeof U) throw new y.IFrameApiError("paramsObject.preload must be a boolean or undefined");
        if (void 0 !== F) {
            if (!u.isObject(F)) throw new y.IFrameApiError("paramsObject.handlers must be an object or undefined");
            var Te = function(e) {
                if (F.hasOwnProperty(e)) {
                    if (!m.AllApiEventNames.some(function(t) {
                            return t === e
                        })) throw new y.IFrameApiError("Unresolved event name in handlers: " + e);
                    if ("function" != typeof F[e]) throw new y.IFrameApiError("handler [" + e + "] in paramsObject.handlers must be a function")
                }
            };
            for (var Se in F) Te(Se)
        }
        if (void 0 !== D && (r.push({
                code: "Version",
                message: "paramsObject.version is deprecated, use versioned bundle url to freeze player version"
            }), w.parseVersion(D)), void 0 !== x && !/\d+/.test(x)) throw new y.IFrameApiError("paramsObject.cinemaVersion must be an string with digits or undefined");
        if (void 0 !== B && !u.isObject(B)) throw new y.IFrameApiError("paramsObject.env must be an object or undefined");
        if (void 0 !== Y && "number" != typeof Y) throw new y.IFrameApiError("paramsObject.maxBufferLength must be a number or undefined");
        if (void 0 !== K && "number" != typeof K) throw new y.IFrameApiError("paramsObject.liveOffset must be a number or undefined");
        var Oe = {
            enabled: !1,
            reportUrl: g.DEFAULT_REPORT_URL
        };
        if (void 0 !== q)
            if ("boolean" == typeof q) Oe.enabled = !0 === q;
            else {
                if (!u.isObject(q)) throw new y.IFrameApiError("paramsObject.report must be a boolean or ReportConfig or undefined");
                var Pe = q.enabled,
                    Ae = q.reportUrl;
                Oe.reportUrl = d.isString(Ae) ? Ae : g.DEFAULT_REPORT_URL, Oe.enabled = !0 === Pe
            } if (void 0 !== z && "boolean" != typeof z) throw new y.IFrameApiError("paramsObject.showLowConnectionSpeedAlert must be a boolean or undefined");
        if (void 0 !== X && "boolean" != typeof X) throw new y.IFrameApiError("paramsObject.preferNative must be a boolean or undefined");
        r.length > 0 && (console.warn && console.warn("Some of IframeAPI params you are using are deprecated: " + r.map(function(e) {
            return "\n[" + e.message + "]"
        })), t.values({
            name: "InitialConfigDeprecated",
            data: {},
            values: s.entriesToObject(r.map(function(e) {
                return [e.code, 1]
            })),
            labels: {}
        }));
        var Ce = S.validateFeaturesParams(Q || {}, t),
            Re = Ce.featuresParams,
            Ie = Ce.featuresHandlers;
        return {
            debug: $,
            source: re,
            element: me,
            size: ye,
            hidden: be,
            autoplay: Boolean(P),
            autoQuality: !1 !== I,
            preload: !1 !== U,
            handlers: F || {},
            volume: H,
            muted: G,
            version: D,
            cinemaVersion: x,
            env: B,
            maxBufferLength: Y,
            liveOffset: K,
            report: Oe,
            skinConfig: c.isStringifiable(W) ? W : void 0,
            showLowConnectionSpeedAlert: !0 === z,
            preferNative: X,
            featuresParams: Re,
            featuresHandlers: Ie
        }
    }
}, , , , function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    });
    var n = r(32),
        o = r(63);
    t.DEFAULT_VOLUME = o.MAX_VOLUME, t.DEFAULT_PUBLIC_VOLUME = n.VolumeUtils.internalToPublic(t.DEFAULT_VOLUME)
}, , function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    });
    var n = r(63);
    t.isValidPublicVolume = function(e) {
        return n.PUBLIC_MIN_VOLUME <= e && e <= n.PUBLIC_MAX_VOLUME
    }
}, function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    });
    var n = r(104);
    t.DEFAULT_TRACKING_CONFIG = {
        trackingEvents: [n.getDefaultTrackingEvents()]
    }
}, function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    });
    var n = r(143);
    t.DOMAIN = n.getDomain()
}, function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    });
    var n = r(35),
        o = r(144),
        i = r(70);
    t.BETA_DOMAINS = [o.BETA_DOMAIN, "betastatic.yandex.net", "www-stream.wdevx.yandex.ru"], t.getDomain = function() {
        var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : n.CURRENT_SCRIPT_SRC || location.hostname;
        return arguments.length > 1 && void 0 !== arguments[1] && arguments[1] || t.BETA_DOMAINS.some(function(t) {
            return -1 !== e.indexOf(t)
        }) ? o.BETA_DOMAIN : i.PROD_DOMAIN
    }
}, function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    }), t.BETA_DOMAIN = "betastatic.yastatic.net"
}, function(e, t) {
    e.exports = Object.setPrototypeOf || ({
            __proto__: []
        }
        instanceof Array ? function(e, t) {
            return e.__proto__ = t, e
        } : function(e, t) {
            for (var r in t) e.hasOwnProperty(r) || (e[r] = t[r]);
            return e
        })
}, function(e, t, r) {
    "use strict";
    var n = function() {
        function e(e, t) {
            for (var r = 0; r < t.length; r++) {
                var n = t[r];
                n.enumerable = n.enumerable || !1, n.configurable = !0, "value" in n && (n.writable = !0), Object.defineProperty(e, n.key, n)
            }
        }
        return function(t, r, n) {
            return r && e(t.prototype, r), n && e(t, n), t
        }
    }();

    function o(e, t) {
        if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
    }
    Object.defineProperty(t, "__esModule", {
        value: !0
    });
    var i = r(147),
        a = function() {
            function e() {
                o(this, e)
            }
            return n(e, [{
                key: "setTimeout",
                value: function(e, t) {
                    var r = window.setTimeout(e, t);
                    return function() {
                        return window.clearTimeout(r)
                    }
                }
            }, {
                key: "now",
                value: function() {
                    return Date.now()
                }
            }]), e
        }();
    t.DefaultClock = a;
    var s = function() {
        function e() {
            var t = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : 0;
            o(this, e), this.time = t, this.tasks = []
        }
        return n(e, [{
            key: "setTimeout",
            value: function(e, t) {
                var r = this,
                    n = this.time + t,
                    o = {
                        task: e,
                        time: n,
                        isCanceled: !1,
                        isRunned: !1
                    };
                return i.insertBefore(this.tasks, o, function(e) {
                        return n < e.time
                    }), t || window.setTimeout(function() {
                        return r.runTask(o)
                    }, 0),
                    function() {
                        return o.isCanceled = !0
                    }
            }
        }, {
            key: "setTime",
            value: function(e) {
                for (var t = 0; t < this.tasks.length && !(e < this.tasks[t].time); t += 1) this.runTask(this.tasks[t]);
                this.time = e, this.tasks.splice(0, t)
            }
        }, {
            key: "now",
            value: function() {
                return this.time
            }
        }, {
            key: "tick",
            value: function(e) {
                this.setTime(this.time + e)
            }
        }, {
            key: "reset",
            value: function() {
                this.time = 0, this.tasks = []
            }
        }, {
            key: "runTask",
            value: function(e) {
                e.isRunned || e.isCanceled || (e.isRunned = !0, this.time = e.time, e.task())
            }
        }]), e
    }();
    t.ManagedClock = s;
    var u = function() {
        function e(t) {
            var r = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : new a;
            o(this, e), this.distributionFunction = t, this.clock = r, this.stopped = !0, this.lastNow = 0, this.lastTimeout = 0, this.restTime = 0, this.destroyed = !1, this.isFirstKnock = !0, this.count = 0
        }
        return n(e, [{
            key: "setEnabled",
            value: function(e) {
                return e ? this.start() : this.stop(), this
            }
        }, {
            key: "stop",
            value: function() {
                return this.stopped || (this.stopped = !0, this.cancelTimeout(), this.restTime = Math.max(this.restTime - (this.clock.now() - this.lastKnockTime), 0)), this
            }
        }, {
            key: "start",
            value: function() {
                var e = this;
                return this.stopped && !this.destroyed && (this.stopped = !1, this.lastKnockTime = this.clock.now(), this.cancel = this.clock.setTimeout(function() {
                    e.knock(e.lastNow + e.lastTimeout)
                }, this.restTime)), this
            }
        }, {
            key: "destroy",
            value: function() {
                this.cancelTimeout(), this.stopped = !0, this.destroyed = !0
            }
        }, {
            key: "knock",
            value: function(e) {
                var t = this;
                this.lastNow = e, this.lastKnockTime = this.clock.now(), this.isFirstKnock ? this.isFirstKnock = !1 : this.count++;
                var r = this.restTime = this.lastTimeout = this.distributionFunction({
                    time: e,
                    count: this.count
                });
                this.stopped || this.destroyed || (this.cancel = this.clock.setTimeout(function() {
                    t.knock(e + r)
                }, r))
            }
        }, {
            key: "cancelTimeout",
            value: function() {
                this.cancel && this.cancel(), this.cancel = void 0
            }
        }]), e
    }();
    t.Timer = u
}, function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    }), t.insertBefore = function(e, t, r) {
        for (var n = 0; n < e.length && !r(e[n]); n += 1);
        return e.splice(n, 0, t), e
    }
}, function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    });
    var n = r(15),
        o = r(116),
        i = r(10),
        a = r(149);
    t.MAX_URL_LENGTH = 2083, t.logToStrm = function(e, r) {
        var s = r.onUrlLengthLimitExceeded,
            u = r.knockUrl,
            c = void 0 === u ? o.knockPixel : u,
            l = i.addParamsToUrl(a.STRM_LOG_URL, e);
        l.length > t.MAX_URL_LENGTH && (s(new n.CustomError({
            code: "STRM_LOG_URL_LENGTH_LIMIT_EXCEEDED",
            isFatal: !1,
            details: {
                url: l
            }
        })), l = l.substring(0, t.MAX_URL_LENGTH)), c(l)
    }
}, function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    }), t.STRM_LOG_URL = "https://strm.yandex.ru/log/"
}, function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    });
    var n = r(24),
        o = r(65),
        i = r(72),
        a = r(151);
    t.openReportWindow = function(e) {
        var t, r, s, u = e.reportUrl,
            c = n.generateHexString(64),
            l = o.addParamsToUrl(u, (t = {}, r = a.REPORT_PREFIX + "logId", s = c, r in t ? Object.defineProperty(t, r, {
                value: s,
                enumerable: !0,
                configurable: !0,
                writable: !0
            }) : t[r] = s, t)).substr(0, i.REPORT_URL_MAX_LENGTH);
        return {
            reportId: c,
            reported: null !== window.open(l, "_blank")
        }
    }
}, function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    }), t.REPORT_PREFIX = "form6026-"
}, , , , function(e, t, r) {
    "use strict";
    (function(e) {
        var n = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function(e) {
                return typeof e
            } : function(e) {
                return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype ? "symbol" : typeof e
            },
            o = function() {
                function e(e, t) {
                    for (var r = 0; r < t.length; r++) {
                        var n = t[r];
                        n.enumerable = n.enumerable || !1, n.configurable = !0, "value" in n && (n.writable = !0), Object.defineProperty(e, n.key, n)
                    }
                }
                return function(t, r, n) {
                    return r && e(t.prototype, r), n && e(t, n), t
                }
            }();
        Object.defineProperty(t, "__esModule", {
            value: !0
        });
        var i = r(16),
            a = r(18),
            s = function() {
                function t(e) {
                    var r = this,
                        n = e.id,
                        o = e.sender,
                        a = e.receiver;
                    ! function(e, t) {
                        if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                    }(this, t), this.onCommand = new i.Signal, this.onAnswer = new i.Signal, this.onEvent = new i.Signal, this.id = n, this.sender = o, this.receiver = a, this.receiverCallback = function(e) {
                        var n = void 0;
                        try {
                            n = t.getDataFromPostMessageEvent(e)
                        } catch (e) {
                            return
                        }
                        var o = n,
                            i = o.id,
                            a = o.answer,
                            s = o.event,
                            u = o.command;
                        i === r.id && (a && r.onAnswer.dispatch(a), s && r.onEvent.dispatch(s), u && r.onCommand.dispatch({
                            command: u,
                            sendAnswer: function(e) {
                                r.sendAnswer(u.commandName, u.params, e)
                            }
                        }))
                    }, a.addEventListener("message", this.receiverCallback)
                }
                return o(t, [{
                    key: "sendEvent",
                    value: function(e, t) {
                        var r = {
                            eventName: e,
                            data: t
                        };
                        this.sendPostMessage({
                            event: r
                        })
                    }
                }, {
                    key: "sendCommand",
                    value: function(e, t) {
                        var r = {
                            commandName: e,
                            params: t
                        };
                        this.sendPostMessage({
                            command: r
                        })
                    }
                }, {
                    key: "sendRequest",
                    value: function(e, t) {
                        var r = this.waitForAnswer({
                            commandName: e,
                            params: t
                        });
                        return this.sendCommand(e, t), r
                    }
                }, {
                    key: "destroy",
                    value: function() {
                        this.receiver.removeEventListener("message", this.receiverCallback), this.receiver.removeEventListener("click", this.receiverCallback), this.onCommand.removeAll(), this.onAnswer.removeAll(), this.onEvent.removeAll()
                    }
                }, {
                    key: "waitForAnswer",
                    value: function(t) {
                        var r = this,
                            n = t.commandName,
                            o = t.params;
                        return new e(function(e) {
                            var t = r.onAnswer.add(function(r) {
                                r.commandName === n && JSON.stringify(r.params) === JSON.stringify(o) && (t(), e(r.data))
                            })
                        })
                    }
                }, {
                    key: "sendAnswer",
                    value: function(e, t, r) {
                        var n = {
                            commandName: e,
                            params: t,
                            data: r
                        };
                        this.sendPostMessage({
                            answer: n
                        })
                    }
                }, {
                    key: "sendPostMessage",
                    value: function(e) {
                        var t = e.event,
                            r = e.command,
                            n = e.answer,
                            o = {
                                id: this.id,
                                event: t,
                                command: r,
                                answer: n
                            };
                        this.sender.postMessage(JSON.stringify(o), "*")
                    }
                }], [{
                    key: "getDataFromPostMessageEvent",
                    value: function(e) {
                        var t = e.data,
                            r = void 0;
                        if ("string" != typeof t) throw new a.IFrameApiError("MessageEvent data must be a valid JSON string");
                        if ("object" !== (void 0 === (r = JSON.parse(t)) ? "undefined" : n(r))) throw new a.IFrameApiError("IFrameMessageEvent must be an object");
                        var o = r,
                            i = o.id,
                            s = o.event,
                            u = o.answer,
                            c = o.command;
                        if ("string" != typeof i || !i.length) throw new a.IFrameApiError('message must have "id" parameter');
                        if (!(s || u || c)) throw new a.IFrameApiError("Parent IFrameMessageEvent must have one of properties[event | answer | command]");
                        if (s && "string" != typeof s.eventName) throw new a.IFrameApiError("bad event name in IFrameMessageEvent");
                        if (u && "string" != typeof u.commandName) throw new a.IFrameApiError("bad command name in answer of IFrameMessageEvent");
                        if (c && "string" != typeof c.commandName) throw new a.IFrameApiError("bad command name in IFrameMessageEvent");
                        return {
                            id: i,
                            event: s,
                            answer: u,
                            command: c
                        }
                    }
                }]), t
            }();
        t.PostMessenger = s
    }).call(this, r(1))
}, function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    });
    var n = r(157),
        o = r(107);
    t.DEFAULT_ADDITIONAL_PARAMS = {
        from: n.DEFAULT_FROM_VALUE,
        reqid: void 0,
        hash: void 0,
        vsid: o.DEFAULT_VSID,
        adsid: void 0
    }
}, function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    }), t.DEFAULT_FROM_VALUE = "other"
}, function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    });
    var n = r(73),
        o = r(17),
        i = r(27),
        a = r(18),
        s = r(34),
        u = r(66),
        c = r(134),
        l = r(234);
    t.validateSource = function(e, t, r) {
        var d = r.isForSetSource,
            f = void 0;
        if (Array.isArray(e.streams)) {
            if (e.drmConfig) throw new a.IFrameApiError("source.drmConfig must be presented in stream object in source.streams array");
            if (0 === e.streams.length) throw new a.IFrameApiError("source.streams must be not empty array");
            f = e.streams.map(l.validateStream)
        } else {
            if (void 0 === e.streamUrl) throw new a.IFrameApiError("source.streams must be an array with stream objects");
            if ("string" != typeof e.streamUrl || !e.streamUrl.trim()) throw new a.IFrameApiError("source.streamUrl must be a valid url string");
            f = [{
                url: e.streamUrl,
                drmConfig: e.drmConfig
            }]
        }
        if (void 0 !== e.startPosition && (!n.isFiniteNumber(e.startPosition) || e.startPosition < 0)) throw new a.IFrameApiError("source.startPosition must be a NOT negative finite number or undefined");
        if (void 0 !== e.withCredentials && "boolean" != typeof e.withCredentials) throw new a.IFrameApiError("source.withCredentials must be a boolean or undefined");
        if (void 0 !== e.loop && "boolean" != typeof e.loop) throw new a.IFrameApiError("source.loop must be a boolean or undefined");
        if (void 0 !== e.p2p && "boolean" != typeof e.p2p) throw new a.IFrameApiError("source.p2p must be a boolean or undefined");
        if (!s.isSerializable(e.drmConfig)) throw new a.IFrameApiError("source.drmConfig must be serializable");
        var v = o.isObject(e.logoConfig) && s.isSerializable(e.logoConfig) && i.isString(e.logoConfig.src);
        if (void 0 !== e.logoConfig && !v) throw new a.IFrameApiError("source.logoConfig must be a valid LogoConfig or undefined");
        if (void 0 !== e.protectedFrame && "boolean" != typeof e.protectedFrame) throw new a.IFrameApiError("source.protectedFrame must be a boolean or undefined");
        if (void 0 !== e.preview && "string" != typeof e.preview) throw new a.IFrameApiError("source.preview must be a string or undefined");
        return {
            streams: f,
            startPosition: e.startPosition,
            adConfig: e.adConfig ? u.parseAdConfig(e.adConfig) : {},
            withCredentials: Boolean(e.withCredentials),
            trackings: c.parseTrackings(e.trackings),
            loop: !0 === e.loop,
            p2p: !0 === e.p2p,
            logoConfig: e.logoConfig,
            protectedFrame: e.protectedFrame,
            preview: e.preview,
            additionalParams: !d || e.additionalParams ? c.parseAdditionalParams(e.additionalParams, t) : void 0
        }
    }
}, function(e, t, r) {
    "use strict";
    (function(e) {
        var n = Object.assign || function(e) {
            for (var t = 1; t < arguments.length; t++) {
                var r = arguments[t];
                for (var n in r) Object.prototype.hasOwnProperty.call(r, n) && (e[n] = r[n])
            }
            return e
        };
        Object.defineProperty(t, "__esModule", {
            value: !0
        });
        var o = r(160);
        t.loadScript = function(t) {
            return new e(function(e, r) {
                o.loadScript(n({}, t, {
                    onLoad: e,
                    onError: r
                }))
            })
        }
    }).call(this, r(1))
}, function(e, t, r) {
    "use strict";
    var n = Object.assign || function(e) {
        for (var t = 1; t < arguments.length; t++) {
            var r = arguments[t];
            for (var n in r) Object.prototype.hasOwnProperty.call(r, n) && (e[n] = r[n])
        }
        return e
    };
    Object.defineProperty(t, "__esModule", {
        value: !0
    });
    var o = r(38),
        i = r(15),
        a = r(5),
        s = r(76);
    t.loadScript = function(e) {
        var t = e.win,
            r = void 0 === t ? window : t,
            u = e.src,
            c = e.retries,
            l = void 0 === c ? 0 : c,
            d = e.onError,
            f = void 0 === d ? a.noop : d,
            v = new i.CustomError({
                id: o.CommonError.LOAD_SCRIPT_ERROR,
                message: "Failed to load script [" + u + "]",
                details: {
                    src: u,
                    isSelfWindow: r === window,
                    onBeforeLoad: Boolean(e.onBeforeLoad),
                    retries: l
                }
            });
        s.loadScriptLite(n({}, e, {
            win: r,
            onError: function() {
                return f(v)
            }
        }))
    }
}, , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    });
    var n = r(36);
    t.DEFAULT_AD_STATE = {
        state: n.AdState.NOT_PLAYING,
        type: void 0,
        adParams: {}
    }
}, , , , , , , , , , , , , , , , , , , , function(e, t, r) {
    "use strict";
    var n = function() {
        function e(e, t) {
            for (var r = 0; r < t.length; r++) {
                var n = t[r];
                n.enumerable = n.enumerable || !1, n.configurable = !0, "value" in n && (n.writable = !0), Object.defineProperty(e, n.key, n)
            }
        }
        return function(t, r, n) {
            return r && e(t.prototype, r), n && e(t, n), t
        }
    }();
    Object.defineProperty(t, "__esModule", {
        value: !0
    });
    var o = r(228),
        i = function() {
            function e(t) {
                var r = this;
                ! function(e, t) {
                    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                }(this, e), this.postMessenger = t, this.PROXY_KEYS = [{
                    key: "Escape",
                    keyCode: 27
                }], document.addEventListener("keydown", function(e) {
                    return r.eventHandler(e)
                }), document.addEventListener("keypress", function(e) {
                    return r.eventHandler(e)
                }), document.addEventListener("keyup", function(e) {
                    return r.eventHandler(e)
                })
            }
            return n(e, [{
                key: "eventHandler",
                value: function(e) {
                    if (0 !== this.PROXY_KEYS.filter(function(t) {
                            return t.key === e.key || t.keyCode === e.keyCode
                        }).length) {
                        var t = {
                            event: e.type,
                            keyCode: e.keyCode,
                            charCode: e.charCode,
                            key: e.key,
                            code: e.code
                        };
                        this.postMessenger.sendEvent("onKeyEvent", t)
                    }
                }
            }]), e
        }();
    t.KeyboardEventProxy = i, t.dispatchKeyEvent = function(e, t) {
        o.simulate(t, e.event, {
            key: e.key,
            code: e.code,
            keyCode: e.keyCode,
            charCode: e.charCode
        })
    }
}, function(e, t, r) {
    var n = r(229),
        o = {
            UIEvent: function() {
                return {
                    view: document.defaultView
                }
            },
            FocusEvent: function() {
                return o.UIEvent.apply(this, arguments)
            },
            MouseEvent: function(e) {
                return {
                    button: 0,
                    bubbles: "mouseenter" !== e && "mouseleave" !== e,
                    cancelable: "mouseenter" !== e && "mouseleave" !== e,
                    ctrlKey: !1,
                    altKey: !1,
                    shiftKey: !1,
                    metaKey: !1,
                    clientX: 1,
                    clientY: 1,
                    screenX: 0,
                    screenY: 0,
                    view: document.defaultView,
                    relatedTarget: document.documentElement
                }
            },
            WheelEvent: function(e) {
                return o.MouseEvent.apply(this, arguments)
            },
            KeyboardEvent: function() {
                return {
                    view: document.defaultView,
                    ctrlKey: !1,
                    altKey: !1,
                    shiftKey: !1,
                    metaKey: !1,
                    keyCode: 0
                }
            }
        },
        i = {
            beforeprint: "Event",
            afterprint: "Event",
            beforeunload: "Event",
            abort: "Event",
            error: "Event",
            change: "Event",
            submit: "Event",
            reset: "Event",
            cached: "Event",
            canplay: "Event",
            canplaythrough: "Event",
            chargingchange: "Event",
            chargingtimechange: "Event",
            checking: "Event",
            close: "Event",
            downloading: "Event",
            durationchange: "Event",
            emptied: "Event",
            ended: "Event",
            fullscreenchange: "Event",
            fullscreenerror: "Event",
            invalid: "Event",
            levelchange: "Event",
            loadeddata: "Event",
            loadedmetadata: "Event",
            noupdate: "Event",
            obsolete: "Event",
            offline: "Event",
            online: "Event",
            open: "Event",
            orientationchange: "Event",
            pause: "Event",
            pointerlockchange: "Event",
            pointerlockerror: "Event",
            copy: "Event",
            cut: "Event",
            paste: "Event",
            play: "Event",
            playing: "Event",
            ratechange: "Event",
            readystatechange: "Event",
            seeked: "Event",
            seeking: "Event",
            stalled: "Event",
            success: "Event",
            suspend: "Event",
            timeupdate: "Event",
            updateready: "Event",
            visibilitychange: "Event",
            volumechange: "Event",
            waiting: "Event",
            load: "UIEvent",
            unload: "UIEvent",
            resize: "UIEvent",
            scroll: "UIEvent",
            select: "UIEvent",
            drag: "MouseEvent",
            dragenter: "MouseEvent",
            dragleave: "MouseEvent",
            dragover: "MouseEvent",
            dragstart: "MouseEvent",
            dragend: "MouseEvent",
            drop: "MouseEvent",
            touchcancel: "UIEvent",
            touchend: "UIEvent",
            touchenter: "UIEvent",
            touchleave: "UIEvent",
            touchmove: "UIEvent",
            touchstart: "UIEvent",
            blur: "UIEvent",
            focus: "UIEvent",
            focusin: "UIEvent",
            focusout: "UIEvent",
            input: "UIEvent",
            show: "MouseEvent",
            click: "MouseEvent",
            dblclick: "MouseEvent",
            mouseenter: "MouseEvent",
            mouseleave: "MouseEvent",
            mousedown: "MouseEvent",
            mouseup: "MouseEvent",
            mouseover: "MouseEvent",
            mousemove: "MouseEvent",
            mouseout: "MouseEvent",
            contextmenu: "MouseEvent",
            wheel: "WheelEvent",
            message: "MessageEvent",
            storage: "StorageEvent",
            timeout: "StorageEvent",
            keydown: "KeyboardEvent",
            keypress: "KeyboardEvent",
            keyup: "KeyboardEvent",
            progress: "ProgressEvent",
            loadend: "ProgressEvent",
            loadstart: "ProgressEvent",
            popstate: "PopStateEvent",
            hashchange: "HashChangeEvent",
            transitionend: "TransitionEvent",
            compositionend: "CompositionEvent",
            compositionstart: "CompositionEvent",
            compositionupdate: "CompositionEvent",
            pagehide: "PageTransitionEvent",
            pageshow: "PageTransitionEvent"
        },
        a = {
            Event: "initEvent",
            UIEvent: "initUIEvent",
            FocusEvent: "initUIEvent",
            MouseEvent: "initMouseEvent",
            WheelEvent: "initMouseEvent",
            MessageEvent: "initMessageEvent",
            StorageEvent: "initStorageEvent",
            KeyboardEvent: "initKeyboardEvent",
            ProgressEvent: "initEvent",
            PopStateEvent: "initEvent",
            TransitionEvent: "initEvent",
            HashChangeEvent: "initHashChangeEvent",
            CompositionEvent: "initCompositionEvent",
            DeviceMotionEvent: "initDeviceMotionEvent",
            PageTransitionEvent: "initEvent",
            DeviceOrientationEvent: "initDeviceOrientationEvent"
        },
        s = {
            initEvent: [],
            initUIEvent: ["view", "detail"],
            initKeyboardEvent: ["view", "char", "key", "location", "modifiersList", "repeat", "locale"],
            initKeyEvent: ["view", "ctrlKey", "altKey", "shiftKey", "metaKey", "keyCode", "charCode"],
            initMouseEvent: ["view", "detail", "screenX", "screenY", "clientX", "clientY", "ctrlKey", "altKey", "shiftKey", "metaKey", "button", "relatedTarget"],
            initHashChangeEvent: ["oldURL", "newURL"],
            initCompositionEvent: ["view", "data", "locale"],
            initDeviceMotionEvent: ["acceleration", "accelerationIncludingGravity", "rotationRate", "interval"],
            initDeviceOrientationEvent: ["alpha", "beta", "gamma", "absolute"],
            initMessageEvent: ["data", "origin", "lastEventId", "source"],
            initStorageEvent: ["key", "oldValue", "newValue", "url", "storageArea"]
        },
        u = {
            UIEvent: window.UIEvent,
            FocusEvent: window.FocusEvent,
            MouseEvent: window.MouseEvent,
            WheelEvent: window.MouseEvent,
            KeyboardEvent: window.KeyboardEvent
        };
    t.generate = function(e, t) {
        if (!i.hasOwnProperty(e)) throw new SyntaxError("Unsupported event type");
        var r, c, l = i[e],
            d = function(e, t) {
                if ("KeyboardEvent" === e && t) return {
                    keyCode: t.keyCode || 0,
                    key: t.key || 0,
                    which: t.which || t.keyCode || 0
                }
            }(l, t);
        t instanceof window.Event || (t = l in o ? n({
            bubbles: !0,
            cancelable: !0
        }, o[l](e, t), t) : n({
            bubbles: !0,
            cancelable: !0
        }, t));
        var f = u[l] || window.Event;
        try {
            for (c in r = new f(e, t), d) Object.defineProperty(r, c, {
                value: d[c]
            });
            return r
        } catch (e) {}
        var v = window.navigator.userAgent.toLowerCase();
        Math.max(v.indexOf("msie"), v.indexOf("trident")) >= 0 && "KeyboardEvent" === l && (l = "UIEvent");
        var p = a[l];
        if (!document.createEvent) {
            for (c in r = n(document.createEventObject(), t), d) Object.defineProperty(r, c, {
                value: d[c]
            });
            return r
        }
        if (r = n(document.createEvent(l), t), "initKeyboardEvent" === p)
            if (void 0 === r[p]) p = "initKeyEvent";
            else if (!("modifiersList" in t)) {
            var m = [];
            t.metaKey && m.push("Meta"), t.altKey && m.push("Alt"), t.shiftKey && m.push("Shift"), t.ctrlKey && m.push("Control"), t.modifiersList = m.join(" ")
        }
        var h = s[p].map(function(e) {
            return t[e]
        });
        for (c in r[p].apply(r, [e, t.bubbles, t.cancelable].concat(h)), d) Object.defineProperty(r, c, {
            value: d[c]
        });
        return r
    }, t.simulate = function(e, r, n) {
        var o = t.generate(r, n);
        return document.createEvent ? e.dispatchEvent(o) : e.fireEvent("on" + r, o)
    }
}, function(e, t) {
    e.exports = function(e) {
        for (var t = 1; t < arguments.length; t++) {
            var n = arguments[t];
            for (var o in n) r.call(n, o) && (e[o] = n[o])
        }
        return e
    };
    var r = Object.prototype.hasOwnProperty
}, function(e, t, r) {
    "use strict";
    var n = function() {
        return function(e, t) {
            if (Array.isArray(e)) return e;
            if (Symbol.iterator in Object(e)) return function(e, t) {
                var r = [],
                    n = !0,
                    o = !1,
                    i = void 0;
                try {
                    for (var a, s = e[Symbol.iterator](); !(n = (a = s.next()).done) && (r.push(a.value), !t || r.length !== t); n = !0);
                } catch (e) {
                    o = !0, i = e
                } finally {
                    try {
                        !n && s.return && s.return()
                    } finally {
                        if (o) throw i
                    }
                }
                return r
            }(e, t);
            throw new TypeError("Invalid attempt to destructure non-iterable instance")
        }
    }();
    Object.defineProperty(t, "__esModule", {
        value: !0
    }), t.entriesToObject = function(e) {
        var t = {};
        return e.forEach(function(e) {
            var r = n(e, 2),
                o = r[0],
                i = r[1];
            t[o] = i
        }), t
    }
}, function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    });
    var n = r(109);
    t.isStringifiable = function(e) {
        return void 0 !== n.tryStringify(e)
    }
}, function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    }), t.AllApiEventNames = ["onStateChange", "onQualityChange", "onSeek", "onAdStateChange", "onReady", "onDurationChange", "onCurrentTimeChange", "onFullScreenChange", "onVolumeChange", "onError", "onLog", "onUserAction", "onDVRChange", "onVideoTrackChange", "onVideoTracksChange", "onAudioTrackChange", "onAudioTracksChange", "onTextTrackChange", "onTextTracksChange"]
}, function(e, t, r) {
    "use strict";
    var n = function() {
            return function(e, t) {
                if (Array.isArray(e)) return e;
                if (Symbol.iterator in Object(e)) return function(e, t) {
                    var r = [],
                        n = !0,
                        o = !1,
                        i = void 0;
                    try {
                        for (var a, s = e[Symbol.iterator](); !(n = (a = s.next()).done) && (r.push(a.value), !t || r.length !== t); n = !0);
                    } catch (e) {
                        o = !0, i = e
                    } finally {
                        try {
                            !n && s.return && s.return()
                        } finally {
                            if (o) throw i
                        }
                    }
                    return r
                }(e, t);
                throw new TypeError("Invalid attempt to destructure non-iterable instance")
            }
        }(),
        o = function(e, t) {
            var r = {};
            for (var n in e) Object.prototype.hasOwnProperty.call(e, n) && t.indexOf(n) < 0 && (r[n] = e[n]);
            if (null != e && "function" == typeof Object.getOwnPropertySymbols) {
                var o = 0;
                for (n = Object.getOwnPropertySymbols(e); o < n.length; o++) t.indexOf(n[o]) < 0 && (r[n[o]] = e[n[o]])
            }
            return r
        };
    Object.defineProperty(t, "__esModule", {
        value: !0
    });
    var i = r(15),
        a = r(25),
        s = r(92),
        u = r(18),
        c = r(34);
    t.validateFeaturesParams = function(e, t) {
        var r = {},
            l = {};
        return a.getObjectEntries(e).forEach(function(e) {
            var a = n(e, 2),
                d = a[0],
                f = a[1],
                v = f.handlers,
                p = void 0 === v ? {} : v,
                m = o(f, ["handlers"]);
            if (!c.isSerializable(m)) throw new u.IFrameApiError("featuresParams parameter for [" + d + "] is not serializable");
            r[d] = m, l[d] = s.mapObjectValues(p, function(e, r) {
                if ("function" != typeof e) throw new u.IFrameApiError("featuresParams handler for [" + d + "][" + r + "] is a function");
                return function(n) {
                    try {
                        e(n)
                    } catch (e) {
                        t.error({
                            error: new i.CustomError(e, {
                                code: "FEATURE_HANDLER_ERROR",
                                details: {
                                    featureName: d,
                                    eventName: r,
                                    params: n
                                }
                            })
                        })
                    }
                }
            })
        }), {
            featuresParams: r,
            featuresHandlers: l
        }
    }
}, function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    });
    var n = r(17),
        o = r(18),
        i = r(34);
    t.validateStream = function(e) {
        if (!n.isObject(e)) throw new o.IFrameApiError("stream must be an object");
        if ("string" != typeof e.url) throw new o.IFrameApiError("stream.url must be a string");
        if (void 0 !== e.drmConfig && !i.isSerializable(e.drmConfig)) throw new o.IFrameApiError("stream.drmConfig must be serializable");
        return {
            url: e.url,
            drmConfig: e.drmConfig
        }
    }
}, , , , , , , , , , , , , , function(e, t, r) {
    "use strict";
    (function(e) {
        Object.defineProperty(t, "__esModule", {
            value: !0
        }), t.promiseTimeout = function(t) {
            var r = 0;
            return {
                promise: new e(function(e) {
                    r = window.setTimeout(e, t)
                }),
                clear: function() {
                    clearTimeout(r)
                },
                timeoutId: r
            }
        }
    }).call(this, r(1))
}, function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    }), t.tryCatch = function(e, t) {
        try {
            return e()
        } catch (e) {
            "function" == typeof t && t(e)
        }
    }
}, function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    }), t.parseIFrameInitParams = function() {
        return function(e) {
            for (var t = {}, r = 0; r < e.length; ++r) {
                var n = e[r].split("=");
                1 === n.length ? t[n[0]] = null : t[n[0]] = decodeURIComponent(n[1].replace(/\+/g, " "))
            }
            return t
        }(window.location.search.substr(1).split("&"))
    }
}, function(e, t, r) {
    "use strict";
    var n = Object.assign || function(e) {
        for (var t = 1; t < arguments.length; t++) {
            var r = arguments[t];
            for (var n in r) Object.prototype.hasOwnProperty.call(r, n) && (e[n] = r[n])
        }
        return e
    };
    Object.defineProperty(t, "__esModule", {
        value: !0
    });
    var o = r(105);
    t.parseLogObject = function(e, t) {
        var r = e.errorCode,
            i = e.isFatal,
            a = e.eventName,
            s = e.src,
            u = e.remainingBufferedTime,
            c = e.connectionQuality,
            l = e.videoTrack,
            d = void 0 === l ? {} : l,
            f = e.details,
            v = void 0 === f ? {} : f,
            p = t.platform;
        return {
            error_id: r ? String(r) : void 0,
            event_id: a || void 0,
            fatal: String(Boolean(i)),
            src: s || "",
            remaining_buffered_time: void 0 !== u ? String(u) : void 0,
            connection: c,
            video_track: "" === d.name ? void 0 : d.name,
            video_auto: d.auto,
            player_version: p === o.PLATFORM.FLASH ? "flash:translation-0.32" : "js:1.0-519",
            details: function() {
                var e = void 0;
                try {
                    var t = v.frag;
                    e = JSON.stringify(n({}, v, {
                        frag: t && {
                            relurl: t.relurl
                        }
                    }))
                } catch (t) {
                    e = v && String(v)
                }
                return e
            }()
        }
    }
}, function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    });
    var n = r(106),
        o = r(80);
    ! function(e) {
        var t = !1,
            r = [];

        function i() {
            r.splice(0)
        }
        e.add = function(e) {
            r.push(e), t || (window.onerror = function() {
                for (var e = arguments.length, t = Array(e), o = 0; o < e; o++) t[o] = arguments[o];
                n.forEach(r, function(e) {
                    return e.apply(void 0, t)
                })
            }, t = !0, o.onUnload(i))
        }, e.reset = i
    }(t.onGlobalError || (t.onGlobalError = {}))
}, , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    }), t.BLOCKSTAT = {
        js_framework_inited: "3036",
        content_block: "2923",
        loadstart: "3390"
    }
}, function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    }), t.sendReportToStats = function(e) {
        var t = e.reportId,
            r = e.reported,
            n = e.stats,
            o = e.reportData;
        n.eventToStats("ReportLog", {
            reportId: t,
            reported: r,
            details: o
        })
    }
}, function(e, t, r) {
    "use strict";
    var n = function() {
        function e(e, t) {
            for (var r = 0; r < t.length; r++) {
                var n = t[r];
                n.enumerable = n.enumerable || !1, n.configurable = !0, "value" in n && (n.writable = !0), Object.defineProperty(e, n.key, n)
            }
        }
        return function(t, r, n) {
            return r && e(t.prototype, r), n && e(t, n), t
        }
    }();
    Object.defineProperty(t, "__esModule", {
        value: !0
    });
    var o = r(16),
        i = r(146),
        a = r(94),
        s = r(95);
    t.STALLED_TIMER_DELAYS = [1, 4, 5];
    var u = 0;
    t.STALLED_DURATIONS = t.STALLED_TIMER_DELAYS.map(function(e) {
        return u += e
    });
    var c = 1e3 * t.STALLED_DURATIONS[t.STALLED_DURATIONS.length - 1],
        l = [a.ExpectedStalledReason.Init, a.ExpectedStalledReason.NoFragLoad],
        d = function() {
            function e(t) {
                ! function(e, t) {
                    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                }(this, e), this.getPlayerExpectedStalled = t, this.onSendStalled = new o.Signal, this.isBuffering = !1
            }
            return n(e, [{
                key: "setBuffering",
                value: function(e) {
                    var r = this;
                    if (e !== this.isBuffering)
                        if (this.isBuffering = e, this.isBuffering) {
                            var n = this.getExpectedStalled();
                            this.timer = new i.Timer(function(e) {
                                var o = e.count;
                                return o > 0 && r.send(n, t.STALLED_DURATIONS[o - 1]), o >= t.STALLED_TIMER_DELAYS.length ? (r.destroyTimer(), 1 / 0) : 1e3 * t.STALLED_TIMER_DELAYS[o]
                            }), this.timer.start()
                        } else this.destroyTimer()
                }
            }, {
                key: "destroy",
                value: function() {
                    this.destroyTimer()
                }
            }, {
                key: "getExpectedStalled",
                value: function() {
                    var t = this.getPlayerExpectedStalled();
                    return e.isExpiredStalled(t) ? s.createExpectedStalled(a.ExpectedStalledReason.Other, void 0) : t
                }
            }, {
                key: "destroyTimer",
                value: function() {
                    this.timer && (this.timer.destroy(), this.timer = void 0)
                }
            }, {
                key: "send",
                value: function(e, t) {
                    var r = {
                        reason: e.reason,
                        details: e.details,
                        stalledDuration: t
                    };
                    this.onSendStalled.dispatch(r)
                }
            }], [{
                key: "isExpiredStalled",
                value: function(e) {
                    var t = e.timestamp,
                        r = e.reason;
                    return !(l.indexOf(r) > -1) && Date.now() - t >= c
                }
            }]), e
        }();
    t.StalledController = d
}, function(e, t, r) {
    "use strict";
    var n = Object.assign || function(e) {
            for (var t = 1; t < arguments.length; t++) {
                var r = arguments[t];
                for (var n in r) Object.prototype.hasOwnProperty.call(r, n) && (e[n] = r[n])
            }
            return e
        },
        o = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function(e) {
            return typeof e
        } : function(e) {
            return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype ? "symbol" : typeof e
        };
    Object.defineProperty(t, "__esModule", {
        value: !0
    });
    var i = r(39),
        a = r(50);

    function s() {
        var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {},
            t = {};
        for (var r in e) {
            var n = e[r],
                i = void 0 === n ? "undefined" : o(n);
            "string" !== i && "number" !== i && "boolean" !== i || (t[r] = n)
        }
        return t
    }
    t.getSystemInfo = function() {
        var e, t = window.navigator || {},
            r = window.performance || {},
            o = a.getTopLocationData(document),
            u = o.location,
            c = o.referrer;
        return {
            navigator: n({}, s(t), {
                connection: s(t.connection),
                plugins: (e = window.navigator.plugins, void 0 === e || 0 === e.length ? [] : i.map(e, s))
            }),
            performance: {
                memory: s(r.memory)
            },
            playerLocation: location.href,
            iframeApiLocation: u,
            iframeApiReferrer: c
        }
    }
}, function(e, t, r) {
    "use strict";
    (function(e) {
        var n = function() {
                return function(e, t) {
                    if (Array.isArray(e)) return e;
                    if (Symbol.iterator in Object(e)) return function(e, t) {
                        var r = [],
                            n = !0,
                            o = !1,
                            i = void 0;
                        try {
                            for (var a, s = e[Symbol.iterator](); !(n = (a = s.next()).done) && (r.push(a.value), !t || r.length !== t); n = !0);
                        } catch (e) {
                            o = !0, i = e
                        } finally {
                            try {
                                !n && s.return && s.return()
                            } finally {
                                if (o) throw i
                            }
                        }
                        return r
                    }(e, t);
                    throw new TypeError("Invalid attempt to destructure non-iterable instance")
                }
            }(),
            o = function() {
                function e(e, t) {
                    for (var r = 0; r < t.length; r++) {
                        var n = t[r];
                        n.enumerable = n.enumerable || !1, n.configurable = !0, "value" in n && (n.writable = !0), Object.defineProperty(e, n.key, n)
                    }
                }
                return function(t, r, n) {
                    return r && e(t.prototype, r), n && e(t, n), t
                }
            }();

        function i(e, t, r) {
            return t in e ? Object.defineProperty(e, t, {
                value: r,
                enumerable: !0,
                configurable: !0,
                writable: !0
            }) : e[t] = r, e
        }
        Object.defineProperty(t, "__esModule", {
            value: !0
        });
        var a = r(35),
            s = r(93),
            u = r(16),
            c = r(18),
            l = r(252),
            d = "37773110",
            f = function() {
                function t() {
                    var e = this;
                    ! function(e, t) {
                        if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                    }(this, t), this.onInit = new u.Signal, this.isInited = !1, t.loadMetrikaScript().then(function() {
                        e.metrika = new Ya.Metrika({
                            id: d
                        }), e.isInited = !0, e.onInit.dispatch(void 0)
                    }).catch(function(e) {
                        console.error(e)
                    }), t.setupGlobalErrorListeners()
                }
                return o(t, [{
                    key: "push",
                    value: function(e, t) {
                        t && (e.error = i({}, t.message || "NO_ERR_MESSAGE", t)), e.appParams && (e.appParams.scriptSrc = e.appParams.scriptSrc || a.CURRENT_SCRIPT_SRC), this.pushCustom(e)
                    }
                }, {
                    key: "pushCustom",
                    value: function(e) {
                        var t, r = this;
                        e.referrer = document.referrer;
                        var n = (i(t = {}, "1.0-519", e), i(t, "DEV_MODE", !1), t);
                        this.waitForInit().then(function() {
                            return r.metrika.params(n)
                        })
                    }
                }, {
                    key: "pushGlobalErrors",
                    value: function(e) {
                        var r = this,
                            o = function(t, n, o, i, a) {
                                r.push(e, new c.IFrameApiError(a || {
                                    message: t,
                                    url: n,
                                    line: o,
                                    col: i
                                }))
                            };
                        t.globalOnError.add(function(e) {
                            var t = n(e, 5),
                                r = t[0],
                                i = t[1],
                                a = t[2],
                                s = t[3],
                                u = t[4];
                            o(r, i, a, s, u)
                        }), t.globalOnUnhandledRejection.add(function(e) {
                            o(e.reason)
                        })
                    }
                }, {
                    key: "waitForInit",
                    value: function() {
                        return this.isInited ? e.resolve() : this.onInit.promise()
                    }
                }], [{
                    key: "loadMetrikaScript",
                    value: function() {
                        return "undefined" == typeof Ya || void 0 === Ya.Metrika ? s.loadScript({
                            src: "https://mc.yandex.ru/metrika/watch.js"
                        }) : e.resolve()
                    }
                }, {
                    key: "setupGlobalErrorListeners",
                    value: function() {
                        var e = this;
                        this.listening || (l.onGlobalError.add(function() {
                            for (var t = arguments.length, r = Array(t), n = 0; n < t; n++) r[n] = arguments[n];
                            return e.globalOnError.dispatch(r)
                        }), window.addEventListener("unhandledrejection", function(t) {
                            return e.globalOnUnhandledRejection.dispatch(t)
                        }), this.listening = !0)
                    }
                }]), t
            }();
        f.globalOnUnhandledRejection = new u.Signal, f.globalOnError = new u.Signal, f.listening = !1, t.YandexMetrika = f
    }).call(this, r(1))
}, , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , function(e, t, r) {
    "use strict";
    (function(e) {
        var n, o = r(0),
            i = (n = o) && n.__esModule ? n : {
                default: n
            };
        var a = function(t, r, n, o) {
            return new(n || (n = e))(function(e, i) {
                function a(e) {
                    try {
                        u(o.next(e))
                    } catch (e) {
                        i(e)
                    }
                }

                function s(e) {
                    try {
                        u(o.throw(e))
                    } catch (e) {
                        i(e)
                    }
                }

                function u(t) {
                    t.done ? e(t.value) : new n(function(e) {
                        e(t.value)
                    }).then(a, s)
                }
                u((o = o.apply(t, r || [])).next())
            })
        };
        Object.defineProperty(t, "__esModule", {
            value: !0
        });
        var s = r(24),
            u = r(73),
            c = r(480),
            l = r(248),
            d = r(49),
            f = r(41),
            v = r(13),
            p = r(133),
            m = r(47),
            h = r(18),
            y = r(481),
            g = r(482),
            E = r(72);
        r(489);
        var b = r(105),
            _ = r(493),
            w = r(227),
            S = r(252),
            T = r(250),
            O = (r(251), r(155)),
            P = r(317),
            A = new P.YandexMetrika,
            C = T.parseIFrameInitParams(),
            R = C.vsid ? C.vsid : s.generateHexString(f.DEFAULT_SID_LENGTH),
            I = new d.Stats({
                service: m.SOLOMON_SERVICE_NAME,
                version: "1.0-519",
                sid: R
            });

        function L() {
        	// MARK
            C = video_playes_params;

            var e = y.getStreamUrlFromIFrameParams(C);
            if (!e) throw new Error("VideoPlayerIframeApi Error: incorrect IFrame parameters: Required: stream_url Search: ") + window.location.search;
            var t = C.partner_id ? Number(C.partner_id) : NaN,
                r = C.category ? Number(C.category) : Number(p.DEFAULT_AD_CATEGORY),
                n = Number(C.imp_id) || void 0,
                o = u.isFiniteNumber(t) ? {
                    partnerId: t,
                    category: r,
                    impId: n,
                    videoContentId: C.video_content_id || "",
                    videoContentName: C.video_content_name || "",
                    videoPublisherId: C.video_publisher_id || "",
                    videoPublisherName: C.video_publisher_name || "",
                    videoGenreId: C.video_genre_id || "",
                    videoGenreName: C.video_genre_name || "",
                    distrId: C.distr_id || ""
                } : void 0,
                i = C.volume,
                a = C.muted,
                s = void 0;
            try {
                var l = C.additional_params;
                l && (s = JSON.parse(l))
            } catch (e) {}

            return (C.lq_url || C.hd_url || C.hd_url) && I.deprecated("LqHqHdParamInIframeParams", "lq_url, hd_url, hd_url params of player iframe are deprecated, use mq_url"), {
                additionalParams: s,
                debug: "true" === C.debug,
                vsid: R,
                startPosition: void 0 !== C.start_position ? Number(C.start_position) : void 0,
                streams: [{
                    url: e,
                    drmConfig: c.tryParse(C.drm_config)
                }],
                hidden: v.parseControlsString(C.hidden || ""),
                autoplay: "true" === C.autoplay,
                autoQuality: void 0 === C.auto_quality || "false" !== C.auto_quality,
                preload: void 0 === C.preload || "false" !== C.preload,
                loop: "true" === C.loop,
                p2p: "true" === C.p2p,
                preview: C.preview,
                env: C.env_device_type ? {
                    deviceType: C.env_device_type
                } : {},
                withCredentials: "true" === C.with_credentials,
                volume: i ? Number(i) : void 0,
                muted: "true" === a || "false" !== a && void 0,
                maxBufferLength: C.max_buffer_length ? Number(C.max_buffer_length) : void 0,
                liveOffset: void 0 === C.live_offset ? void 0 : Number(C.live_offset),
                report: {
                    enabled: "true" === C.report,
                    reportUrl: C.report_url || E.DEFAULT_REPORT_URL
                },
                skinConfig: c.tryParse(C.skin_config),
                logoConfig: c.tryParse(C.logo_config),
                adParameters: o,
                preferNative: C.prefer_native ? "true" === C.prefer_native : void 0,
                featuresParams: {}
            }
        }
        a(void 0, void 0, void 0, i.default.mark(function t() {
            var r, n, o, a, s, u, c, d, f;
            return i.default.wrap(function(t) {
                for (;;) switch (t.prev = t.next) {
                    case 0:
                        if (r = new O.PostMessenger({
                                id: R,
                                sender: window.parent,
                                receiver: window
                            }), n = l.promiseTimeout(5e3), o = n.promise, a = n.clear, "true" !== C.post_message_config) {
                            t.next = 8;
                            break
                        }
                        return t.next = 5, e.race([r.sendRequest("getConfig"), o.then(function() {
                            return I.errorToStats(new h.IFrameApiError({
                                code: "POST_MESSAGE_GET_CONFIG_TIMEOUT"
                            })), L()
                        })]);
                    case 5:
                        t.t0 = t.sent, t.next = 9;
                        break;
                    case 8:
                        t.t0 = L();
                    case 9:
                        s = t.t0, a(), r.sendEvent("onInit"), new w.KeyboardEventProxy(r), (u = document.createElement("div")).style.width = "100%", u.style.height = "100%", document.body.appendChild(u), c = new g.Player(I, u, s), d = new _.ApproximateWatchedTime, f = {
                            iFrameInitParams: C,
                            appParams: {
                                platform: c.getPlatformString()
                            }
                        }, A.push(f), A.pushGlobalErrors(f), c.readyPromise.then(function() {
                            r.sendEvent("onReady", {
                                platform: c.platform
                            })
                        }).catch(function(e) {
                            A.push(f, new h.IFrameApiError(e))
                        }), r.onCommand.add(function(e) {
                            var t = e.command,
                                r = t.commandName,
                                n = t.params,
                                o = e.sendAnswer;
                            switch (r) {
                                case "pause":
                                    c.pause();
                                    break;
                                case "play":
                                    c.play();
                                    break;
                                case "seek":
                                    c.seek(n);
                                    break;
                                case "setSource":
                                    d.reset(), c.setSource(n);
                                    break;
                                case "getDuration":
                                    o(c.getDuration());
                                    break;
                                case "getPosition":
                                    o({
                                        time: c.getCurrentTime(),
                                        utcTime: c.getUtcPosition()
                                    });
                                    break;
                                case "setVolume":
                                    c.setVolume(n);
                                    break;
                                case "setMuted":
                                    c.setMuted(n);
                                    break;
                                case "setVideoTrack":
                                    c.setVideoTrack(n);
                                    break;
                                case "setAudioTrack":
                                    c.setAudioTrack(n);
                                    break;
                                case "setTextTrack":
                                    c.setTextTrack(n);
                                    break;
                                case "setFullscreen":
                                    c.setFullscreen(n);
                                    break;
                                case "setHiddenControls":
                                    c.setHiddenControls(n);
                                    break;
                                case "setVideoStyle":
                                    c.setVideoStyle(n);
                                    break;
                                case "setPictureInPictureEnabled":
                                    c.setPictureInPictureEnabled(n);
                                    break;
                                case "sendReportToStats":
                                    var i = n.reportId,
                                        a = n.reported;
                                    c.sendReportToStats({
                                        reportId: i,
                                        reported: a
                                    });
                                    break;
                                case "dispatchFeatureAction":
                                    c.dispatchFeatureAction(n);
                                    break;
                                default:
                                    throw new Error("IFrameApi Error: unexpected command in MessageEvent: " + r)
                            }
                        }), c.onStateChange.add(function(e) {
                            r.sendEvent("onStateChange", e)
                        }), c.onSeek.add(function(e) {
                            c.isReady && r.sendEvent("onSeek", e)
                        }), c.onDurationChange.add(function(e) {
                            c.isReady && r.sendEvent("onDurationChange", e)
                        }), c.onCurrentTimeChange.add(function(e) {
                            c.isReady && (d.setCurrentTime(e), r.sendEvent("onPositionChange", {
                                time: e,
                                utcTime: c.getUtcPosition(),
                                watchedTime: c.platform === b.PLATFORM.HTML ? c.getWatchedTime() : d.getWatchedTime()
                            }))
                        }), c.onFullScreenChange.add(function(e) {
                            c.isReady && r.sendEvent("onFullScreenChange", e)
                        }), c.onVolumeChange.add(function(e) {
                            r.sendEvent("onVolumeChange", e)
                        }), c.onAdStateChange.add(function(e) {
                            r.sendEvent("onAdStateChange", e)
                        }), c.onError.add(function(e) {
                            r.sendEvent("onError", e), A.push(f, e)
                        }), c.onUserAction.add(function(e) {
                            r.sendEvent("onUserAction", e)
                        }), S.onGlobalError.add(function(e, t, r, n, o) {
                            c.reportGlobalError(o || {
                                message: e
                            })
                        }), window.addEventListener("unhandledrejection", function(e) {
                            c.reportGlobalError(e.reason)
                        }), c.onVideoTrackChange.add(function(e) {
                            r.sendEvent("onVideoTrackChange", e)
                        }), c.onVideoTracksChange.add(function(e) {
                            r.sendEvent("onVideoTracksChange", e)
                        }), c.onAudioTrackChange.add(function(e) {
                            r.sendEvent("onAudioTrackChange", e)
                        }), c.onAudioTracksChange.add(function(e) {
                            r.sendEvent("onAudioTracksChange", e)
                        }), c.onTextTrackChange.add(function(e) {
                            r.sendEvent("onTextTrackChange", e)
                        }), c.onTextTracksChange.add(function(e) {
                            r.sendEvent("onTextTracksChange", e)
                        }), c.onVideoTypeChange.add(function(e) {
                            r.sendEvent("onVideoTypeChange", e)
                        }), c.onOriginalBroadcastAdStateChange.add(function(e) {
                            r.sendEvent("onOriginalBroadcastAdStateChange", e)
                        }), c.onChangeStream.add(function(e) {
                            r.sendEvent("onChangeStream", e)
                        }), c.onFeatureEvent.add(function(e) {
                            r.sendEvent("onFeatureEvent", e)
                        });
                    case 46:
                    case "end":
                        return t.stop()
                }
            }, t, this)
        })).catch(function(e) {
            console.error(e), I.errorToStats(e)
        })
    }).call(this, r(1))
}, function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    });
    var n = r(27);
    t.tryParse = function(e) {
        try {
            return n.isString(e) ? JSON.parse(e) : void 0
        } catch (e) {
            return
        }
    }
}, function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    }), t.getStreamUrlFromIFrameParams = function(e) {
        if (e) return e.stream_url || e.hd_url || e.hq_url || e.mq_url || e.lq_url
    }
}, function(e, t, r) {
    "use strict";
    (function(e) {
        var n, o = r(0),
            i = (n = o) && n.__esModule ? n : {
                default: n
            },
            a = function() {
                return function(e, t) {
                    if (Array.isArray(e)) return e;
                    if (Symbol.iterator in Object(e)) return function(e, t) {
                        var r = [],
                            n = !0,
                            o = !1,
                            i = void 0;
                        try {
                            for (var a, s = e[Symbol.iterator](); !(n = (a = s.next()).done) && (r.push(a.value), !t || r.length !== t); n = !0);
                        } catch (e) {
                            o = !0, i = e
                        } finally {
                            try {
                                !n && s.return && s.return()
                            } finally {
                                if (o) throw i
                            }
                        }
                        return r
                    }(e, t);
                    throw new TypeError("Invalid attempt to destructure non-iterable instance")
                }
            }(),
            s = Object.assign || function(e) {
                for (var t = 1; t < arguments.length; t++) {
                    var r = arguments[t];
                    for (var n in r) Object.prototype.hasOwnProperty.call(r, n) && (e[n] = r[n])
                }
                return e
            },
            u = function() {
                function e(e, t) {
                    for (var r = 0; r < t.length; r++) {
                        var n = t[r];
                        n.enumerable = n.enumerable || !1, n.configurable = !0, "value" in n && (n.writable = !0), Object.defineProperty(e, n.key, n)
                    }
                }
                return function(t, r, n) {
                    return r && e(t.prototype, r), n && e(t, n), t
                }
            }();
        var c = function(t, r, n, o) {
                return new(n || (n = e))(function(e, i) {
                    function a(e) {
                        try {
                            u(o.next(e))
                        } catch (e) {
                            i(e)
                        }
                    }

                    function s(e) {
                        try {
                            u(o.throw(e))
                        } catch (e) {
                            i(e)
                        }
                    }

                    function u(t) {
                        t.done ? e(t.value) : new n(function(e) {
                            e(t.value)
                        }).then(a, s)
                    }
                    u((o = o.apply(t, r || [])).next())
                })
            },
            l = function(e, t) {
                var r = {};
                for (var n in e) Object.prototype.hasOwnProperty.call(e, n) && t.indexOf(n) < 0 && (r[n] = e[n]);
                if (null != e && "function" == typeof Object.getOwnPropertySymbols) {
                    var o = 0;
                    for (n = Object.getOwnPropertySymbols(e); o < n.length; o++) t.indexOf(n[o]) < 0 && (r[n[o]] = e[n[o]])
                }
                return r
            };
        Object.defineProperty(t, "__esModule", {
            value: !0
        });
        var d = r(99),
            f = r(15),
            v = r(57),
            p = r(93),
            m = r(73),
            h = r(17),
            y = r(16),
            g = r(249),
            E = r(10),
            b = r(45),
            _ = r(483),
            w = r(102),
            S = r(138),
            T = r(36),
            O = r(313),
            P = r(64),
            A = r(94),
            C = r(95),
            R = r(32),
            I = r(110),
            L = r(207),
            F = r(142),
            k = r(484),
            M = r(18),
            j = r(150),
            N = r(314),
            U = r(315),
            D = r(105),
            x = r(91),
            V = r(65),
            B = r(485),
            H = r(486),
            G = r(316),
            Y = r(148),
            K = r(66),
            q = r(251),
            W = r(487),
            z = r(134);
        var J = function() {
            function t(e, r, n) {
                var o = this;
                ! function(e, t) {
                    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                }(this, t), this.stats = e, this.container = r, this.iFrameParameters = n, this.isReady = !1, this.onError = new y.Signal, this.onChangeStream = new y.Signal, this.onStateChange = new y.Signal, this.onSeek = new y.Signal, this.onAdStateChange = new y.Signal, this.onDurationChange = new y.Signal, this.onCurrentTimeChange = new y.Signal, this.onFullScreenChange = new y.Signal, this.onVolumeChange = new y.Signal, this.onStreamLog = new y.Signal, this.onUserAction = new y.Signal, this.onVideoTypeChange = new y.Signal, this.onFeatureEvent = new y.Signal, this.onVideoTrackChange = new y.Signal, this.onVideoTracksChange = new y.Signal, this.onAudioTrackChange = new y.Signal, this.onAudioTracksChange = new y.Signal, this.onTextTrackChange = new y.Signal, this.onTextTracksChange = new y.Signal, this.onOriginalBroadcastAdStateChange = new y.Signal, this.autoplay = !1, this.autoQuality = !0, this.preload = !0, this.onPlayerStateChange = new y.Signal, this.dispatchFeatureAction = function(e) {
                    if (!o.isReady) throw new M.IFrameApiError("Player is not ready");
                    o.platform === D.PLATFORM.HTML && o.htmlPlayerApi.dispatchFeatureAction(e)
                }, this.onRecover = function(e) {
                    o.stats.eventToStats("RecoverStreamError", {
                        details: s({}, e, {
                            system: G.getSystemInfo()
                        }),
                        vsid: o.iFrameParameters.vsid
                    });
                    var t = e.state,
                        r = e.rawData,
                        n = r && r.frag ? r.frag.url : void 0,
                        i = q.parseLogObject({
                            currentTime: o.getCurrentTime(),
                            eventName: "RecoverStreamError",
                            src: void 0 !== t && void 0 !== t.controller && void 0 !== t.controller.videoTrack ? t.controller.videoTrack.value : ""
                        }, {
                            platform: D.PLATFORM.HTML
                        });
                    Y.logToStrm(s({}, i, {
                        frag: n
                    }), {
                        onUrlLengthLimitExceeded: function(e) {
                            return o.stats.error({
                                error: e
                            })
                        }
                    })
                };
                var i = this.iFrameParameters,
                    u = i.vsid,
                    c = i.additionalParams,
                    l = i.adParameters;
                this.additionalParams = z.parseAdditionalParams(c, this.stats), this.iFrameParameters.streams = this.iFrameParameters.streams.map(function(e) {
                    return s({}, e, {
                        url: o.addStreamUrlParams(e.url, l)
                    })
                });
                var d = a(this.iFrameParameters.streams, 1)[0];
                if (this.stats.setRootFields({
                        vsid: u,
                        adsid: c ? c.adsid : void 0
                    }), void 0 !== l) {
                    if (!h.isObject(l)) throw new M.IFrameApiError("AdParameters in Player mist be an object or undefined");
                    if (!m.isFiniteNumber(l.partnerId)) throw new M.IFrameApiError("AdParameters.partnerId in Player must be a finite number");
                    if (!m.isFiniteNumber(l.category)) throw new M.IFrameApiError("AdParameters.category in Player must be a finite number")
                }
                this.state = {
                    playingState: x.PlayingState.UNSTARTED,
                    startPosition: n.startPosition,
                    env: n.env,
                    withCredentials: n.withCredentials,
                    stream: d,
                    adConfig: function(e) {
                        return e ? {
                            partnerId: void 0 === e.partnerId ? void 0 : e.partnerId,
                            category: void 0 === e.category ? void 0 : e.category,
                            impId: void 0 === e.impId ? void 0 : String(e.impId),
                            videoContentId: void 0 === e.videoContentId ? void 0 : String(e.videoContentId),
                            videoContentName: void 0 === e.videoContentName ? void 0 : String(e.videoContentName),
                            videoPublisherId: void 0 === e.videoPublisherId ? void 0 : String(e.videoPublisherId),
                            videoPublisherName: void 0 === e.videoPublisherName ? void 0 : String(e.videoPublisherName),
                            videoGenreId: void 0 === e.videoGenreId ? void 0 : String(e.videoGenreId),
                            videoGenreName: void 0 === e.videoGenreName ? void 0 : String(e.videoGenreName),
                            distrId: void 0 === e.distrId ? void 0 : String(e.distrId)
                        } : void 0
                    }(l),
                    adState: L.DEFAULT_AD_STATE
                }, this.debug = n.debug, this.hidden = n.hidden, this.autoplay = n.autoplay, this.autoQuality = n.autoQuality, this.preload = n.preload, this.preview = n.preview, this.maxBufferLength = n.maxBufferLength, this.report = n.report, this.skinConfig = n.skinConfig, this.logoConfig = n.logoConfig, this.preferNative = n.preferNative, this.onPlayerStateChange.add(function(e) {
                    o.state.playingState !== e && (o.state.playingState = e, o.onStateChange.dispatch(e))
                });
                var f = w.default.getItem("yandexPlayerPlatform");
                "flash" === f ? this.preferredPlatform = D.PLATFORM.FLASH : "html" === f ? this.preferredPlatform = D.PLATFORM.HTML : W.isBrowserWithHlsNativeSupport() || W.isBrowserWithHlsJsSupport() ? this.preferredPlatform = D.PLATFORM.HTML : this.preferredPlatform = D.PLATFORM.FLASH, this.readyPromise = this.createPlayer().then(function() {
                    o.isReady = !0
                }), this.onAdStateChange.add(function(e) {
                    var t = o.state,
                        r = t.adState,
                        n = t.playingState;
                    o.stalledController && (r.state === T.AdState.NOT_PLAYING && e.state === T.AdState.PLAYING && e.type !== P.AdType.replaced && o.stalledController.setBuffering(!1), r.state === T.AdState.PLAYING && e.state === T.AdState.NOT_PLAYING && e.type !== P.AdType.replaced && n === x.PlayingState.BUFFERING && o.stalledController.setBuffering(!0));
                    o.state.adState = e
                })
            }
            return u(t, [{
                key: "getPlatformString",
                value: function() {
                    return this.platform === D.PLATFORM.HTML ? "HTML" : this.platform === D.PLATFORM.FLASH ? "FLASH" : this.platform === D.PLATFORM.TV1 ? "TV1" : "UNEXPECTED"
                }
            }, {
                key: "play",
                value: function() {
                    if (!this.isReady) throw new M.IFrameApiError("Play method: Player is not ready");
                    this.platform === D.PLATFORM.HTML ? this.htmlPlayerApi.play() : this.flashPlayerElement.playVideo()
                }
            }, {
                key: "pause",
                value: function() {
                    if (!this.isReady) throw new M.IFrameApiError("Pause method: Player is not ready");
                    this.platform === D.PLATFORM.HTML ? this.htmlPlayerApi.pause() : this.flashPlayerElement.pauseVideo()
                }
            }, {
                key: "seek",
                value: function(e) {
                    var t = this;
                    if ("number" != typeof e) throw new M.IFrameApiError("seek method receive a number");
                    this.readyPromise.then(function() {
                        t.platform === D.PLATFORM.HTML ? t.htmlPlayerApi.seek({
                            videoTime: e
                        }) : t.flashPlayerElement.seekTo(e)
                    })
                }
            }, {
                key: "setSource",
                value: function(e) {
                    var t = this;
                    if (!e) throw new M.IFrameApiError("setSource method receives an object");
                    this.state.adConfig = void 0 === e.adConfig ? void 0 : K.parseAdConfig(e.adConfig), this.state.startPosition = e.startPosition, this.state.withCredentials = Boolean(e.withCredentials), this.state.stream = e.streams[0];
                    var r = e.additionalParams;
                    this.stats.setRootFields({
                        adsid: r ? r.adsid : void 0
                    }), r && (this.additionalParams = r), e.streams = e.streams.map(function(e) {
                        return s({}, e, {
                            url: t.addStreamUrlParams(e.url, t.state.adConfig)
                        })
                    }), this.readyPromise.then(function() {
                        if (H.changeLocationWithoutReloading(e, e.streams[0]), t.platform === D.PLATFORM.HTML) {
                            e.trackings, e.protectedFrame;
                            var r = e.streams,
                                n = l(e, ["trackings", "protectedFrame", "streams"]);
                            t.htmlPlayerApi.setSource({
                                streams: r,
                                params: s({}, n, {
                                    startPosition: {
                                        videoTime: e.startPosition
                                    }
                                })
                            })
                        } else {
                            var o = e.streams.filter(function(e) {
                                var t = e.url;
                                return void 0 === e.drmConfig && "m3u8" === E.getFileExt(t)
                            });
                            if (0 === o.length) throw new M.IFrameApiError("No appropriate streams for flash player");
                            t.flashPlayerElement.setSource({
                                streamUrl: o[0].url,
                                startPosition: e.startPosition,
                                adConfig: e.adConfig,
                                preview: e.preview,
                                loop: e.loop
                            })
                        }
                    }).catch(function(e) {
                        t.onError.dispatch(new M.IFrameApiError(e))
                    })
                }
            }, {
                key: "getDuration",
                value: function() {
                    if (this.isReady) return this.platform === D.PLATFORM.HTML ? this.htmlPlayerApi.getDuration() : this.flashPlayerElement.getMovieInfo().duration;
                    throw new M.IFrameApiError("Player is not ready")
                }
            }, {
                key: "getCurrentTime",
                value: function() {
                    if (this.isReady) return this.platform === D.PLATFORM.HTML ? this.htmlPlayerApi.getCurrentTime() : this.flashPlayerElement.getCurrentTime();
                    throw new M.IFrameApiError("Player is not ready")
                }
            }, {
                key: "getUtcPosition",
                value: function() {
                    if (this.isReady) return this.platform === D.PLATFORM.HTML ? this.htmlPlayerApi.getUtcPosition() : this.flashPlayerElement.getUtcPosition();
                    throw new M.IFrameApiError("Player is not ready")
                }
            }, {
                key: "getWatchedTime",
                value: function() {
                    if (!this.isReady) throw new M.IFrameApiError("Player is not ready");
                    return this.platform === D.PLATFORM.HTML ? this.htmlPlayerApi.getWatchedTime() : 0
                }
            }, {
                key: "getVolume",
                value: function() {
                    if (this.isReady) return this.platform === D.PLATFORM.HTML ? this.htmlPlayerApi.getVolume() : Math.round(this.flashPlayerElement.getVolume());
                    throw new M.IFrameApiError("Player is not ready")
                }
            }, {
                key: "setHiddenControls",
                value: function(e) {
                    if (!this.isReady) throw new M.IFrameApiError("Player is not ready");
                    if (this.platform === D.PLATFORM.HTML) return this.htmlPlayerApi.setHiddenControls(e)
                }
            }, {
                key: "setVideoStyle",
                value: function(e) {
                    if (!this.isReady) throw new M.IFrameApiError("Player is not ready");
                    if (this.platform === D.PLATFORM.HTML) return this.htmlPlayerApi.setVideoStyle(e)
                }
            }, {
                key: "setPictureInPictureEnabled",
                value: function(e) {
                    if (!this.isReady) throw new M.IFrameApiError("Player is not ready");
                    this.platform === D.PLATFORM.HTML && this.htmlPlayerApi.setPictureInPictureEnabled(e)
                }
            }, {
                key: "setVolume",
                value: function(e) {
                    if (!this.isReady) throw new M.IFrameApiError("Player is not ready");
                    this.platform === D.PLATFORM.HTML ? (e > 0 && this.htmlPlayerApi.setMuted(!1), this.htmlPlayerApi.setVolume(e)) : this.flashPlayerElement.setVolume(e)
                }
            }, {
                key: "setMuted",
                value: function(e) {
                    if (!this.isReady) throw new M.IFrameApiError("Player is not ready");
                    this.platform === D.PLATFORM.HTML ? this.htmlPlayerApi.setMuted(e) : this.flashPlayerElement.setVolume(e ? 0 : S.DEFAULT_PUBLIC_VOLUME)
                }
            }, {
                key: "setVideoTrack",
                value: function(e) {
                    if (!this.isReady) throw new M.IFrameApiError("Player is not ready");
                    this.platform === D.PLATFORM.HTML && this.htmlPlayerApi.setVideoTrack(e)
                }
            }, {
                key: "setAudioTrack",
                value: function(e) {
                    if (!this.isReady) throw new M.IFrameApiError("Player is not ready");
                    this.platform === D.PLATFORM.HTML && this.htmlPlayerApi.setAudioTrack(e)
                }
            }, {
                key: "setTextTrack",
                value: function(e) {
                    if (!this.isReady) throw new M.IFrameApiError("Player is not ready");
                    this.platform === D.PLATFORM.HTML && this.htmlPlayerApi.setTextTrack(e)
                }
            }, {
                key: "setFullscreen",
                value: function(e) {
                    if (!this.isReady) throw new M.IFrameApiError("Player is not ready");
                    this.platform === D.PLATFORM.HTML ? this.htmlPlayerApi.setFullscreen(e) : e || this.flashPlayerElement.setFullscreen(e)
                }
            }, {
                key: "sendReportToStats",
                value: function(e) {
                    var t = e.reportId,
                        r = e.reported;
                    N.sendReportToStats({
                        stats: this.stats,
                        reportId: t,
                        reported: r,
                        reportData: this.getDebugInfo()
                    })
                }
            }, {
                key: "downloadDebugInfo",
                value: function() {
                    var e = JSON.stringify(this.getDebugInfo());
                    _(d.isAndroid ? e : new Blob([e]), "yandex-video-player-" + Date.now() + ".json", "text/plain")
                }
            }, {
                key: "reportGlobalError",
                value: function(e) {
                    var t = new f.CustomError(e, {
                        code: "UNHANDLED_GLOBAL_ERROR",
                        details: this.getDebugInfo()
                    });
                    this.stats.error({
                        error: t
                    })
                }
            }, {
                key: "getDebugInfo",
                value: function() {
                    var e = {};
                    void 0 !== this.htmlPlayerApi && (e = this.htmlPlayerApi.getDebugInfo());
                    var t = this.state.playingState;
                    return s({}, e, this.state, {
                        playingState: x.PlayingState[t],
                        vsid: this.iFrameParameters.vsid,
                        version: "1.0-519",
                        platform: this.platform,
                        utcPosition: this.getUtcPosition(),
                        currentTime: this.getCurrentTime(),
                        system: G.getSystemInfo(),
                        clientTimestamp: Date.now(),
                        streamUrl: this.state.stream.url
                    })
                }
            }, {
                key: "addVsid",
                value: function(e) {
                    return V.addParamToUrl(e, "vsid", this.iFrameParameters.vsid)
                }
            }, {
                key: "addStreamUrlParams",
                value: function(e, t) {
                    var r = B.addAdParams(e, t);
                    return this.additionalParams ? E.addParamsToUrl(r, this.additionalParams, {
                        override: !1
                    }) : r
                }
            }, {
                key: "createPlayer",
                value: function() {
                    var e = this;
                    return this.preferredPlatform === D.PLATFORM.FLASH ? this.createFlashPlayer().catch(function() {
                        return e.createHTMLPlayer()
                    }) : this.createHTMLPlayer()
                }
            }, {
                key: "rewriteContainer",
                value: function() {
                    this.container.innerHTML = "", this.element = document.createElement("div"), this.element.style.width = "100%", this.element.style.height = "100%", this.container.appendChild(this.element)
                }
            }, {
                key: "createHTMLPlayer",
                value: function() {
                    return c(this, void 0, void 0, i.default.mark(function e() {
                        var t, r, n, o, u, c, d, f, m, h = this;
                        return i.default.wrap(function(e) {
                            for (;;) switch (e.prev = e.next) {
                                case 0:
                                    return t = this.iFrameParameters, r = t.loop, n = t.p2p, o = t.streams, u = a(o, 1), c = u[0], this.rewriteContainer(), this.platform = D.PLATFORM.HTML, d = w.default.getItem("yandexHTMLPlayerUrl"), f = void 0, f = d || "https://yastatic.net/yandex-video-player-iframe-api-bundles/1.0-519/js/stream_player_js.js", e.next = 9, p.loadScript({
                                        src: f
                                    });
                                case 9:
                                    if (i = void 0, i = window, m = i.Ya && i.Ya.streamPlayer && v.isFunction(i.Ya.streamPlayer.createJsPlayer) ? i.Ya.streamPlayer.createJsPlayer : void 0) {
                                        e.next = 12;
                                        break
                                    }
                                    throw new Error("Ya.streamPlayer.createJsPlayer is not implemented [" + f + "]");
                                case 12:
                                    return this.onStreamLog.add(function(e) {
                                        h.logToStrm(e);
                                        var t = e.eventName,
                                            r = e.errorCode,
                                            n = e.isFatal,
                                            o = l(e, ["eventName", "errorCode", "isFatal"]);
                                        t ? h.stats.event({
                                            name: t,
                                            data: o
                                        }) : h.stats.errorToStats(new M.IFrameApiError({
                                            message: String(r),
                                            code: r,
                                            isFatal: n,
                                            details: o
                                        }))
                                    }), this.stalledController = new U.StalledController(function() {
                                        return h.htmlPlayerApi ? h.htmlPlayerApi.getExpectedStalled() : C.createExpectedStalled(A.ExpectedStalledReason.Other, void 0)
                                    }), this.stalledController.onSendStalled.add(function(e) {
                                        var t = h.htmlPlayerApi,
                                            r = void 0,
                                            n = void 0,
                                            o = void 0;
                                        t && (r = t.getRemainingBufferedTime(), n = t.getConnectionQuality(), o = t.getVideoTrack()), h.logToStrm({
                                            eventName: "Stalled",
                                            src: c.url,
                                            currentTime: h.getCurrentTime(),
                                            details: e,
                                            remainingBufferedTime: r,
                                            connectionQuality: n,
                                            videoTrack: o
                                        }), h.stats.eventToStats("Stalled", s({}, e.details, {
                                            remainingBufferedTime: r,
                                            connectionQuality: n,
                                            videoTrack: o
                                        }), {
                                            reason: e.reason,
                                            stalledDuration: String(e.stalledDuration)
                                        })
                                    }), e.next = 17, m(this.element, {
                                        source: {
                                            streams: o,
                                            params: {
                                                startPosition: {
                                                    videoTime: this.state.startPosition
                                                },
                                                additionalParams: this.additionalParams,
                                                adConfig: this.state.adConfig,
                                                withCredentials: this.state.withCredentials,
                                                loop: r,
                                                preview: this.preview,
                                                logoConfig: this.logoConfig,
                                                p2p: n
                                            }
                                        },
                                        debug: this.debug,
                                        hidden: this.hidden,
                                        autoplay: this.autoplay,
                                        autoQuality: this.autoQuality,
                                        preload: this.preload,
                                        env: this.state.env,
                                        volume: this.iFrameParameters.volume,
                                        muted: this.iFrameParameters.muted,
                                        maxBufferLength: this.maxBufferLength,
                                        liveOffset: this.iFrameParameters.liveOffset,
                                        preferNative: this.preferNative,
                                        report: this.report.enabled,
                                        skinConfig: this.skinConfig,
                                        featuresParams: this.iFrameParameters.featuresParams,
                                        callbacks: {
                                            onChangeStream: function(e) {
                                                h.onChangeStream.dispatch(e), e && (H.changeLocationWithoutReloading({
                                                    adConfig: h.state.adConfig,
                                                    additionalParams: h.additionalParams
                                                }, e), h.state.stream = e)
                                            },
                                            onStreamLog: function(e) {
                                                return h.onStreamLog.dispatch(e)
                                            },
                                            onError: function(e) {
                                                h.onError.dispatch(new M.IFrameApiError({
                                                    code: e.errorCode,
                                                    message: e.errorMessage ? e.errorMessage : "",
                                                    details: e.errorDetails
                                                }))
                                            },
                                            onRecover: this.onRecover,
                                            onStateChange: function(e) {
                                                if (e === b.VideoPlayingState.BUFFERING) {
                                                    var t = h.state.adState;
                                                    t.state !== T.AdState.NOT_PLAYING && t.type !== P.AdType.replaced || h.stalledController.setBuffering(!0)
                                                } else h.stalledController.setBuffering(!1);
                                                switch (e) {
                                                    case b.VideoPlayingState.PLAY:
                                                        h.onPlayerStateChange.dispatch(x.PlayingState.PLAYING);
                                                        break;
                                                    case b.VideoPlayingState.PAUSE:
                                                        h.onPlayerStateChange.dispatch(x.PlayingState.PAUSED);
                                                        break;
                                                    case b.VideoPlayingState.BUFFERING:
                                                        h.onPlayerStateChange.dispatch(x.PlayingState.BUFFERING);
                                                        break;
                                                    case b.VideoPlayingState.END:
                                                        h.onPlayerStateChange.dispatch(x.PlayingState.ENDED);
                                                        break;
                                                    default:
                                                        var r = new M.IFrameApiError("Unresolved playingState from streamPlayerJs: " + e);
                                                        console.error(r)
                                                }
                                            },
                                            onSeek: function(e, t) {
                                                return h.onSeek.dispatch({
                                                    newPosition: e,
                                                    oldPosition: t
                                                })
                                            },
                                            onAdStateChange: function(e) {
                                                h.onAdStateChange.dispatch(e)
                                            },
                                            onVideoTypeChange: function(e) {
                                                h.onVideoTypeChange.dispatch(e)
                                            },
                                            onDurationChange: function(e) {
                                                return h.onDurationChange.dispatch(e)
                                            },
                                            onCurrentTimeChange: function(e) {
                                                return h.onCurrentTimeChange.dispatch(e)
                                            },
                                            onFullScreenChange: function(e) {
                                                return h.onFullScreenChange.dispatch(e)
                                            },
                                            onVolumeChange: function(e, t) {
                                                h.onVolumeChange.dispatch({
                                                    volume: e,
                                                    muted: t
                                                })
                                            },
                                            onUserAction: function(e) {
                                                switch (h.onUserAction.dispatch(e), e.name) {
                                                    case "REPORT_CLICK":
                                                        var t = j.openReportWindow(h.report),
                                                            r = t.reportId,
                                                            n = t.reported;
                                                        h.sendReportToStats({
                                                            reportId: r,
                                                            reported: n
                                                        });
                                                        break;
                                                    case "DOWNLOAD_DEBUG":
                                                        h.downloadDebugInfo()
                                                }
                                            },
                                            onVideoTrackChange: function(e) {
                                                return h.onVideoTrackChange.dispatch(e)
                                            },
                                            onVideoTracksChange: function(e) {
                                                return h.onVideoTracksChange.dispatch(e)
                                            },
                                            onAudioTrackChange: function(e) {
                                                return h.onAudioTrackChange.dispatch(e)
                                            },
                                            onAudioTracksChange: function(e) {
                                                return h.onAudioTracksChange.dispatch(e)
                                            },
                                            onTextTrackChange: function(e) {
                                                return h.onTextTrackChange.dispatch(e)
                                            },
                                            onTextTracksChange: function(e) {
                                                return h.onTextTracksChange.dispatch(e)
                                            },
                                            onOriginalBroadcastAdStateChange: function(e) {
                                                h.onOriginalBroadcastAdStateChange.dispatch(e)
                                            },
                                            onAdblockDetected: function(e) {
                                                g.tryCatch(function() {
                                                    var t, r, n;
                                                    Ya.Rum.sendTimeMark(O.BLOCKSTAT.content_block, Ya.Rum.getTime(), !1, (t = {}, r = O.BLOCKSTAT.content_block, n = Number(e), r in t ? Object.defineProperty(t, r, {
                                                        value: n,
                                                        enumerable: !0,
                                                        configurable: !0,
                                                        writable: !0
                                                    }) : t[r] = n, t))
                                                })
                                            },
                                            onFeatureEvent: function(e) {
                                                h.onFeatureEvent.dispatch(e)
                                            }
                                        }
                                    });
                                case 17:
                                    this.htmlPlayerApi = e.sent, g.tryCatch(function() {
                                        return Ya.Rum.sendTimeMark(O.BLOCKSTAT.js_framework_inited)
                                    });
                                case 19:
                                case "end":
                                    return e.stop()
                            }
                            var i
                        }, e, this)
                    }))
                }
            }, {
                key: "createFlashPlayer",
                value: function() {
                    var t = this;
                    this.rewriteContainer(), this.platform = D.PLATFORM.FLASH;
                    var r = this.iFrameParameters,
                        n = a(r.streams, 1)[0],
                        o = r.loop;
                    return W.checkForFlashPlayer().then(function(r) {
                        if (r) {
                            var i = I.BUNDLES_PATH + "1.0-519/",
                                a = t.addVsid("https://" + F.DOMAIN + i + "swf/streamplayer.swf"),
                                u = {
                                    movie: a,
                                    allowfullscreen: "true",
                                    bgcolor: "#000000",
                                    allowscriptaccess: "always",
                                    wmode: "opaque"
                                },
                                c = {
                                    id: t.element.id,
                                    name: t.element.id,
                                    bgcolor: "#000000",
                                    background: "#000000",
                                    width: "100%",
                                    height: "100%",
                                    style: "display: block;"
                                },
                                l = "yandexIFrameFlashCallbacks" + Math.floor(Math.random() * Math.pow(10, 9)),
                                d = ["logo", "live", "rotate"].concat(t.hidden.map(function(e) {
                                    return "settings" === e ? "quality" : e
                                })).join(),
                                f = t.state.adConfig,
                                v = {
                                    "partner-id": f && void 0 !== f.partnerId ? String(f.partnerId) : "",
                                    category: f && void 0 !== f.category ? String(f.category) : "",
                                    "imp-id": f && void 0 !== f.impId ? f.impId : "",
                                    "video-content-id": f && void 0 !== f.videoContentId ? f.videoContentId : "",
                                    "video-content-name": f && void 0 !== f.videoContentName ? f.videoContentName : "",
                                    "video-publisher-id": f && void 0 !== f.videoPublisherId ? f.videoPublisherId : "",
                                    "video-publisher-name": f && void 0 !== f.videoPublisherName ? f && f.videoPublisherName : ""
                                },
                                p = s({}, v, {
                                    lang: "ru",
                                    hidden: d,
                                    autoplay: String(!0 === t.autoplay),
                                    loop: String(!0 === o),
                                    "is-hq": "true",
                                    "lq-url": "",
                                    "mq-url": n.url,
                                    "hq-url": "",
                                    "hd-url": "",
                                    "preview-url": t.preview ? encodeURIComponent(t.preview) : "",
                                    position: String(t.state.startPosition),
                                    onError: l + ".onError",
                                    onWarning: l + ".onWarning",
                                    onStateChange: l + ".onStateChange",
                                    onNewQualityChange: l + ".onQualityChange",
                                    onSeek: l + ".onSeek",
                                    onAdStateChange: l + ".onAdStateChange",
                                    onDurationChange: l + ".onDurationChange",
                                    onCurrentTimeChange: l + ".onCurrentTimeChange",
                                    onFullScreenChange: l + ".onFullScreenChange",
                                    onVolumeChange: l + ".onVolumeChanged",
                                    onHlsStreamLog: l + ".onHlsStreamLog",
                                    onReady: l + ".onReady",
                                    onVideoTypeChange: l + ".onVideoTypeChange"
                                });
                            return new e(function(e, r) {
                                var n = !0,
                                    o = 0;
                                window[l] = {
                                    onHlsStreamLog: function(e) {
                                        t.onStreamLog.dispatch(e), t.debug && console.log("flash:onHlsStreamLog:", e)
                                    },
                                    onError: function(e) {
                                        t.debug && console.error("flash:onError:", e), t.onError.dispatch(new M.IFrameApiError(e)), r(new Error("FlashPlayer Error in callback: " + e))
                                    },
                                    onWarning: function(e, n) {
                                        t.debug && console.warn("flash:onWarning:", e, n);
                                        var o = new M.IFrameApiError({
                                            code: e,
                                            message: n,
                                            isFatal: !1
                                        });
                                        t.onError.dispatch(o), r(new Error("FlashPlayer Warning in callback: " + o))
                                    },
                                    onStateChange: function(e) {
                                        switch (clearTimeout(o), e) {
                                            case "preloading":
                                                t.onPlayerStateChange.dispatch(x.PlayingState.BUFFERING);
                                                break;
                                            case "play":
                                                n ? (n = !1, o = window.setTimeout(function() {
                                                    t.onPlayerStateChange.dispatch(x.PlayingState.PLAYING)
                                                }, 1e3)) : t.onPlayerStateChange.dispatch(x.PlayingState.PLAYING);
                                                break;
                                            case "pause":
                                                t.onPlayerStateChange.dispatch(x.PlayingState.PAUSED);
                                                break;
                                            case "stop":
                                            case "end":
                                                t.onPlayerStateChange.dispatch(x.PlayingState.ENDED);
                                                break;
                                            default:
                                                var r = new M.IFrameApiError("Unresolved video state from flash-player: " + e);
                                                console.error(r)
                                        }
                                    },
                                    onSeek: function(e, r) {
                                        return t.onSeek.dispatch({
                                            newPosition: e,
                                            oldPosition: r
                                        })
                                    },
                                    onAdStateChange: function(e, r) {
                                        switch (r) {
                                            case "play":
                                                t.onAdStateChange.dispatch({
                                                    state: T.AdState.PLAYING,
                                                    type: e,
                                                    adParams: {}
                                                });
                                                break;
                                            case "end":
                                                t.onAdStateChange.dispatch({
                                                    state: T.AdState.NOT_PLAYING,
                                                    type: e,
                                                    adParams: {}
                                                });
                                                break;
                                            default:
                                                var n = new M.IFrameApiError("Unresolved ad state from flash-player: " + r);
                                                console.error(n)
                                        }
                                    },
                                    onDurationChange: function(e) {
                                        return t.onDurationChange.dispatch(e)
                                    },
                                    onCurrentTimeChange: function(e) {
                                        return t.onCurrentTimeChange.dispatch(e)
                                    },
                                    onFullScreenChange: function(e) {
                                        return t.onFullScreenChange.dispatch(e)
                                    },
                                    onVolumeChanged: function(e) {
                                        t.onVolumeChange.dispatch({
                                            volume: R.VolumeUtils.internalToPublic(e),
                                            muted: 0 === e
                                        })
                                    },
                                    onReady: e,
                                    onVideoTypeChange: function(e) {
                                        t.onVideoTypeChange.dispatch(e)
                                    }
                                }, t.element.id = "yandex_player_element", swfobject.embedSWF(a, t.element.id, "100%", "100%", k.MIN_FLASH_PLAYER_VERSION, void 0, p, u, c, function(e) {
                                    var n = e.ref;
                                    e.success && n ? t.flashPlayerElement = n : r(new Error("SWFObject error: " + String(event)))
                                })
                            }).then(function() {
                                try {
                                    t.flashPlayerElement.setVolume(!0 === t.iFrameParameters.muted ? 0 : t.iFrameParameters.volume || S.DEFAULT_PUBLIC_VOLUME)
                                } catch (e) {}
                            })
                        }
                        return e.reject("Iframe API Error: Flash player is not available")
                    })
                }
            }, {
                key: "logToStrm",
                value: function(e) {
                    var t = this;
                    Y.logToStrm(q.parseLogObject(e, {
                        platform: this.platform
                    }), {
                        onUrlLengthLimitExceeded: function(e) {
                            return t.stats.error({
                                error: e
                            })
                        }
                    })
                }
            }]), t
        }();
        t.Player = J
    }).call(this, r(1))
}, function(e, t, r) {
    var n, o, i;
    o = [], void 0 === (i = "function" == typeof(n = function() {
        return function e(t, r, n) {
            var o, i, a = window,
                s = "application/octet-stream",
                u = n || s,
                c = t,
                l = !r && !n && c,
                d = document.createElement("a"),
                f = function(e) {
                    return String(e)
                },
                v = a.Blob || a.MozBlob || a.WebKitBlob || f,
                p = r || "download";
            if (v = v.call ? v.bind(a) : Blob, "true" === String(this) && (u = (c = [c, u])[0], c = c[1]), l && l.length < 2048 && (p = l.split("/").pop().split("?")[0], d.href = l, -1 !== d.href.indexOf(l))) {
                var m = new XMLHttpRequest;
                return m.open("GET", l, !0), m.responseType = "blob", m.onload = function(t) {
                    e(t.target.response, p, s)
                }, setTimeout(function() {
                    m.send()
                }, 0), m
            }
            if (/^data:([\w+-]+\/[\w+.-]+)?[,;]/.test(c)) {
                if (!(c.length > 2096103.424 && v !== f)) return navigator.msSaveBlob ? navigator.msSaveBlob(E(c), p) : b(c);
                c = E(c), u = c.type || s
            } else if (/([\x80-\xff])/.test(c)) {
                for (var h = 0, y = new Uint8Array(c.length), g = y.length; h < g; ++h) y[h] = c.charCodeAt(h);
                c = new v([y], {
                    type: u
                })
            }

            function E(e) {
                for (var t = e.split(/[:;,]/), r = t[1], n = "base64" == t[2] ? atob : decodeURIComponent, o = n(t.pop()), i = o.length, a = 0, s = new Uint8Array(i); a < i; ++a) s[a] = o.charCodeAt(a);
                return new v([s], {
                    type: r
                })
            }

            function b(e, t) {
                if ("download" in d) return d.href = e, d.setAttribute("download", p), d.className = "download-js-link", d.innerHTML = "downloading...", d.style.display = "none", document.body.appendChild(d), setTimeout(function() {
                    d.click(), document.body.removeChild(d), !0 === t && setTimeout(function() {
                        a.URL.revokeObjectURL(d.href)
                    }, 250)
                }, 66), !0;
                if (/(Version)\/(\d+)\.(\d+)(?:\.(\d+))?.*Safari\//.test(navigator.userAgent)) return /^data:/.test(e) && (e = "data:" + e.replace(/^data:([\w\/\-\+]+)/, s)), window.open(e) || confirm("Displaying New Document\n\nUse Save As... to download, then click back to return to this page.") && (location.href = e), !0;
                var r = document.createElement("iframe");
                document.body.appendChild(r), !t && /^data:/.test(e) && (e = "data:" + e.replace(/^data:([\w\/\-\+]+)/, s)), r.src = e, setTimeout(function() {
                    document.body.removeChild(r)
                }, 333)
            }
            if (o = c instanceof v ? c : new v([c], {
                    type: u
                }), navigator.msSaveBlob) return navigator.msSaveBlob(o, p);
            if (a.URL) b(a.URL.createObjectURL(o), !0);
            else {
                if ("string" == typeof o || o.constructor === f) try {
                    return b("data:" + u + ";base64," + a.btoa(o))
                } catch (e) {
                    return b("data:" + u + "," + encodeURIComponent(o))
                }(i = new FileReader).onload = function(e) {
                    b(this.result)
                }, i.readAsDataURL(o)
            }
            return !0
        }
    }) ? n.apply(t, o) : n) || (e.exports = i)
}, function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    }), t.MIN_FLASH_PLAYER_VERSION = "11.2"
}, function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    });
    var n = r(65);
    t.addAdParams = function(e, t) {
        return e && t ? (e = n.addParamToUrl(e, "partner-id", "number" == typeof t.partnerId ? String(t.partnerId) : t.partnerId), e = n.addParamToUrl(e, "video-category-id", "number" == typeof t.category ? String(t.category) : t.category), n.addParamToUrl(e, "imp-id", "number" == typeof t.impId ? String(t.impId) : t.impId)) : e
    }
}, function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    });
    var n = r(65),
        o = r(250);
    t.changeLocationWithoutReloading = function(e, t) {
        /*if (window.history) {
            var r = o.parseIFrameInitParams();
            if (r.mq_url = r.lq_url = r.hq_url = r.hd_url = void 0, r.stream_url = t.url ? n.removeParamsFromUrl(t.url, ["vsid", "partner-id", "video-category-id", "imp-id"]) : "", void 0 !== e.additionalParams && (r.additional_params = JSON.stringify(e.additionalParams)), e.adConfig) {
                var i = e.adConfig;
                r.partner_id = i.partnerId ? String(i.partnerId) : void 0, r.category = i.category ? String(i.category) : void 0, r.imp_id = i.impId ? String(i.impId) : void 0, r.video_content_id = i.videoContentId ? String(i.videoContentId) : void 0, r.video_content_name = i.videoContentName ? String(i.videoContentName) : void 0, r.video_publisher_id = i.videoPublisherId ? String(i.videoPublisherId) : void 0, r.video_publisher_name = i.videoPublisherName ? String(i.videoPublisherName) : void 0
            }
            window.history.replaceState(void 0, "", n.addParamsToUrl(window.location.href.split("?")[0], r))
        }*/
    }
}, function(e, t, r) {
    "use strict";
    (function(e) {
        Object.defineProperty(t, "__esModule", {
            value: !0
        });
        var n = r(93),
            o = r(70),
            i = r(488);
        t.checkForFlashPlayer = function() {
            var t = function() {
                return swfobject.getFlashPlayerVersion().major > 0
            };
            return "undefined" == typeof swfobject ? n.loadScript({
                src: "https://" + o.PROD_DOMAIN + i.SWF_OBJECT_URL
            }).then(t) : e.resolve(t())
        }, t.getBrowserAndVersion = function() {
            var e = navigator.userAgent,
                t = void 0,
                r = void 0,
                n = e.match(/(opera|chrome|safari|firefox|msie|trident(?=\/))\/?\s*(\d+)/i) || [];
            return /trident/i.test(n[1]) && (t = /\brv[ :]+(\d+)/g.exec(e) || [], r = {
                name: "IE",
                version: parseInt(t[1], 10) || NaN
            }), "Chrome" === n[1] && null !== (t = e.match(/\b(OPR|Edge)\/(\d+)/)) && (r = {
                name: t.slice(1)[0].replace("OPR", "Opera"),
                version: parseInt(t.slice(1)[1], 10)
            }), n = n[2] ? [n[1], n[2]] : [navigator.appName, navigator.appVersion, "-?"], null !== (t = e.match(/version\/(\d+)/i)) && n.splice(1, 1, t[1]), r || (r = {
                name: n[0],
                version: parseInt(n[1], 10)
            }), r.name.indexOf("IE") >= 0 && (r.name = "IE"), r
        }, t.isWindows8 = function() {
            return -1 !== window.navigator.userAgent.indexOf("Windows NT 6.2")
        }, t.isBrowserWithHlsNativeSupport = function() {
            var e = document.createElement("video");
            return Boolean(e.canPlayType("application/vnd.apple.mpegurl"))
        }, t.isBrowserWithHlsJsSupport = function() {
            return window.MediaSource && "function" == typeof window.MediaSource.isTypeSupported && window.MediaSource.isTypeSupported('video/mp4; codecs="avc1.42E01E,mp4a.40.2"')
        }
    }).call(this, r(1))
}, function(e, t, r) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    }), t.SWF_OBJECT_URL = "/awaps-ad-sdk-js/1_0/swfobject.min.js"
}, function(e, t, r) {
    "use strict";
    r(490), r(491), r(492)
}, function(e, t) {
    ! function() {
        "use strict";
        var e, t = [];

        function r() {
            var r = Ya.Rum.getSetting("clck"),
                n = t.join("\r\n");
            if (t = [], e = null, r && !(navigator.sendBeacon && Ya.Rum.getSetting("beacon") && navigator.sendBeacon(r, n))) {
                var o = new XMLHttpRequest;
                o.open("POST", r), o.send(n)
            }
        }
        Ya.Rum.send = function(n, o, i, a, s, u, c) {
            clearTimeout(e);
            var l = function(e, t, r, n, o, i) {
                var a = Ya.Rum.getSetting("slots");
                return [i ? "/" + i.join("/") : "", "/path=" + t, a ? "/slots=" + a.join(";") : "", r ? "/vars=" + r : "", "/cts=" + (new Date).getTime(), "/*"]
            }(0, o, i, 0, 0, c);
            t.push("/reqid=" + Ya.Rum.getSetting("reqid") + l.join("")), t.length < 42 ? e = setTimeout(r, 15) : r()
        }
    }()
}, function(e, t) {
    ! function(e) {
        if (!e) throw new Error("Rum: interface is not included");
        if (!e.enabled) return e.getSetting = function() {
            return ""
        }, e.getVarsList = function() {
            return []
        }, void(e.getResourceTimings = e.pushConnectionTypeTo = e.pushTimingTo = e.normalize = e.sendCounter = e.sendDelta = e.sendTimeMark = e.sendResTiming = e.sendTTI = e.makeSubPage = e.sendFirstPaint = e.sendHeroElement = function() {});
        e.getSetting = function(t) {
            var r = e._settings[t];
            return null === r ? null : r || ""
        }, e.getVarsList = function() {
            var t = e._vars;
            return Object.keys(t).map(function(e) {
                return e + "=" + t[e]
            })
        }, e.setVars = function(t) {
            Object.keys(t).forEach(function(r) {
                e._vars[r] = t[r]
            })
        };
        var t = "690.1033",
            r = "690.2096.207",
            n = "690.2096.2877",
            o = "690.2096.2044",
            i = "690.2096.2748",
            a = "690.2096.2335.1822",
            s = 10,
            u = 3e3,
            c = 2e4,
            l = {
                connectEnd: 2116,
                connectStart: 2114,
                decodedBodySize: 2886,
                domComplete: 2124,
                domContentLoadedEventEnd: 2131,
                domContentLoadedEventStart: 2123,
                domInteractive: 2770,
                domLoading: 2769,
                domainLookupEnd: 2113,
                domainLookupStart: 2112,
                duration: 2136,
                encodedBodySize: 2887,
                entryType: 2888,
                fetchStart: 2111,
                initiatorType: 2889,
                loadEventEnd: 2126,
                loadEventStart: 2125,
                nextHopProtocol: 2890,
                redirectCount: 1385,
                redirectEnd: 2110,
                redirectStart: 2109,
                requestStart: 2117,
                responseEnd: 2120,
                responseStart: 2119,
                secureConnectionStart: 2115,
                startTime: 2322,
                transferSize: 2323,
                type: 76,
                unloadEventEnd: 2128,
                unloadEventStart: 2127,
                workerStart: 2137
            },
            d = {
                visible: 1,
                hidden: 2,
                prerender: 3
            },
            f = {
                bluetooth: 2064,
                cellular: 2065,
                ethernet: 2066,
                none: 1229,
                wifi: 2067,
                wimax: 2068,
                other: 861,
                unknown: 836,
                0: 836,
                1: 2066,
                2: 2067,
                3: 2070,
                4: 2071,
                5: 2768
            },
            v = {
                "first-paint": 2793,
                "first-contentful-paint": 2794
            },
            p = Object.keys(v).length,
            m = e.getTime,
            h = window.performance || {},
            y = h.timing || {},
            g = h.navigation || {},
            E = navigator.connection,
            b = {},
            _ = e._deltaMarks,
            w = document.createElement("link"),
            S = "function" == typeof h.getEntriesByType,
            T = y.navigationStart,
            O = y.responseStart - T,
            P = y.domainLookupStart - T,
            A = e.getVarsList().concat("1042=" + encodeURIComponent(navigator.userAgent)),
            C = A.concat(["143.2129=" + T, "143.2112=" + P, "143.2119=" + O]);
        if (e.ajaxStart = 0, e.ajaxComplete = 0, window.PerformanceObserver) try {
            new PerformanceObserver(function(e, t) {
                var r = e.getEntriesByType("navigation")[0];
                if (r) {
                    t.disconnect();
                    var n = [];
                    G(n, r), V(n), K("690.2096.2892", A.concat(n))
                }
            }).observe({
                entryTypes: ["navigation"]
            })
        } catch (e) {}

        function R() {
            removeEventListener("DOMContentLoaded", R), removeEventListener("load", R), T && setTimeout(function() {
                e.sendTimeMark = k, e.sendResTiming = U, e.timeEnd = j;
                for (var t = e._defRes; t.length;) {
                    var r = t.shift();
                    U(r[0], r[1])
                }
                for (var n = e._defTimes; n.length;) {
                    var o = n.shift();
                    k(o[0], o[1], !1, o[2])
                }
                var i, s;
                Object.keys(_).forEach(function(e) {
                        N(e)
                    }), I(),
                    function t() {
                        if (S && !e.isVisibilityChanged()) {
                            for (var r = h.getEntriesByType("paint"), n = 0; n < r.length; n++) {
                                var o = r[n],
                                    i = v[o.name];
                                i && !L[o.name] && (L[o.name] = !0, F++, k("1926." + i, o.startTime))
                            }
                            if (e.getSetting("enablePaintPerformanceObserver") && F < p) try {
                                new PerformanceObserver(function(e, r) {
                                    t(), r.disconnect()
                                }).observe({
                                    entryTypes: ["paint"]
                                })
                            } catch (e) {}
                        }
                    }(), i = document.createElement("script"), s = e.getSetting("crossOrigin"), i.src = "https://yastatic.net/nearest.js", i.async = !0, null !== s && (i.crossOrigin = s), i.onload = function() {
                        var e = window.YaStaticRegion;
                        e && K(a, A.concat("1822=" + e))
                    }, document.head.appendChild(i), x(), S && ("complete" === document.readyState ? D() : addEventListener("load", D))
            }, 0)
        }

        function I() {
            var r = y.domContentLoadedEventStart,
                n = y.domContentLoadedEventEnd;
            if (0 !== r || 0 !== n) {
                var o = function() {
                        if (!e.isVisibilityChanged()) return window.chrome && "function" == typeof window.chrome.loadTimes ? 1e3 * window.chrome.loadTimes().firstPaintTime : y.msFirstPaint ? y.msFirstPaint : void 0
                    }(),
                    i = A.concat(["2129=" + T, "1036=" + (y.domainLookupStart - T), "1037=" + (y.domainLookupEnd - y.domainLookupStart), "1038=" + (y.connectEnd - y.connectStart), y.secureConnectionStart && "1383=" + (y.connectEnd - y.secureConnectionStart), "1039=" + (y.responseStart - y.connectEnd), "1040=" + (y.responseEnd - y.responseStart), "1040.906=" + (y.responseEnd - y.domainLookupStart), "1310.2084=" + (y.domLoading - y.responseStart), "1310.2085=" + (y.domInteractive - y.responseStart), "1310.1309=" + (n - r), "1310.1007=" + (r - y.responseStart), "2299=" + history.length, navigator.deviceMemory && "3140=" + navigator.deviceMemory, navigator.hardwareConcurrency && "3141=" + navigator.hardwareConcurrency]);
                e.mark("1039 ttfb", y.responseStart - y.connectEnd), e.mark("1310.1007 dom.loaded", y.domContentLoadedEventStart - y.responseStart), o && (i.push("2130=" + (o - T), "1041=" + (o - y.responseStart), "1041.906=" + (o - y.domainLookupStart)), e.mark("1041.906 ttfp", o - y.domainLookupStart)), Object.keys(l).forEach(function(e) {
                    e in y && y[e] && i.push(l[e] + "=" + Y(y[e], T))
                }), e.vsStart ? (i.push("1484=" + (d[e.vsStart] || 2771)), e.vsChanged && i.push("1484.719=1")) : i.push("1484=" + d.visible), g && (g.redirectCount && i.push("1384.1385=" + g.redirectCount), 1 !== g.type && 2 !== g.type || i.push("770.76=" + g.type)), V(i), K(t, i, ["dtype=stred", "pid=1", "cid=72202"])
            } else setTimeout(I, 50)
        }
        "loading" === document.readyState ? (addEventListener("DOMContentLoaded", R), addEventListener("load", R)) : R();
        var L = {},
            F = 0;

        function k(t, n, o, i) {
            void 0 === n && (n = m()), void 0 !== o && !0 !== o || e.mark(t, n);
            var a = H(t);
            a.push("207=" + Y(n)), M(a, i) && (K(r, a), b[t] = b[t] || [], b[t].push(n))
        }

        function M(e, t) {
            if (t) {
                if (t.isCanceled && t.isCanceled()) return !1;
                Object.keys(t).forEach(function(r) {
                    "function" != typeof t[r] && e.push(r + "=" + t[r])
                })
            }
            return !0
        }

        function j(e) {
            var t = _[e];
            t && 0 !== t.length && (t.push(m()), N(e))
        }

        function N(t, r, o) {
            var i, a, s = _[t];
            if (void 0 !== r ? i = (a = e.getTime()) - r : s && (i = s[0], a = s[1]), void 0 !== i && void 0 !== a) {
                var u = H(t);
                u.push("207.2154=" + Y(i), "207.1428=" + Y(a), "2877=" + Y(a - i)), M(u, o) && (K(n, u), delete _[t])
            }
        }

        function U(e, t) {
            B(t, function(r) {
                if (r) {
                    var n = H(e);
                    n.push("13=" + encodeURIComponent(t)), G(n, r[0]), K(o, n)
                }
            })
        }

        function D() {
            if (removeEventListener("load", D), S) {
                var e = h.getEntriesByType("resource").reduce(function(e, t) {
                        var r, n = t.name.match(/^https?:\/\/([^\/?#]+)(?:[\/?#]|$)/i);
                        return n && ((r = n[1]) in e || (e[r] = {
                            count: 0,
                            size: 0
                        }), e[r].count++, t.transferSize && (e[r].size += t.transferSize)), e
                    }, {}),
                    t = "2748=";
                Object.keys(e).forEach(function(r) {
                    t += r + "!" + e[r].count + "!" + (e[r].size || "") + ";"
                }), K(i, A.concat(t))
            }
        }

        function x(t, r, n) {
            if (e._tti) {
                var o = m(),
                    i = function(e, t, i) {
                        var a = {
                            2796.2797: function(e, t) {
                                return t = t || 0, (e = e || []).filter(function(e) {
                                    return e.startTime - t >= -50
                                }).map(function(e) {
                                    var t = e.name ? e.name.split("-").map(function(e) {
                                            return e[0]
                                        }).join("") : "u",
                                        r = Math.floor(e.startTime);
                                    return t + "-" + r + "-" + Math.floor(r + e.duration)
                                }).join(".")
                            }(i, r),
                            689.2322: Y(o)
                        };
                        n && Object.keys(n).forEach(function(e) {
                            a[e] = n[e]
                        }), k(e || "2795", t, !0, a)
                    },
                    a = function() {
                        var n, s = r || o,
                            l = m(),
                            d = e._tti.events || [],
                            f = d.length;
                        0 !== f && (n = d[f - 1], s = Math.max(s, Math.floor(n.startTime + n.duration))), l - s >= u ? i(t, s, d) : l - s >= c ? i(t, (r || o) + c, d) : setTimeout(a, 1e3)
                    };
                a()
            }
        }

        function V(e) {
            E && e.push("2437=" + (f[E.type] || 2771), E.downlinkMax && "2439=" + E.downlinkMax, E.effectiveType && "2870=" + E.effectiveType)
        }

        function B(e, t) {
            if (!S) return t(null);
            w.href = e;
            var r = w.href,
                n = 0,
                o = 100;
            setTimeout(function e() {
                var i = h.getEntriesByName(r);
                if (i.length) return t(i);
                n++ < s ? (setTimeout(e, o), o += o) : t(null)
            }, 0)
        }

        function H(t) {
            return C.concat(["1701=" + t, e.ajaxStart && "1201.2154=" + Y(e.ajaxStart), e.ajaxComplete && "1201.2052=" + Y(e.ajaxComplete)])
        }

        function G(e, t) {
            Object.keys(l).forEach(function(r) {
                if (r in t) {
                    var n = t[r];
                    (n || 0 === n) && e.push(l[r] + "=" + Y(n))
                }
            })
        }

        function Y(e, t) {
            return "string" == typeof e ? encodeURIComponent(e) : Math.round(1e3 * (e - (t || 0))) / 1e3
        }

        function K(t, r, n, o) {
            var i = r.filter(Boolean).join(","),
                a = o ? {
                    href: o
                } : null;
            e.send(a, t, i, null, null, null, n)
        }
        e.getTimeMarks = function() {
            return b
        }, e.sendTTI = x, e.sendFirstPaint = function(e) {
            window.requestAnimationFrame ? requestAnimationFrame(function() {
                k("2130", e)
            }) : k("2130", e)
        }, e.sendHeroElement = function(e) {
            k("2876", e)
        }, e._subpages = {}, e.makeSubPage = function(t) {
            var r = e._subpages[t];
            e._subpages[t] = void 0 === r ? r = 0 : ++r;
            var n = !1;
            return {
                689.2322: Y(Ya.Rum.getTime()),
                2924: t,
                2925: r,
                isCanceled: function() {
                    return n
                },
                cancel: function() {
                    n = !0
                }
            }
        }, e.getResourceTimings = B, e.pushConnectionTypeTo = V, e.pushTimingTo = G, e.normalize = Y, e.sendCounter = K, e.sendDelta = N
    }(Ya.Rum)
}, function(e, t) {
    Ya.Rum.enabled && addEventListener("load", function e() {
        removeEventListener("load", e), Ya.Rum.sendTimeMark("1724");
        for (var t = document.querySelectorAll("script[data-rCid], div[data-rCid]"), r = 0, n = t.length; r < n; r++) {
            var o = t[r],
                i = o.src;
            if (!i) {
                var a = getComputedStyle(o).backgroundImage;
                if (a) {
                    var s = a.match(/^url\(["']?(.*?)["']?\)$/);
                    s && (i = s[1])
                }
            }
            i && Ya.Rum.sendResTiming(o.getAttribute("data-rCid"), i)
        }
    })
}, function(e, t, r) {
    "use strict";
    var n = function() {
        function e(e, t) {
            for (var r = 0; r < t.length; r++) {
                var n = t[r];
                n.enumerable = n.enumerable || !1, n.configurable = !0, "value" in n && (n.writable = !0), Object.defineProperty(e, n.key, n)
            }
        }
        return function(t, r, n) {
            return r && e(t.prototype, r), n && e(t, n), t
        }
    }();
    Object.defineProperty(t, "__esModule", {
        value: !0
    });
    var o = {
            maxTimeStep: 1,
            minDelay: .05
        },
        i = function() {
            function e() {
                var t = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : o;
                ! function(e, t) {
                    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                }(this, e), this.config = t, this.lastTimeCall = 0, this.lastTime = 0, this.watchedTime = 0
            }
            return n(e, [{
                key: "reset",
                value: function() {
                    this.lastTimeCall = 0, this.lastTime = 0, this.watchedTime = 0
                }
            }, {
                key: "setCurrentTime",
                value: function(e) {
                    var t = Date.now() / 1e3,
                        r = e - this.lastTime,
                        n = t - this.lastTimeCall;
                    r > 0 && r <= this.config.maxTimeStep && n > this.config.minDelay && (this.watchedTime += r), this.lastTimeCall = t, this.lastTime = e
                }
            }, {
                key: "getWatchedTime",
                value: function() {
                    return this.watchedTime
                }
            }]), e
        }();
    t.ApproximateWatchedTime = i
}]);