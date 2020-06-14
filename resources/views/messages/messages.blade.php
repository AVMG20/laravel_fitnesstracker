@if(!empty($errors))
    @foreach($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible mt-3">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{$error}}
        </div>
    @endforeach
@endif

@if(session('success'))
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: false,
            onOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'success',
            title: '{{session('success')}}'
        })
    </script>
@endif

@if(session('failed'))
    <div class="alert alert-danger alert-dismissible mt-3">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        {{session('failed')}}
    </div>
@endif
