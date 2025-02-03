@include('layouts.sweetalertcss')
@include('layouts.sweetalertjs')
<script type="text/javascript">

document.addEventListener("DOMContentLoaded", function() {
    var emailInputElements = document.querySelectorAll('.email-validate');

    emailInputElements.forEach(function(element) {
        element.addEventListener('keypress', function(event) {
            if (!EmailValidator.validateEmail(event)) {
                event.preventDefault();
            }
        });
    });
});
    function check_accurance(item_array, item) {
        for (var k = 0; k < item_array.length; k++) {
            if (item_array[k] == item)
                return true;
        }
        return false;
    }


    function validateFile(v, types, sizes) {
        var allowedExtensions = null;
        if (types == "image")
            allowedExtensions = ['jpeg', 'png'];
        else if (types == "document")
            allowedExtensions = ['pdf', 'doc', 'docx', 'xlsx', 'xls'];
        else if (types == "image_document")
            allowedExtensions = ['jpeg', 'png', 'pdf', 'doc', 'docx', 'xlsx', 'xls'];
        else if (types == "excel")
            allowedExtensions = ['csv', 'xlsx', 'xls'];
        const sizeLimit = (1000000 * sizes);

        var error_message = "Please upload only " + allowedExtensions + " files & Size should be " + sizes + "MB"
        var size_message = "File size must be less than " + sizes + "MB"

        for (i = 0; i <= 10; i++) {
            if (v.files[i]) {
                const {
                    name: fileName,
                    size: fileSize
                } = v.files[i];
                const fileExtension = fileName.split(".").pop();
                if (!allowedExtensions.includes(fileExtension)) {
                    Swal.fire({
                        icon: 'error',
                        timer: 5000,
                        title: error_message,
                        showConfirmButton: false
                    })

                    v.value = null;
                } else if (fileSize > sizeLimit) {
                    Swal.fire({
                        icon: 'error',
                        timer: 5000,
                        title: size_message,
                        showConfirmButton: false
                    })
                    v.value = null;
                }

            } else
                break;

        }
    }

    $(document).ready(function() {


        $.getsubcategory = function(subcategory) {
            var parent_id = $('#category').val();            
            $.ajax({
                url: "{{ route('get-children-by-parent') }}",
                type: "GET",
                data: {
                    _token: '{{ csrf_token() }}',
                    parent_column: 'category_id',
                    child: 'SubCategory',
                    parent_id: parent_id,
                },
                cache: false,
                async: false,
                success: function(response) {
                    $('#subcategory').html(
                        "<option value=''>{{ __('common.chooseoption') }}</option>");
                    $.each(response, function(index, data) {
                        if (subcategory == data['id'])
                            $('#subcategory').append('<option value="' + data['id'] +
                                '" selected>' + data['name'] + '</option>');
                        else
                            $('#subcategory').append('<option value="' + data['id'] +
                                '">' + data['name'] + '</option>');
                    });
                }
            });
        }
        
        $.percentage = function(field_id) {
            var field = '#' + field_id;
            var percentage = $(field).val();
            var final = parseInt(percentage);
            var pos = percentage.indexOf(".");
            var last = percentage.substring(pos + 1, pos + 3);
            if (0 <= final && final <= 100) {
                if (pos > 0)
                    var values = final + '.' + last;
                else
                    var values = final;
            } else {
                values = '';
            }
            if (values > 100 || 0 > values)
                values = '';
            $(field).val(values);
        }

        $.alpha_num_space_period = function(){
                return (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode > 47 && event.charCode < 58) || event.charCode == 46 || event.charCode == 32 || event.charCode == 43 || event.charCode == 45 || event.charCode == 64 || event.charCode == 33 || event.charCode == 34 || event.charCode == 47 || event.charCode == 33 || event.charCode == 58 || event.charCode == 59 || event.charCode == 63 || event.charCode == 64 || event.charCode == 95 || event.charCode == 44 || event.charCode == 91 || event.charCode == 93 || event.charCode == 37;
            }
            $.numeric = function(){
                return (event.charCode > 47 && event.charCode < 58 );
            }

            $.numeric_period = function(){
                return (event.charCode > 47 && event.charCode < 58) || event.charCode == 46 || event.charCode == 43 ;
            }
 
        $.desable_all = function() {
            const allelements = document.querySelectorAll('.disabled');
            for (const element_one of allelements) {
                element_one.setAttribute('disabled', '');
            }
        }

 
        $.check_box_checked = function(class_name) {
            var checkedValue = new Array();
            var inputElements = document.getElementsByClassName(class_name);
            for (var i = 0; inputElements[i]; ++i) {
                if (inputElements[i].checked) {
                    checkedValue.push(inputElements[i].value);
                }
            }
            return checkedValue;
        }


        $.delete_html_row = function() {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                timer: 10000,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('input:checked').not('.all').parents("tr").remove();
                }
            })
        }


        $.delete_one_html = function(v, autoload=null) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                timer: 10000,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $(v).parents('tr').remove();
                    
                }
            })
        }

        $.delete_html_rowbytable = function(table_name, autoload) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                timer: 10000,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    var table = document.getElementById(table_name);
                    var rowCount = table.rows.length;
                    for (var i = 0; i < rowCount; i++) {
                        table.deleteRow(0);
                    }
                    if (autoload)
                        $.auto_load();
                }
            })
        }
        $('.delete').click(function(e) {
            var form = $(this).closest("form");
            e.preventDefault()
            Swal.fire({
                title: 'Are you sure?',
                text: "You want to delete it!",
                timer: 10000,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
                return false;
            })
        });

    });

    function curr_date(field_id) {
        var col_id = "#" + field_id;
        var existance = $(col_id).val();
        if (!existance) {
            document.getElementById(field_id).valueAsDate = new Date();
        }
    }



    function success(title, text) {
        toastr.success(text)
    }

    function error(title, text) {
        toastr.error(text)
    }

    function warning(title, text) {
        toastr.warning(text)
    }

    function delete_by_url(url, id) {
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#0c768a",
            cancelButtonColor: "#ff3d60",
            timer: 4000,
            confirmButtonText: "Yes, delete it!"
        }).then(function(result) {
            if (result.value) {
                $.ajax({
                    url: url,
                    method: 'post',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: id
                    },
                    cache: false,
                    async: false,
                    success: function(data) {
                        if (data == 200) {
                            success("Deleted!", "Your record has been deleted.");
                            location.reload();
                        } else if (data == 201)
                            error("Cann't delete", "Record is in use");
                        else
                            error("Error", "Something went wrong");

                    }
                });
            }
        });
    }



    $.document_path = function(path){
        if(!path){
            path = "default_image/def.jpg";
        }
        return `{{ route('secure-documents', ['path' => '__path__']) }}`.replace('__path__', path);
    }




    $.delete_html_row = function() {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            timer: 10000,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $('input:checked').not('.all').parents("tr").remove();
            }
        })
    }

</script>
