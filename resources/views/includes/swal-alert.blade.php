@if (Session::has('message'))
    swal({
    title: "{{ Session::get('message') }}",
    text: " ",
    className: "swal",
    icon: "{{ Session::get('icon') }}",
    timer: {{ Session::get('time') * 1000 }},
    button: false,
    // button: "تم",
    });
@endif