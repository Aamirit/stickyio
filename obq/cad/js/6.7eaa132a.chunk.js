(this["webpackJsonpmultistep-form-react"] = this["webpackJsonpmultistep-form-react"] || []).push([
    [6], {
        158: function(e, r, i) {
            "use strict";
            i.r(r);
            var t = i(35),
                a = i(0),
                c = i(141),
                s = i(61),
                n = i(76),
                d = i(18),
                l = i(79),
                j = i(46),
                b = i(21),
                o = i(156),
                u = i(34),
                m = i(4),
                O = ["children", "errorMessage", "helper", "id", "isRequired", "label", "showError"],
                h = function(e) {
                    var r = e.children,
                        i = e.errorMessage,
                        t = e.helper,
                        a = e.id,
                        c = e.isRequired,
                        l = e.label,
                        j = e.showError,
                        b = Object(o.a)(e, O);
                    return Object(m.jsxs)(n.a, Object(d.a)(Object(d.a)({
                        mb: "6",
                        isInvalid: j,
                        isRequired: c
                    }, b), {}, {
                        children: [!!l && Object(m.jsx)(n.c, {
                            htmlFor: a,
                            children: l
                        }), !!t && Object(m.jsx)(s.m, {
                            color: "gray.500",
                            fontSize: "sm",
                            mt: "0",
                            mb: "3",
                            children: t
                        }), r, Object(m.jsxs)(n.b, {
                            id: "".concat(a, "-error"),
                            children: [Object(m.jsx)(u.e, {
                                mr: "2"
                            }), i]
                        })]
                    }))
                },
                g = function(e) {
                    var r = Object(b.c)(e),
                        i = r.errorMessage,
                        c = r.id,
                        s = r.isValid,
                        n = r.isSubmitted,
                        o = r.isValidating,
                        u = r.resetKey,
                        O = r.setValue,
                        g = r.value,
                        x = r.otherProps,
                        f = e.name,
                        v = e.rightAddon,
                        p = x.children,
                        q = x.label,
                        y = x.type,
                        w = x.placeholder,
                        S = x.helper,
                        M = Object(a.useState)(!1),
                        z = Object(t.a)(M, 2),
                        R = z[0],
                        W = z[1],
                        V = !s && (R || n);
                    Object(a.useEffect)((function() {
                        W(!1)
                    }), [u]);
                    var C = {
                        errorMessage: i,
                        helper: S,
                        id: c,
                        label: q,
                        showError: V,
                        name: f
                    };
                    return Object(m.jsxs)(h, Object(d.a)(Object(d.a)({}, C), {}, {
                        children: [Object(m.jsxs)(l.b, {
                            children: [Object(m.jsx)(l.a, {
                                type: y || "text",
                                id: c,
                                value: null !== g && void 0 !== g ? g : "",
                                inputMode: "number" === y ? "numeric" : "",
                                onChange: function(e) {
                                    return O(e.target.value)
                                },
                                onBlur: function() {
                                    return W(!0)
                                },
                                "aria-invalid": V,
                                "aria-describedby": s ? void 0 : "".concat(c, "-error"),
                                placeholder: w
                            }), (R || n) && o && Object(m.jsx)(l.d, {
                                children: Object(m.jsx)(j.a, {
                                    size: "sm",
                                    flex: "none"
                                })
                            }), void 0 !== v && Object(m.jsx)(l.c, {
                                children: v,
                                pointerEvents: "none"
                            })]
                        }), p]
                    }))
                },
                x = i(78),
                f = i(139),
                v = function(e) {
                    var r = Object(b.c)(e),
                        i = r.setValue,
                        t = r.value;
                    return Object(m.jsx)(n.a, {
                        children: Object(m.jsx)(x.b, {
                            name: "Gender",
                            value: null !== t && void 0 !== t ? t : i("male"),
                            onChange: function(e) {
                                return i(e)
                            },
                            children: Object(m.jsxs)(s.e, {
                                children: [Object(m.jsx)(s.c, {
                                    width: "full",
                                    children: Object(m.jsx)(x.a, {
                                        value: "male",
                                        children: Object(m.jsx)(f.a, {
                                            id: "form.gender.male"
                                        })
                                    })
                                }), Object(m.jsx)(s.c, {
                                    width: "full",
                                    children: Object(m.jsx)(x.a, {
                                        value: "female",
                                        children: Object(m.jsx)(f.a, {
                                            id: "form.gender.female"
                                        })
                                    })
                                })]
                            })
                        })
                    })
                },
                p = i(80),
                q = i(69);
            var y = function(e) {
                    var r, i = Object(b.c)(e),
                        c = i.id,
                        s = i.errorMessage,
                        d = i.isValid,
                        l = i.setValue,
                        j = i.value,
                        o = i.isSubmitted,
                        u = (r = 18, Array(99 - r + 1).fill().map((function(e, i) {
                            return r + i
                        }))),
                        O = Object(a.useState)(!1),
                        h = Object(t.a)(O, 2),
                        g = h[0],
                        x = h[1],
                        v = !d && (g || o),
                        y = Object(q.a)().formatMessage;
                    return Object(m.jsxs)(n.a, {
                        isInvalid: v && s,
                        children: [Object(m.jsxs)(p.a, {
                            name: "age",
                            placeholder: y({
                                id: "form.age.placeholder"
                            }),
                            value: null !== j && void 0 !== j ? j : "",
                            onBlur: function() {
                                return x(!0)
                            },
                            "aria-invalid": v,
                            "aria-describedby": d ? void 0 : "".concat(c, "-error"),
                            onChange: function(e) {
                                return l(e.target.value)
                            },
                            children: [Object(m.jsx)(f.a, {
                                id: "form.age.under18",
                                children: function(e) {
                                    return Object(m.jsx)("option", {
                                        value: "17",
                                        children: e
                                    })
                                }
                            }), u.map((function(e) {
                                return Object(m.jsx)(f.a, {
                                    id: "form.age.option",
                                    children: function(r) {
                                        return Object(m.jsxs)("option", {
                                            value: e,
                                            children: [e, " ", r]
                                        }, e)
                                    }
                                }, "age-" + e)
                            }))]
                        }), Object(m.jsx)(n.b, {
                            children: s
                        })]
                    })
                },
                w = i(81),
                S = function(e) {
                    var r = Object(b.c)(e),
                        i = r.errorMessage,
                        c = r.id,
                        s = r.isValid,
                        n = r.isSubmitted,
                        l = r.resetKey,
                        j = r.setValue,
                        o = r.value,
                        u = r.otherProps,
                        O = e.name,
                        g = u.children,
                        x = u.label,
                        f = u.placeholder,
                        v = u.helper,
                        p = Object(a.useState)(!1),
                        q = Object(t.a)(p, 2),
                        y = q[0],
                        S = q[1],
                        M = !s && (y || n);
                    Object(a.useEffect)((function() {
                        S(!1)
                    }), [l]);
                    var z = {
                        errorMessage: i,
                        helper: v,
                        id: c,
                        label: x,
                        showError: M,
                        name: O
                    };
                    return Object(m.jsxs)(h, Object(d.a)(Object(d.a)({}, z), {}, {
                        children: [Object(m.jsxs)(w.c, {
                            precision: 1,
                            step: .1,
                            min: e.min,
                            max: e.max,
                            onChange: function(e) {
                                return j(e)
                            },
                            children: [Object(m.jsx)(w.d, {
                                id: c,
                                value: null !== o && void 0 !== o ? o : "",
                                onBlur: function() {
                                    return S(!0)
                                },
                                "aria-invalid": M,
                                "aria-describedby": s ? void 0 : "".concat(c, "-error"),
                                placeholder: f
                            }), Object(m.jsxs)(w.e, {
                                children: [Object(m.jsx)(w.b, {}), Object(m.jsx)(w.a, {})]
                            })]
                        }), g]
                    }))
                };
            r.default = function() {
                var e = Object(a.useState)(0),
                    r = Object(t.a)(e, 2),
                    i = r[0],
                    d = r[1],
                    l = Object(q.a)().formatMessage,
                    j = Object(q.a)().locale,
                    b = "metric";
                return "en" !== j && "en-ie" !== j || (b = "imperial"), Object(m.jsxs)("div", {
                    children: [Object(m.jsxs)(s.c, {
                        mb: "5",
                        children: [Object(m.jsx)(s.i, {
                            size: "xs",
                            mb: 4,
                            children: Object(m.jsx)(f.a, {
                                id: "form.gender.label"
                            })
                        }), Object(m.jsx)(v, {
                            name: "gender"
                        })]
                    }), "metric" === b && Object(m.jsxs)(s.c, {
                        children: [Object(m.jsxs)(s.f, {
                            templateColumns: "repeat(2, 1fr)",
                            gap: 4,
                            children: [Object(m.jsxs)(n.a, {
                                id: "weight",
                                children: [Object(m.jsx)(n.c, {
                                    children: Object(m.jsx)(f.a, {
                                        id: "form.weight.label"
                                    })
                                }), Object(m.jsx)(g, {
                                    name: "weight",
                                    required: "Required",
                                    rightAddon: "kg",
                                    type: "number",
                                    onChange: function(e) {
                                        d(e - 1)
                                    },
                                    validations: [{
                                        rule: Object(c.e)(),
                                        message: l({
                                            id: "form.weight.required"
                                        })
                                    }, {
                                        rule: Object(c.c)(),
                                        message: l({
                                            id: "form.message.isNumber"
                                        })
                                    }, {
                                        rule: Object(c.b)(30),
                                        message: l({
                                            id: "form.message.isMinNumber"
                                        })
                                    }, {
                                        rule: Object(c.d)("(?:^|[^.,\\d])(\\d+)(?:[^.,\\d]|$)"),
                                        message: l({
                                            id: "form.message.isPattern"
                                        })
                                    }]
                                })]
                            }), Object(m.jsxs)(n.a, {
                                id: "targetWeight",
                                children: [Object(m.jsx)(n.c, {
                                    children: Object(m.jsx)(f.a, {
                                        id: "form.targetWeight.label"
                                    })
                                }), Object(m.jsx)(g, {
                                    name: "targetWeight",
                                    required: "Required",
                                    rightAddon: "kg",
                                    type: "number",
                                    validations: [{
                                        rule: Object(c.e)(),
                                        message: l({
                                            id: "form.targetWeight.required"
                                        })
                                    }, {
                                        rule: Object(c.c)(),
                                        message: l({
                                            id: "form.message.isNumber"
                                        })
                                    }, {
                                        rule: Object(c.b)(30),
                                        message: l({
                                            id: "form.message.isMinNumber"
                                        })
                                    }, {
                                        rule: Object(c.a)(i),
                                        message: l({
                                            id: "form.targetWeight.isMaxNumber"
                                        })
                                    }, {
                                        rule: Object(c.d)("(?:^|[^.,\\d])(\\d+)(?:[^.,\\d]|$)"),
                                        message: l({
                                            id: "form.message.isPattern"
                                        })
                                    }]
                                })]
                            })]
                        }), Object(m.jsxs)(n.a, {
                            id: "bodySize",
                            children: [Object(m.jsx)(n.c, {
                                children: Object(m.jsx)(f.a, {
                                    id: "form.bodySize.label"
                                })
                            }), Object(m.jsx)(g, {
                                name: "body_size",
                                required: "Required",
                                rightAddon: "cm",
                                type: "number",
                                validations: [{
                                    rule: Object(c.e)(),
                                    message: l({
                                        id: "form.bodySize.required"
                                    })
                                }, {
                                    rule: Object(c.c)(),
                                    message: l({
                                        id: "form.message.isNumber"
                                    })
                                }, {
                                    rule: Object(c.b)(120),
                                    message: l({
                                        id: "form.bodySize.isMinNumber"
                                    })
                                }, {
                                    rule: Object(c.d)("(?:^|[^.,\\d])(\\d+)(?:[^.,\\d]|$)"),
                                    message: l({
                                        id: "form.message.isPattern"
                                    })
                                }]
                            })]
                        })]
                    }), "imperial" === b && Object(m.jsxs)(s.c, {
                        children: [Object(m.jsxs)(s.f, {
                            templateColumns: "repeat(2, 1fr)",
                            gap: 4,
                            children: [Object(m.jsxs)(n.a, {
                                id: "weight",
                                children: [Object(m.jsx)(n.c, {
                                    children: Object(m.jsx)(f.a, {
                                        id: "form.weight.label"
                                    })
                                }), Object(m.jsx)(S, {
                                    name: "weight",
                                    required: "Required",
                                    min: 6,
                                    max: 25,
                                    validations: [{
                                        rule: Object(c.e)(),
                                        message: l({
                                            id: "form.weight.required"
                                        })
                                    }]
                                })]
                            }), Object(m.jsxs)(n.a, {
                                id: "targetWeight",
                                children: [Object(m.jsx)(n.c, {
                                    children: Object(m.jsx)(f.a, {
                                        id: "form.targetWeight.label"
                                    })
                                }), Object(m.jsx)(S, {
                                    name: "targetWeight",
                                    required: "Required",
                                    min: 6,
                                    max: 25,
                                    validations: [{
                                        rule: Object(c.e)(),
                                        message: l({
                                            id: "form.targetWeight.required"
                                        })
                                    }]
                                })]
                            })]
                        }), Object(m.jsxs)(n.a, {
                            id: "bodySize",
                            children: [Object(m.jsx)(n.c, {
                                children: Object(m.jsx)(f.a, {
                                    id: "form.bodySize.label"
                                })
                            }), Object(m.jsx)(S, {
                                name: "body_size",
                                required: "Required",
                                min: 4,
                                max: 7,
                                validations: [{
                                    rule: Object(c.e)(),
                                    message: l({
                                        id: "form.bodySize.required"
                                    })
                                }]
                            })]
                        })]
                    }), Object(m.jsxs)(s.c, {
                        children: [Object(m.jsx)(s.i, {
                            size: "xs",
                            mb: 2,
                            children: Object(m.jsx)(f.a, {
                                id: "form.age.label"
                            })
                        }), Object(m.jsx)(y, {
                            name: "age",
                            validations: [{
                                rule: Object(c.e)(),
                                message: l({
                                    id: "form.age.required"
                                })
                            }]
                        })]
                    })]
                })
            }
        }
    }
]);
