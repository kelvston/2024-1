! function(r, a, s) {
    "use strict";

    function e(r) {
        var a = r.attr("rel");
        return 1;

    }

    function t() {
      s("form").submit();
      //   i() && s("form").submit()
    }

    // function i() {
    //     var r = !0;
    //     return 0 == o() ? (r = !1, s("#wizard-validation").smartWizard("setError", {
    //             stepnum: 1,
    //             iserror: !0
    //         })) : s("#wizard-validation").smartWizard("setError", {
    //             stepnum: 1,
    //             iserror: !1
    //         }), 0 == d() ? (r = !1, s("#wizard-validation").smartWizard("setError", {
    //             stepnum: 3,
    //             iserror: !0
    //         })) : s("#wizard-validation").smartWizard("setError", {
    //             stepnum: 3,
    //             iserror: !1
    //         }), r || s("#wizard-validation").smartWizard("showMessage", "Please correct the errors in the steps and continue"), r
    // }
    //
    // function n(r) {
    //     var a = !0;
    //     return 1 == r && (0 == o() ? (a = !1, s("#wizard-validation").smartWizard("showMessage", "Please correct the errors in step" + r + " and click next."), s("#wizard-validation").smartWizard("setError", {
    //             stepnum: r,
    //             iserror: !0
    //         })) : s("#wizard-validation").smartWizard("setError", {
    //             stepnum: r,
    //             iserror: !1
    //         })), 3 == r && (0 == d() ? (a = !1, s("#wizard-validation").smartWizard("showMessage", "Please correct the errors in step" + r + " and click next."), s("#wizard-validation").smartWizard("setError", {
    //             stepnum: r,
    //             iserror: !0
    //         })) : s("#wizard-validation").smartWizard("setError", {
    //             stepnum: r,
    //             iserror: !1
    //         })), a
    // }
    //
    // function o() {
    //     // var r = !0,
    //     //     a = s("#username").val();
    //     // !a && a.length <= 0 ? (r = !1, s("#msg_username").html("Please fill username").show()) : s("#msg_username").html("").hide();
    //     // var e = s("#password").val();
    //     // !e && e.length <= 0 ? (r = !1, s("#msg_password").html("Please fill password").show()) : s("#msg_password").html("").hide();
    //     // var t = s("#cpassword").val();
    //     // return !t && t.length <= 0 ? (r = !1, s("#msg_cpassword").html("Please fill confirm password").show()) : s("#msg_cpassword").html("").hide(), e && e.length > 0 && t && t.length > 0 && (e != t ? (r = !1, s("#msg_cpassword").html("Password mismatch").show()) : s("#msg_cpassword").html("").hide()), r
    // }
    //
    // function d() {
    //     // var r = !0,
    //     //     a = s("#email").val();
    //     // return a && a.length > 0 ? l(a) ? s("#msg_email").html("").hide() : (r = !1, s("#msg_email").html("Email is invalid").show()) : (r = !1, s("#msg_email").html("Please enter email").show()), r
    // }
    //
    // function l(r) {
    //     // var a = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
    //     // return a.test(r)
    // }
    s("#wizard-validation").smartWizard({
        transitionEffect: "slideleft",
        onLeaveStep: e,
        reverseButtonsOrder: !1,
        keyNavigation: !1,
        onFinish: t
    })
}(document, window, jQuery);