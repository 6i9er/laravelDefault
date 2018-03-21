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

                var currentPageInfo = getCurrentPage();

                // check if the btn is next btn
                if($(this).attr('rel') == "next" ){
                    var url = "{{url('users?page=')}}" + currentPageInfo.currentPage;
                }else{
                    $(this).parent('li').attr('class' , "active");
                    var url = $(this).attr('href');
                }

                getUsers(url);
                window.history.pushState("", "", url);
            });


            // next = 1 , prev = 2
            function getCurrentPage(getNext =0){
                var currentPage = "";
                var currentPageUrl = "";
                $('.pagination li').each(function () {
                    if ($(this).attr('class') == "active") {
                        currentPage = ($(this).children('span').text()) ? $(this).children('span').text() : $(this).children('a').text();
                        currentPageUrl = "{{url('users?page=')}}" + currentPage;
                        $(this).html("<a href='" + currentPageUrl + "'>" + currentPage + "</a>")
                    }
                    $(this).attr('class', "");
                });
                return {
                    "currentPage" : currentPage,
                    "currentPageUrl" : currentPageUrl
                }
            }
            // get the new page data
            function getUsers(url) {
                $.ajax({
                    url : url
                }).done(function (data) {
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