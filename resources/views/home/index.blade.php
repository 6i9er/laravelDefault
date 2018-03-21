@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>name</th>
                                    <th>email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="usersTrs">
                                @foreach($users as $user)
                                    @include('home.userTableRow_tmpl',$user)
                                @endforeach
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="pagination">
                                    <?php echo $users->render();  ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

    <script type="text/javascript">

        $(function() {
            $('body').on('click', '.pagination a', function(e) {
                e.preventDefault();

                $('.pagination li').each(function () {
                    $(this).attr('class' , "")
                });

                $(this).parent('li').attr('class' , "active");
                console.log($(this).parent('li').attr('class' , "active"));
                var url = $(this).attr('href');
                getUsers(url);
                window.history.pushState("", "", url);
            });

            function getUsers(url) {
                $.ajax({
                    url : url
                }).done(function (data) {
                    console.log(data);
                    if(data['error'] == "0"){
                        $('#usersTrs').html(data['data']);
                    }
                }).fail(function () {
                    alert('Users could not be loaded.');
                });
            }
        });

    </script>

@endsection