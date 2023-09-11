(this["webpackJsonpmultistep-form-react"] = this["webpackJsonpmultistep-form-react"] || []).push([
    [7], {
        159: function(e, t, o) {
            "use strict";
            o.r(t);
            o(0);
            var r = o(61),
                c = o(18),
                n = o(78),
                i = o(21),
                a = o(4);

            function s(e) {
                var t = Object(n.c)(e),
                    o = t.getInputProps,
                    i = t.getCheckboxProps,
                    s = o(),
                    b = i();
                return Object(a.jsxs)(r.c, {
                    as: "label",
                    flex: "1",
                    align: "center",
                    children: [Object(a.jsx)("input", Object(c.a)({}, s)), Object(a.jsx)(r.c, Object(c.a)(Object(c.a)({}, b), {}, {
                        cursor: "pointer",
                        borderWidth: "1px",
                        borderRadius: "md",
                        boxShadow: "md",
                        _checked: {
                            bg: "#2d78f7",
                            color: "white",
                            borderColor: "#2d78f7"
                        },
                        _focus: {
                            boxShadow: "outline"
                        },
                        px: 1,
                        py: 3,
                        children: e.children
                    }))]
                })
            }
            var b = function(e) {
                    var t = e.name,
                        o = e.options,
                        b = e.columns,
                        d = Object(i.c)(e).setValue,
                        j = Object(n.d)({
                            name: t,
                            onChange: function(e) {
                                d(e)
                            }
                        }),
                        u = j.getRootProps,
                        l = j.getRadioProps,
                        m = u();
                    return Object(a.jsx)(r.j, Object(c.a)(Object(c.a)({
                        mb: 10,
                        spacing: 2,
                        columns: b
                    }, m), {}, {
                        children: o.map((function(e) {
                            var t = l({
                                value: e
                            });
                            return Object(a.jsx)(s, Object(c.a)(Object(c.a)({}, t), {}, {
                                children: e
                            }), e)
                        }))
                    }))
                },
                d = o(69),
                j = o(139);
            t.default = function() {
                var e = Object(d.a)().formatMessage;
                return Object(a.jsxs)(r.c, {
                    textAlign: "center",
                    children: [Object(a.jsx)(r.i, {
                        size: "xs",
                        mb: 4,
                        children: Object(a.jsx)(j.a, {
                            id: "form.motivated.label"
                        })
                    }), Object(a.jsx)(b, {
                        name: "q1",
                        columns: 3,
                        options: [e({
                            id: "form.radioButtonWenig"
                        }), e({
                            id: "form.radioButtonMittel"
                        }), e({
                            id: "form.radioButtonSehr"
                        })]
                    }), Object(a.jsx)(r.i, {
                        size: "xs",
                        mb: 4,
                        children: Object(a.jsx)(j.a, {
                            id: "form.sport.label"
                        })
                    }), Object(a.jsx)(b, {
                        name: "q2",
                        columns: 3,
                        options: [e({
                            id: "form.radioButtonWenig"
                        }), e({
                            id: "form.radioButtonMittel"
                        }), e({
                            id: "form.radioButtonSehr"
                        })]
                    })]
                })
            }
        }
    }
]);
