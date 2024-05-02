class bulk_select {
    getAllSelectedItems = () => {
        let selectedData = [];
        $(".ic-item-select-checkbox:checked").each(function () {
            selectedData.push($(this).data("id"));
        });
        return selectedData;
    };
}
!(function ($) {
    "use strict";
    function readURL(input, image_for) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $("#img_" + image_for).attr("src", e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    $(".image_pick").on("change", function () {
        var image_for = $(this).attr("data-image-for");
        readURL(this, image_for);
    });

    $(".generate-slug").keyup(function () {
      var text = $(this).val();
      text = text.toLowerCase();
      // Normalize the text to support Unicode characters
      text = text.normalize("NFD").replace(/[\u0300-\u036f]/g, "");
      text = text.replace(/[^\p{L}\p{N}\s]/gu, "");
      text = text.replace(/\s+/g, "-");

      $("#slug").val(text);
    });
    // select 2
    if ($(".select2").length > 0) {
        $(".select2").select2();
    }
    $(document).on("select2:open", () => {
        document.querySelector(".select2-search__field").focus();
    });

    // initiate summernote rich text editor
    $(document).ready(function () {
        if ($(".ic_summernote").length > 0) {
            $(".ic_summernote").summernote({
                placeholder: "Place your content...",
                tabsize: 2,
                height: 200,
                minHeight: 200,
                maxHeight: 500,
            });
        }
    });

    // multiple selector in datatable

    let selectedData = [];

    const makeSelectAllAndGet = () => {
        selectedData = [];
        const allItems = $(".ic-item-select-checkbox");
        for (let i = 0; i < allItems.length; i++) {
            const element = allItems[i];
            element.checked = true;
            let itemId = parseInt(element.dataset.id);
            selectedData.push(itemId);
        }
        return selectedData;
    };

    $(document).on("click", ".select-all-checkbox", function () {
        const allItems = $(".ic-item-select-checkbox");
        if (this.checked) {
            makeSelectAllAndGet();
        } else {
            for (let i = 0; i < allItems.length; i++) {
                const element = allItems[i];
                element.checked = false;
            }
            selectedData = [];
        }
        $("#bulk-delete-inout-ids").val(selectedData);
    });

    $(document).on("click", ".ic-item-select-checkbox", function () {
        let data = [...selectedData];
        let itemId = parseInt(this.dataset.id);
        if (this.checked) {
            data.push(itemId);
        } else {
            const index = data.indexOf(itemId);
            data.splice(index, 1);
        }
        selectedData = data;
        $("#bulk-delete-inout-ids").val(selectedData);
    });

    $(".delete-list-data").on("click", function (e) {
        e.preventDefault();
        const { fromName, id } = this.dataset;
        console.log(
            "formName: ",
            fromName,
            "id: ",
            id,
            "dataset:",
            this.dataset
        );
    });
})(jQuery);

function makeDeleteRequest(event, id) {
    event.preventDefault();
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            if ($("#delete-form-" + id).length > 0) {
                let form_id = $("#delete-form-" + id);
                $(form_id).submit();
            } else {
                let form_id = $("#delete-form-" + id);
                $(form_id).submit();
            }
        }
    });
}
function confirmShow(event, id, url) {
    event.preventDefault();
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, Confirm it!",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "get",
                url: url,
                success: function (data) {
                    console.log(data);
                    if (data.status == "success") {
                        window.location.reload();
                    } else {
                        window.location.reload();
                    }
                },
            });
        }
    });
}
function makeDeleteBulkRequest(event, id, actionUrl) {
    event.preventDefault();
    const bulkSelect = new bulk_select();

    if (bulkSelect.getAllSelectedItems()?.length > 0) {
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!",
        }).then((result) => {
          if (result.isConfirmed) {
              
                if ($("#delete-form-" + id).length > 0) {
                    let form_id = $("#delete-form-" + id);
                    form_id.attr("action", actionUrl);
                    $(form_id).submit();
                } else {
                    let form_id = $("#delete-form-" + id);
                    form_id.attr("action", actionUrl);
                    console.log(form_id);
                    $(form_id).submit();
                }
            }
        });
    } else {
        toastr.info("Please select item");
    }
}

function changeBulkStatus(event, actionUrl, status) {
    event.preventDefault();
    const bulkSelect = new bulk_select();
    const selectedItems = bulkSelect.getAllSelectedItems();
    // console.log('selectedItems:', actionUrl, 'selectedItems:', selectedItems);
    if (selectedItems?.length > 0) {
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, Change Status!",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    method: "POST",
                    url: actionUrl, // Replace with your backend route
                    data: {
                        items: selectedItems,
                        status: status, // Replace with the new status
                        _token: $('meta[name="csrf-token"]').attr("content"),
                    },
                    success: function (response) {
                        // Handle success response
                        const { status, message } = response;
                        if (status) {
                            toastr.success(message);
                            location.reload();
                        }
                        // console.log(response);
                    },
                    error: function (xhr, status, error) {
                        // Handle error
                        console.error(xhr.responseText);
                    },
                });
            }
        });
    } else {
        toastr.info("Please select item");
    }
}

function bulkRemoveFromEnrollment(event, actionUrl) {
    event.preventDefault();
    const bulkSelect = new bulk_select();
    const selectedItems = bulkSelect.getAllSelectedItems();
    if (selectedItems?.length > 0) {
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, Remove!",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    method: "POST",
                    url: actionUrl, // Replace with your backend route
                    data: {
                        enrollment_key: selectedItems,
                        _token: $('meta[name="csrf-token"]').attr("content"),
                    },
                    success: function (response) {
                        // Handle success response
                        const { status, message } = response;
                        if (status) {
                            toastr.success(message);
                            location.reload();
                        }
                        // console.log(response);
                    },
                    error: function (xhr, status, error) {
                        // Handle error
                        console.error(xhr.responseText);
                    },
                });
            }
        });
    } else {
        toastr.info("Please select item");
    }
}
//tag input
$(function () {
    $(".taginput")
        .on("change", function (event) {
            var $element = $(event.target);
            var $container = $element.closest(".example");

            if (!$element.data("tagsinput")) return;

            var val = $element.val();
            if (val === null) val = "null";
            var items = $element.tagsinput("items");

            $("code", $("pre.val", $container)).html(
                $.isArray(val)
                    ? JSON.stringify(val)
                    : '"' + val.replace('"', '\\"') + '"'
            );
            $("code", $("pre.items", $container)).html(
                JSON.stringify($element.tagsinput("items"))
            );
        })
        .trigger("change");

    // $(".select-all-checkbox").on('click', function(){
    //     console.log('clicked: select all');
    // });
    // $(".ic-item-select-checkbox").on('click', function(){
    //     console.log('clicked: ic-item-select-checkbox');
    // });
});

function makeRestoreRequest(event, id) {
    event.preventDefault();
    Swal.fire({
        title: "Are you sure?",
        text: "This will be restore!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, Restore it!",
    }).then((result) => {
        if (result.isConfirmed) {
            if ($("#restore-form-" + id).length > 0) {
                let form_id = $("#restore-form-" + id);
                $(form_id).submit();
            } else {
                let form_id = $("#restore-form-" + id);
                $(form_id).submit();
            }
        }
    });
}

const confirmationPopup = (event, id) => {
    event.preventDefault();
    Swal.fire({
        title: "Are you sure?",
        text: "To force correct! instead of user provided answer.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, Make correct!",
    }).then((result) => {
        if (result.isConfirmed) {
            if ($("#confirm-form-" + id).length > 0) {
                let form_id = $("#confirm-form-" + id);
                $(form_id).submit();
            } else {
                let form_id = $("#confirm-form-" + id);
                $(form_id).submit();
            }
        }
    });
};

function languageChangeHandler(reqLang, url = null) {
    const actionUrl = url + "?lang=" + reqLang;
    window.location.href = actionUrl;
}
