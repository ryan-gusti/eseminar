$(function () {
    var e = $(".user-list-table"),
        t = $(".new-user-modal"),
        a = $(".add-new-user"),
        s = $(".select2"),
        n = $(".dt-contact"),
        l = {
            1: { title: "Pending", class: "badge-light-warning" },
            2: { title: "Active", class: "badge-light-success" },
            3: { title: "Inactive", class: "badge-light-secondary" },
        },
        o = "../../../app-assets/",
        r = "app-user-view-account.html";
    "laravel" === $("body").attr("data-framework") &&
        ((o = $("body").attr("data-asset-path")),
        (r = o + "app/user/view/account")),
        s.each(function () {
            var e = $(this);
            e.wrap('<div class="position-relative"></div>'),
                e.select2({
                    dropdownAutoWidth: !0,
                    width: "100%",
                    dropdownParent: e.parent(),
                });
        }),
        e.length &&
            e.DataTable({
                ajax: o + "data/user-list.json",
                columns: [
                    { data: "" },
                    { data: "full_name" },
                    { data: "role" },
                    { data: "current_plan" },
                    { data: "billing" },
                    { data: "status" },
                    { data: "" },
                ],
                columnDefs: [
                    {
                        className: "control",
                        orderable: !1,
                        responsivePriority: 2,
                        targets: 0,
                        render: function (e, t, a, s) {
                            return "";
                        },
                    },
                    {
                        targets: 1,
                        responsivePriority: 4,
                        render: function (e, t, a, s) {
                            var n = a.full_name,
                                l = a.email,
                                i = a.avatar;
                            if (i)
                                var c =
                                    '<img src="' +
                                    o +
                                    "images/avatars/" +
                                    i +
                                    '" alt="Avatar" height="32" width="32">';
                            else {
                                var d = [
                                        "success",
                                        "danger",
                                        "warning",
                                        "info",
                                        "dark",
                                        "primary",
                                        "secondary",
                                    ][Math.floor(6 * Math.random()) + 1],
                                    p = (n = a.full_name).match(/\b\w/g) || [];
                                c =
                                    '<span class="avatar-content">' +
                                    (p = (
                                        (p.shift() || "") + (p.pop() || "")
                                    ).toUpperCase()) +
                                    "</span>";
                            }
                            return (
                                '<div class="d-flex justify-content-left align-items-center"><div class="avatar-wrapper"><div class="avatar ' +
                                ("" === i ? " bg-light-" + d + " " : "") +
                                ' me-1">' +
                                c +
                                '</div></div><div class="d-flex flex-column"><a href="' +
                                r +
                                '" class="user_name text-truncate text-body"><span class="fw-bolder">' +
                                n +
                                '</span></a><small class="emp_post text-muted">' +
                                l +
                                "</small></div></div>"
                            );
                        },
                    },
                    {
                        targets: 2,
                        render: function (e, t, a, s) {
                            var n = a.role;
                            return (
                                "<span class='text-truncate align-middle'>" +
                                {
                                    Subscriber: feather.icons.user.toSvg({
                                        class: "font-medium-3 text-primary me-50",
                                    }),
                                    Author: feather.icons.settings.toSvg({
                                        class: "font-medium-3 text-warning me-50",
                                    }),
                                    Maintainer: feather.icons.database.toSvg({
                                        class: "font-medium-3 text-success me-50",
                                    }),
                                    Editor: feather.icons["edit-2"].toSvg({
                                        class: "font-medium-3 text-info me-50",
                                    }),
                                    Admin: feather.icons.slack.toSvg({
                                        class: "font-medium-3 text-danger me-50",
                                    }),
                                }[n] +
                                n +
                                "</span>"
                            );
                        },
                    },
                    {
                        targets: 4,
                        render: function (e, t, a, s) {
                            return (
                                '<span class="text-nowrap">' +
                                a.billing +
                                "</span>"
                            );
                        },
                    },
                    {
                        targets: 5,
                        render: function (e, t, a, s) {
                            var n = a.status;
                            return (
                                '<span class="badge rounded-pill ' +
                                l[n].class +
                                '" text-capitalized>' +
                                l[n].title +
                                "</span>"
                            );
                        },
                    },
                    {
                        targets: -1,
                        title: "Actions",
                        orderable: !1,
                        render: function (e, t, a, s) {
                            return (
                                '<div class="btn-group"><a class="btn btn-sm dropdown-toggle hide-arrow" data-bs-toggle="dropdown">' +
                                feather.icons["more-vertical"].toSvg({
                                    class: "font-small-4",
                                }) +
                                '</a><div class="dropdown-menu dropdown-menu-end"><a href="' +
                                r +
                                '" class="dropdown-item">' +
                                feather.icons["file-text"].toSvg({
                                    class: "font-small-4 me-50",
                                }) +
                                'Details</a><a href="javascript:;" class="dropdown-item delete-record">' +
                                feather.icons["trash-2"].toSvg({
                                    class: "font-small-4 me-50",
                                }) +
                                "Delete</a></div></div></div>"
                            );
                        },
                    },
                ],
                order: [[1, "desc"]],
                dom: '<"d-flex justify-content-between align-items-center header-actions mx-2 row mt-75"<"col-sm-12 col-lg-4 d-flex justify-content-center justify-content-lg-start" l><"col-sm-12 col-lg-8 ps-xl-75 ps-0"<"dt-action-buttons d-flex align-items-center justify-content-center justify-content-lg-end flex-lg-nowrap flex-wrap"<"me-1"f>B>>>t<"d-flex justify-content-between mx-2 row mb-1"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
                language: {
                    sLengthMenu: "Show _MENU_",
                    search: "Search",
                    searchPlaceholder: "Search..",
                },
                buttons: [
                    {
                        extend: "collection",
                        className:
                            "btn btn-outline-secondary dropdown-toggle me-2",
                        text:
                            feather.icons["external-link"].toSvg({
                                class: "font-small-4 me-50",
                            }) + "Export",
                        buttons: [
                            {
                                extend: "print",
                                text:
                                    feather.icons.printer.toSvg({
                                        class: "font-small-4 me-50",
                                    }) + "Print",
                                className: "dropdown-item",
                                exportOptions: { columns: [1, 2, 3, 4, 5] },
                            },
                            {
                                extend: "csv",
                                text:
                                    feather.icons["file-text"].toSvg({
                                        class: "font-small-4 me-50",
                                    }) + "Csv",
                                className: "dropdown-item",
                                exportOptions: { columns: [1, 2, 3, 4, 5] },
                            },
                            {
                                extend: "excel",
                                text:
                                    feather.icons.file.toSvg({
                                        class: "font-small-4 me-50",
                                    }) + "Excel",
                                className: "dropdown-item",
                                exportOptions: { columns: [1, 2, 3, 4, 5] },
                            },
                            {
                                extend: "pdf",
                                text:
                                    feather.icons.clipboard.toSvg({
                                        class: "font-small-4 me-50",
                                    }) + "Pdf",
                                className: "dropdown-item",
                                exportOptions: { columns: [1, 2, 3, 4, 5] },
                            },
                            {
                                extend: "copy",
                                text:
                                    feather.icons.copy.toSvg({
                                        class: "font-small-4 me-50",
                                    }) + "Copy",
                                className: "dropdown-item",
                                exportOptions: { columns: [1, 2, 3, 4, 5] },
                            },
                        ],
                        init: function (e, t, a) {
                            $(t).removeClass("btn-secondary"),
                                $(t).parent().removeClass("btn-group"),
                                setTimeout(function () {
                                    $(t)
                                        .closest(".dt-buttons")
                                        .removeClass("btn-group")
                                        .addClass("d-inline-flex mt-50");
                                }, 50);
                        },
                    },
                    {
                        text: "Add New User",
                        className: "add-new btn btn-primary",
                        attr: {
                            "data-bs-toggle": "modal",
                            "data-bs-target": "#modals-slide-in",
                        },
                        init: function (e, t, a) {
                            $(t).removeClass("btn-secondary");
                        },
                    },
                ],
                responsive: {
                    details: {
                        display: $.fn.dataTable.Responsive.display.modal({
                            header: function (e) {
                                return "Details of " + e.data().full_name;
                            },
                        }),
                        type: "column",
                        renderer: function (e, t, a) {
                            var s = $.map(a, function (e, t) {
                                return 6 !== e.columnIndex
                                    ? '<tr data-dt-row="' +
                                          e.rowIdx +
                                          '" data-dt-column="' +
                                          e.columnIndex +
                                          '"><td>' +
                                          e.title +
                                          ":</td> <td>" +
                                          e.data +
                                          "</td></tr>"
                                    : "";
                            }).join("");
                            return (
                                !!s &&
                                $('<table class="table"/>').append(
                                    "<tbody>" + s + "</tbody>"
                                )
                            );
                        },
                    },
                },
                language: { paginate: { previous: "&nbsp;", next: "&nbsp;" } },
                initComplete: function () {
                    this.api()
                        .columns(2)
                        .every(function () {
                            var e = this,
                                t =
                                    ($(
                                        '<label class="form-label" for="UserRole">Role</label>'
                                    ).appendTo(".user_role"),
                                    $(
                                        '<select id="UserRole" class="form-select text-capitalize mb-md-0 mb-2"><option value=""> Select Role </option></select>'
                                    )
                                        .appendTo(".user_role")
                                        .on("change", function () {
                                            var t =
                                                $.fn.dataTable.util.escapeRegex(
                                                    $(this).val()
                                                );
                                            e.search(
                                                t ? "^" + t + "$" : "",
                                                !0,
                                                !1
                                            ).draw();
                                        }));
                            e.data()
                                .unique()
                                .sort()
                                .each(function (e, a) {
                                    t.append(
                                        '<option value="' +
                                            e +
                                            '" class="text-capitalize">' +
                                            e +
                                            "</option>"
                                    );
                                });
                        }),
                        this.api()
                            .columns(3)
                            .every(function () {
                                var e = this,
                                    t =
                                        ($(
                                            '<label class="form-label" for="UserPlan">Plan</label>'
                                        ).appendTo(".user_plan"),
                                        $(
                                            '<select id="UserPlan" class="form-select text-capitalize mb-md-0 mb-2"><option value=""> Select Plan </option></select>'
                                        )
                                            .appendTo(".user_plan")
                                            .on("change", function () {
                                                var t =
                                                    $.fn.dataTable.util.escapeRegex(
                                                        $(this).val()
                                                    );
                                                e.search(
                                                    t ? "^" + t + "$" : "",
                                                    !0,
                                                    !1
                                                ).draw();
                                            }));
                                e.data()
                                    .unique()
                                    .sort()
                                    .each(function (e, a) {
                                        t.append(
                                            '<option value="' +
                                                e +
                                                '" class="text-capitalize">' +
                                                e +
                                                "</option>"
                                        );
                                    });
                            }),
                        this.api()
                            .columns(5)
                            .every(function () {
                                var e = this,
                                    t =
                                        ($(
                                            '<label class="form-label" for="FilterTransaction">Status</label>'
                                        ).appendTo(".user_status"),
                                        $(
                                            '<select id="FilterTransaction" class="form-select text-capitalize mb-md-0 mb-2xx"><option value=""> Select Status </option></select>'
                                        )
                                            .appendTo(".user_status")
                                            .on("change", function () {
                                                var t =
                                                    $.fn.dataTable.util.escapeRegex(
                                                        $(this).val()
                                                    );
                                                e.search(
                                                    t ? "^" + t + "$" : "",
                                                    !0,
                                                    !1
                                                ).draw();
                                            }));
                                e.data()
                                    .unique()
                                    .sort()
                                    .each(function (e, a) {
                                        t.append(
                                            '<option value="' +
                                                l[e].title +
                                                '" class="text-capitalize">' +
                                                l[e].title +
                                                "</option>"
                                        );
                                    });
                            });
                },
            }),
        a.length &&
            (a.validate({
                errorClass: "error",
                rules: {
                    "user-fullname": { required: !0 },
                    "user-name": { required: !0 },
                    "user-email": { required: !0 },
                },
            }),
            a.on("submit", function (e) {
                var s = a.valid();
                e.preventDefault(), s && t.modal("hide");
            })),
        n.length &&
            n.each(function () {
                new Cleave($(this), { phone: !0, phoneRegionCode: "US" });
            });
});
